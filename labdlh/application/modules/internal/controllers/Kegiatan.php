<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('internal/kegiatan_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language','file'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in()){
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));
		}elseif (!$this->ion_auth->in_group(array('admin','members','analis','manager_teknis','ka_lab','admin_pelayanan'))){
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}
	}

	public function index() {

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Kegiatan';
		$data['menu'] = 'kegiatan';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('kegiatan/v_index',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function data_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('kode'=>$this->input->post('nama'),'nama'=>$this->input->post('nama'),'no_urut_dokumen'=>$this->input->post('nama'));
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->kegiatan_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->kegiatan_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('kegiatan/v_list', $data);
	}

	public function tambah() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/kegiatan/form'));
		}

		$this->form_validation->set_rules('kegiatan','Kegiatan', 'required|xss_clean');
		$this->form_validation->set_rules('uraian','Uraian', 'xss_clean');
		$this->form_validation->set_rules('mulai','Mulai', 'xss_clean');
		$this->form_validation->set_rules('sampai','Sampai', 'xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Kegiatan';
			$data['menu'] = 'kegiatan';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('kegiatan/v_form_tambah', $data);
			$this->template->publish();
		}else{
			//$kirim['sekolah_id'] = $this->input->post('sekolah_id');
			$kirim['kegiatan'] = $this->input->post('kegiatan');
			$kirim['uraian'] = $this->input->post('uraian');
			$kirim['mulai'] = $this->input->post('mulai');
			$kirim['sampai'] = $this->input->post('sampai');
			$kirim['color']='#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);

			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			$this->db->insert('kegiatan',$kirim);

			redirect('internal/kegiatan','refresh');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('kegiatan', array("id"=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	function ubah($id=false){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/kegiatan'));
		}

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from kegiatan where id = "'.$id.'"')->row();
		$this->load->view('kegiatan/v_form_ubah',  isset($data) ? $data : NULL);
	}

	public function simpan_ubah($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/kegiatan'));
		}

		$this->form_validation->set_rules('kegiatan','Kegiatan', 'required|xss_clean');
		$this->form_validation->set_rules('uraian','Uraian', 'xss_clean');
		$this->form_validation->set_rules('mulai','Mulai', 'xss_clean');
		$this->form_validation->set_rules('sampai','Sampai', 'xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'kegiatan' => $this->input->post('kegiatan'),
			'uraian' => $this->input->post('uraian'),
			'mulai' => $this->input->post('mulai'),
			'sampai' => $this->input->post('sampai'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('kegiatan',$kirim,array('id'=>$id));
		$this->data['message'] = 'Data Berhasil Dirubah.';
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	public function ubah_hasil($id=null) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/kegiatan'));
		}

		$userid = $this->session->userdata('user_id');

		$data['item']=$this->db->query('select * from kegiatan where id = "'.$id.'"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Hasil Kegiatan';
		$data['menu'] = 'kegiatan';
		$data['id'] = $id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('kegiatan/v_form_hasil', $data);
		$this->template->publish();
	}

	public function simpan_ubah_hasil($id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'data/peserta'));
		}
		$file=$this->db->query('select * from kegiatan where id = "'.$id.'"')->row("file");
		if($_FILES["file"]["name"]<>""){
			if($file <> "" or $file<>null){
				unlink(FCPATH . 'file/kegiatan/'.$file); 
			}
			
			$upload_path = FCPATH . 'file/kegiatan/';
			$config['allowed_types'] = 'jpg|png|jpeg|doc|docx|pdf|csv|xlxs|xlx';
			$config['upload_path'] = $upload_path;
			$config['file_name'] = date("Ymdhis")."-".rand(1,100);
			$config['encrypt_name'] = false;
			$config['remove_spaces'] = true;
			$config['create_thumb'] = true;
			$config['max_size'] = '8000';
			$config['overwrite'] = true;

			// print_r($upload_path);die();

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = array('error' => $this->upload->display_errors());
				$this->form_validation->set_message(__FUNCTION__, $this->upload->display_errors('', ''));
			} else {
				$file = $this->upload->data();
				$_POST['upload_file'] = $this->input->post('file_lama');
			}
			$nama_file = $this->upload->data("file_name");
		}
		else{
			$nama_file = $file;
		}

		

		$kirim=array
		(
			'hasil_kegiatan' => $this->input->post('hasil_kegiatan'),
			'file' => $nama_file,
			'input_hasil_kegiatan' => date('Y-m-d H:i:s', strtotime('NOW')),
		);
		$this->db->update('kegiatan',$kirim,array('id'=>$id));
		// print_r($this->db->last_query());die();
		redirect('internal/kegiatan','refresh');
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);
		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

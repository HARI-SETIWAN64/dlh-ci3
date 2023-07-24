<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends CI_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('internal/penilaian_model','internal/karyawan_model'));
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
		$this->template->title = 'Penilaian';
		$data['menu'] = 'penilaian';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('penilaian/v_index',  isset($data) ? $data : NULL);
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

		$data['items'] = $this->penilaian_model->get_list($where,$limit,$offset,$like)->result();
		// print_r($this->db->last_query()); die();
		$tot = $this->penilaian_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('penilaian/v_list', $data);
	}

	public function tambah() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/penilaian/form'));
		}

		$this->form_validation->set_rules('user_id','Nama', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['pegawai'] = $this->karyawan_model->dropdown_pegawai();
		$data['penilaian'] = $this->penilaian_model->dropdown_penilaian();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Penilaian';
			$data['soals'] = $this->db->query("select master_penilaian_detail.* from master_penilaian inner join master_penilaian_detail on master_penilaian.id = master_penilaian_detail.master_penilaian_id where aktif = 1")->result();
			$data['menu'] = 'penilaian';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('penilaian/v_form_tambah', $data);
			$this->template->publish();
		}else{
			$kirim['create_by'] = $this->session->userdata('user_id');
			$group = $this->db->query("SELECT `groups`.* FROM users INNER JOIN users_groups ON users.id = users_groups.user_id INNER JOIN `groups` ON users_groups.group_id = groups.id")->row();

			if($group->name == 'admin' or $group->name == 'manager_teknis' or $group->name == 'ka_lab'){
				$kirim['status_penilai'] = '2';
			}else{
				$kirim['status_penilai'] = '1';
			}

			$kirim['master_penilaian_id'] = $this->input->post('master_penilaian_id');
			$kirim['user_id'] = $this->input->post('user_id');
			$kirim['tanggal'] = $this->input->post('tanggal');

			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $userid;
			$this->db->insert('penilaian',$kirim);
			$insert_id = $this->db->insert_id();

			$jum = 0;
			$bg=0;
			foreach($this->input->post('nilai_id') as $penilaian_id => $nilai ) {
				$master_nilai = $this->db->query("select * from master_penilaian_detail where id='".$penilaian_id."'")->row();
				$detail['master_penilaian_detail_id']=$master_nilai->id;
				$detail['penilaian_id']=$insert_id;
				$detail['keterangan']=$master_nilai->keterangan;
				$detail['nilai']=$nilai;
				$detail['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$detail['create_by'] = $userid;
				$this->db->insert('penilaian_detail',$detail);

				$bg+=1;
				$jum+=$nilai;
			}


			$updt['rata_rata'] = $jum/$bg;
			$this->db->update('penilaian',$updt,array('id'=>$insert_id));

			redirect('internal/penilaian','refresh');
			// print_r($_POST); die();
		}
	}

	public function hapus($id)
	{
		$this->db->delete('penilaian', array("id"=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	function lihat($id=false){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/penilaian'));
		}
		$data['items']=$this->db->query('select * from penilaian_detail where penilaian_id = "'.$id.'"')->result();
		$this->load->view('internal/penilaian/v_lihat',  isset($data) ? $data : NULL);
	}

	public function simpan_ubah($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/penilaian'));
		}

		$this->form_validation->set_rules('penilaian','Penilaian', 'required|xss_clean');
		$this->form_validation->set_rules('uraian','Uraian', 'xss_clean');
		$this->form_validation->set_rules('mulai','Mulai', 'xss_clean');
		$this->form_validation->set_rules('sampai','Sampai', 'xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'penilaian' => $this->input->post('penilaian'),
			'uraian' => $this->input->post('uraian'),
			'mulai' => $this->input->post('mulai'),
			'sampai' => $this->input->post('sampai'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('penilaian',$kirim,array('id'=>$id));
		$this->data['message'] = 'Data Berhasil Dirubah.';
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	public function ubah_hasil($id=null) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/penilaian'));
		}

		$userid = $this->session->userdata('user_id');

		$data['item']=$this->db->query('select * from penilaian where id = "'.$id.'"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Hasil Penilaian';
		$data['menu'] = 'penilaian';
		$data['id'] = $id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('penilaian/v_form_hasil', $data);
		$this->template->publish();
	}

	public function simpan_ubah_hasil($id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'data/peserta'));
		}
		$file=$this->db->query('select * from penilaian where id = "'.$id.'"')->row("file");
		if($_FILES["file"]["name"]<>""){
			if($file <> "" or $file<>null){
				unlink(FCPATH . 'file/penilaian/'.$file); 
			}
			
			$upload_path = FCPATH . 'file/penilaian/';
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
			'hasil_penilaian' => $this->input->post('hasil_penilaian'),
			'file' => $nama_file,
			'input_hasil_penilaian' => date('Y-m-d H:i:s', strtotime('NOW')),
		);
		$this->db->update('penilaian',$kirim,array('id'=>$id));
		// print_r($this->db->last_query());die();
		redirect('internal/penilaian','refresh');
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

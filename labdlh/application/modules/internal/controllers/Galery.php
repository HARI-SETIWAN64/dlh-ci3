<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Galery extends CI_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('internal/galery_model'));
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

		$this->template->title = 'Galery';
		$data['menu'] = 'galery';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('galery/v_index',  isset($data) ? $data : NULL);
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

		$data['items'] = $this->galery_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->galery_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('galery/v_list', $data);
	}

	public function form($id="") {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/galery'));
		}

		$userid = $this->session->userdata('user_id');

		$data['item']=$this->db->query('select * from galery where id = "'.$id.'"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Hasil Galery';
		$data['menu'] = 'galery';
		$data['id'] = $id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('galery/v_form', $data);
		$this->template->publish();
	}

	public function simpan_form($id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'data/peserta'));
		}
		if($id){
			$file=$this->db->query('select * from galery where id = "'.$id.'"')->row("file");
			if($_FILES["file"]["name"]<>""){
				if($file <> "" or $file<>null){
					unlink(FCPATH . 'file/galery/'.$file); 
				}
				
				$upload_path = FCPATH . 'file/galery/';
				$config['allowed_types'] = 'jpg|png|jpeg';
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
			}else{
				$nama_file = $file;
			}

			$kirim=array
			(
				'kegiatan' => $this->input->post('kegiatan'),
				'uraian' => $this->input->post('uraian'),
				'file' => $nama_file,
				'update_by' => $this->session->userdata('user_id'),
				'date_update' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->update('galery',$kirim,array('id'=>$id));
		}else{
			if($_FILES["file"]["name"]<>""){				
				$upload_path = FCPATH . 'file/galery/';
				$config['allowed_types'] = 'jpg|png|jpeg';
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
			}else{
				$nama_file = $file;
			}

			$kirim=array
			(
				'kegiatan' => $this->input->post('kegiatan'),
				'uraian' => $this->input->post('uraian'),
				'file' => $nama_file,
				'create_by' => $this->session->userdata('user_id'),
				'date_create' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->insert('galery',$kirim);
		}
		// print_r($this->db->last_query());die();
		redirect('internal/galery','refresh');
	}

	public function hapus($id)
	{
		$this->db->delete('galery', array("id"=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
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

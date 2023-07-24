<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penugasan extends CI_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('ppc/penugasan_model','internal/karyawan_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language','file'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in()){
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));
		}elseif (!$this->ion_auth->in_group(array('admin','analis','ka_lab','manager_teknis','admin_pelayanan'))){
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}
	}

	public function index() {

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Penugasan';
		$data['menu'] = 'penugasan';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('penugasan/v_index',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function data_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		$w_tahun = array();
		$w_bulan = array();

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		if (isset($_POST['tahun']) && $_POST['tahun'] != NULL) {
			$w_tahun = array('YEAR(tanggal_penugasan)' => $this->input->post('tahun'));
		}

		if (isset($_POST['bulan']) && $_POST['bulan'] != NULL) {
				$w_bulan = array('MONTH(tanggal_penugasan)' => $this->input->post('bulan'));
		}

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array(
						'jenis_tugas'=>$this->input->post('nama'),
						'first_name'=>$this->input->post('nama'),
						'uraian_tugas'=>$this->input->post('nama'),
						'uraian_hasil'=>$this->input->post('nama'),
						'tanggal_penugasan'=>$this->input->post('nama'),
						'batas_pengumpulan'=>$this->input->post('nama'),
						'file'=>$this->input->post('nama'),
						'file_pendukung'=>$this->input->post('nama'));
		}

		$where = array_merge($w_tahun, $w_bulan);
		$data['items'] = $this->penugasan_model->get_list($where,$limit,$offset,$like)->result();
		// print_r($this->db->last_query());die;
		$tot = $this->penugasan_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('penugasan/v_list', $data);
	}

	function detail($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'ppc/penugasan'));
		}

		$data['item']=$this->db->query('select * from ppc_penugasan 
		INNER JOIN ppc_jenis_tugas ON ppc_penugasan.jenis_tugas_id = ppc_jenis_tugas.id
		INNER JOIN users ON ppc_penugasan.user_id = users.id
 		where ppc_penugasan.id = "'.$id.'"')->row();
		$this->load->view('penugasan/v_detail',  isset($data) ? $data : NULL);

	}

	public function form($id="") {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'ppc/penugasan'));
		}

		$userid = $this->session->userdata('user_id');
		$data['karyawan'] = $this->karyawan_model->dropdown_pegawai();
		$data['jenis_tugas']=$this->penugasan_model->dropdown_jenis_tugas();

		$data['item']=$this->db->query('select * from ppc_penugasan where id = "'.$id.'"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Penugasan';
		$data['menu'] = 'penugasan';
		$data['id'] = $id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('penugasan/v_form', $data);
		$this->template->publish();
	}

	public function simpan_form($id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'ppc/penugasan'));
		}
		if($id){
			$file=$this->db->query('select * from ppc_penugasan where id = "'.$id.'"')->row("file_pendukung");
			if($_FILES["file"]["name"]<>""){
				if($file <> "" or $file<>null){
					unlink(FCPATH . 'file/penugasan/'.$file); 
				}
				
				$upload_path = FCPATH . 'file/penugasan/';
				$config['allowed_types'] = 'jpg|png|jpeg|mp4|doc|docx|pdf|pptx|csv|xlsx|xls';
				$config['upload_path'] = $upload_path;
				$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-@\=';
				$config['file_name'] = $_FILES["file"]["name"];
				$config['encrypt_name'] = false;
				$config['remove_spaces'] = true;
				$config['create_thumb'] = true;
				$config['max_size'] = '80000';
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
				'jenis_tugas_id' => $this->input->post('jenis_tugas_id'),
				'user_id' => $this->input->post('user_id'),
				'uraian_tugas' => $this->input->post('uraian_tugas'),
				'tanggal_penugasan' => $this->input->post('tanggal_penugasan'),
				'batas_pengumpulan' => $this->input->post('batas_pengumpulan'),
				'file_pendukung' => $nama_file,
				'update_by' => $this->session->userdata('user_id'),
				'date_update' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->update('ppc_penugasan',$kirim,array('id'=>$id));
		}else{
			if($_FILES["file"]["name"]<>""){				
				$upload_path = FCPATH . 'file/penugasan/';
				$config['allowed_types'] = 'jpg|png|jpeg|mp4|doc|docx|pdf|pptx|csv|xlsx|xls';
				$config['upload_path'] = $upload_path;
				$config['file_name'] = $_FILES["file"]["name"];
				$config['permitted_uri_chars'] = 'a-z 0-9~%.:&_\-';
				$config['encrypt_name'] = false;
				$config['remove_spaces'] = true;
				$config['create_thumb'] = true;
				$config['max_size'] = '80000';
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
				$nama_file = null;
			}

			$kirim=array
			(
				'jenis_tugas_id' => $this->input->post('jenis_tugas_id'),
				'user_id' => $this->input->post('user_id'),
				'uraian_tugas' => $this->input->post('uraian_tugas'),
				'tanggal_penugasan' => $this->input->post('tanggal_penugasan'),
				'batas_pengumpulan' => $this->input->post('batas_pengumpulan'),
				'file_pendukung' => $nama_file,
				'create_by' => $this->session->userdata('user_id'),
				'date_create' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->insert('ppc_penugasan',$kirim);
		}
		// print_r($this->db->last_query());die();
		redirect('ppc/penugasan','refresh');
	}

	public function hapus($id)
	{
		$this->db->delete('ppc_penugasan', array("id"=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	public function status($id, $status)
    {
		$datapost['status']=$status;
		$datapost['update_by']=$this->session->userdata('user_id');
		$datapost['date_update']=date('Y-m-d H:i:s', strtotime('NOW'));
		$this->db->update('ppc_penugasan',$datapost,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

	public function keterangan($id, $keterangan, $status, $status_project)
    {
		$datapost['status']=$status;
		$datapost['status_project']=$status_project;
		$datapost['keterangan']=$keterangan;
		$datapost['update_by']=$this->session->userdata('user_id');
		$datapost['date_update']=date('Y-m-d H:i:s', strtotime('NOW'));
		$this->db->update('ppc_penugasan',$datapost,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

	public function keterangan_diterima($id, $keterangan)
    {
		$datapost['keterangan']=$keterangan;
		$datapost['update_by']=$this->session->userdata('user_id');
		$datapost['date_update']=date('Y-m-d H:i:s', strtotime('NOW'));
		$this->db->update('ppc_penugasan',$datapost,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

	public function ubah_hasil($id=null) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'ppc/penugasan'));
		}

		$userid = $this->session->userdata('user_id');

		$data['item']=$this->db->query('select * from ppc_penugasan where id = "'.$id.'"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Hasil Project';
		$data['menu'] = 'penugasan';
		$data['id'] = $id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('penugasan/v_form_hasil', $data);
		$this->template->publish();
	}

	public function simpan_ubah_hasil($id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'ppc/penugasan'));
		}
		$file=$this->db->query('select * from ppc_penugasan where id = "'.$id.'"')->row();
		$batas_pengumpulan=$file->batas_pengumpulan;
		$file=$file->file;
		if($_FILES["file"]["name"]<>""){
			if($file <> "" or $file<>null){
				unlink(FCPATH . 'file/penugasan/'.$file); 
			}
			
			$upload_path = FCPATH . 'file/penugasan/';
			$config['allowed_types'] = 'jpg|png|jpeg|mp4|doc|docx|pdf|pptx|csv|xlsx|xls';
			$config['upload_path'] = $upload_path;
			// $config['file_name'] = date("Ymdhis")."-".rand(1,100);
			$config['file_name'] = $_FILES["file"]["name"];
			$config['permitted_uri_chars'] = 'a-z 0-9~%.:&_\-';
			$config['encrypt_name'] = false;
			$config['remove_spaces'] = true;
			$config['create_thumb'] = true;
			$config['max_size'] = '80000';
			$config['overwrite'] = true;

			// print_r($upload_path);die();

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$error = array('error' => $this->upload->display_errors());
				$this->form_validation->set_message(__FUNCTION__, $this->upload->display_errors('', ''));
			} else {
				$file = $this->upload->data();
				$_POST['upload_file'] = $this->input->post('file_lama');
				// print_r($this->db->last_query());die();
			}
			$nama_file = $this->upload->data("file_name");
			
		}
		else{
			$nama_file = $file;
		}
		

		if($batas_pengumpulan < date('Y-m-d H:i:s', strtotime('NOW'))) {
			$status_project='1';
		}else{
			$status_project='3';
		}


		$kirim=array
		(
			'uraian_hasil' => $this->input->post('uraian_hasil'),
			'status' => $this->input->post('status'),
			'file' => $nama_file,
			'input_hasil_project' => date('Y-m-d H:i:s', strtotime('NOW')),
			'status_project'=>$status_project
		);
		$this->db->update('ppc_penugasan',$kirim,array('id'=>$id));
		// print_r($this->db->last_query());die();
		redirect('ppc/penugasan','refresh');
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

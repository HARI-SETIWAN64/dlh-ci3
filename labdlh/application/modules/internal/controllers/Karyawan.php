<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('internal/karyawan_model'));
		$this->load->model(array('internal/pendidikan_model'));
		$this->load->model(array('internal/pelatihan_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language','file'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in()){
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));
		}elseif (!$this->ion_auth->in_group(array('admin','analis','manager_teknis','ka_lab','admin_pelayanan'))){
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}
	}

	public function index() {

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Karyawan';
		$data['menu'] = 'karyawan';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('karyawan/v_index',  isset($data) ? $data : NULL);
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

		$data['items'] = $this->karyawan_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->karyawan_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('karyawan/v_list', $data);
	}

	public function form($id="") {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/karyawan'));
		}

		$userid = $this->session->userdata('user_id');

		$data['item']=$this->db->query('select * from users where id = "'.$id.'"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Hasil Karyawan';
		$data['menu'] = 'karyawan';
		$data['id'] = $id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('karyawan/v_form', $data);
		$this->template->publish();
	}

	public function simpan_form($id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'data/peserta'));
		}
		if($id){
			$file=$this->db->query('select * from users where id = "'.$id.'"')->row("foto");
			if($_FILES["foto"]["name"]<>""){
				if($file <> "" or $file<>null){
					unlink(FCPATH . 'file/karyawan/'.$file); 
				}
				
				$upload_path = FCPATH . 'file/karyawan/';
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

				if (!$this->upload->do_upload('foto')) {
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
				'first_name' => $this->input->post('first_name'),
				'nip' => $this->input->post('nip'),
				'ttl' => $this->input->post('ttl'),
				'agama' => $this->input->post('agama'),
				'gol_darah' => $this->input->post('gol_darah'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'phone' => $this->input->post('phone'),
				'foto' => $nama_file,
				// 'update_by' => $this->session->userdata('user_id'),
				// 'date_update' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->update('users',$kirim,array('id'=>$id));
		}else{
			if($_FILES["foto"]["name"]<>""){				
				$upload_path = FCPATH . 'file/karyawan/';
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

				if (!$this->upload->do_upload('foto')) {
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
				'first_name' => $this->input->post('first_name'),
				'nip' => $this->input->post('nip'),
				'ttl' => $this->input->post('ttl'),
				'agama' => $this->input->post('agama'),
				'gol_darah' => $this->input->post('gol_darah'),
				'phone' => $this->input->post('phone'),
				'alamat' => $this->input->post('alamat'),
				'phone' => $this->input->post('phone'),
				'foto' => $nama_file,
				// 'create_by' => $this->session->userdata('user_id'),
				// 'date_create' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->insert('users',$kirim);
		}
		// print_r($this->db->last_query());die();
		redirect('internal/karyawan','refresh');
	}

	public function hapus($id)
	{
		$this->db->delete('karyawan', array("id"=>$id));
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

	//////////////////////////////////////////////////////////////
	// Pendidikan
	public function pendidikan($users_id) {

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Karyawan';
		$data['menu'] = 'karyawan';
		$data['users_id'] = $users_id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('karyawan/v_pendidikan',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function pendidikan_data_list($users_id) {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('pendidikan'=>$this->input->post('nama'),'nama_institusi'=>$this->input->post('nama'),'jurusan'=>$this->input->post('nama'));
		}

		$where = array('users_id'=>$users_id);

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->pendidikan_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->pendidikan_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$data['users_id'] = $users_id;
		$this->load->view('karyawan/v_pendidikan_list', $data);
	}

	public function pendidikan_form($users_id, $id="") {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/karyawan'));
		}

		$userid = $this->session->userdata('user_id');

		$data['item']=$this->db->query('select * from users_pendidikan where id = "'.$id.'"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Hasil Karyawan';
		$data['menu'] = 'karyawan';
		$data['id'] = $id;
		$data['users_id'] = $users_id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('karyawan/v_pendidikan_form', $data);
		$this->template->publish();
	}

	public function pendidikan_simpan_form($users_id, $id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'data/peserta'));
		}
		if($id){
			$kirim=array
			(
				'users_id' => $this->input->post('users_id'),
				'urut' => $this->input->post('urut'),
				'pendidikan' => $this->input->post('pendidikan'),
				'nama_institusi' => $this->input->post('nama_institusi'),
				'jurusan' => $this->input->post('jurusan'),
				'mulai' => $this->input->post('mulai'),
				'sampai' => $this->input->post('sampai'),
				'keterangan' => $this->input->post('keterangan'),
				'update_by' => $this->session->userdata('user_id'),
				'date_update' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->update('users_pendidikan',$kirim,array('id'=>$id));
		}else{
			$kirim=array
			(
				'users_id' => $this->input->post('users_id'),
				'urut' => $this->input->post('urut'),
				'pendidikan' => $this->input->post('pendidikan'),
				'nama_institusi' => $this->input->post('nama_institusi'),
				'jurusan' => $this->input->post('jurusan'),
				'mulai' => $this->input->post('mulai'),
				'sampai' => $this->input->post('sampai'),
				'keterangan' => $this->input->post('keterangan'),
				'create_by' => $this->session->userdata('user_id'),
				'date_create' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->insert('users_pendidikan',$kirim);
		}
		// print_r($this->db->last_query());die();
		redirect('internal/karyawan/pendidikan/'.$this->input->post('users_id'),'refresh');
	}

	public function pendidikan_hapus($id)
	{
		$this->db->delete('users_pendidikan', array("id"=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	//////////////////////////////////////////////////////////////
	// Pelatihan
	public function pelatihan($users_id) {

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Karyawan';
		$data['menu'] = 'karyawan';
		$data['users_id'] = $users_id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('karyawan/v_pelatihan',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function pelatihan_data_list($users_id) {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('pelatihan'=>$this->input->post('nama'),'nama_institusi'=>$this->input->post('nama'),'jurusan'=>$this->input->post('nama'));
		}

		$where = array('users_id'=>$users_id);

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->pelatihan_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->pelatihan_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$data['users_id'] = $users_id;
		$this->load->view('karyawan/v_pelatihan_list', $data);
	}

	public function pelatihan_form($users_id, $id="") {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'internal/karyawan'));
		}

		$userid = $this->session->userdata('user_id');

		$data['item']=$this->db->query('select * from users_pelatihan where id = "'.$id.'"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Hasil Karyawan';
		$data['menu'] = 'karyawan';
		$data['id'] = $id;
		$data['users_id'] = $users_id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('karyawan/v_pelatihan_form', $data);
		$this->template->publish();
	}

	public function pelatihan_simpan_form($users_id, $id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'data/peserta'));
		}
		if($id){
			$kirim=array
			(
				'users_id' => $this->input->post('users_id'),
				'nama_pelatihan' => $this->input->post('nama_pelatihan'),
				'tgl' => $this->input->post('tgl'),
				'penyeleggaran' => $this->input->post('penyeleggaran'),
				'lama_pelatihan' => $this->input->post('lama_pelatihan'),
				'update_by' => $this->session->userdata('user_id'),
				'date_update' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->update('users_pelatihan',$kirim,array('id'=>$id));
		}else{
			$kirim=array
			(
				'users_id' => $this->input->post('users_id'),
				'nama_pelatihan' => $this->input->post('nama_pelatihan'),
				'tgl' => $this->input->post('tgl'),
				'penyeleggaran' => $this->input->post('penyeleggaran'),
				'lama_pelatihan' => $this->input->post('lama_pelatihan'),
				'create_by' => $this->session->userdata('user_id'),
				'date_create' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->insert('users_pelatihan',$kirim);
		}
		// print_r($this->db->last_query());die();
		redirect('internal/karyawan/pelatihan/'.$this->input->post('users_id'),'refresh');
	}

	public function pelatihan_hapus($id)
	{
		$this->db->delete('users_pelatihan', array("id"=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}
}

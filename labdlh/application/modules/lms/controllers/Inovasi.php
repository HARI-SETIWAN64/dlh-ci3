<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Inovasi extends CI_Controller
{
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('lms/inovasi_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'language', 'file'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'konten/admin'));
		} elseif (!$this->ion_auth->in_group(array('admin', 'members', 'analis', 'manager_teknis', 'ka_lab', 'admin_pelayanan'))) {
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}
	}

	public function index()
	{

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Inovasi';
		$data['menu'] = 'inovasi';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('inovasi/v_index', isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function data_list()
	{
		$pagenya = '1';
		$where = array();
		$offset = '0';
		$limit = $this->limit;
		$like = array();

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('nomor_dokumen' => $this->input->post('nama'), 'nama_dokumen' => $this->input->post('nama'));
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya - 1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->inovasi_model->get_list($where, $limit, $offset, $like)->result();
		$tot = $this->inovasi_model->get_list_total($where, $like)->row();
		$data['total_items'] = $tot->count;
		$data['page'] = $pagenya;
		$this->load->view('inovasi/v_list', $data);
	}

	public function tambah() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'lms/inovasi'));
		}

		$this->form_validation->set_rules('nomor_dokumen','Nomor Dokumen', 'required|is_unique[lms_ril.nomor_dokumen]|xss_clean',
								array(
									'required'      => '%s Harus Diisi.',
									'is_unique'     => '%s Tidak Boleh Sama.'
									));
		$this->form_validation->set_rules('nama_dokumen','Nama Dokumen', 'required|xss_clean',
		array(
			'required'      => '%s Harus Diisi.'
		));
		$this->form_validation->set_rules('kategori','Kategori', 'required|xss_clean',
		array(
			'required'      => '%s Harus Diisi.'
		));

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Inovasi';
			$data['menu'] = 'inovasi';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('inovasi/v_tambah', $data);
			$this->template->publish();
		}else{
			if ($_FILES["file"]["name"] <> "") {
				$upload_path = FCPATH . 'file/lms_ril/';
				$config['allowed_types'] = 'jpeg|png|pdf|docx|pptx|mp4';
				$config['upload_path'] = $upload_path;
				$config['file_name'] = date("Ymdhis") . "-" . rand(1, 100);
				$config['encrypt_name'] = false;
				$config['remove_spaces'] = true;
				$config['create_thumb'] = true;
				$config['max_size'] = '8000';
				$config['overwrite'] = true;


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

			$kirim = array
			(
				'nomor_dokumen' => $this->input->post('nomor_dokumen'),
				'jenis_dokumen' => $this->input->post('jenis_dokumen'),
				'nama_dokumen' => $this->input->post('nama_dokumen'),
				'kategori' => $this->input->post('kategori'),
				'file' => $nama_file,
				'create_by' => $this->session->userdata('user_id'),
				'date_create' => date('Y-m-d H:i:s', strtotime('NOW')),
			);
			$this->db->insert('lms_ril', $kirim);

			redirect('lms/inovasi','refresh');
		}
    }

	// public function ubah($id = true) {
	// 	if (!$this->ion_auth->logged_in())
	// 	{
	// 		redirect('auth/login?continue='.urlencode(base_url().'lms/inovasi'));
	// 	}

	// 	$this->form_validation->set_rules('nomor_dokumen','Nomor Dokumen', 'required|xss_clean',
	// 							array(
	// 								'required'      => '%s Harus Diisi.'
	// 								));
	// 	$this->form_validation->set_rules('nama_dokumen','Nama Dokumen', 'required|xss_clean',
	// 	array(
	// 		'required'      => '%s Harus Diisi.'
	// 	));
	// 	$this->form_validation->set_rules('kategori','Kategori', 'required|xss_clean',
	// 	array(
	// 		'required'      => '%s Harus Diisi.'
	// 	));

	// 	$userid = $this->session->userdata('user_id');
	// 	$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 		$data['item'] = $this->db->query('select * from lms_ril where id = "' . $id . '"')->row();
	// 		$data['csrf'] = $this->_get_csrf_nonce();
	// 		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

	// 		$this->template->title = 'Form Inovasi';
	// 		$data['menu'] = 'inovasi';
	// 		$this->template->description = '';
	// 		$this->template->meta->add('keyword', '');
	// 		$this->template->content->view('inovasi/v_form', $data);
	// 		$this->template->publish();
	// 	}else{
	// 		$file = $this->db->query('select * from lms_ril where id = "' . $id . '"')->row("file");
	// 		if ($_FILES["file"]["name"] <> "") {
	// 			if ($file <> "" or $file <> null) {
	// 				unlink(FCPATH . 'file/lms_ril/' . $file);
	// 			}

	// 			$upload_path = FCPATH . 'file/lms_ril/';
	// 			$config['allowed_types'] = 'jpeg|png|pdf|docx|pptx|mp4';
	// 			$config['upload_path'] = $upload_path;
	// 			$config['file_name'] = date("Ymdhis") . "-" . rand(1, 100);
	// 			$config['encrypt_name'] = false;
	// 			$config['remove_spaces'] = true;
	// 			$config['create_thumb'] = true;
	// 			$config['max_size'] = '8000';
	// 			$config['overwrite'] = true;

	// 			// print_r($upload_path);die();

	// 			$this->load->library('upload', $config);

	// 			if (!$this->upload->do_upload('file')) {
	// 				$error = array('error' => $this->upload->display_errors());
	// 				$this->form_validation->set_message(__FUNCTION__, $this->upload->display_errors('', ''));
	// 			} else {
	// 				$file = $this->upload->data();
	// 				$_POST['upload_file'] = $this->input->post('file_lama');
	// 			}
	// 			$nama_file = $this->upload->data("file_name");
	// 		} else {
	// 			$nama_file = $file;
	// 		}

	// 		$kirim = array
	// 		(
	// 			'nomor_dokumen' => $this->input->post('nomor_dokumen'),
	// 			'jenis_dokumen' => $this->input->post('jenis_dokumen'),
	// 			'nama_dokumen' => $this->input->post('nama_dokumen'),
	// 			'kategori' => $this->input->post('kategori'),
	// 			'file' => $nama_file,
	// 			'update_by' => $this->session->userdata('user_id'),
	// 			'date_update' => date('Y-m-d H:i:s', strtotime('NOW')),
	// 		);
	// 		$this->db->update('lms_ril', $kirim, array('id' => $id));

	// 		redirect('lms/inovasi','refresh');
	// 	}
    // }

	public function form($id = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'lms/inovasi'));
		}

		$userid = $this->session->userdata('user_id');

		$data['item'] = $this->db->query('select * from lms_ril where id = "' . $id . '"')->row();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'Form Hasil Inovasi';
		$data['menu'] = 'inovasi';
		$data['id'] = $id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('inovasi/v_form', $data);
		$this->template->publish();
	}

	public function simpan_form($id = false)
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'data/peserta'));
		}
		if ($id) {
			$file = $this->db->query('select * from lms_ril where id = "' . $id . '"')->row("file");
			if ($_FILES["file"]["name"] <> "") {
				if ($file <> "" or $file <> null) {
					unlink(FCPATH . 'file/lms_ril/' . $file);
				}

				$upload_path = FCPATH . 'file/lms_ril/';
				$config['allowed_types'] = 'jpeg|png|pdf|docx|pptx|mp4';
				$config['upload_path'] = $upload_path;
				$config['file_name'] = date("Ymdhis") . "-" . rand(1, 100);
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
			} else {
				$nama_file = $file;
			}

			$kirim = array
			(
				'nomor_dokumen' => $this->input->post('nomor_dokumen'),
				'jenis_dokumen' => $this->input->post('jenis_dokumen'),
				'nama_dokumen' => $this->input->post('nama_dokumen'),
				'kategori' => $this->input->post('kategori'),
				'file' => $nama_file,
				'update_by' => $this->session->userdata('user_id'),
				'date_update' => date('Y-m-d H:i:s', strtotime('NOW')),
			);
			$this->db->update('lms_ril', $kirim, array('id' => $id));
		} else {
			if ($_FILES["file"]["name"] <> "") {
				$upload_path = FCPATH . 'file/lms_ril/';
				$config['allowed_types'] = 'jpeg|png|pdf|docx|pptx|mp4';
				$config['upload_path'] = $upload_path;
				$config['file_name'] = date("Ymdhis") . "-" . rand(1, 100);
				$config['encrypt_name'] = false;
				$config['remove_spaces'] = true;
				$config['create_thumb'] = true;
				$config['max_size'] = '8000';
				$config['overwrite'] = true;


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

			$kirim = array
			(
				'nomor_dokumen' => $this->input->post('nomor_dokumen'),
				'jenis_dokumen' => $this->input->post('jenis_dokumen'),
				'nama_dokumen' => $this->input->post('nama_dokumen'),
				'kategori' => $this->input->post('kategori'),
				'file' => $nama_file,
				'create_by' => $this->session->userdata('user_id'),
				'date_create' => date('Y-m-d H:i:s', strtotime('NOW')),
			);
			$this->db->insert('lms_ril', $kirim);
		}

		redirect('lms/inovasi', 'refresh');
	}

	public function hapus($id)
	{
		$this->db->delete('lms_ril', array("id" => $id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	public function status($id, $status)
	{
		$datapost['status'] = $status;
		$datapost['update_by'] = $this->session->userdata('user_id');
		$datapost['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$this->db->update('lms_ril', $datapost, array('id' => $id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);
		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if (
			$this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')
		) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
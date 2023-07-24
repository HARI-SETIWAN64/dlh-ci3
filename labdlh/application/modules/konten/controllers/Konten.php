<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Konten extends CI_Controller
{
	private $limit = 45;
	function __construct()
	{
		parent::__construct();
		$this->data = null;
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model(array('konten_model', 'pengaduan_model'));
		$this->load->library(array('form_validation', 'pagination'));
		//$this->load->model('home/home_model');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');
	}


	public function get_data()
	{
		$keyword = $this->uri->segment(3);
		$data = $this->db->from('konten')->like('title', $keyword)->limit('10')->get();

		foreach ($data->result() as $row) {
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value' => $row->title
			);
		}
		echo json_encode($arr);
	}

	public function indexx()
	{
		$search = '';
		if ($this->input->post('key')) {
			$search = $this->input->post('key', TRUE);
			//$this->session->set_userdata('search', $search);
		} else {
			//$search = $this->session->userdata('search');
		}
		if (isset($_POST['reset'])) {
			//$search='';
		}


		$uri_segment = '3';
		$key_search = 'title';
		$offset = $this->uri->segment($uri_segment);


		//$this->konten_model->total_konten($search,$key_search);

		$this->data['konten'] = $this->konten_model->get_konten_list($this->limit, $offset, $search, $key_search)->result();
		//echo $this->db->last_query();

		$this->load->library('pagination');
		$config['base_url'] = base_url('konten/index/');
		$config['total_rows'] = $this->konten_model->total_konten($search, $key_search);
		$config['per_page'] = 20;

		$this->data['search'] = '';

		$this->pagination->initialize($config);

		$this->data['pagination'] = $this->pagination->create_links();
		//echo $this->konten_model->total_konten($search,$key_search);
		$this->template->title = 'konten';
		$this->data['menu'] = 'konten';
		$this->template->description = '';
		$this->template->meta->add('keyword', 'banyuwangi, gandrung, banyuwangi festival');
		$this->template->content->view('v_index', $this->data);


		$this->template->publish();
	}

	public function search($kode = FALSE)
	{
		// '1'=>'Berita','2'=>'Artikel','3'=>'Info','4'=>'Profil'
		$search = '';
		$where = array();

		if ($this->input->get('search')) {
			$search = $this->input->get('search', TRUE);
		} else {
		}

		if ($kode == 'berita') {
			$where = array('catid' => "1");
			$key_search = 'catid';
			$search = $where;
		} else if ($kode == 'artikel') {
			$where = array('catid' => "2");
			$key_search = 'catid';
			$search = $where;
		} else if ($kode == 'info') {
			$where = array('catid' => "3");
			$key_search = 'catid';
			$search = $where;
		} else {
			echo "else";
			$where = "catid!=4";
		}

		//konfigurasi pagination
		$this->db->where($where);
		$this->db->from("konten");

		$config['base_url'] = site_url('konten/search/'); //site url
		$config['total_rows'] = $this->db->count_all_results(); //total row
		$config['per_page'] = 5; //show record per halaman
		$config["uri_segment"] = 3; // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$this->data['data'] = $this->konten_model->get_page($where, $config["per_page"], $this->data['page'])->result();

		// print_r($this->db->last_query());die();     

		$this->data['pagination'] = $this->pagination->create_links();

		//load view mahasiswa view
		$this->template->title = 'Konten';
		$this->data['menu'] = 'Konten';
		$this->template->description = '';
		$this->data['last_konten'] = $this->konten_model->last_konten()->result();
		$this->data['dbslider'] = $this->konten_model->slider()->result();
		$this->template->meta->add('keyword', 'banyuwangi, gandrung, lingkungan hidup');
		$this->template->content->view('v_index', $this->data);
		$this->template->publish();
		//////////////////////////
	}


	public function konten_detail($title = FALSE)
	{
		if ($title) {
			$this->load->helper('text');
			$where = array('alias' => $title);
			$q = $this->konten_model->get_konten($where);
			$this->data['news'] = $q;
			$this->data['last_konten'] = $this->konten_model->last_konten()->result();
			$this->template->title = $this->data['news']->title;
			$this->data['menu'] = 'home';
			$this->template->description = $this->data['news']->metakey;
			$this->template->meta->add('keyword', $this->data['news']->metakey);
			$desc = ascii_to_entities(word_limiter($this->data['news']->introtext, 20));
			$this->template->content->view('konten_detail', $this->data);
			$this->template->publish();
		}
	}



	//start search_lms konten detail lms
	public function search_lms($kode = FALSE)
	{
		// '1'=>'Berita','2'=>'Artikel','3'=>'Info','4'=>'Profil'
		$search_lms = '';
		$where = array();

		if ($this->input->get('search_lms')) {
			$search_lms = $this->input->get('search_lms', TRUE);
		} else {
		}

		if ($kode == 'lms') {
			$where = array('catid' => "5");
			$key_search = 'catid';
			$search_lms = $where;
		} else {
			echo "else";
			$where = "catid!=1";
		}

		//konfigurasi pagination
		$this->db->where($where);
		$this->db->from("konten");

		$config['base_url'] = site_url('konten/search_lms/'); //site url
		$config['total_rows'] = $this->db->count_all_results(); //total row
		$config['per_page'] = 5; //show record per halaman
		$config["uri_segment"] = 3; // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$this->data['data'] = $this->konten_model->get_page($where, $config["per_page"], $this->data['page'])->result();

		// print_r($this->db->last_query());die();     

		$this->data['pagination'] = $this->pagination->create_links();

		//load view mahasiswa view
		$this->template->title = 'Konten';
		$this->data['menu'] = 'Konten';
		$this->template->description = '';
		$this->data['lms_konten'] = $this->konten_model->lms_konten()->result();
		$this->data['dbslider'] = $this->konten_model->slider()->result();
		$this->template->meta->add('keyword', 'banyuwangi, gandrung, lingkungan hidup');
		$this->template->content->view('v_lms', $this->data);
		$this->template->publish();
		//////////////////////////
	}

	public function konten_detail_lms($title = FALSE)
	{
		if ($title) {
			$this->load->helper('text');
			$where = array('alias' => $title);
			$q = $this->konten_model->get_konten($where);
			$this->data['news'] = $q;
			$this->data['lms_konten'] = $this->konten_model->lms_konten()->result();
			$this->template->title = $this->data['news']->title;
			$this->data['menu'] = 'home';
			$this->template->description = $this->data['news']->metakey;
			$this->template->meta->add('keyword', $this->data['news']->metakey);
			$desc = ascii_to_entities(word_limiter($this->data['news']->introtext, 20));
			$this->template->content->view('konten_detail_lms', $this->data);
			$this->template->publish();
		}
	}

	//end search_lms konten detail lms



	public function pengaduan()
	{
		$search = '';
		$where = array("validasi" => "1");
		$this->data['csrf'] = $this->_get_csrf_nonce();

		$config['base_url'] = site_url('konten/pengaduan/'); //site url
		$config['total_rows'] = $this->db->count_all_results(); //total row
		$config['per_page'] = 5; //show record per halaman
		$config["uri_segment"] = 3; // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$this->data['data'] = $this->pengaduan_model->get_page($where, $config["per_page"], $this->data['page'])->result();

		// print_r($this->db->last_query());die();     

		$this->data['pagination'] = $this->pagination->create_links();

		//load view mahasiswa view
		$this->template->title = 'Pengaduan';
		$this->data['menu'] = 'Pengaduan';
		$this->template->description = '';
		$this->data['last_konten'] = $this->konten_model->last_konten()->result();
		$this->template->meta->add('keyword', 'banyuwangi, gandrung, lingkungan hidup');
		$this->template->content->view('v_pengaduan', $this->data);
		$this->template->publish();
		//////////////////////////
	}


	public function pengaduan_simpan()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'master/pengaduan'));
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|xss_clean');
		$this->form_validation->set_rules('telp', 'Telp', 'required|xss_clean');
		$this->form_validation->set_rules('isi', 'Isi', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		// print_r($_POST);
		if ($this->form_validation->run() == FALSE) {
			// echo "gagal";
			// die();
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			redirect('konten/pengaduan', 'refresh');
		} else {
			// echo "masuk";
			// die();
			$kirim['nama'] = $this->input->post('nama');
			$kirim['telp'] = $this->input->post('telp');
			$kirim['email'] = $this->input->post('email');
			$kirim['isi'] = $this->input->post('isi');

			$kirim['tgl_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$this->db->insert('pengaduan', $kirim);

			redirect('konten/pengaduan', 'refresh');
		}
	}



	public function penilaian()
	{
		$search = '';
		$where = array("validasi" => "1");
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//load view mahasiswa view
		$this->template->title = 'Penilaian';
		$this->template->description = '';
		$this->data['menu'] = 'penilaian';
		$this->data['last_konten'] = $this->konten_model->last_konten()->result();
		$this->template->meta->add('keyword', 'banyuwangi, gandrung, lingkungan hidup');
		$this->template->content->view('v_penilaian', $this->data);
		$this->template->publish();
		//////////////////////////
	}


	public function penilaian_simpan()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'master/pengaduan'));
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|xss_clean');
		$this->form_validation->set_rules('telp', 'Telp', 'required|xss_clean');
		$this->form_validation->set_rules('isi', 'Isi', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		// print_r($_POST);
		if ($this->form_validation->run() == FALSE) {
			// echo "gagal";
			// die();
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			redirect('konten/pengaduan', 'refresh');
		} else {
			// echo "masuk";
			// die();
			$kirim['nama'] = $this->input->post('nama');
			$kirim['telp'] = $this->input->post('telp');
			$kirim['email'] = $this->input->post('email');
			$kirim['isi'] = $this->input->post('isi');

			$kirim['tgl_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$this->db->insert('pengaduan', $kirim);

			redirect('konten/pengaduan', 'refresh');
		}
	}




	// public function galery() {
	// 	$data = $this->db->query("select * from galery order by date_create desc")->result();
	// 	$this->load->helper('text');
	// 	$this->template->content->view('konten_galery', $this->data);
	// 	$this->template->publish();
	//    }

	public function galery($title = FALSE)
	{
		$this->load->helper('text');
		$data = $this->db->query("select * from galery order by date_create desc")->result();
		$this->data['datas'] = $data;
		$this->data['last_konten'] = $this->konten_model->last_konten()->result();
		$this->template->title = "Galery";
		$this->data['menu'] = 'home';
		$this->template->description = "Galery";
		$this->template->meta->add('keyword', "Galery");
		$desc = ascii_to_entities(word_limiter("Galery", 20));
		$this->template->content->view('konten_galery', $this->data);
		$this->template->publish();

	}

	// public function lms($title = FALSE)
	// {
	// 		$this->load->helper('text');
	// 		$data = $this->db->query("select * from konten order by date_create desc")->result();
	// 		$this->data['datas'] = $data;
	// 		$this->data['lms_konten'] = $this->konten_model->lms_konten()->result();
	// 		$this->template->title = "Lms";
	// 		$this->data['menu'] = 'home';
	// 		$this->template->description = "Lms";
	// 		$this->template->meta->add('keyword', "Lms");
	// 		$desc = ascii_to_entities(word_limiter("Lms", 20));
	// 		$this->template->content->view('konten_lms', $this->data);
	// 		$this->template->publish();

	// }

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
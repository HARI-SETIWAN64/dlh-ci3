<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct()
    {
        parent::__construct();
		$this->data = null;
        $this->load->library('pagination');
		$this->load->model(array('home/home_model','konten/konten_model'));
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');
	}

	private $limit = 5;

    public function index(){

		$this->template->title = 'Home';
		$this->data['menu'] = 'Home';
		$this->template->description = '';
		$this->template->meta->add('keyword', 'banyuwangi, lingkungan hidup');
		$this->template->slider->view('template/front/mosh/slider');
		// $this->template->content->view('v_index');
		$this->template->publish();
    }
    public function index2()
	{	
		// '1'=>'Berita','2'=>'Artikel','3'=>'Info','4'=>'Profil'
		///////////////////////////////////////////////////////////////////////////////
		//konfigurasi pagination
		$this->db->where('catid!=','4');
		$this->db->from("konten");

		$config['base_url'] = site_url('home/index/'); //site url
        $config['total_rows'] = $this->db->count_all_results(); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $this->data['data'] = $this->home_model->get_page($config["per_page"], $this->data['page'])->result();           
 
        $this->data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
		$this->template->title = 'Home';
		$this->data['menu'] = 'Home';
		$this->template->description = '';
		$this->data['last_konten'] = $this->konten_model->last_konten()->result();
		$this->data['dbslider'] = $this->konten_model->slider()->result();
		$this->template->meta->add('keyword', 'banyuwangi, gandrung, lingkungan hidup');
		$this->template->slider->view('template/front/mosh/slider');
		$this->template->content->view('v_index', $this->data);
		$this->template->publish();
		//////////////////////////////////////////////////////////////////////

		// $search='';
		// $key_search= 'title';

		// $uri_segment = '3';
		// $offset = $this->uri->segment($uri_segment);

		// $this->data['konten'] = $this->konten_model->get_konten_list($this->limit,$offset,$search,$key_search)->result();

		// $this->load->library('pagination');
		// $config['base_url'] =  base_url('konten/index/');
		// $config['total_rows'] = $this->konten_model->total_konten($search,$key_search);
		// $config['per_page'] = 20;

		// $this->data['search']='';
		// $this->pagination->initialize($config);

		// $this->data['pagination'] = $this->pagination->create_links();
		// $this->template->title = 'Home';
		// $this->data['menu'] = 'Home';
		// $this->template->description = '';
		// $this->data['last_konten'] = $this->konten_model->last_konten()->result();
		// $this->data['dbslider'] = $this->konten_model->slider()->result();
		// $this->template->meta->add('keyword', 'banyuwangi, gandrung, lingkungan hidup');
		// $this->template->slider->view('template/front/mosh/slider');
		// $this->template->content->view('v_index', $this->data);
		// $this->template->publish();
		//////////////////////////
    }
}

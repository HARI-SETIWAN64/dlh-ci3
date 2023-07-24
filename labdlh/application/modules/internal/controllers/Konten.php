<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Konten extends CI_Controller
{
	private $limit = 45;
    function __construct()
    {
		parent::__construct();
		$this->data = null;
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('konten_model');
		//$this->load->model('home/home_model');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');
	}


	public function get_data() {
        $keyword = $this->uri->segment(3);
        $data = $this->db->from('konten')->like('title',$keyword)->limit('10')->get();

        foreach($data->result() as $row)
        {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value'    =>$row->title
            );
        }
        echo json_encode($arr);
    }

    public function indexx()
	{
		$search='';
		if($this->input->post('key'))
		{
			$search=$this->input->post('key',TRUE);
			//$this->session->set_userdata('search', $search);
		} else {
			//$search = $this->session->userdata('search');
		}
		if(isset($_POST['reset']))
		{
			//$search='';
		}


		$uri_segment = '3';
		$key_search= 'title';
		$offset = $this->uri->segment($uri_segment);


		//$this->konten_model->total_konten($search,$key_search);

		$this->data['konten'] = $this->konten_model->get_konten_list($this->limit,$offset,$search,$key_search)->result();
		//echo $this->db->last_query();

		$this->load->library('pagination');
		$config['base_url'] =  base_url('konten/index/');
		$config['total_rows'] = $this->konten_model->total_konten($search,$key_search);
		$config['per_page'] = 20;

		$this->data['search']='';

		$this->pagination->initialize($config);

		$this->data['pagination'] = $this->pagination->create_links();
//echo $this->konten_model->total_konten($search,$key_search);
		$this->template->title = 'konten';
		$this->data['menu'] = 'konten';
		$this->template->description = '';
		$this->template->meta->add('keyword', 'banyuwangi, gandrung, banyuwangi festival');
		$this->template->content->view('v_index',$this->data);


		$this->template->publish();
	}

	public function search($kode=FALSE){
		// '1'=>'Berita','2'=>'Artikel','3'=>'Info','4'=>'Profil'
		$search='';
		$key_search= 'title';
		if(isset($kode)){
			if($this->input->get('search'))
			{
				$search=$this->input->get('search',TRUE);
			} else {}

			if($kode=='berita'){
				$where = "1";
				$key_search= 'catid';
				$search=$where;
			}else if($kode=='artikel'){
				$where = "2";
				$key_search= 'catid';
				$search=$where;
			}else if($kode=='info'){
				$where = "3";
				$key_search= 'catid';
				$search=$where;
			}else{
				$where = $kode;
			}
		}
		
		if(isset($_POST['reset']))
		{
			//$search='';
		}


		$uri_segment = '3';
		$offset = $this->uri->segment($uri_segment);


		//$this->konten_model->total_konten($search,$key_search);

		$this->data['konten'] = $this->konten_model->get_konten_list($this->limit,$offset,$search,$key_search)->result();
		// echo $this->db->last_query();
		// die();

		$this->load->library('pagination');
		$config['base_url'] =  base_url('konten/index/');
		$config['total_rows'] = $this->konten_model->total_konten($search,$key_search);
		$config['per_page'] = 20;

		$this->data['search']='';

		$this->pagination->initialize($config);

		$this->data['pagination'] = $this->pagination->create_links();
//echo $this->konten_model->total_konten($search,$key_search);
		$this->template->title = 'konten';
		$this->data['menu'] = 'konten';
		$this->data['last_konten'] = $this->konten_model->last_konten()->result();
		$this->template->description = '';
		$this->template->meta->add('keyword', 'banyuwangi, gandrung, lingkungan hidup');
		$this->template->slider->view('template/front/mosh/slider');
		$this->template->content->view('v_index', $this->data);


		$this->template->publish();
		//////////////////////////
	}


    public function konten_detail($title = FALSE)
	{
		if($title){
			$this->load->helper('text');
			$where = array('alias'=>$title);
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
}

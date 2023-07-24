<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct()
    {
        parent::__construct();
		$this->data = null;
		$this->load->model(array('home/home_model','admin/sikd_model_2018','admin/sikd_model_2017'));
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');
	}


    public function index()
	{
		$this->data['skpd'] = $this->home_model->get_active_opd();
		$this->template->title = 'Home';
		$this->data['menu'] = 'home';
		$this->data['top'] = 'template/front/green_part/menu_top';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->header_top->view('template/front/green_part/header_menu');
		$this->template->content->view('v_index', $this->data);
		$this->template->publish();
    }
	function kgtn_skpd()
	{
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['skpd'] = $this->home_model->get_active_opd();
		$this->template->title = 'Home';
		$this->data['menu'] = 'kgtnskpd';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->header_top->view('template/front/green_part/header_menu');
		$this->template->content->view('home/v_kgtn_skpd', $this->data);
		$this->template->publish();
	}
	public function kgtn_list($tahun = false,$skpd = false)
	{
		$like = array();
		$where = array();
		$offset = '0';
		$limit = 200;
		$page = '1';


			if (isset($_POST['id_skdp']) && $_POST['id_skdp'] != NULL) {
				$where = array('dpa_skpd.sikd_skpd_id'=>$_POST['id_skdp']);
			}




			if (isset($_POST['page']) && $_POST['page'] != NULL) {
				$page = $_POST['page'];
				$pageof = $_POST['page']-1;
				$offset = $pageof * $limit;
			}

			if (isset($_POST['limit']) && $_POST['limit'] != NULL) {
				$limit = $_POST['limit'];
			}


			$data['page'] = $page;
			$data['limit'] = $limit;
			if($tahun == '2017')
			{

				$data['item'] = $this->sikd_model_2017->kgtn_dpa_2017($skpd,$limit,$offset)->result();
				$data['total_items'] = $this->sikd_model_2017->kgtn_dpa_2017($skpd,$limit,$offset)->num_rows();
			}
			else if($tahun == '2018')
			{
				$data['item'] = $this->sikd_model_2018->kgtn_dpa_2018($skpd,$limit,$offset)->result();
				$data['total_items'] = $this->sikd_model_2018->kgtn_dpa_2018($skpd,$limit,$offset)->num_rows();
			}
			else
			{
				$data['item'] = $this->sikd_model_2018->kgtn_dpa_2018($skpd,$limit,$offset)->result();
				$data['total_items'] = $this->sikd_model_2018->kgtn_dpa_2018($skpd,$limit,$offset)->num_rows();
			}

			$this->load->view('home/v_kgtn_skpd_list',$data);
	}






}

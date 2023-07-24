<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kalender_alat extends CI_Controller {

    private $limit = 10;

    function __construct() {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('cmdo/detail_alat_model'));
		$this->load->library(array('form_validation','pdf'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');

		}else if(!$this->ion_auth->in_group(array('admin','members','analis','manager_teknis','ka_lab','admin_pelayanan'))){
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}

    }

    public function index() {
		$this->template->title = 'Kalender';
		$data['menu'] = 'kalender_alat';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('kalender_alat/v_index',  isset($data) ? $data : NULL);
		$this->template->publish();
    }

    public function data_calender() {
        if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
            $like = array('nama' => $this->input->post('cari'));
        }
        
        if (isset($_POST['limit']) && $_POST['limit'] != NULL) {
                $limit = $_POST['limit'];
        }

        // $data['items'] = $this->tugas_model->get_list($where, $limit, $offset, $like)->result();
        // $tot = $this->tugas_model->get_list_total($where, $like)->row();
        $data=array();
        $this->load->view('cmdo/kalender_alat/v_kalender', $data);
    }


	Public function getAlat()
	{
        $json = array();
        $data = $this->detail_alat_model->get_objects_calender();

		echo json_encode($data);
	}

}

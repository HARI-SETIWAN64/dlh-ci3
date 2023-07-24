<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Backend extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->template->set_template('template/admin');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
	}
	
	function index()
	{		
		//fardu
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'backend'));
															   
		}elseif (!$this->ion_auth->in_group(array('admin','admin_emskab')))
		{
				$this->session->set_flashdata('message', 'anda tidak berhak..');
				redirect('/', 'refresh');
		}else
		{			
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');		
			$this->template->title = 'Dashboard';
			$data['menu'] = 'backend';
			$this->template->description = '';		
			$this->template->meta->add('keyword', '');
			$this->template->content->view('backend',  isset($data) ? $data : NULL);
			$this->template->publish();	
		}
	}
}
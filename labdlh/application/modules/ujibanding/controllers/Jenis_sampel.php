<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_sampel extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('ujibanding/jenis_sampel_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_pelayanan')))
		{
				$this->session->set_flashdata('message', 'anda tidak berhak..');
				redirect('/', 'refresh');
		}
	}

    public function index() {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Jenis Sampel';
		$data['menu'] = 'ub_jenis_sampel';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('jenis_sampel/v_jenis_sampel',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function jenis_sampel_list() {
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

		$data['items'] = $this->jenis_sampel_model->get_jenis_sampel_list($where,$limit,$offset,$like)->result();
		$tot = $this->jenis_sampel_model->get_jenis_sampel_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('jenis_sampel/v_jenis_sampel_list', $data);
	}

	public function tampil($id,$tampil)
	{
		$kirim['tampil_uji_banding'] = $tampil;
		$this->db->update('master_jenis_sampel',$kirim,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	//parameter
	public function parameter($id) {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
    	$jenis_sampel = $this->db->query("select * from jenis_sampel where id='".$id."'");
		$this->template->title = 'Jenis Sampel';
		$data['menu'] = 'ub_jenis_sampel';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('jenis_sampel/v_jenis_sampel',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function jenis_sampel_list() {
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

		$data['items'] = $this->jenis_sampel_model->get_jenis_sampel_list($where,$limit,$offset,$like)->result();
		$tot = $this->jenis_sampel_model->get_jenis_sampel_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('jenis_sampel/v_jenis_sampel_list', $data);
	}
	//


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

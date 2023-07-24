<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ujibanding extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('ujibanding/ujibanding_model', 'ujibanding/ujibanding_detail_model'));
		$this->load->library(array('form_validation','pdf'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');

		}
		// else if(!$this->ion_auth->in_group(array('admin','members','manager'))){
		// 	$this->session->set_flashdata('message', 'anda tidak berhak..');
		// 	redirect('/', 'refresh');
		// }
	}

    public function index() {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Uji Banding';
		$data['menu'] = 'ub_ujibanding';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('ujibanding/ujibanding/v_index',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function data_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['a'] = $this->ujibanding_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->ujibanding_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('ujibanding/ujibanding/v_list', $data);
	}

	public function validsi_0($id=false) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}

		$this->form_validation->set_rules('status','Metode', 'required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			if($id){
				$this->template->title = 'Uji Banding';
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
				$data['menu'] = 'ub_ujibanding';
				$data['item_detail'] = $this->db->query("select b.*, c.parameter from ujibanding as a inner join ujibanding_detail as b on a.id=b.ujibanding_id inner join master_parameter as c on b.parameter_id = c.id where a.id='".$id."'")->result();
				// print_r($this->db->last_query()); die();
				$data['item'] = $this->db->query("select b.*, c.nama as jenis_sampel, a.id as id_ujibanding from ujibanding as a inner join users as b on a.user_id=b.id inner join master_jenis_sampel as c on a.sampel_id = c.id where a.id='".$id."'")->row();
				$data['status'] = array("1" => "Stujui", "2" => "Revisi");
				$this->template->description = '';
				$this->template->meta->add('keyword', '');
				$this->template->content->view('ujibanding/ujibanding/v_form_validasi_0', $data);
				$this->template->publish();
			} else {
				redirect('ujibanding','refresh');
			}
		} else {
			if($id){
				$kirim['status'] = $this->input->post('status');
				$kirim['keterangan_status'] = $this->input->post('keterangan_status');;
				$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['update_by'] = $this->session->userdata('user_id');
				$this->db->update('ujibanding',$kirim,array('id'=>$id));
				// print_r($this->db->last_query()); die();
			}
			redirect('ujibanding','refresh');
		}
    }

	public function validsi_0_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=1000;
		$like = array();

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$where = array('ujibanding_id'=>$this->input->post('ujibanding_id'));

		$data['a'] = $this->ujibanding_detail_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->ujibanding_detail_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('ujibanding/ujibanding/v_validsi_0_list', $data);
	}

	public function detail($id=false) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}

		$this->form_validation->set_rules('status','Metode', 'required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			if($id){
				$this->template->title = 'Uji Banding';
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
				$data['menu'] = 'ub_ujibanding';
				$data['item_detail'] = $this->db->query("select b.*, c.parameter from ujibanding as a inner join ujibanding_detail as b on a.id=b.ujibanding_id inner join master_parameter as c on b.parameter_id = c.id where a.id='".$id."'")->result();
				// print_r($this->db->last_query()); die();
				$data['item'] = $this->db->query("select b.*, c.nama as jenis_sampel, a.id as id_ujibanding from ujibanding as a inner join users as b on a.user_id=b.id inner join master_jenis_sampel as c on a.sampel_id = c.id where a.id='".$id."'")->row();
				$data['status'] = array("1" => "Stujui", "2" => "Revisi");
				$this->template->description = '';
				$this->template->meta->add('keyword', '');
				$this->template->content->view('ujibanding/ujibanding/v_detail', $data);
				$this->template->publish();
			} else {
				redirect('ujibanding','refresh');
			}
		} else {
			if($id){
				$kirim['status'] = $this->input->post('status');
				$kirim['keterangan_status'] = $this->input->post('keterangan_status');;
				$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['update_by'] = $this->session->userdata('user_id');
				$this->db->update('ujibanding',$kirim,array('id'=>$id));
				// print_r($this->db->last_query()); die();
			}
			redirect('ujibanding','refresh');
		}
    }

	public function detail_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=1000;
		$like = array();

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$where = array('ujibanding_id'=>$this->input->post('ujibanding_id'));

		$data['a'] = $this->ujibanding_detail_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->ujibanding_detail_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('ujibanding/ujibanding/v_detail_list', $data);
	}

	public function stujui($id,$stujui)
	{
		$kirim['stujui'] = $stujui;
		$this->db->update('ujibanding_detail',$kirim,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	public function status($id,$status)
	{
		$kirim['status'] = $status;
		$this->db->update('ujibanding',$kirim,array('id'=>$id));
		// print_r($this->db->last_query()); die();
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



	public function fpps_pdf($nomor=null) {
		if (!$this->ion_auth->logged_in())
		{	$this->session->set_flashdata('message', 'Maaf anda tidak berhak');
			redirect('fpps/fpps_paket_pelanggan');
		}
		$nomor = str_replace("_","/",$nomor);
		$data['fpps'] = $this->db->query("select a.*, b.nama as nama_kode_sampel from fpps as a inner join master_jenis_sampel as b on a.jenis_sampel=b.kode where a.nomor = '".$nomor."'")->row();
		// echo $this->db->last_query();
		// die();
		$data['items'] = $this->fpps_model->data_parameter($nomor);
		$this->load->view('fpps_paket_pelanggan/v_cetak_fpps_pelanggan_pdf', $data);
	}
}

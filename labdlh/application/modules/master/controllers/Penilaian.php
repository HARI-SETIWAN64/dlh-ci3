<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('master/penilaian_model', 'master/penilaian_detail_model'));
		$this->load->library(array('form_validation','pdf'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');

		}
	}

    public function index() {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Penilaian';
		$data['menu'] = 'master_penilaian';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('master/penilaian/v_index',  isset($data) ? $data : NULL);
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

		$data['a'] = $this->penilaian_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->penilaian_model->get_list_total($where,$like)->row();
		$data['total_items'] = $tot->count;
		$data['page'] = $pagenya;
		$this->load->view('master/penilaian/v_list', $data);
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
				$data['menu'] = 'master_penilaian';
				$data['id'] = $id;
				$data['item'] = $this->db->query("select * from master_penilaian where id = '".$id."'")->row();
				$data['status'] = array("1" => "aktif", "0" => "non aktif");
				$this->template->description = '';
				$this->template->meta->add('keyword', '');
				$this->template->content->view('master/penilaian/v_detail', $data);
				$this->template->publish();
			} else {
				redirect('master/penilaian','refresh');
			}
		} else {
			redirect('master/penilaian/detail/'.$id,'refresh');
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
		$where = array('master_penilaian_id'=>$this->input->post('id'));
		$data['items'] = $this->penilaian_detail_model->get_list($where,$limit,$offset,$like)->result();
		$tot = $this->penilaian_detail_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['id'] = $this->input->post('id');
		$data['page'] = $pagenya;
		$this->load->view('master/penilaian/v_detail_list', $data);
	}

	public function form($id) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jabatan/form'));
		}

		$this->form_validation->set_rules('keterangan','Keterangan', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['id'] = $id;
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['item']=$this->db->query('select * from master_penilaian where id = "'.$id.'"')->row();
			$this->load->view('master/penilaian/v_form_penilaian',  isset($data) ? $data : NULL);
		}else{
			$kirim['keterangan'] = $this->input->post('keterangan');
			if($id == 0){
				$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['create_by'] = $this->session->userdata('user_id');
				$this->db->insert('master_penilaian',$kirim);
			}else{
				$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['update_by'] = $this->session->userdata('user_id');
				$this->db->update('master_penilaian',$kirim,array('id'=>$id));
			}
			$this->data['status'] = 'success';
			echo json_encode($this->data);
		}
    }

	public function form_detail($id,$det_id) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jabatan/form'));
		}

		$this->form_validation->set_rules('keterangan','Keterangan', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['id'] = $id;
			$data['det_id'] = $det_id;
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['item']=$this->db->query('select * from master_penilaian_detail where id = "'.$det_id.'"')->row();
			$this->load->view('master/penilaian/v_form_penilaian_detail',  isset($data) ? $data : NULL);
		}else{
			$kirim['keterangan'] = $this->input->post('keterangan');
			if($det_id == 0){
				$kirim['master_penilaian_id'] = $id;
				$kirim['nilai'] = 10;
				$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['create_by'] = $this->session->userdata('user_id');
				$this->db->insert('master_penilaian_detail',$kirim);
			}else{
				$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['update_by'] = $this->session->userdata('user_id');
				$this->db->update('master_penilaian_detail',$kirim,array('id'=>$det_id));
			}
			$this->data['status'] = 'success';
			echo json_encode($this->data);
		}
    }

    public function hapus($id)
    {
		$this->db->update('master_penilaian',array('soft_delete'=>'1'),array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

    public function hapus_detail($id)
    {
		$this->db->delete('master_penilaian_detail',array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

	public function validasi($id)
	{
		$this->db->update('master_penilaian',array('aktif'=>"0"));
		$this->db->update('master_penilaian',array('aktif'=>"1"),array('id'=>$id));
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

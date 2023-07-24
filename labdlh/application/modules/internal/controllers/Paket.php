<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paket extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('master/parameter_model', 'master/paket_parameter_model', 'master/paket_model', 'master/jenis_sampel_model'));
		$this->load->library(array('form_validation','pdf'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'paket/paket_pelanggan'));
		}else if(!$this->ion_auth->in_group(array('admin','members','manager'))){
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}
	}

    public function index() {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'MASTER';
		$data['menu'] = 'paket';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('paket/v_paket',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function paket_list() {
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

		$where = array('soft_delete'=>'0');

		$data['a'] = $this->paket_model->get_paket_list($where,$limit,$offset,$like)->result();
		// echo $this->db->last_query();
		// die();
		$tot = $this->paket_model->get_paket_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('paket/v_paket_list', $data);
	}

	public function form($id=false) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/paket/form'));
		}

		if($id){
			$paket = $this->db->query("select * from master_paket where id='$id'")->row();
			$data['item'] =  $paket;
			$data['parameter'] = $this->paket_model->data_parameter($id);
		}else{
			$data['parameter'] = $this->parameter_model->data_parameter();
		}

		$this->form_validation->set_rules('jenis_sampel','Jenis Sampel', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['jenis_sampel'] = $this->jenis_sampel_model->dropdown_jenis_sampel();

		if ($this->form_validation->run() == FALSE)
		{
			if($id){
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

				$this->template->title = 'Form Paket';
				$data['menu'] = 'master';
				$this->template->description = '';
				$this->template->meta->add('keyword', '');
				$this->template->content->view('paket/v_form_ubah_paket', $data);
				$this->template->publish();
			}else{
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
				$this->template->title = 'Form Paket';
				$data['menu'] = 'master';
				$this->template->description = '';
				$this->template->meta->add('keyword', '');
				$this->template->content->view('paket/v_form_paket', $data);
				$this->template->publish();
			}
		}else{
			if($id){
				$kirim=array
				(
					'jenis_sampel' => $this->input->post('jenis_sampel'),
					'nama_paket' => $this->input->post('nama_paket'),
					'harga' => $this->input->post('harga'),
				);
				$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['update_by'] = $this->session->userdata('user_id');
				$this->db->update('master_paket',$kirim,array('id'=>$id));
			}else{
				$this->form_validation->set_rules('jenis_sampel','Jenis Sampel', 'required|xss_clean');
				$parameter = $this->input->post('parameter');
				$kirim=array
				(
					'jenis_sampel' => $this->input->post('jenis_sampel'),
					'harga' => $this->input->post('harga'),
					'nama_paket' => $this->input->post('nama_paket'),
				);
				$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['create_by'] = $this->session->userdata('user_id');
				if($this->db->insert('master_paket',$kirim)){
					$last_id_paket = $this->db->insert_id();
					$i=0;
					foreach ($parameter as $parameters => $value){
		                $data_insert[$i] = array(
				           'master_paket_id' => $last_id_paket,
				           'master_parameter_id' => $parameters,
			           	);
			           	$i++;
		            }
		            $this->db->insert_batch('master_paket_parameter', $data_insert);
				}
	        }
			redirect('master/v_paket','refresh');
		}
    }

    public function paket_ubah_parameter_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['id']) && $_POST['id'] != NULL) {
			$where = array('master_paket_id'=>$this->input->post('id'));
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['rows'] = $this->paket_parameter_model->get_paket_parameter_list($where,$limit,$offset,$like)->result();
		$tot = $this->paket_parameter_model->get_paket_parameter_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		// echo $this->db->last_query();
		// die();
		$this->load->view('paket/v_paket_parameter_list', $data);
	}

	function form_parameter($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'paket/paket_pelanggan'));
		}

		$data['parameter'] = $this->paket_parameter_model->data_parameter_inner($id);
		$data['id'] = $id;
		
		$this->form_validation->set_rules('parameter','Jabatan', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$this->load->view('paket/v_form_tambah_parameter',  isset($data) ? $data : NULL);
	}

	function simpan_paket_parameter($id = false)
	{
		$kirim=array
		(
			'master_paket_id' => $id,
			'master_parameter_id' => $this->input->post('parameter_id')
		);


		$this->db->insert('master_paket_parameter',$kirim);

		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	function ubah_lhus_parameter($no_sampel, $parameter_id, $paket_id, $ket){
		$lhus = $this->db->query("select * from lhus where no_sampel='$no_sampel'")->row();
		if($ket=="tambah"){
			$kirim=array
			(
				'lhus_id' => $lhus->id,
				'paket_id' => $paket_id,
				'lhus_nomor' => $lhus->nomor_lhus,
				'no_sampel' => $no_sampel,
	           	'parameter_id' =>  $parameter_id,
			);
			$this->db->insert('lhus_parameter',$kirim);
		}else{
			$this->db->delete('lhus_parameter', array('parameter_id' => $parameter_id, 'no_sampel' => $no_sampel));
		}
	}

    function form_bukti($id = false){
		$data['paket'] = $this->db->query('select * from paket where id ="'.$id.'"')->row();
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Form konten';
		$data['menu'] = 'konten';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('paket_pelanggan/v_form_bukti',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function hapus_parameter($id)
    {
		$this->db->delete('master_paket_parameter', array('id' => $id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

    public function hapus($id)
    {
	  	$kirim['soft_delete'] = "1";
		$this->db->update('master_paket',$kirim,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

    function ubah($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'paket/paket_pelanggan'));
		}
		$this->form_validation->set_rules('paket','FPPS', 'required|xss_clean');
		$this->form_validation->set_rules('harga','Harga', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from master_paket where id = "'.$id.'"')->row();
		$this->load->view('paket/v_form_ubah_paket',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'paket/paket_pelanggan'));
		}


		$this->form_validation->set_rules('metode','metode', 'required|xss_clean');
		$this->form_validation->set_rules('paket','FPPS', 'required|xss_clean');
		$this->form_validation->set_rules('harga','Harga', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'metode' => $this->input->post('metode'),
			'paket' => $this->input->post('paket'),
			'harga' => $this->input->post('harga'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('master_paket',$kirim,array('id'=>$id));
		$this->data['message'] = 'Data Berhasil Dirubah.';

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
}

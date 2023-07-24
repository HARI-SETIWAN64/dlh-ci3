<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kata_mutiara extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('master/kata_mutiara_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_pelayanan','manager_teknis')))
		{
				$this->session->set_flashdata('message', 'anda tidak berhak..');
				redirect('/', 'refresh');
		}
	}

    public function index() {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Kata Mutiara';
		$data['menu'] = 'kata_mutiara';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('kata_mutiara/v_kata_mutiara',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function kata_mutiara_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('kata_mutiara'=>$this->input->post('kata_mutiara'));
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->kata_mutiara_model->get_kata_mutiara_list($where,$limit,$offset,$like)->result();
		$tot = $this->kata_mutiara_model->get_kata_mutiara_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('kata_mutiara/v_kata_mutiara_list', $data);
	}

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/kata_mutiara/form'));
		}

		$this->form_validation->set_rules('kata_mutiara','Kata Mutiara', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Kata Mutiara';
			$data['menu'] = 'kata_mutiara';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('kata_mutiara/v_form_kata_mutiara', $data);
			$this->template->publish();
		}else{

			$kirim['kata_mutiara'] = $this->input->post('kata_mutiara');

			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			$this->db->insert('kata_mutiara',$kirim);

			redirect('master/kata_mutiara','refresh');
		}
    }

    public function hapus($id)
    {
		$this->db->delete('kata_mutiara', array('id_kata_mutiara' => $id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

    function ubah($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/kata_mutiara/ubah'));
		}
		$this->form_validation->set_rules('kata_mutiara','Kata Mutiara', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from kata_mutiara where id_kata_mutiara = "'.$id.'"')->row();
		$this->load->view('kata_mutiara/v_form_ubah_kata_mutiara',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/kata_mutiara'));
		}


		$this->form_validation->set_rules('kata_mutiara','Kata Mutiara', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'kata_mutiara' => $this->input->post('kata_mutiara'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('kata_mutiara',$kirim,array('id_kata_mutiara'=>$id));
		$this->data['message'] = 'Data Berhasil Dirubah.';

		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	public function status($id, $status)
    {
		$datapost['aktif']=$status;
		$datapost['update_by']=$this->session->userdata('user_id');
		$datapost['date_update']=date('Y-m-d H:i:s', strtotime('NOW'));
		$this->db->update('kata_mutiara',$datapost,array('id_kata_mutiara'=>$id));
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

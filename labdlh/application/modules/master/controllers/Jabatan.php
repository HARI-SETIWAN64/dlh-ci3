<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('master/jabatan_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jabatan'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_web')))
		{
				$this->session->set_flashdata('message', 'anda tidak berhak..');
				redirect('/', 'refresh');
		}
	}

    public function index() {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Jabatan';
		$data['menu'] = 'jabatan';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('jabatan/v_jabatan',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function jabatan_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('nama'=>$this->input->post('nama'),'jabatan'=>$this->input->post('nama'));
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->jabatan_model->get_jabatan_list($where,$limit,$offset,$like)->result();
		$tot = $this->jabatan_model->get_jabatan_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('jabatan/v_jabatan_list', $data);
	}

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jabatan/form'));
		}

		$this->form_validation->set_rules('jabatan','Jabatan', 'required|xss_clean');
		$this->form_validation->set_rules('nama','Nama', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Jabatan';
			$data['menu'] = 'jabatan';
    		$data['users'] = $this->jabatan_model->get_dropdown_users("", 1);
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('jabatan/v_form_jabatan', $data);
			$this->template->publish();
		}else{
			$kirim['jabatan'] = $this->input->post('jabatan');
			$kirim['nama'] = $this->input->post('nama');
			$kirim['users_id'] = $this->input->post('users_id');

			$kirim['soft_delete'] = 0 ;
			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			$this->db->insert('master_jabatan',$kirim);

			redirect('master/jabatan','refresh');
		}
    }

    public function hapus($id)
    {
		$kirim['soft_delete'] = "1";
		$this->db->update('master_jabatan',$kirim,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

    function ubah($id=false){
    	// echo "string";
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jabatan/ubah'));
		}
		$this->form_validation->set_rules('jabatan','Jabatan', 'required|xss_clean');
		$this->form_validation->set_rules('harga','Harga', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['users'] = $this->jabatan_model->get_dropdown_users("", 1);

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from master_jabatan where id = "'.$id.'"')->row();
		$this->load->view('jabatan/v_form_ubah_jabatan',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jabatan'));
		}


		$this->form_validation->set_rules('jabatan','Jabatan', 'required|xss_clean');
		$this->form_validation->set_rules('harga','Harga', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'jabatan' => $this->input->post('jabatan'),
			'nama' => $this->input->post('nama'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('master_jabatan',$kirim,array('id'=>$id));
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

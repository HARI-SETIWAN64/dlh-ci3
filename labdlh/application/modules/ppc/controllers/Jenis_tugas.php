<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_tugas extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('ppc/jenis_tugas_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_pelayanan','ka_lab','manager_teknis','analis')))
		{
				$this->session->set_flashdata('message', 'anda tidak berhak..');
				redirect('/', 'refresh');
		}
	}

    public function index() {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Jenis Tugas';
		$data['menu'] = 'jenis_tugas';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('jenis_tugas/v_jenis_tugas',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function jenis_tugas_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['jenis_tugas']) && $_POST['jenis_tugas'] != NULL) {
			$like = array('tugas'=>$this->input->post('jenis_tugas'),'jenis_tugas'=>$this->input->post('jenis_tugas'));
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->jenis_tugas_model->get_jenis_tugas_list($where,$limit,$offset,$like)->result();
		$tot = $this->jenis_tugas_model->get_jenis_tugas_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('jenis_tugas/v_jenis_tugas_list', $data);
	}

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'ppc/jenis_tugas/form'));
		}

		$this->form_validation->set_rules('tugas_id','Tugas', 'required|xss_clean',
		array(
			'required'      => '%s Tidak Boleh Kosong.'
			));
		$this->form_validation->set_rules('jenis_tugas','Jenis Tugas', 'required|xss_clean',
		array(
			'required'      => '%s Tidak Boleh Kosong.'
			));

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['tugas']=$this->jenis_tugas_model->dropdown_tugas();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Jenis Tugas';
			$data['menu'] = 'jenis_tugas';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('jenis_tugas/v_form_jenis_tugas', $data);
			$this->template->publish();
		}else{
			$kirim['tugas_id'] = $this->input->post('tugas_id');
			$kirim['jenis_tugas'] = $this->input->post('jenis_tugas');

			$kirim['soft_delete'] = 0 ;
			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			$this->db->insert('ppc_jenis_tugas',$kirim);

			redirect('ppc/jenis_tugas','refresh');
		}
    }

    public function hapus($id)
    {
	  	$kirim['soft_delete'] = "1";
		$this->db->update('ppc_jenis_tugas',$kirim,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

    function ubah($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'ppc/jenis_tugas/ubah'));
		}
		$this->form_validation->set_rules('tugas_id','Tugas_id', 'required|xss_clean');
		$this->form_validation->set_rules('jenis_tugas','Jenis Tugas', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['tugas']=$this->jenis_tugas_model->dropdown_tugas();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from ppc_jenis_tugas where id = "'.$id.'"')->row();
		$this->load->view('jenis_tugas/v_form_ubah_jenis_tugas',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'ppc/jenis_tugas'));
		}

		$this->form_validation->set_rules('tugas_id','Tugas_id', 'required|xss_clean');
		$this->form_validation->set_rules('jenis_tugas','Jenis Tugas', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'tugas_id' => $this->input->post('tugas_id'),
			'jenis_tugas' => $this->input->post('jenis_tugas'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('ppc_jenis_tugas',$kirim,array('id'=>$id));
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

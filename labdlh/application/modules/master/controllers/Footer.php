<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Footer extends CI_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('master/footer_model'));
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

		$this->template->title = 'Footer';
		$data['menu'] = 'footer';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('footer/v_footer',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function footer_list() {
		$data['item'] = $this->db->query("select * from master_footer where id='1'")->row();
		$this->load->view('footer/v_footer_list', $data);
	}

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/footer/form'));
		}

		$this->form_validation->set_rules('kode','Kode', 'required|xss_clean');
		$this->form_validation->set_rules('footer','Footer', 'required|xss_clean');
		$this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Footer';
			$data['menu'] = 'footer';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('footer/v_form_footer', $data);
			$this->template->publish();
		}else{
			//$kirim['sekolah_id'] = $this->input->post('sekolah_id');
			$kirim['kode'] = $this->input->post('kode');
			$kirim['nama'] = $this->input->post('footer');
			$kirim['no_urut_dokumen'] = $this->input->post('no_urut_dokumen');

			$kirim['soft_delete'] = 0 ;
			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			$this->db->insert('master_footer',$kirim);

			redirect('master/footer','refresh');
		}
	}

	function ubah($id=false){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/footer/ubah'));
		}

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from master_footer where id = "'.$id.'"')->row();
		$this->load->view('footer/v_form_ubah_footer',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/footer'));
		}


		$this->form_validation->set_rules('footer','Footer', 'required|xss_clean');
		$this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'footer_terbit' => $this->input->post('footer_terbit'),
			'footer_berlaku' => $this->input->post('footer_berlaku'),
			'footer_no_dok' => $this->input->post('footer_no_dok'),
			'footer_terbit_stp' => $this->input->post('footer_terbit_stp'),
			'footer_berlaku_stp' => $this->input->post('footer_berlaku_stp'),
			'footer_no_dok_stp' => $this->input->post('footer_no_dok_stp'),
			'footer_terbit_lhus' => $this->input->post('footer_terbit_lhus'),
			'footer_berlaku_lhus' => $this->input->post('footer_berlaku_lhus'),
			'footer_no_dok_lhus' => $this->input->post('footer_no_dok_lhus'),
			'footer_terbit_lhu' => $this->input->post('footer_terbit_lhu'),
			'footer_berlaku_lhu' => $this->input->post('footer_berlaku_lhu'),
			'footer_no_dok_lhu' => $this->input->post('footer_no_dok_lhu'),
		);
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('master_footer',$kirim,array('id'=>$id));
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

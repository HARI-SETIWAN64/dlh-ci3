<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_sampel extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('master/jenis_sampel_model'));
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
		$data['menu'] = 'jenis_sampel';
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

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jenis_sampel/form'));
		}

		$this->form_validation->set_rules('kode','Kode', 'required|xss_clean');
		$this->form_validation->set_rules('jenis_sampel','Jenis Sampel', 'required|xss_clean');
		$this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Jenis Sampel';
			$data['menu'] = 'jenis_sampel';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('jenis_sampel/v_form_jenis_sampel', $data);
			$this->template->publish();
		}else{
			//$kirim['sekolah_id'] = $this->input->post('sekolah_id');
			$kirim['kode'] = $this->input->post('kode');
			$kirim['nama'] = $this->input->post('jenis_sampel');
			$kirim['no_urut_dokumen'] = $this->input->post('no_urut_dokumen');

			$kirim['soft_delete'] = 0 ;
			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			$this->db->insert('master_jenis_sampel',$kirim);

			redirect('master/jenis_sampel','refresh');
		}
    }

    public function hapus($id)
    {
	  	$kirim['soft_delete'] = "1";
		$this->db->update('master_jabatan',$kirim,array('kode'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

    function ubah($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jenis_sampel/ubah'));
		}
		$this->form_validation->set_rules('jenis_sampel','Jenis Sampel', 'required|xss_clean');
		$this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from master_jenis_sampel where kode = "'.$id.'"')->row();
		$this->load->view('jenis_sampel/v_form_ubah_jenis_sampel',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/jenis_sampel'));
		}


		$this->form_validation->set_rules('jenis_sampel','Jenis Sampel', 'required|xss_clean');
		$this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'no_urut_dokumen' => $this->input->post('no_urut_dokumen'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('master_jenis_sampel',$kirim,array('kode'=>$id));
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

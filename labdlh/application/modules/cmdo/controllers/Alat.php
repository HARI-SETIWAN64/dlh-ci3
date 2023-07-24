<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alat extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('cmdo/alat_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_pelayanan','analis')))
		{
				$this->session->set_flashdata('message', 'anda tidak berhak..');
				redirect('/', 'refresh');
		}
	}

    public function index() {

    	$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Alat';
		$data['menu'] = 'alat';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('alat/v_alat',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function alat_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['nama_alat']) && $_POST['nama_alat'] != NULL) {
			$like = array('nama_alat'=>$this->input->post('nama_alat'),'nama_alat'=>$this->input->post('nama_alat'),'nama_alat'=>$this->input->post('nama_alat'));
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->alat_model->get_alat_list($where,$limit,$offset,$like)->result();
		$tot = $this->alat_model->get_alat_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('alat/v_alat_list', $data);
	}

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/alat/form'));
		}

		$this->form_validation->set_rules('nama_alat','Nama Alat', 'xss_clean|is_unique[alat.nama_alat]');
		// $this->form_validation->set_rules('jenis_sampel','Jenis Sampel', 'required|xss_clean');
		// $this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Alat';
			$data['menu'] = 'alat';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('alat/v_form_alat', $data);
			$this->template->publish();
			
		}else{
			//$kirim['sekolah_id'] = $this->input->post('sekolah_id');
			$kirim['nama_alat'] = $this->input->post('nama_alat');
			// $kirim['nama'] = $this->input->post('jenis_sampel');
			// $kirim['no_urut_dokumen'] = $this->input->post('no_urut_dokumen');

			$kirim['soft_delete'] = 0 ;
			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			$this->db->insert('alat',$kirim);

			redirect('cmdo/alat','refresh');
		}
    }

    public function hapus($id)
    {
	  	$kirim['soft_delete'] = "1";
		$this->db->update('alat',$kirim,array('id_alat'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }

    function ubah($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/alat/ubah'));
		}
		$this->form_validation->set_rules('nama_alat','Nama Alat', 'xss_clean');
		// $this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from alat where id_alat = "'.$id.'"')->row();
		$this->load->view('alat/v_form_ubah_alat',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/alat'));
		}


		$this->form_validation->set_rules('nama_alat','Nama Alat', 'required|xss_clean');
		// $this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'nama_alat' => $this->input->post('nama_alat'),
			// 'nama' => $this->input->post('nama'),
			// 'no_urut_dokumen' => $this->input->post('no_urut_dokumen'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('alat',$kirim,array('id_alat'=>$id));
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

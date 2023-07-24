<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Spek_alat extends CI_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('cmdo/spek_alat_model','cmdo/alat_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language','file'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in()){
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));
		}elseif (!$this->ion_auth->in_group(array('admin','members','analis','manager_teknis','ka_lab','admin_pelayanan'))){
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}
	}

	public function index() {
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->template->title = 'Spesifikasi Alat';
		$data['menu'] = 'spek_alat';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('spek_alat/v_spek_alat',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function spek_alat_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['id_alat']) && $_POST['id_alat'] != NULL) {
			$like = array('id_alat'=>$this->input->post('id_alat'),'id_alat'=>$this->input->post('id_alat'),''=>$this->input->post('id_alat'));
		}


		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->spek_alat_model->get_list($where,$limit,$offset,$like)->result();
		// print_r($this->db->last_query()); die();
		$tot = $this->spek_alat_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('spek_alat/v_spek_alat_list', $data);
	}

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/spek_alat/form'));
		}

		$this->form_validation->set_rules('noseri','Nomer Seri', 'xss_clean');
		

		$userid = $this->session->userdata('kode_alat');
		$data['kode_alat'] = $this->ion_auth->user($this->session->userdata('kode_alat'))->row();
		$data['id_alat'] = $this->alat_model->dropdown_alat();
		$data['spek_alat'] = $this->spek_alat_model->dropdown_spek_alat();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Spesifikasi Alat';
			// $data['soals'] = $this->db->query("select master_penilaian_detail.* from master_penilaian inner join master_penilaian_detail on master_penilaian.id = master_penilaian_detail.master_penilaian_id where aktif = 1")->result();
			$data['menu'] = 'spek_alat';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('spek_alat/v_form_spek_alat', $data);
			$this->template->publish();
		}else{
			// $kirim['create_by'] = $this->session->userdata('user_id');
			// $group = $this->db->query("SELECT `groups`.* FROM users INNER JOIN users_groups ON users.id = users_groups.user_id INNER JOIN `groups` ON users_groups.group_id = groups.id")->row();

			// if($group->name == 'admin' or $group->name == 'manager_teknis' or $group->name == 'ka_lab'){
			// 	$kirim['status_penilai'] = '2';
			// }else{
			// 	$kirim['status_penilai'] = '1';
			// }

			// $kirim['master_penilaian_id'] = $this->input->post('master_penilaian_id');
			$kirim['id_alat'] = $this->input->post('id_alat');
			$kirim['kode_alat'] = $this->input->post('kode_alat');
            $kirim['brand'] = $this->input->post('brand');
			$kirim['model'] = $this->input->post('model');
			$kirim['noseri'] = $this->input->post('noseri');

			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $userid;
			$this->db->insert('spek_alat',$kirim);
			$insert_id = $this->db->insert_id();

			// $jum = 0;
			// $bg=0;
			// foreach($this->input->post('nilai_id') as $penilaian_id => $nilai ) {
			// 	$master_nilai = $this->db->query("select * from master_penilaian_detail where id='".$penilaian_id."'")->row();
			// 	$detail['master_penilaian_detail_id']=$master_nilai->id;
			// 	$detail['penilaian_id']=$insert_id;
			// 	$detail['keterangan']=$master_nilai->keterangan;
			// 	$detail['nilai']=$nilai;
			// 	$detail['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			// 	$detail['create_by'] = $userid;
			// 	$this->db->insert('penilaian_detail',$detail);

			// 	$bg+=1;
			// 	$jum+=$nilai;
			// }


			// $updt['rata_rata'] = $jum/$bg;
			// $this->db->update('detail_alat',$updt,array('id'=>$insert_id));

			redirect('cmdo/spek_alat','refresh');
			// print_r($_POST); die();
		}
	}

	public function hapus($id)
	{
		$this->db->delete('spek_alat', array("id_spek"=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	// function lihat($id=false){
	// 	if (!$this->ion_auth->logged_in())
	// 	{
	// 		redirect('auth/login?continue='.urlencode(base_url().'internal/penilaian'));
	// 	}
	// 	$data['items']=$this->db->query('select * from penilaian_detail where penilaian_id = "'.$id.'"')->result();
	// 	$this->load->view('internal/penilaian/v_lihat',  isset($data) ? $data : NULL);
	// }

    function ubah($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/spek_alat/ubah'));
		}

		// $this->form_validation->set_rules('kode_alat','Kode Alat', 'xss_clean|is_unique[spek_alat.kode_alat]');
		$this->form_validation->set_rules('noseri','Nomer Seri', 'xss_clean');


		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['id_spek'] = $this->ion_auth->user($this->session->userdata('id_spek'))->row();
		$data['id_alat'] = $this->alat_model->dropdown_alat();
		// $data['spek_alat'] = $this->spek_alat_model->dropdown_spek_alat();
		$data['items']=$this->db->query('select * from spek_alat 
		INNER JOIN alat ON spek_alat.id_alat = alat.id_alat
		where id_spek = "'.$id.'"')->result();
		
		$kirim=array
		(
			'kode_alat' => $this->input->post('kode_alat'),
			'brand' => $this->input->post('brand'),
			'model' => $this->input->post('model'),
			'noseri' => $this->input->post('noseri'),
			// 'no_urut_dokumen' => $this->input->post('no_urut_dokumen'),
		);


		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from spek_alat where id_spek = "'.$id.'"')->row();
		$this->load->view('spek_alat/v_form_ubah_spek_alat',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/spek_alat'));
		}

		// $this->form_validation->set_rules('kode_alat','Kode Alat', 'xss_clean|is_unique[spek_alat.kode_alat]');
		$this->form_validation->set_rules('noseri','Nomer Seri', 'xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		
		$kirim=array
		(
			// 'brand' => $this->input->post('brand'),
			'kode_alat' => $this->input->post('kode_alat'),
			'brand' => $this->input->post('brand'),
			'model' => $this->input->post('model'),
			'noseri' => $this->input->post('noseri'),
			// 'sampai' => $this->input->post('sampai'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('spek_alat',$kirim,array('id_spek'=>$id));
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

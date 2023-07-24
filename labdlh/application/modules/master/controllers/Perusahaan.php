<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan extends CI_Controller {
	private $limit = 25;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('master/perusahaan_model'));
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

		$this->template->title = 'Perusahaan';
		$data['menu'] = 'perusahaan';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('perusahaan/v_perusahaan',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function perusahaan_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
			$like = array('npwp'=>$this->input->post('cari'), 'nama'=>$this->input->post('cari'),'alamat'=>$this->input->post('cari'));
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->perusahaan_model->get_perusahaan_list($where,$limit,$offset,$like)->result();
		$tot = $this->perusahaan_model->get_perusahaan_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('perusahaan/v_perusahaan_list', $data);
	}

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/perusahaan/form'));
		}

		$this->form_validation->set_rules('alamat','Alamat', 'required|xss_clean');
		$this->form_validation->set_rules('nama','Nama Perusahaan', 'required|xss_clean');
		$this->form_validation->set_rules('telp','Telepon', 'required|xss_clean');
		$this->form_validation->set_rules('nib','NIB', 'required|xss_clean');
		$this->form_validation->set_rules('npwp','NPWRD', 'required|xss_clean');
		$this->form_validation->set_rules('jenis_usaha','Jenis Usaha', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Jenis Sampel';
			$data['kec']= $this->base_model->get_kec_list();
			$data['ipal']= array("0"=>"Tidak Ada","1"=>"Ada");
			$data['perlin']= array("0"=>"Tidak Ada","1"=>"Ada");
			// print_r($this->db->last_query());
			$data['menu'] = 'perusahaan';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('perusahaan/v_form_perusahaan', $data);
			$this->template->publish();
		}else{
			$kirim['customer_id'] = $this->input->post('customer_id');
			$kirim['ipal'] = $this->input->post('ipal');
			$kirim['perlin'] = $this->input->post('perlin');
			$kirim['nib'] = $this->input->post('nib');
			$kirim['npwp'] = $this->input->post('npwp');
			$kirim['nama'] = strtoupper($this->input->post('nama'));
			$kirim['alamat'] = $this->input->post('alamat');
			$kirim['kab'] = strtoupper($this->input->post('kab'));
			$kirim['no_kec'] = $this->input->post('no_kec');
			$kirim['no_kel'] = $this->input->post('no_kel');
			$kirim['telp'] = $this->input->post('telp');
			$kirim['email'] = $this->input->post('email');
			$kirim['jenis_usaha'] = $this->input->post('jenis_usaha');
			$kirim['wajib_pajak_id'] = $this->input->post('wajib_pajak_id');
			$kirim['wajib_retribusi'] = $this->input->post('wajib_retribusi');

			$kirim['soft_delete'] = 0 ;
			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			// print_r($kirim); die();
			$this->db->insert('master_perusahaan',$kirim);

			redirect('master/perusahaan','refresh');
		}
	}

	public function hapus($id)
	{
		$kirim['soft_delete'] = "1";
		$this->db->update('master_perusahaan',$kirim,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	function ubah($id=false){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/perusahaan/ubah'));
		}

		$userid = $this->session->userdata('user_id');
		$data['ipal']= array("0"=>"Tidak Ada","1"=>"Ada");
		$data['perlin']= array("0"=>"Tidak Ada","1"=>"Ada");
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['kec']= $this->base_model->get_kec_list();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from master_perusahaan where id = "'.$id.'"')->row();
		$this->load->view('perusahaan/v_form_ubah_perusahaan',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/perusahaan'));
		}
		$this->form_validation->set_rules('alamat','Alamat', 'required|xss_clean');
		$this->form_validation->set_rules('nama','Nama Perusahaan', 'required|xss_clean');
		$this->form_validation->set_rules('telp','Telepon', 'required|xss_clean');
		$this->form_validation->set_rules('nib','NIB', 'required|xss_clean');
		$this->form_validation->set_rules('npwp','NPWRD', 'required|xss_clean');
		$this->form_validation->set_rules('jenis_usaha','Jenis Usaha', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$userid = $this->session->userdata('user_id');
			$data['ipal']= array("0"=>"Tidak Ada","1"=>"Ada");
			$data['perlin']= array("0"=>"Tidak Ada","1"=>"Ada");
			$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
			$data['kec']= $this->base_model->get_kec_list();

			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['item']=$this->db->query('select * from master_perusahaan where id = "'.$id.'"')->row();
			$this->load->view('perusahaan/v_form_ubah_perusahaan',  isset($data) ? $data : NULL);
		}else{
			$kirim['customer_id'] = $this->input->post('customer_id');
			$kirim['ipal'] = $this->input->post('ipal');
			$kirim['perlin'] = $this->input->post('perlin');
			$kirim['nib'] = $this->input->post('nib');
			$kirim['npwp'] = $this->input->post('npwp');
			$kirim['nama'] = strtoupper($this->input->post('nama'));
			$kirim['alamat'] = $this->input->post('alamat');
			$kirim['kab'] = strtoupper($this->input->post('kab'));
			$kirim['no_kec'] = $this->input->post('no_kec');
			$kirim['no_kel'] = $this->input->post('no_kel');
			$kirim['telp'] = $this->input->post('telp');
			$kirim['email'] = $this->input->post('email');
			$kirim['jenis_usaha'] = $this->input->post('jenis_usaha');
			$kirim['wajib_pajak_id'] = $this->input->post('wajib_pajak_id');
			$kirim['wajib_retribusi'] = $this->input->post('wajib_retribusi');

			
			$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['update_by'] = $this->session->userdata('user_id');
			$this->db->update('master_perusahaan',$kirim,array('id'=>$id));
			$this->data['message'] = 'Data Berhasil Dirubah.';
			$this->data['status'] = 'success';
			echo json_encode($this->data);

		}
	}

	public function ceknib($nib=false){
	}

	public function map($id = false) {         
		$data['kodeid'] = $id;
		$this->load->library('googlemaps');

		$sqlmap = $this->db->query("SELECT * FROM master_perusahaan where id='".$id."'")->row();
		$data['item'] = $sqlmap;
		if ($sqlmap->lat == "") {

			$config['onrightclick'] = "insertDatabase(event.latLng.lat(),event.latLng.lng());";
			$config['center'] = '-8.3140933,114.2799936';
			$config['zoom'] = '15';
		} else {
			$config['center'] = $sqlmap->lat . ', ' . $sqlmap->lng;
			$config['zoom'] = '18';
		}


		$config['mapTypeId'] = 'HYBRID';

		$this->googlemaps->initialize($config);
		if ($sqlmap->lat <> "") {
			$lt = $sqlmap->lat;
			$ln = $sqlmap->lng;
			$idmap = $sqlmap->id;
			$marker['title'] = $sqlmap->nama;
			$marker['icon'] = base_url() . 'img/location.png';
			$marker['draggable'] = true;
			$marker['position'] = $lt.','.$ln;
			// $marker['onclick'] = 'detailmap('.$detail_map.');';
			$marker['onrightclick'] = 'deleteDatabase('.$idmap.');';
			$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng(),' . $idmap . ');';


			$this->googlemaps->add_marker($marker);
		}


		$data['map'] = $this->googlemaps->create_map();

		$this->template->title = 'Perusahaan';
		$data['menu'] = 'perusahaan';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('perusahaan/v_perusahaan_map', $data);
		$this->template->publish();
	}



	function simpan_map($lat, $lng, $id) {
		$user = $this->session->userdata('email');
		$kirim['lat'] = $lat;
		$kirim['lng'] = $lng;

		$cek = $this->db->query("SELECT * FROM master_perusahaan where id = '" . $id . "'");
		if ($cek->num_rows() > 0) {
			$kirim['lat'] = $lat;
			$kirim['lng'] = $lng;
			$this->db->update('master_perusahaan', $kirim, array('id' => $id));
			$out['status'] = 'success';
			$out['message'] = 'Posisi sudah diubah';
		} else {
			$kirim['lat'] = $lat;
			$kirim['lng'] = $lng;
			$this->db->insert('master_perusahaan', $kirim);
			$out['status'] = 'success';
			$out['message'] = 'Posisi sudah disimpan';
		}
		echo json_encode($out);
	}

	function delete_map($idmap) {
		$kirim['lat'] = "";
		$kirim['lng'] = "";
		$this->db->update('master_perusahaan', $kirim, array('id' => $idmap));
		$out['status'] = 'success';
		$out['message'] = 'Posisi dihapus';
		echo json_encode($out);
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

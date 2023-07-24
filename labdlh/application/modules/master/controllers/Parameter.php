<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Parameter extends CI_Controller {
	private $limit = 20;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('master/parameter_model'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/parameter'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_pelayanan')))
		{
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}
	}

	public function index() {

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Parameter';
		$data['menu'] = 'parameter';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('parameter/v_parameter',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function parameter_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();


		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('parameter'=>$this->input->post('nama'),'metode'=>$this->input->post('nama'),'harga'=>$this->input->post('nama'));
		}

		$where = array('soft_delete'=>'0');

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->parameter_model->get_parameter_list($where,$limit,$offset,$like)->result();
		// echo $this->db->last_query();
		// die();
		$tot = $this->parameter_model->get_parameter_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('parameter/v_parameter_list', $data);
	}

	public function form() {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/parameter/form'));
		}

		$this->form_validation->set_rules('metode','Metode', 'required|xss_clean');
		$this->form_validation->set_rules('parameter','Parameter', 'required|xss_clean');
		$this->form_validation->set_rules('harga','Harga', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['analis'] = $this->parameter_model->analis();

		if ($this->form_validation->run() == FALSE)
		{
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->template->title = 'Form Parameter';
			$data['menu'] = 'parameter';
			$data['tarif'] = $this->parameter_model->tarif();
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('parameter/v_form_parameter', $data);
			$this->template->publish();
		}else{
			//$kirim['sekolah_id'] = $this->input->post('sekolah_id');
			$kirim['metode'] = $this->input->post('metode');
			$kirim['parameter'] = $this->input->post('parameter');
			$kirim['baku_mutu'] = $this->input->post('baku_mutu');
			$kirim['satuan'] = $this->input->post('satuan');
			$kirim['harga'] = $this->input->post('harga');
			$kirim['user_analis'] = $this->input->post('user_analis');
			$kirim['sim_tarif_pajak_id'] = $this->input->post('sim_tarif_pajak_id');

			$kirim['soft_delete'] = 0 ;
			$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
			$kirim['create_by'] = $this->session->userdata('user_id');
			$this->db->insert('master_parameter',$kirim);

			redirect('master/parameter','refresh');
		}
	}

	public function hapus($id)
	{
		$kirim['soft_delete'] = "1";
		$this->db->update('master_parameter',$kirim,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	function ubah($id=false){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/parameter'));
		}
		$this->form_validation->set_rules('parameter','Parameter', 'required|xss_clean');
		$this->form_validation->set_rules('harga','Harga', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['analis'] = $this->parameter_model->analis();
		$data['tarif'] = $this->parameter_model->tarif();

		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from master_parameter where id = "'.$id.'"')->row();
		$this->load->view('parameter/v_form_ubah_parameter',  isset($data) ? $data : NULL);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'master/parameter'));
		}


		$this->form_validation->set_rules('metode','metode', 'required|xss_clean');
		$this->form_validation->set_rules('parameter','Parameter', 'required|xss_clean');
		$this->form_validation->set_rules('harga','Harga', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$kirim=array
		(
			'metode' => $this->input->post('metode'),
			'parameter' => $this->input->post('parameter'),
			'baku_mutu' => $this->input->post('baku_mutu'),
			'satuan' => $this->input->post('satuan'),
			'harga' => $this->input->post('harga'),
			'user_analis' => $this->input->post('user_analis'),
			'sim_tarif_pajak_id' => $this->input->post('sim_tarif_pajak_id'),
		);

		
		$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['update_by'] = $this->session->userdata('user_id');
		$this->db->update('master_parameter',$kirim,array('id'=>$id));
		// print_r($this->db->last_query()); die();
		$this->data['message'] = 'Data Berhasil Dirubah.';

		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}



	public function parameter_tarif() {

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Parameter - Tarif';
		$data['menu'] = 'parameter';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('parameter/v_parameter',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function parameter_tarif_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();


		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('parameter'=>$this->input->post('nama'),'metode'=>$this->input->post('nama'),'harga'=>$this->input->post('nama'));
		}

		$where = array('soft_delete'=>'0');

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->parameter_model->get_parameter_list($where,$limit,$offset,$like)->result();
		// echo $this->db->last_query();
		// die();
		$tot = $this->parameter_model->get_parameter_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('parameter/v_parameter_list', $data);
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



	function get_harga($id_sim_tarif_pajak)
	{
		$tp=$this->db->query("select nilai_tarif_pajak from epad_sim_tarif_pajak where id_sim_tarif_pajak = '".$id_sim_tarif_pajak."'");
		if($tp->num_rows()>0){
			$harga = $tp->row()->nilai_tarif_pajak;
		}else{
			$harga = 0;
		}
		header('Content-type: application/json');
		echo json_encode($harga);
	}

	function get_content($url, $post = '') {
		// $usecookie = __DIR__ . "/cookie.txt";
		$header[] = 'Content-Type: application/json';
		$header[] = "Accept-Encoding: gzip, deflate";
		$header[] = "Cache-Control: max-age=0";
		$header[] = "Connection: keep-alive";
		$header[] = "Accept-Language: en-US,en;q=0.8,id;q=0.6";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_ENCODING, true);
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36");

		if ($post)
		{
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$rs = curl_exec($ch);

		if(empty($rs)){
			var_dump($rs, curl_error($ch));
			curl_close($ch);
			return false;
		}
		curl_close($ch);
		return $rs;
	}
}

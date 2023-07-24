<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rekap extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('ppc/rekap_model'));
		$this->load->helper(array('url','language'));
		$this->load->library(array('form_validation','pdf'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$data['message'] = $this->session->flashdata('message');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_pelayanan','analis','manager_teknis')))
		{
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}
	}

	public function index() {

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Rekap';
		$data['menu'] = 'rekap';
		$data['jenis_tugas'] = $this->get_dropdown_jenis_tugas();
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('ppc/rekap/v_index',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function rekap_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=100000;
		$like = array();

		// $format = $this->input->post('format');
		// $w_tahun = array();
		// $w_bulan = array();
		$w_jenis_tugas = array();

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		if (isset($_POST['jns_lap']) && $_POST['jns_lap'] != NULL) {
			$jns_lap = $_POST['jns_lap'];
		}else{
			$jns_lap = "";
		} 
            
        if($jns_lap == "project_selesai"){

			// if (isset($_POST['tahun']) && $_POST['tahun'] != NULL) {
			// 	$w_tahun = array('YEAR(input_hasil_project)' => $this->input->post('tahun'));
			// }

			// if (isset($_POST['bulan']) && $_POST['bulan'] != NULL) {
			// 	$w_bulan = array('MONTH(input_hasil_project)' => $this->input->post('bulan'));
			// }
			if (isset($_POST['jenis_tugas']) && $_POST['jenis_tugas'] != NULL) {
				$w_jenis_tugas = array('jenis_tugas_id' => $this->input->post('jenis_tugas'));
			}

			// if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
			// 	$like = array(
			// 		'jenis_tugas'=>$this->input->post('cari') 
			// 		// 'perusahaan.npwp'=>$this->input->post('cari')
			// 	);
			// }
			// $w_status = array("status"=>"3");
			$where = array_merge($w_jenis_tugas);
			$data['items'] = $this->rekap_model->get_list($where,$limit,$offset,$like)->result();
			$tot = $this->rekap_model->get_list_total($where,$like)->row();
			// print_r($this->db->last_query()); die();
			$data['total_items'] =$tot->count;
			$data['page'] = $pagenya;
			// $data['format'] = $format;
			// if($format == "xls" or $format=="pdf"){
			// 	$this->load->view('ppc/rekap/v_lap_'.$jns_lap.'_pdf', $data);
			// }else{
				$this->load->view('ppc/rekap/v_lap_'.$jns_lap, $data);
			// }
		}else if($jns_lap == "belum_selesai"){

			// if (isset($_POST['tahun']) && $_POST['tahun'] != NULL) {
			// 	$w_tahun = array('YEAR(mulai)' => $this->input->post('tahun'));
			// }

			// if (isset($_POST['bulan']) && $_POST['bulan'] != NULL) {
			// 	$w_bulan = array('MONTH(mulai)' => $this->input->post('bulan'));
			// }
			if (isset($_POST['jenis_tugas']) && $_POST['jenis_tugas'] != NULL) {
				$w_jenis_tugas = array('jenis_tugas_id' => $this->input->post('jenis_tugas'));
			}

			// if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
			// 	$like = array(
			// 		// 'perusahaan.nama'=>$this->input->post('cari'), 
			// 		'jenis_tugas'=>$this->input->post('cari')
			// 	);
			// }
			// $w_status = array("status"=>"1","status"=>"0");
			$where = array_merge($w_jenis_tugas);
			$data['items'] = $this->rekap_model->get_list_belum($where,$like)->result();
			$tot = $this->rekap_model->get_list_total($where,$like)->row();
			$data['total_items'] =$tot->count;
			$data['page'] = $pagenya;
			// $data['format'] = $format;
			// // print_r($this->db->last_query()); die();
			// if($format == "xls" or $format=="pdf"){
			// 	$this->load->view('ppc/rekap/v_lap_'.$jns_lap.'_pdf', $data);
			// }else{
				$this->load->view('ppc/rekap/v_lap_'.$jns_lap, $data);
			// }
		}else if($jns_lap == "total"){

			// if (isset($_POST['tahun']) && $_POST['tahun'] != NULL) {
			// 	$w_tahun = array('YEAR(mulai)' => $this->input->post('tahun'));
			// }

			if (isset($_POST['jenis_tugas']) && $_POST['jenis_tugas'] != NULL) {
				$w_jenis_tugas = array('jenis_tugas_id' => $this->input->post('jenis_tugas'));
			}

			if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
				$like = array(
					'jenis_tugas'=>$this->input->post('cari')
				);
			}
			$where = array_merge($w_jenis_tugas);
			$data['items'] = $this->rekap_model->data_penugasan($where,$like)->result();
            $tot = $this->rekap_model->get_list_total($where,$like)->row();
			// print_r($this->db->last_query()); die();
			// if($format == "xls" or $format=="pdf"){
			// 	$this->load->view('ppc/rekap/v_lap_'.$jns_lap.'_pdf', $data);
			// }else{
				$this->load->view('ppc/rekap/v_lap_'.$jns_lap, $data);
			// }
			}else if($jns_lap == "karyawan"){

				// if (isset($_POST['tahun']) && $_POST['tahun'] != NULL) {
				// 	$w_tahun = array('YEAR(mulai)' => $this->input->post('tahun'));
				// }
	
				// if (isset($_POST['jenis_tugas']) && $_POST['jenis_tugas'] != NULL) {
				// 	$w_sampel = array('jenis_tugas' => $this->input->post('jenis_tugas'));
				// }
	
				if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
					$like = array(
						'first_name'=>$this->input->post('cari')
					);
				}
				// $where = array_merge($w_tahun, $w_sampel);
				$data['items'] = $this->rekap_model->data_rekap_karyawan($where,$like)->result();
				$tot = $this->rekap_model->get_list_total($where,$like)->row();
				// print_r($this->db->last_query()); die();
				// if($format == "xls" or $format=="pdf"){
				// 	$this->load->view('ppc/rekap/v_lap_'.$jns_lap.'_pdf', $data);
				// }else{
					$this->load->view('ppc/rekap/v_lap_'.$jns_lap, $data);
				// }
        }
	}

    function get_dropdown_jenis_tugas() {
        $data = $this->db->query("select * from ppc_jenis_tugas where soft_delete=0");
        $list[''] = ' Semua ';
        foreach ($data->result_array() as $row) {
            $list[$row['id']] = $row['jenis_tugas'];
        }

        $data->free_result();
        return $list;
    }
}

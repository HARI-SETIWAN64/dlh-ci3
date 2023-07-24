<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('laporan/perusahaan_model', 'laporan/Laporan_model'));
		$this->load->helper(array('url','language'));
		$this->load->library(array('form_validation','pdf'));
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

		$this->template->title = 'Laporan';
		$data['menu'] = 'laporan';
		$data['sampel'] = $this->get_dropdown_sampel();
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('laporan/laporan/v_index',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function laporan_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=100000;
		$like = array();

		$format = $this->input->post('format');
		$w_tahun = array();
		$w_bulan = array();
		$w_sampel = array();

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

		if($jns_lap == "perusahaan"){
			if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
				$like = array(
					'npwp'=>$this->input->post('cari'), 
					'nama'=>$this->input->post('cari'),
					'NAMA_KEC'=>$this->input->post('cari'),
					'NAMA_KEL'=>$this->input->post('cari'),
					'nib'=>$this->input->post('cari'),
					'jenis_usaha'=>$this->input->post('cari')
				);
			}

			$data['items'] = $this->perusahaan_model->get_perusahaan_list($where,$limit,$offset,$like)->result();
			$tot = $this->perusahaan_model->get_perusahaan_list_total($where,$like)->row();
			$data['total_items'] =$tot->count;
			$data['page'] = $pagenya;
			$data['format'] = $format;
			if($format == "xls" or $format=="pdf"){
				$this->load->view('laporan/laporan/v_lap_'.$jns_lap.'_pdf', $data);
			}else{
				$this->load->view('laporan/laporan/v_lap_'.$jns_lap, $data);
			}
		}else if($jns_lap == "pendapatan_perbulan"){

			if (isset($_POST['tahun']) && $_POST['tahun'] != NULL) {
				$w_tahun = array('YEAR(pajak_retribusi.tgl_penyetoran)' => $this->input->post('tahun'));
			}

			if (isset($_POST['bulan']) && $_POST['bulan'] != NULL) {
				$w_bulan = array('MONTH(pajak_retribusi.tgl_penyetoran)' => $this->input->post('bulan'));
			}
			if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
				$like = array(
					'perusahaan.nama'=>$this->input->post('cari'), 
					'perusahaan.npwp'=>$this->input->post('cari')
				);
			}
			$w_status = array("pajak_retribusi.status_penyetoran"=>"1");
			$where = array_merge($w_tahun, $w_bulan, $w_status);
			$data['items'] = $this->Laporan_model->get_list($where,$limit,$offset,$like)->result();
			// print_r($this->db->last_query()); die();
			$tot = $this->Laporan_model->get_list_total($where,$like)->row();
			$data['total_items'] =$tot->count;
			$data['page'] = $pagenya;
			$data['format'] = $format;
			if($format == "xls" or $format=="pdf"){
				$this->load->view('laporan/laporan/v_lap_'.$jns_lap.'_pdf', $data);
			}else{
				$this->load->view('laporan/laporan/v_lap_'.$jns_lap, $data);
			}
		}else if($jns_lap == "belum_lunas"){

			if (isset($_POST['tahun']) && $_POST['tahun'] != NULL) {
				$w_tahun = array('YEAR(pajak_retribusi.tgl_terima)' => $this->input->post('tahun'));
			}

			if (isset($_POST['bulan']) && $_POST['bulan'] != NULL) {
				$w_bulan = array('MONTH(pajak_retribusi.tgl_terima)' => $this->input->post('bulan'));
			}
			if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
				$like = array(
					'perusahaan.nama'=>$this->input->post('cari'), 
					'perusahaan.npwp'=>$this->input->post('cari')
				);
			}
			$w_status = array("pajak_retribusi.status_penyetoran is null"=>null);
			$where = array_merge($w_tahun, $w_bulan, $w_status);
			$data['items'] = $this->Laporan_model->get_list_belum($where,$like)->result();
			// print_r($this->db->last_query()); die();
			if($format == "xls" or $format=="pdf"){
				$this->load->view('laporan/laporan/v_lap_'.$jns_lap.'_pdf', $data);
			}else{
				$this->load->view('laporan/laporan/v_lap_'.$jns_lap, $data);
			}
		}else if($jns_lap == "uji_perbulan"){

			if (isset($_POST['tahun']) && $_POST['tahun'] != NULL) {
				$w_tahun = array('YEAR(tanggal_penerimaan)' => $this->input->post('tahun'));
			}

			if (isset($_POST['sampel']) && $_POST['sampel'] != NULL) {
				$w_sampel = array('jenis_sampel' => $this->input->post('sampel'));
			}

			if (isset($_POST['cari']) && $_POST['cari'] != NULL) {
				$like = array(
					'nama_pelanggan'=>$this->input->post('cari')
				);
			}
			$where = array_merge($w_tahun, $w_sampel);
			$data['items'] = $this->Laporan_model->data_uji_perbulan($where,$like);
			// print_r($this->db->last_query()); die();
			if($format == "xls" or $format=="pdf"){
				$this->load->view('laporan/laporan/v_lap_'.$jns_lap.'_pdf', $data);
			}else{
				$this->load->view('laporan/laporan/v_lap_'.$jns_lap, $data);
			}
		}else if($jns_lap == "grafik_uji_perbulan"){
			$data['tahun'] = $this->input->post('tahun');
			$data['cari'] = $this->input->post('cari');
			$this->load->view('laporan/laporan/v_lap_'.$jns_lap, $data);
		}else if($jns_lap == "grafik_parameter"){
			$data['tahun'] = $this->input->post('tahun');
			$data['bulan'] = $this->input->post('bulan');
			$data['cari'] = $this->input->post('cari');
			$this->load->view('laporan/laporan/v_lap_'.$jns_lap, $data);
		}
	}


    public function data_grafik_uji_perbulan()
    {
		$like=array();
		$w_tahun=array();
		if ($this->input->post('filter_tahun') && $this->input->post('filter_tahun') != NULL) {
			$w_tahun = array('YEAR(tanggal_penerimaan)' => $this->input->post('filter_tahun'));
		}

		if ($this->input->post('filter_cari') && $this->input->post('filter_cari') != NULL) {
			$like = array(
				'nama_pelanggan'=>$this->input->post('filter_cari')
			);
		}

		$where = array_merge($w_tahun);
        // print_r($like); die();
        $grafik = $this->Laporan_model->data_grafik_uji_perbulan($where, $like);
        // print_r($this->db->last_query()); die();
        echo json_encode($grafik);
    }


    public function data_grafik_parameter()
    {
		$like=array();
		$w_tahun=array();
		$w_bulan=array();
		if ($this->input->post('filter_tahun') && $this->input->post('filter_tahun') != NULL) {
			$w_tahun = array('YEAR(tanggal_penerimaan)' => $this->input->post('filter_tahun'));
		}
		if ($this->input->post('filter_bulan') && $this->input->post('filter_bulan') != NULL) {
			$w_bulan = array('MONTH(tanggal_penerimaan)' => $this->input->post('filter_bulan'));
		}

		if ($this->input->post('filter_cari') && $this->input->post('filter_cari') != NULL) {
			$like = array(
				'master_parameter.parameter'=>$this->input->post('filter_cari')
			);
		}

		$where = array_merge($w_tahun,$w_bulan);
        // print_r($like); die();
        $grafik = $this->Laporan_model->data_grafik_parameter($where, $like);
        // print_r($this->db->last_query()); die();
        // print_r($grafik); die();
        echo json_encode($grafik);
    }

    function get_dropdown_perusahaan() {
        $data = $this->db->query("select * from master_perusahaan where tampil=1 order by nama");

        $list[''] = ' Semua ';
        foreach ($data->result_array() as $row) {
            $list[$row['id']] = "[".$row['npwp']."] ".$row['nama'];
        }

        $data->free_result();
        return $list;
    }

    function get_dropdown_sampel() {
        $data = $this->db->query("select * from master_jenis_sampel where soft_delete=0 order by nama");

        $list[''] = ' Semua ';
        foreach ($data->result_array() as $row) {
            $list[$row['kode']] = "[".$row['kode']."] ".$row['nama'];
        }

        $data->free_result();
        return $list;
    }

}

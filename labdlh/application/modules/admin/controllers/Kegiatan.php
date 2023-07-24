<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kegiatan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->template->set_template('template/admin');
		$this->load->library('form_validation');
		$this->load->model(array('home/home_model','admin/admin_model','admin/sikd_model_2018','admin/sikd_model_2017'));
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');
		if (!$this->ion_auth->logged_in())
        {
            $this->session->set_flashdata('message', 'Anda Harus login');        		
			echo "<script> window.location='".base_url()."'</script> ";			
        }	
	}	
	function index()
	{
		$unit = $this->fungsi->id_unit();
		if($this->ion_auth->in_group(array('admin')))
		{
			$data['skpd'] = $this->home_model->get_active_opd();	
		}
		else
		{
			$data['skpd'] = $this->home_model->get_opd_select($unit);	
		}	
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->template->title = 'Dashboard';
		$data['menu'] = 'impor_kgtn';
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('kegiatan/v_index',  isset($data) ? $data : NULL);
		$this->template->publish();	
	}
	public function kgtn_list($tahun = false,$skpd = false)
	{	
		$like = array();
		$where = array();	
		$offset = '0';
		$limit = 200;	
		$page = '1';
		
			
			if (isset($_POST['id_skdp']) && $_POST['id_skdp'] != NULL) {
				$where = array('dpa_skpd.sikd_skpd_id'=>$_POST['id_skdp']);
			}			
			if (isset($_POST['page']) && $_POST['page'] != NULL) {
				$page = $_POST['page'];
				$pageof = $_POST['page']-1;
				$offset = $pageof * $limit;
			}		
			if (isset($_POST['limit']) && $_POST['limit'] != NULL) {
				$limit = $_POST['limit'];
			}			
								
			$data['page'] = $page;
			$data['limit'] = $limit;	
			if($tahun == '2017')
			{				
				$data['item'] = $this->sikd_model_2017->kgtn_dpa_2017($skpd,$limit,$offset)->result();			
				$data['total_items'] = $this->sikd_model_2017->kgtn_dpa_2017($skpd,$limit,$offset)->num_rows();	
			}
			else if($tahun == '2018')
			{
				$data['item'] = $this->sikd_model_2018->kgtn_dpa_2018($skpd,$limit,$offset)->result();			
				$data['total_items'] = $this->sikd_model_2018->kgtn_dpa_2018($skpd,$limit,$offset)->num_rows();	
			}						
			$this->load->view('admin/kegiatan/v_kgtn_list',$data);		
	}
	function dftr_kgtn()
	{
		$unit = $this->fungsi->id_unit();
		if($this->ion_auth->in_group(array('admin')))
		{
			$data['skpd'] = $this->home_model->get_active_opd();	
		}
		else
		{
			$data['skpd'] = $this->home_model->get_opd_select($unit);	
		}
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->template->title = 'Daftar Kegiatan DPA';
		$data['menu'] = 'dftr_kgtn';
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('kegiatan/v_dftr_kgtn',  isset($data) ? $data : NULL);
		$this->template->publish();	
	}
	public function dftr_kgtn_list()
	{	
		$unit = $this->fungsi->id_unit();		
		$like = array();
		$where = array();	
		$offset = '0';
		$limit = 200;	
		$page = '1';
		$unit_pil = array('a.SKPD',$unit);
		$tahun_pil = array();	
		$skpd_pil = array();		
			
			$unit_pil = array('a.SKPD'=>$unit);
			
			if (isset($_POST['tahunkode']) && $_POST['tahunkode'] != NULL) {
				$tahun_pil = array('a.TAHUN'=>$_POST['tahunkode']);
			}	
			if (isset($_POST['skpdkode']) && $_POST['skpdkode'] != NULL) {
				$skpd_pil = array('a.SKPD'=>$_POST['skpdkode']);
			}	
			if (isset($_POST['page']) && $_POST['page'] != NULL) {
				$page = $_POST['page'];
				$pageof = $_POST['page']-1;
				$offset = $pageof * $limit;
			}		
			if (isset($_POST['limit']) && $_POST['limit'] != NULL) {
				$limit = $_POST['limit'];
			}			
								
			$data['page'] = $page;
			$data['limit'] = $limit;	
			
			if($this->ion_auth->in_group(array('admin')))
			{		
				$where = array_merge($skpd_pil,$tahun_pil);		
				$data['item'] = $this->admin_model->kgtn_dpa_emskab_list($where,$like,$limit,$offset)->result();			
				$data['total_items'] = $this->admin_model->kgtn_dpa_emskab_list($where,$like,$limit,$offset)->num_rows();	
			}	
			else
			{
				$where = array_merge($unit_pil,$tahun_pil);
				$data['item'] = $this->admin_model->kgtn_dpa_emskab_list($where,$like,$limit,$offset)->result();			
				$data['total_items'] = $this->admin_model->kgtn_dpa_emskab_list($where,$like,$limit,$offset)->num_rows();	
			}								
			$this->load->view('admin/kegiatan/v_dftr_kgtn_list',$data);		
	}
	function detail_kgtn($skpd,$dpa,$kgtn,$id,$tahun)
	{		
		$unit = $this->fungsi->id_unit();
		$data['thnpil'] = $tahun;
		$data['dpapil'] = $dpa;
		$data['kgtnpil'] = $kgtn;
		$data['idpil'] = $id;		
		if($tahun == '2017')	
		{
			if($this->ion_auth->in_group(array('admin')))
			{			
				if ($id)
				{
					$data['noted'] = $this->sikd_model_2017->get_kode_dpakgtn($dpa)->row();	
					$data['skpdpil'] = $skpd;
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$skpd."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_0 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();	
					$data['foto50'] = $this->db->query("SELECT * FROM emskab_img_50 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();
					$data['foto100'] = $this->db->query("SELECT * FROM emskab_img_100 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();
				}		
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}									
			}	
			else
			{		
				if ($id)
				{
					$data['skpdpil'] = $unit;		
					$data['noted'] = $this->sikd_model_2017->get_kode_dpakgtn($dpa)->row();	
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$unit."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_0 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();	
					$data['foto50'] = $this->db->query("SELECT * FROM emskab_img_50 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();
					$data['foto100'] = $this->db->query("SELECT * FROM emskab_img_100 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();
				}
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}	
					
			}	
		}
		else if($tahun == '2018')	
		{
			if($this->ion_auth->in_group(array('admin')))
			{						
				if ($id)
				{
					$data['skpdpil'] = $skpd;
					$data['noted'] = $this->sikd_model_2018->get_kode_dpakgtn($dpa)->row();
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$skpd."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_0 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();	
					$data['foto50'] = $this->db->query("SELECT * FROM emskab_img_50 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();
					$data['foto100'] = $this->db->query("SELECT * FROM emskab_img_100 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();
				}	
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}																			
			}	
			else
			{			
				if ($id)
				{
					$data['skpdpil'] = $unit;	
					$data['noted'] = $this->sikd_model_2018->get_kode_dpakgtn($dpa)->row();
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$unit."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_0 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();	
					$data['foto50'] = $this->db->query("SELECT * FROM emskab_img_50 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();
					$data['foto100'] = $this->db->query("SELECT * FROM emskab_img_100 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();
				}
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}							
			}
		}	
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->template->title = 'Dashboard';
		$data['menu'] = 'dftr_kgtn';
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('kegiatan/v_kgtn_detail',  isset($data) ? $data : NULL);
		$this->template->publish();	
	}	
	function detail_kgtn_nol($skpd,$dpa,$kgtn,$id,$tahun)
	{
		$unit = $this->fungsi->id_unit();
		$data['thnpil'] = $tahun;	
		$data['thnpil'] = $tahun;
		$data['dpapil'] = $dpa;
		$data['kgtnpil'] = $kgtn;
		$data['idpil'] = $id;		
		if($tahun == '2017')	
		{
			if($this->ion_auth->in_group(array('admin')))
			{			
				if ($id)
				{
					$data['noted'] = $this->sikd_model_2017->get_kode_dpakgtn($dpa)->row();	
					$data['skpdpil'] = $skpd;
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$skpd."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_0 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();					
				}		
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}									
			}	
			else
			{		
				if ($id)
				{
					$data['skpdpil'] = $unit;		
					$data['noted'] = $this->sikd_model_2017->get_kode_dpakgtn($dpa)->row();	
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$unit."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_0 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();						
				}
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}	
					
			}	
		}
		else if($tahun == '2018')	
		{
			if($this->ion_auth->in_group(array('admin')))
			{						
				if ($id)
				{
					$data['skpdpil'] = $skpd;
					$data['noted'] = $this->sikd_model_2018->get_kode_dpakgtn($dpa)->row();
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$skpd."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_0 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();			
				}	
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}																			
			}	
			else
			{			
				if ($id)
				{
					$data['skpdpil'] = $unit;	
					$data['noted'] = $this->sikd_model_2018->get_kode_dpakgtn($dpa)->row();
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$unit."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_0 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();						
				}
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}							
			}
		}	
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');	
		$this->load->view('kegiatan/v_kgtn_detail_nol',  isset($data) ? $data : NULL);		
	}
	function detail_kgtn_lima($skpd,$dpa,$kgtn,$id,$tahun)
	{
		$unit = $this->fungsi->id_unit();
		$data['thnpil'] = $tahun;	
		$data['thnpil'] = $tahun;
		$data['dpapil'] = $dpa;
		$data['kgtnpil'] = $kgtn;
		$data['idpil'] = $id;		
		if($tahun == '2017')	
		{
			if($this->ion_auth->in_group(array('admin')))
			{			
				if ($id)
				{
					$data['noted'] = $this->sikd_model_2017->get_kode_dpakgtn($dpa)->row();	
					$data['skpdpil'] = $skpd;
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$skpd."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_50 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();					
				}		
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}									
			}	
			else
			{		
				if ($id)
				{
					$data['skpdpil'] = $unit;		
					$data['noted'] = $this->sikd_model_2017->get_kode_dpakgtn($dpa)->row();	
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$unit."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_50 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();						
				}
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}	
					
			}	
		}
		else if($tahun == '2018')	
		{
			if($this->ion_auth->in_group(array('admin')))
			{						
				if ($id)
				{
					$data['skpdpil'] = $skpd;
					$data['noted'] = $this->sikd_model_2018->get_kode_dpakgtn($dpa)->row();
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$skpd."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_50 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$skpd."'")->result();			
				}	
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}																			
			}	
			else
			{			
				if ($id)
				{
					$data['skpdpil'] = $unit;	
					$data['noted'] = $this->sikd_model_2018->get_kode_dpakgtn($dpa)->row();
					$data['upload'] = $this->db->query("SELECT * FROM emskab_kgtn WHERE ID = '".$id."' AND SKPD = '".$unit."'")->row();		
					$data['foto0'] = $this->db->query("SELECT * FROM emskab_img_50 WHERE ID_EMSKGTN = '".$id."' AND STATUS = '1' AND SKPD = '".$unit."'")->result();						
				}
				else
				{			
					$data['upload'] = $this->admin_model->get_field_table('emskab_kgtn');		
				}							
			}
		}	
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');	
		$this->load->view('kegiatan/v_kgtn_detail_lima',  isset($data) ? $data : NULL);		
	}
	function form_impor($tahun = false,$kode=false,$skpd=false)
	{	
		$unit = $this->fungsi->id_unit();
		$data['tahunpil'] = $tahun;	
		$data['iddpa'] = $kode;		
		if($tahun == '2017')	
		{
			if($this->ion_auth->in_group(array('admin')))
			{			
					$data['noted'] = $this->sikd_model_2017->get_kode_dpakgtn($kode)->row();	
					$data['skpdpil'] = $skpd;							
			}	
			else
			{		
					$data['skpdpil'] = $unit;		
					$data['noted'] = $this->sikd_model_2017->get_kode_dpakgtn($kode)->row();	
			}	
		}
		else if($tahun == '2018')	
		{
			if($this->ion_auth->in_group(array('admin')))
			{			
					$data['skpdpil'] = $skpd;
					$data['noted'] = $this->sikd_model_2018->get_kode_dpakgtn($kode)->row();																			
			}	
			else
			{			
					$data['skpdpil'] = $unit;	
					$data['noted'] = $this->sikd_model_2018->get_kode_dpakgtn($kode)->row();
			}
		}									
		$this->load->view('admin/kegiatan/v_form_impor', isset($data) ? $data : NULL);		
	}
	public function save_impor()
    {
		$unit = $this->fungsi->id_unit();	
		$this->form_validation->set_rules('KD_KGTN', 'Kegiatan Unit', 'required');
		$this->form_validation->set_rules('KD_DPA', 'DPA', 'required');
		$this->form_validation->set_rules('SKPD', 'Nama SKPD', 'required');
		$this->form_validation->set_rules('TAHUN', 'Tahun', 'required');
		
		if($this->form_validation->run() == FALSE) 
		{
			$this->data['status'] = 'error';
			$this->data['message'] = validation_errors();	
			echo json_encode($this->data);	
		}
		else {
			$kirim = array
			(
			'KD_KGTN' => $this->input->post('KD_KGTN'),	
			'KD_DPA' => $this->input->post('KD_DPA'),
			'SKPD' => $this->input->post('SKPD'),
			'TAHUN' => $this->input->post('TAHUN'),					
			);					
		
			/*if($kode)
			{
				$kirim['UPDATED'] = date('Y-m-d H:i:s',strtotime('NOW'));		
				$kirim['UPDATED_BY'] = $unit;		
				$this->db->update('emskab_kgtn',$kirim,array('ID'=>$kode));
				$this->data['message'] = 'Data berhasil diubah.';
				$this->data['id'] = $kode;
			}
			else{*/	
				$kirim['CREATED'] = date('Y-m-d H:i:s',strtotime('NOW'));		
				$kirim['CREATED_BY'] = $unit;
				$this->db->insert('emskab_kgtn',$kirim);	
				$this->data['message'] = 'Data berhasil disimpan.';
				$this->data['id'] = $this->db->insert_id();
			//}
			$this->data['status'] = 'success';
			echo json_encode($this->data);
		}		
    }
	function form_fotoxx($kgtn=false,$skpd=false,$tahun=false,$kode=false)
	{	
	
			
			
		$offset = 0;
		$limit = 1;	
		$like = '';
		$where = array();
		$unit = $this->fungsi->id_unit();
		$data['tahunpil'] = $tahun;	
		$data['emskabid'] = $kgtn;	
		$data['skpdpil'] = $skpd;	
		$data['kode'] = $kode;	
		$arr_kgtn = array('a.ID_EMSKGTN' => $kgtn);
		$arr_skpd = array('a.SKPD' => $skpd);
		$arr_kode = array('a.ID' => $kode);
		$arr_tahun = array('a.TAHUN' => $tahun);
			if($this->ion_auth->in_group(array('admin')))
			{			
				if($kode)
				{					
					$where = array_merge($arr_kgtn,$arr_skpd,$arr_kode,$arr_tahun);
					$data['noted'] = $this->admin_model->emskab_img0_list($where,$like,$limit,$offset)->row();				
				}
				else
				{
					$data['skpdpil'] = $skpd;		
					$data['noted'] = $this->admin_model->get_field_table('emskab_img_0');
				}												
			}	
			else
			{		
				if($kode)
				{
					$where = array_merge($arr_kgtn,$arr_skpd,$arr_kode,$arr_tahun);
					$data['noted'] = $this->admin_model->emskab_img0_list($where,$like,$limit,$offset)->row();	
				}
				else
				{
					$data['skpdpil'] = $unit;		
					$data['noted'] = $this->admin_model->get_field_table('emskab_img_0');	
				}						
			}	
									
		$this->load->view('admin/kegiatan/v_upload', isset($data) ? $data : NULL);		
	}
	
	function form_foto($skpd,$dpa,$kgtn,$kode,$tahun)
	{				
	
			$this->form_validation->set_rules('ID_EMSKGTN', 'Kegiatan', 'required');
			$this->form_validation->set_rules('SKPD', 'SKPD', 'required');
			$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');		
		$offset = 0;
		$limit = 1;	
		$like = '';
		$where = array();
		$unit = $this->fungsi->id_unit();
		
		
	
	
	
		
		$data['thnpil'] = $tahun;
		$data['dpapil'] = $dpa;
		$data['kgtnpil'] = $kgtn;
		$data['idpil'] = $kode;	
	
			


			


			if ($this->form_validation->run() === FALSE)
			{


				if($this->ion_auth->in_group(array('admin')))
			{			
				
					$data['skpdpil'] = $skpd;		
					$data['noted'] = $this->admin_model->get_field_table('emskab_img_0');
															
			}	
			else
			{		
				
					$data['skpdpil'] = $unit;		
					$data['noted'] = $this->admin_model->get_field_table('emskab_img_0');	
									
			}	




				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->template->title = 'Form konten';
				$data['menu'] = 'dftr_kgtn';
				$this->template->description = '';
				$this->template->meta->add('keyword', '');
				$this->template->content->view('kegiatan/v_form',  isset($data) ? $data : NULL);
				$this->template->publish();

			}else{

				$this->_file_upload();
				$datas=$this->upload->data();
				$images = $datas['file_name'];



				$datapost = array
					(				
					
					'ID_EMSKGTN' => $this->input->post('ID_EMSKGTN'),
					'SKPD' => $this->input->post('SKPD'),
					'TAHUN' => $this->input->post('TAHUN'),		
					'STATUS' => '1',					
					);




					$datapost['images']=$images;

					


					$this->db->insert('emskab_img_0',$datapost);
				

				redirect('admin/kegiatan/detail_kgtn/'.$skpd.'/'.$dpa.'/'.$kgtn.'/'.$kode.'/'.$tahun,'refresh');


			}

	}
	function form_foto2($skpd,$dpa,$kgtn,$kode,$tahun)
	{				
	
			$this->form_validation->set_rules('ID_EMSKGTN', 'Kegiatan', 'required');
			$this->form_validation->set_rules('SKPD', 'SKPD', 'required');
			$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');		
		$offset = 0;
		$limit = 1;	
		$like = '';
		$where = array();
		$unit = $this->fungsi->id_unit();
		
		
	
	
	
		
		$data['thnpil'] = $tahun;
		$data['dpapil'] = $dpa;
		$data['kgtnpil'] = $kgtn;
		$data['idpil'] = $kode;	
	
			


			


			if ($this->form_validation->run() === FALSE)
			{


				if($this->ion_auth->in_group(array('admin')))
			{			
				
					$data['skpdpil'] = $skpd;		
					$data['noted'] = $this->admin_model->get_field_table('emskab_img_50');
															
			}	
			else
			{		
				
					$data['skpdpil'] = $unit;		
					$data['noted'] = $this->admin_model->get_field_table('emskab_img_50');	
									
			}	




				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->template->title = 'Form konten';
				$data['menu'] = 'dftr_kgtn';
				$this->template->description = '';
				$this->template->meta->add('keyword', '');
				$this->template->content->view('kegiatan/v_form_lima',  isset($data) ? $data : NULL);
				$this->template->publish();

			}else{

				$this->_file_upload();
				$datas=$this->upload->data();
				$images = $datas['file_name'];



				$datapost = array
					(				
					
					'ID_EMSKGTN' => $this->input->post('ID_EMSKGTN'),
					'SKPD' => $this->input->post('SKPD'),
					'TAHUN' => $this->input->post('TAHUN'),		
					'STATUS' => '1',					
					);




					$datapost['images']=$images;

					


					$this->db->insert('emskab_img_50',$datapost);
				

				redirect('admin/kegiatan/detail_kgtn/'.$skpd.'/'.$dpa.'/'.$kgtn.'/'.$kode.'/'.$tahun,'refresh');


			}

	}
	function form_foto3($skpd,$dpa,$kgtn,$kode,$tahun)
	{				
	
			$this->form_validation->set_rules('ID_EMSKGTN', 'Kegiatan', 'required');
			$this->form_validation->set_rules('SKPD', 'SKPD', 'required');
			$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');		
		$offset = 0;
		$limit = 1;	
		$like = '';
		$where = array();
		$unit = $this->fungsi->id_unit();
		
		
	
	
	
		
		$data['thnpil'] = $tahun;
		$data['dpapil'] = $dpa;
		$data['kgtnpil'] = $kgtn;
		$data['idpil'] = $kode;	
	
			


			


			if ($this->form_validation->run() === FALSE)
			{


				if($this->ion_auth->in_group(array('admin')))
			{			
				
					$data['skpdpil'] = $skpd;		
					$data['noted'] = $this->admin_model->get_field_table('emskab_img_100');
															
			}	
			else
			{		
				
					$data['skpdpil'] = $unit;		
					$data['noted'] = $this->admin_model->get_field_table('emskab_img_100');	
									
			}	




				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->template->title = 'Form konten';
				$data['menu'] = 'dftr_kgtn';
				$this->template->description = '';
				$this->template->meta->add('keyword', '');
				$this->template->content->view('kegiatan/v_form_seratus',  isset($data) ? $data : NULL);
				$this->template->publish();

			}else{

				$this->_file_upload();
				$datas=$this->upload->data();
				$images = $datas['file_name'];



				$datapost = array
					(				
					
					'ID_EMSKGTN' => $this->input->post('ID_EMSKGTN'),
					'SKPD' => $this->input->post('SKPD'),
					'TAHUN' => $this->input->post('TAHUN'),		
					'STATUS' => '1',					
					);




					$datapost['images']=$images;

					


					$this->db->insert('emskab_img_100',$datapost);
				

				redirect('admin/kegiatan/detail_kgtn/'.$skpd.'/'.$dpa.'/'.$kgtn.'/'.$kode.'/'.$tahun,'refresh');


			}

	}
	public function _file_upload()
   {

		   //Create location if it does not exist
			$upload_path = FCPATH . 'images/emsfoto';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['upload_path'] = $upload_path;
			$config["extension_tolower"] = TRUE;

			$config['encrypt_name'] = true;
			$config['remove_spaces'] = true;
			//$config['create_thumb'] = TRUE;
			$config['max_size'] = '80000'; //Should be defined in Kilobytes

			$this->load->library('upload', $config);


			if (!$this->upload->do_upload('file')){
				$errors=$this->upload->display_errors();
				$this->session->set_flashdata('message', $this->upload->display_errors());
				//return false;
			}else{


			$image_data = $this->upload->data();
				//rizise lib

			$configb = array(
			'source_image' => $image_data['full_path'],
		    'new_image' => FCPATH .  'images/emsfoto/thumb',
			'maintain_ration' => true,
			'width' => 100,
			'height' => 72,);

			$this->load->library('image_lib', $configb);
			$this->image_lib->initialize($configb);
			$this->image_lib->resize();
			$this->image_lib->clear();

			$configa = array(
			'source_image' => $image_data['full_path'],
		    'new_image' => FCPATH .  'images/emsfoto',
			'maintain_ration' => true,
			'width' => 400,
			'height' => 268,);

			$this->load->library('image_lib', $configa);
			$this->image_lib->initialize($configa);
			$this->image_lib->resize();
			$this->image_lib->clear();

// $this->session->set_flashdata('message', $this->upload->display_errors());
			//	return true;
			}

		}	
	public function save_form_foto()
    {
		$unit = $this->fungsi->id_unit();	
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('file','Image','callback__file_upload');		
		
		if($this->form_validation->run() == FALSE) 
		{
				$data['error'] ='';			
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');	
			$this->data['error'] ='';			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['status'] = 'error';
			$this->data['message'] = validation_errors();	
			echo json_encode($this->data);	
		}
		else {
			
				$data=$this->upload->data();	   
				$image_data = $this->upload->data();
						
				$config['image_library'] = 'gd2';
				$config['source_image'] =  $image_data['full_path'];
				$config['new_image'] = FCPATH . 'images/emsfoto/thumb';
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 314;
				$config['height'] = 235;					

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$this->image_lib->clear();
						
				 $configa['image_library'] = 'gd2';
				 $configa['source_image'] =  $image_data['full_path'];
				 $configa['new_image'] = FCPATH . 'images/emsfoto/resize';
				 $configa['maintain_ratio'] = TRUE;
				 $configa['width'] = 1024;
				 $configa['height'] = 768;							

				$this->load->library('image_lib', $configa);
				$this->image_lib->initialize($configa);
				$this->image_lib->resize();
				$this->image_lib->clear();		

				$datapost['images'] = $data['file_name']; 	

				
				
				
				$datapost = array
					(				
					
					'ID_EMSKGTN' => $this->input->post('ID_EMSKGTN'),
					'SKPD' => $this->input->post('SKPD'),
					'TAHUN' => $this->input->post('TAHUN'),		
					'STATUS' => '1',					
					);
			
				
				
				$this->db->insert('emskab_img_0',$datapost);
				$this->data['message'] = 'Data berhasil disimpan.';
				$this->data['ID'] = $this->db->insert_id();
			
			$this->data['status'] = 'success';
			echo json_encode($this->data);
		}		
    }
	
	
	
}?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detail_alat extends CI_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->data = null;

		$this->template->set_template('template/admin');
		$this->load->model(array('cmdo/detail_alat_model', 'cmdo/admin_model', 'internal/karyawan_model', 'cmdo/spek_alat_model'));
		$this->load->library(array('ion_auth','form_validation','pdf'));
		$this->load->helper(array('url','language','file'));
		$this->lang->load('auth');
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['alat']= $this->admin_model->get_alat_list();	
		$this->data['spek']= $this->admin_model->get_spek_list();	
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
		$this->data['alat']= $this->admin_model->get_alat_list();
		$this->data['spek']= $this->admin_model->get_spek_list();
		$this->template->title = 'Detail Alat';
		$data['menu'] = 'detail_alat';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('detail_alat/v_detail_alat',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function detail_alat_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('nama_alat'=>$this->input->post('nama'),'provider'=>$this->input->post('nama'),'noseri'=>$this->input->post('nama'),'nextcal'=>$this->input->post('nama'));
		}


		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->detail_alat_model->get_list($where,$limit,$offset,$like)->result();
		// print_r($this->db->last_query()); die();
		$tot = $this->detail_alat_model->get_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('detail_alat/v_detail_alat_list', $data);
		$this->data['alat']= $this->admin_model->get_alat_list();
		$this->data['spek']= $this->admin_model->get_spek_list();	
	}

	public function form($id="") {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/detail_alat/form'));
		}
		
		$this->form_validation->set_rules('id_alat', 'Nama Alat', 'required|xss_clean');
		$this->form_validation->set_rules('id_spek', 'Kode Alat', 'required|xss_clean');
		$this->form_validation->set_rules('brand', 'Brand', 'required|xss_clean');
		$this->form_validation->set_rules('model', 'Model', 'required|xss_clean');
		$this->form_validation->set_rules('noseri','Noseri', 'required|xss_clean');
		$this->form_validation->set_rules('tolerance', 'Tolerance', 'required|xss_clean');
		$this->form_validation->set_rules('daya', 'Daya','required|xss_clean');
		$this->form_validation->set_rules('titikkalibrasi','Titikkalibrasi', 'required|xss_clean');
		$this->form_validation->set_rules('usagerange', 'Usagerange', 'required|xss_clean');
		$this->form_validation->set_rules('resolusion', 'Resolusion', 'required|xss_clean');
		$this->form_validation->set_rules('periode', 'Periode', 'required|xss_clean');
		$this->form_validation->set_rules('provider', 'Provider', 'required|xss_clean');
		$this->form_validation->set_rules('lastcal', 'Lastcal', 'required|xss_clean');
		$this->form_validation->set_rules('nextcal', 'Nextcal', 'required|xss_clean');
		$this->form_validation->set_rules('user_id', 'User_id', 'required|xss_clean');
		
		$userid = $this->session->userdata('brand');
		$data['brand'] = $this->ion_auth->user($this->session->userdata('brand'))->row();


		$data['item']=$this->db->query('select * from detail_alat where id_detail = "'.$id.'"')->row();
		$data['items']=$this->db->query('select * from detail_alat 
		INNER JOIN alat ON detail_alat.id_alat = alat.id_alat
		INNER JOIN spek_alat ON detail_alat.id_spek = spek_alat.id_spek
		INNER JOIN users ON detail_alat.user_id = users.id
		where id_detail = "'.$id.'"')->result();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		$data['alat']= $this->admin_model->get_alat_list();
		$data['spek']= $this->admin_model->get_spek_list();
		$data['pegawai'] = $this->karyawan_model->dropdown_pegawai();

		$this->template->title = 'Form Detail Alat';
		$data['menu'] = 'detail_alat';
		$data['id_detail'] = $id;
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('detail_alat/v_form_detail_alat', $data);
		$this->template->publish();
	}
		
	public function simpan_form($id=false) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login?continue=' . urlencode(base_url() . 'cmdo/detail_alat/form'));
		}

		
		if($id){
			$file=$this->db->query('select * from detail_alat where id_detail = "'.$id.'"')->row("file");
			if($_FILES["file"]["name"]<>""){
				if($file <> "" or $file<>null){
					unlink(FCPATH . 'file/cmdo/'.$file); 
				}
				
				$upload_path = FCPATH . 'file/cmdo/';
				$config['allowed_types'] = 'jpg|png|jpeg|mp4|doc|docx|pdf|pptx|csv|xlsx|xls|heic';
				$config['upload_path'] = $upload_path;
				$config['file_name'] = $_FILES["file"]["name"];
				$config['encrypt_name'] = false;
				$config['remove_spaces'] = true;
				$config['create_thumb'] = true;
				$config['max_size'] = '50000';
				$config['overwrite'] = true;

				// print_r($upload_path);die();

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
					$this->form_validation->set_message(__FUNCTION__, $this->upload->display_errors('', ''));
				} else {
					$file = $this->upload->data();
					$_POST['upload_file'] = $this->input->post('file_lama');
				}
				$nama_file = $this->upload->data("file_name");
			}else{
				$nama_file = $file;
			}

			$kirim=array
			(
				'daya' => $this->input->post('daya'),
				'titikkalibrasi' => $this->input->post('titikkalibrasi'),
				'satuan_rentang' => $this->input->post('satuan_rentang'),
				'satuan_resolusi' => $this->input->post('satuan_resolusi'),
				'satuan_toleransi' => $this->input->post('satuan_toleransi'),
				'satuan_periode' => $this->input->post('satuan_periode'),
				'satuan_daya' => $this->input->post('satuan_daya'),
				'usagerange' => $this->input->post('usagerange'),
				'kelas' => $this->input->post('kelas'),
				'resolusion' => $this->input->post('resolusion'),
				'tolerance' => $this->input->post('tolerance'),
				'periode' => $this->input->post('periode'),
				'provider' => $this->input->post('provider'),
				'lastcal' => $this->input->post('lastcal'),
				'nextcal' => $this->input->post('nextcal'),
				'file' => $nama_file,
				'user_id' => $this->input->post('user_id'),
				'update_by' => $this->session->userdata('user_id'),
				'date_update' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->update('detail_alat',$kirim,array('id_detail'=>$id));
		}
		else{
			if($_FILES["file"]["name"]<>""){				
				$upload_path = FCPATH . 'file/cmdo/';
				$config['allowed_types'] = 'jpg|png|jpeg|mp4|doc|docx|pdf|pptx|csv|xlsx|xls';
				$config['upload_path'] = $upload_path;
				$config['file_name'] = date("Ymdhis")."-".rand(1,100);
				$config['encrypt_name'] = false;
				$config['remove_spaces'] = true;
				$config['create_thumb'] = true;
				$config['max_size'] = '50000';
				$config['overwrite'] = true;

				// print_r($upload_path);die();

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
					$this->form_validation->set_message(__FUNCTION__, $this->upload->display_errors('', ''));
				}
				 else {
					$file = $this->upload->data();
					$_POST['upload_file'] = $this->input->post('file_lama');
				}
				$nama_file = $this->upload->data("file_name");
			}else{
				$nama_file = null;
			}

			$kirim=array
			(
				'id_alat' => $this->input->post('id_alat'),
	 			'id_spek' => $this->input->post('id_spek'),
				'daya' => $this->input->post('daya'),
				'titikkalibrasi' => $this->input->post('titikkalibrasi'),
				'satuan_rentang' => $this->input->post('satuan_rentang'),
				'satuan_resolusi' => $this->input->post('satuan_resolusi'),
				'satuan_toleransi' => $this->input->post('satuan_toleransi'),
				'satuan_periode' => $this->input->post('satuan_periode'),
				'satuan_daya' => $this->input->post('satuan_daya'),
				'usagerange' => $this->input->post('usagerange'),
				'kelas' => $this->input->post('kelas'),
				'resolusion' => $this->input->post('resolusion'),
				'tolerance' => $this->input->post('tolerance'),
				'periode' => $this->input->post('periode'),
				'provider' => $this->input->post('provider'),
				'lastcal' => $this->input->post('lastcal'),
				'nextcal' => $this->input->post('nextcal'),
				'file' => $nama_file,
				'user_id' => $this->input->post('user_id'),
				'create_by' => $this->session->userdata('user_id'),
				'date_create' => date('Y-m-d H:i:s',strtotime('NOW')),
			);
			$this->db->insert('detail_alat',$kirim);
		}
		// print_r($this->db->last_query());die();
		redirect('cmdo/detail_alat','refresh');
	}


    function ubah($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/detail_alat/ubah'));
		}

		$this->form_validation->set_rules('id_alat', 'Nama Alat', '');
		$this->form_validation->set_rules('id_spek', 'Kode Alat', '');
		$this->form_validation->set_rules('model','Model', 'required|xss_clean');
		$this->form_validation->set_rules('no_urut_dokumen','No Urut', 'required|xss_clean');

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['model'] = $this->ion_auth->user($this->session->userdata('model'))->row();
		$data['id_detail'] = $this->ion_auth->user($this->session->userdata('id_detail'))->row();
		$data['pegawai'] = $this->karyawan_model->dropdown_pegawai();

		$data['items']=$this->db->query('select * from detail_alat 
		INNER JOIN alat ON detail_alat.id_alat = alat.id_alat
		INNER JOIN spek_alat ON detail_alat.id_spek = spek_alat.id_spek
		INNER JOIN users ON detail_alat.user_id = users.id
		where id_detail = "'.$id.'"')->result();

		$config['upload_path']          = './file/cmdo/';
        $config['allowed_types']        = 'jpg|png|jpeg|mp4|doc|docx|pdf|pptx|csv|xlxs|xlx';
        $config['max_size']             = 50000;
        $config['max_width']            = 1024;
    	$config['max_height']           = 768;

        $this->load->library('upload', $config);

		 if (! $this->upload->do_upload('userfile'))
            {
               $kirim=array
				(
				'daya' => $this->input->post('daya'),
				'titikkalibrasi' => $this->input->post('titikkalibrasi'),
				'satuan_rentang' => $this->input->post('satuan_rentang'),
				'satuan_resolusi' => $this->input->post('satuan_resolusi'),
				'satuan_toleransi' => $this->input->post('satuan_toleransi'),
				'satuan_periode' => $this->input->post('satuan_periode'),
				'satuan_daya' => $this->input->post('satuan_daya'),
				'usagerange' => $this->input->post('usagerange'),
				'kelas' => $this->input->post('kelas'),
				'resolusion' => $this->input->post('resolusion'),
				'tolerance' => $this->input->post('tolerance'),
				'periode' => $this->input->post('periode'),
				'provider' => $this->input->post('provider'),
				'lastcal' => $this->input->post('lastcal'),
				'nextcal' => $this->input->post('nextcal'),
				'user_id' => $this->input->post('user_id'),
				);
            }
			else
                {
                    $file = $this->upload->data();
					$file = $file['file_name'];
					
					$kirim=array
					(		
					'daya' => $this->input->post('daya'),
					'titikkalibrasi' => $this->input->post('titikkalibrasi'),
					'satuan_rentang' => $this->input->post('satuan_rentang'),
					'satuan_resolusi' => $this->input->post('satuan_resolusi'),
					'satuan_toleransi' => $this->input->post('satuan_toleransi'),
					'satuan_periode' => $this->input->post('satuan_periode'),
					'satuan_daya' => $this->input->post('satuan_daya'),
					'usagerange' => $this->input->post('usagerange'),
					'kelas' => $this->input->post('kelas'),
					'resolusion' => $this->input->post('resolusion'),
					'tolerance' => $this->input->post('tolerance'),
					'periode' => $this->input->post('periode'),
					'provider' => $this->input->post('provider'),
					'lastcal' => $this->input->post('lastcal'),
					'nextcal' => $this->input->post('nextcal'),
					'user_id' => $this->input->post('user_id'),
					'file' => $file,
					);
                }
		
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$data['item']=$this->db->query('select * from detail_alat where id_detail = "'.$id.'"')->row();
		$this->load->view('detail_alat/v_form_ubah_detail_alat',  isset($data) ? $data : NULL);
	}

	public function hapus($id)
	{
		$this->db->delete('detail_alat', array("id_detail"=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

	public function simpan_perubahan($id){
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'cmdo/detail_alat'));
		}

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		
		$config['upload_path']          = './file/cmdo/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
    	$config['max_height']           = 768;

        $this->load->library('upload', $config);

               $kirim=array
				(
				'daya' => $this->input->post('daya'),
				'titikkalibrasi' => $this->input->post('titikkalibrasi'),
				'satuan_rentang' => $this->input->post('satuan_rentang'),
				'satuan_resolusi' => $this->input->post('satuan_resolusi'),
				'satuan_toleransi' => $this->input->post('satuan_toleransi'),
				'satuan_periode' => $this->input->post('satuan_periode'),
				'satuan_daya' => $this->input->post('satuan_daya'),
				'usagerange' => $this->input->post('usagerange'),
				'kelas' => $this->input->post('kelas'),
				'resolusion' => $this->input->post('resolusion'),
				'tolerance' => $this->input->post('tolerance'),
				'periode' => $this->input->post('periode'),
				'provider' => $this->input->post('provider'),
				'lastcal' => $this->input->post('lastcal'),
				'nextcal' => $this->input->post('nextcal'),
				'user_id' => $this->input->post('user_id'),
				'file' => $file,
				);

				$kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
				$kirim['update_by'] = $this->session->userdata('user_id');
				$this->db->update('detail_alat',$kirim,array('id_detail'=>$id));
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

	function alat($val=NULL)
    {
      $alat=$this->admin_model->get_alat($alat);
    	//echo json_encode($kab);
      echo form_dropdown('id_alat',$alat,$val,'id="id_alat" onchange="getAlat()" class="form-control input-sm"');
    }

	function spek($alat=NULL,$val=NULL)
    {
      if($alat == NULL){
      }else{
        // $kel = $this->base_model->get_kel($prop,$kab,$kec);
        $spek = $this->admin_model->get_spek($alat);
        echo form_dropdown('id_spek',$spek,$val,'id="id_spek"  class="form-control input-sm" onchange="get_items()"');
      }
    }

    function spek_no_load($alat=NULL,$val=NULL)
    {
      if($alat == NULL){
      }else{
        $spek = $this->admin_model->get_spek($alat);
        echo form_dropdown('id_spek',$spek,$val,'id="id_spek"  class="form-control input-sm"');
      }
    }

	function lihat($id)
	{
		$data['items']=$this->db->query('select * from detail_alat 
		INNER JOIN alat ON detail_alat.id_alat = alat.id_alat
		INNER JOIN spek_alat ON detail_alat.id_spek = spek_alat.id_spek
		INNER JOIN users ON detail_alat.user_id = users.id
		where id_detail = "'.$id.'"')->result();
		$this->load->view('cmdo/detail_alat/v_lihat',  isset($data) ? $data : NULL);
	}

	function uprint()
	{
	    $data['items'] = $this->detail_alat_model->TampilDataX();
		$this->load->view('cmdo/detail_alat/v_pdf',$data);
	}


	function cari()
	{
        $id=$_GET['id_spek'];
        $data =$this->detail_alat_model->cari($id)->result();
        echo json_encode($data);
    }
}

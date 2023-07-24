<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->template->set_template('template/admin');
		$this->load->model('konten_model');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'konten/admin'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_web')))
		{
				$this->session->set_flashdata('message', 'anda tidak berhak..');
				redirect('/', 'refresh');
		}


	}

	function index()
	{

			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->template->title = 'Admin konten';
			$data['menu'] = 'konten';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('admin/v_index',  isset($data) ? $data : NULL);
			$this->template->publish();

	}


	public function ajax_list(){
       	$list = $this->konten_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $lis) {
			$kat = array('1'=>'Berita','2'=>'Artikel','3'=>'Info','4'=>'Profil');
            $no++;
            $row = array();
			$row[] = date("d-m-Y", strtotime($lis->created));
            $row[] = $lis->title;
			$row[] = $kat[$lis->catid];
	        $row[] = $lis->images? '<a type="button" class="btn btn-xs btn-success" href="'.base_url().'konten/admin/delete_gambar/'.$lis->id.'">Hapus</a>':'';
	        $row[] = $lis->pdf? '
				<div class="btn-group" role="group" aria-label="Basic example">
				  <a type="button" class="btn btn-xs btn-success" href="'.base_url().'konten/admin/form_pdf/'.$lis->id.'">Edit</a>
				  <a type="button" class="btn btn-xs btn-danger" href="'.base_url().'konten/admin/delete_pdf/'.$lis->id.'">Del</a>
				</div>':'<a type="button" class="btn btn-xs btn-success" href="'.base_url().'konten/admin/form_pdf/'.$lis->id.'">Edit</a>';
	        if($lis->catid=="4"){
	        	$row[] = '<a type="button" class="btn btn-xs btn-success" href="'.base_url().'konten/admin/form/'.$lis->id.'">Edit</a>';
	        }else{
				$row[] = '
				<div class="btn-group" role="group" aria-label="Basic example">
				  <a type="button" class="btn btn-xs btn-success" href="'.base_url().'konten/admin/form/'.$lis->id.'">Edit</a>
				  <a type="button" class="btn btn-xs btn-danger" href="'.base_url().'konten/admin/del/'.$lis->id.'">Del</a>
				</div>';
	        }
			$data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->konten_model->count_all(),
            "recordsFiltered" => $this->konten_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

	}




	function form($id = false)
	{

		if ($id)
		{
			$this->form_validation->set_rules('title', 'Title', 'required');
		}else{
			$this->form_validation->set_rules('title', 'Title', 'required|callback_title_check');
		}


		$this->form_validation->set_rules('introtext', 'text', 'required');
		$this->form_validation->set_rules('catid', 'Kategori', 'required');
		$this->form_validation->set_rules('metakey', 'Kata Kunci', '');


		if ($this->form_validation->run() === FALSE)
		{
			if ($id)
			{
				$data['konten'] = $this->db->query('select * from konten where id ="'.$id.'"')->row();

				//echo $this->db->last_query();
			}else{
				$data['konten'] = $this->konten_model->get_field_table('konten');
			}

			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->template->title = 'Form konten';
			$data['menu'] = 'konten';
			$this->template->description = '';
			$this->template->meta->add('keyword', '');
			$this->template->content->view('admin/v_form',  isset($data) ? $data : NULL);
			$this->template->publish();

		}else{

			$this->_file_upload();
			// $this->_file_upload_pdf();

			// $upload_path = FCPATH . 'images/konten';
			// $config['allowed_types'] = 'jpg|png|jpeg';
			// $config['upload_path'] = $upload_path;
			// $config["extension_tolower"] = TRUE;

			// $config['encrypt_name'] = true;
			// $config['remove_spaces'] = true;
			// //$config['create_thumb'] = TRUE;
			// $config['max_size'] = '80000'; //Should be defined in Kilobytes

			// $this->load->library('upload', $config);

			// if (!$this->upload->do_upload('file')){
			// 	$errors=$this->upload->display_errors();
			// 	$this->session->set_flashdata('message', $this->upload->display_errors());
			// 	//return false;
			// }else{
				$datas=$this->upload->data();

				// $this->resize($datas['full_path']);
				$images = $datas['file_name'];


				$slug = url_title($this->input->post('title'), 'dash', TRUE);

				$datapost = array(
					'title' => $this->input->post('title'),
					'metakey' => $this->input->post('metakey'),
					'alias' => $slug,
					'introtext' => $this->input->post('introtext'),
					'catid' => $this->input->post('catid'),
					'state' => '1',
					'youtube_id' => $this->input->post('youtube_id')

				);

				$datapost['title']=$this->input->post('title');
				$datapost['metakey']=$this->input->post('metakey');
				$datapost['alias']=$slug;

				$datapost['introtext']=$this->input->post('introtext');
				$datapost['catid']=$this->input->post('catid');
				$datapost['state']='1';

				if($id)
				{
					if($images <> ''){
						$datapost['images']=$images;
					//$this->triger_update($id);
					}

					$datapost['modified_by']=$this->session->userdata('user_id');
					$datapost['modified']=date('Y-m-d H:i:s', strtotime('NOW'));

					$this->db->update('konten',$datapost,array('id'=>$id));
				}else{
					$datapost['images']=$images;
					$datapost['created_by']=$this->session->userdata('user_id');
					$datapost['created']=date('Y-m-d H:i:s', strtotime('NOW'));

					$this->db->insert('konten',$datapost);
				}
				redirect('konten/admin','refresh');
			// }
		}
	}

	function form_pdf($id = false){
		$data['konten'] = $this->db->query('select * from konten where id ="'.$id.'"')->row();
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Form konten';
		$data['menu'] = 'konten';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('admin/v_pdf_form',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	function simpan_pdf($id = false)
	{

		$upload_path = FCPATH . 'pdf';
		$config['allowed_types'] = 'pdf';
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
			$pdf_data = $this->upload->data();
		}

		$datas=$this->upload->data();

		$pdf = $datas['file_name'];

		$datapost['pdf']='';
		if($pdf <> ''){
			$datapost['pdf']=$pdf;
		}

		$this->db->update('konten',$datapost,array('id'=>$id));
		redirect('konten/admin','refresh');
	}

	function delete_gambar($id){
		$datapost['images']='';
		$gambar = $this->db->query('select * from konten where id = "'.$id.'"')->row('images');
		unlink(FCPATH . 'images/konten/'.$gambar);
		$this->db->update('konten',$datapost,array('id'=>$id));
		redirect('konten/admin','refresh');
	}

	function delete_pdf($id){
		$datapost['pdf']='';
		$pdf = $this->db->query('select * from konten where id = "'.$id.'"')->row('pdf');
		unlink(FCPATH . 'pdf/'.$pdf);
		$this->db->update('konten',$datapost,array('id'=>$id));
		redirect('konten/admin','refresh');
	}

	public function title_check($str)
	{
		$slug = url_title($str, 'dash', TRUE);

	    $this->db->where('alias',$slug);
	    $query = $this->db->get('konten');

		if ($query->num_rows() > 0)
		{
			$this->form_validation->set_message('title_check', 'Maaf, terdapat konten dengan judul yang sama');
			return FALSE;
		}else{
			return TRUE;
		}
	}




   public function _file_upload()
   {
	   //Create location if it does not exist
		$upload_path = FCPATH . 'images/konten';
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
		    'new_image' => FCPATH .  'images/konten/thumb/',
			'maintain_ration' => true,
			'width' => 100,
			'height' => 72,);

			$this->load->library('image_lib', $configb);
			$this->image_lib->initialize($configb);
			$this->image_lib->resize();
			$this->image_lib->clear();

			$configa = array(
			'source_image' => $image_data['full_path'],
		    'new_image' => FCPATH .  'images/konten/resize/',
			'maintain_ration' => true,
			'width' => 400,
			'height' => 268,);

			$this->load->library('image_lib', $configa);
			$this->image_lib->initialize($configa);
			$this->image_lib->resize();
			$this->image_lib->clear();
		}

	}

	public function _file_upload_pdf()
   {

	   //Create location if it does not exist
		$upload_path = FCPATH . 'pdf';
		$config['allowed_types'] = 'pdf';
		$config['upload_path'] = $upload_path;
		$config["extension_tolower"] = TRUE;

		$config['encrypt_name'] = true;
		$config['remove_spaces'] = true;
		//$config['create_thumb'] = TRUE;
		$config['max_size'] = '80000'; //Should be defined in Kilobytes

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('file2')){
			$errors=$this->upload->display_errors();
			$this->session->set_flashdata('message', $this->upload->display_errors());
			//return false;
		}else{
			$pdf_data = $this->upload->data();
		}

	}



	public function del($id)
	{
			//$data['state'] = '0';
			$this->db->delete('konten',array('id'=>$id));
			$this->session->set_flashdata('message', 'Okey, Data Sudah Terhapus');
			redirect ('konten/admin','refresh');
	}


///update srcap fb


    public function triger_update($id)
	{
		$where = array('catid'=>'4','id'=>$id);

		$q = $this->konten_model->get_konten($where);
		$this->data['news'] = $q;

		$url = site_url().'konten-daerah/'.$q->alias.'.html';

		//echo $url ;
		//$this->fungsi->telebot('Update konten - '.$url);

		$graph = 'https://graph.facebook.com/';
		$post = 'id='.urlencode($url).'&scrape=true';
		$this->send_post($graph, $post);

    }


	public function reload($url)
	{
		$graph = 'https://graph.facebook.com/';
		$post = 'id='.urlencode($url).'&scrape=true';
		return $this->send_post($graph, $post);
	}
	private function send_post($url, $post)
	{
		$r = curl_init();
		curl_setopt($r, CURLOPT_URL, $url);
		curl_setopt($r, CURLOPT_POST, 1);
		curl_setopt($r, CURLOPT_POSTFIELDS, $post);
		curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 5);
		$data = curl_exec($r);
		curl_close($r);
		return $data;
	}


}

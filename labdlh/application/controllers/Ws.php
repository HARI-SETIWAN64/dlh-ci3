<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ws extends REST_Controller {


	public function index()
	{
		

				
	}


	public function home()
	{
		
echo '<div class="home"></div>';
				
	}
	
	
	
	function getKec()
	{
		$q = $this->db->query('select NO_KEC, NAMA_KEC from kec order by NO_KEC ASC')->result();
		
		header('Access-Control-Allow-Origin: *');		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');	
		echo json_encode($q);
	}


	function getDesKel()
	{
		$q = $this->db->query('select * from deskel')->result();
		
		header('Access-Control-Allow-Origin: *');		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');	
		echo json_encode($q);
	}

	
	function auth()
	{
		$_POST = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->input->post('identity'));
	}		
	

	function infouser($id)
	{
		$user = $this->db->query('select * from users where id = "'.$id.'"');
		
	//	echo $user->row('unit');
		
		$unit = $this->db->query('select * from appl_unit_kerja where kode_unit = "'. $user->row('unit').'"');
		
		echo $this->db->last_query();
		
		//echo $unit->num_rows();
		
		if($unit->num_rows() <> '0'){
			
			echo $unit->row('NO_KEC');
			echo '<br/>';
			echo $unit->row('NO_KEL');		
		}
		
		
		
		
		
	}
	
	
	function authenticate()
	{
		
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		$this->load->library(array('ion_auth','form_validation'));

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				$user = $this->db->query('select * from users where email = "'.$this->input->post('identity').'"')->row();
				
			    $unit = $this->db->query('select * from appl_unit_kerja where kode_unit = "'. $user->unit.'"');
				
				
				$group = $this->db->query('SELECT
groups.name,
groups.description
FROM
users_groups as a
INNER JOIN groups ON a.group_id = groups.id where a.user_id = "'.$user->id.'"');

				$groups = $group->result();
				
				
		
			//echo $this->db->last_query();
			
			//echo $unit->num_rows();
			
			if($unit->num_rows() <> '0'){
				
				$output['NO_KEC'] = $unit->row('NO_KEC');
				$output['NO_KEL'] = $unit->row('NO_KEL');		
			}
					
				
				
				
				$token = array();
				$token['identity']=  $this->input->post('identity');
				$token['email']=  $user->email;
				$token['user_id']=  $user->id;
				
				$output['identity'] =  $this->input->post('identity');
				$output['phone'] =  $user->phone;
				$output['unit'] =  $user->unit;
				$output['groups'] =  $groups;
				$output['success'] = true;
				$output['status'] = true;
				$output['messages'] = $this->ion_auth->messages();
				$output['msg'] = $this->ion_auth->messages();
				$output['token'] = JWT::encode($token, $this->config->item('jwt_key'));
				

			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				//$this->session->set_flashdata('message', $this->ion_auth->errors());
				$output['success'] = false;
				$output['status'] = false;
				$output['messages'] = $this->ion_auth->errors();		
				$output['msg'] = $this->ion_auth->errors();		

			}
		header('Access-Control-Allow-Origin: *');		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($output);			
			
			
			
			
			
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$output['success'] = false;
				$output['status'] = false;
				$output['messages'] = $this->data['message'];
				$output['msg'] = $this->data['message'];
				

		header('Access-Control-Allow-Origin: *');	
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($output);		
			
		}
	}



	function signup()
	{
		
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		$this->load->library(array('ion_auth','form_validation'));
		
		
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');	
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');	
		$this->form_validation->set_rules('first_name', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('phone', 'Hp', 'required|numeric');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');		
		$this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required');
		
		
		
		
		if ($this->form_validation->run() == true)
		{		
		
		
			$username = strtolower($this->input->post('email'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
				'nik'      => $this->input->post('nik'),
				'refapp'      => $this->input->post('refapp'),
			);
			
			$this->ion_auth->register($username, $password, $email, $additional_data);
		
			$this->fungsi->telebot('Pendaftaran User via mobile : '.$email.' , Ref company : '.$this->input->post('company') );
			
				$output['success'] = true;	
				$output['status'] = 'success';	
				$output['msg'] = 'Pendaftaran berhasil, jika email anda valid, cek email anda untuk aktifasi.</br/> Untuk pendaftaran unit kerja, silakhan konfirmasi petugas.';		
				
		header('Access-Control-Allow-Origin: *');	
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($output);						
				
		
		}else{
		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
				$output['success'] = false;
				$output['status'] = 'error';	
				$output['msg'] = $this->data['message'];
				
		header('Access-Control-Allow-Origin: *');	
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($output);						
				
		}
				
		
	
		
	}


	function memberinfo()
	{
		
	$token = $this->input->get_request_header('Authorization',TRUE);	

	$dec = JWT::decode($token,$this->config->item('jwt_key'));


				$output['success'] = true;
				$output['status'] = true;
				$output['messages'] = '';
				$output['msg'] = json_encode($dec);


		header('Access-Control-Allow-Origin: *');		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($output);	

	}

//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZGVudGl0eSI6Im9yZ2FuaXNhc2kifQ.mC1OLy5eULl5MgNHHxeRF-D6mcgsNlvdQ19dc3I3LWo


	function a()
	{
		print_r(JWT::decode('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZGVudGl0eSI6Im9yZ2FuaXNhc2kifQ.mC1OLy5eULl5MgNHHxeRF-D6mcgsNlvdQ19dc3I3LWo','ZZXXCCVVBBNNMM'));
	}
	
	
    public function createPanic()
    {



	$token = $this->input->get_request_header('Authorization',TRUE);	
	
	
	$dec = JWT::decode($token,$this->config->item('jwt_key'));

	
	$data = json_decode(file_get_contents('php://input'), true);
	
	
	
	$user = $this->db->query('select * from users where email = "'.$dec->identity.'"')->row();	
	//echo $this->db->last_query();	
	
	
	$kirim['user_id'] = $user->id ;
		
	$kirim['lat'] = $data['lat'];
	$kirim['long'] = $data['long'];
	$kirim['jenis'] = $data['jenis'];
	$this->db->insert('panic_button',$kirim);
	
	$this->fungsi->telebot('PanicButton : '.$user->email);
	
	$datap['id'] = $user->id ;		
	$datap['lat'] = $data['lat'];
	$datap['long'] = $data['long'];	
	
	
	    $ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, 'http://portal.banyuwangikab.go.id/apush/panic_button' );
	
		//most importent curl assues @filed as file field
		$post_array = array(
			"id"=>"hjghj",
			"ccc"=>"ghdfgdfg"
		);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$datap );
		$response = curl_exec($ch);
		echo $response;	
    }		

  public function gcmtoken()
    {



	$token = $this->input->get_request_header('Authorization',TRUE);	
	$dec = JWT::decode($token,$this->config->item('jwt_key'));
	$data = json_decode(file_get_contents('php://input'), true);
	$user = $this->db->query('select * from users where email = "'.$dec->identity.'"')->row();	
	//echo $this->db->last_query();	
		
	$kirim['user_id'] = $user->id ;
	$kirim['token'] = $data['token'] ;
	
	$cek = $this->db->query('select * from push_token where user_id = "'.$kirim['user_id'].'" and token = "'.$kirim['token'].'"');	
	
	if($cek->num_rows() == '0'){
		
			$this->db->insert('push_token',$kirim);
	}	

    }		
	
	
	function email_check($email)
	{
		$str = $this->db->query('select * from users where email = "'.$email.'"');
		
		//echo $str->num_rows();
		
		if ($str->num_rows() <> '0')
		{
			$this->form_validation->set_message('email_check', 'Email sudah digunakan');
			return FALSE;
		}
		else
		{
			return TRUE;
		}		
		
	}
	
	
    public function pengaduanform()
    {



		
		
	
		
		
        $date = new DateTime();
        $imageName = 'pengaduans_'.rand(0, 100000).''.$date->getTimestamp().'.jpg';
        if (move_uploaded_file($_FILES['file']['tmp_name'], './uploads/'.$imageName)) {
			
			
			
			
            //$this->RestApi_model->updateCoverImage($imageName, $user);
            $data['message'] = $imageName;
            $this->load->view('json', $data);
        } else {
            $data['message'] = 'false';
            $this->load->view('json', $data);
        }
    }	
	
	
	
    public function pengaduansubmit()

	{
		
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		
	$token = $this->input->get_request_header('Authorization',TRUE);	
	$dec = JWT::decode($token,$this->config->item('jwt_key'));

	$user = $this->db->query('select * from users where email = "'.$dec->identity.'"')->row();	
	$id_user = $user->id ;
		
		
		
		
		$this->load->library(array('ion_auth','form_validation'));
		
		
		
		$this->form_validation->set_rules('isi', 'isi', 'required');	


		
		if ($this->form_validation->run() == true)
		{		
		
		
			$isi = $this->input->post('isi');
			
			
		
	$kirim['user_id'] = $user->id ;
	$kirim['isi'] =$this->input->post('isi');
	$kirim['image'] =$this->input->post('file');
	$kirim['NO_KEC'] =$this->input->post('NO_KEC');
	$kirim['NO_KEL'] =$this->input->post('NO_KEL');
	$kirim['tanggal'] = date('Y-m-d H:i:s', strtotime('NOW'));
		


	$this->db->insert('pengaduan',$kirim);		
			
			
			

				$output['success'] = true;	
				$output['status'] = 'success';	
				$output['msg'] = 'ok:'.$isi;		
				
		header('Access-Control-Allow-Origin: *');	
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($output);						
				
		
		}else{
		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
				$output['success'] = false;
				$output['status'] = 'error';	
				$output['msg'] = $this->data['message'];
				
		header('Access-Control-Allow-Origin: *');	
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($output);						
				
		}
				
		
	
		
	}
	
}
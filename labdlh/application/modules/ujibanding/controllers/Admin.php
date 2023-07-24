<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->template->set_template('template/admin');
		$this->load->model('admin_model');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));		
		$this->lang->load('auth');
	}
	
	function index()
	{
		echo "Laopo";
	}
	
	
	function users()
	{
		
		//fardu
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'admin/users'));

		}else{	


			$u = $this->db->query('select users.* from users inner join users_groups on users.id=users_groups.user_id where users_groups.group_id=7 and users.id<>"1" ');	
			$data['users'] = $u->result();	

			$this->template->title = 'Peserta';
			$data['menu'] = 'ub_users';
			$this->template->description = '';		
			$this->template->meta->add('keyword', '');
			$this->template->content->view('ujibanding/admin/v_index',  isset($data) ? $data : NULL);
			$this->template->publish();
		}
	}
	
	
	function edit_user($id)
	{
		$this->data['title'] = "Edit User";
		
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'admin/edit_user'));

		}
		
		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();
		
		
		$this->data['units']=$this->admin_model->option_unit();	
		
		//validate form input
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[2]|max_length[24]|callback_username_check_update');
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), '');
		
		// $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');			
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|callback_email_check_update');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		// $this->form_validation->set_rules('jenis_industri', 'Jenis Industri', 'required');
		// $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');
		$this->form_validation->set_rules('unit', 'Unit', '');
		$this->form_validation->set_rules('no_kec', 'Kecamatan', '');
		$this->form_validation->set_rules('no_kel', 'Desa', '');
		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			//if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			//{
			//	show_error($this->lang->line('error_csrf'));
			//}
			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
			}
			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					// 'nik' => $this->input->post('nik'),
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'alamat'    => $this->input->post('alamat'),
					// 'jenis_industri'    => $this->input->post('jenis_industri'),
					'unit'    => $this->input->post('unit'),
					'phone'      => $this->input->post('phone'),
					'no_kec'      => $this->input->post('no_kec'),
					'no_kel'      => $this->input->post('no_kel')
					
				);
				if($this->input->post('perusahaan_id') <> ""){
					$perusahaan = $this->db->query("select * from master_perusahaan where id='".$this->input->post('perusahaan_id')."'")->row();
					$data['jenis_industri'] = $perusahaan->jenis_usaha;
					$data['perusahaan_id'] = $this->input->post('perusahaan_id');
					$data['company'] = $perusahaan->nama;
				}
				//update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}
				// Only allow updating groups if user is admin
				if ($this->ion_auth->in_group(array('admin', 'admin_pelayanan')))
				{
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');
					if (isset($groupData) && !empty($groupData)) {
						$this->ion_auth->remove_from_group('', $id);
						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}
					}
				}
			//check to see if we are updating the user
				if($this->ion_auth->update($user->id, $data))
				{
			    	//redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages() );
					if ($this->ion_auth->is_admin())
					{
						redirect('admin/users', 'refresh');
					}
					else
					{
						redirect('admin/users', 'refresh');
					}
				}
				else
				{
			    	//redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors() );
					if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}
				}
			}
		}
		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		//pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;
		$this->data['perusahaan']= $this->base_model->get_perusahaan_list();	
		
		$this->data['kec']= $this->base_model->get_kec_list();
		

		$this->data['username'] = array(
			'name'  => 'username',
			'id'    => 'username',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('username', $user->username),
		);
		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['nik'] = array(
			'name'  => 'nik',
			'id'    => 'nik',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('nik', $user->nik),
		);			
		$this->data['email'] = array(
			'name'  => 'email',
			'id'    => 'email',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('email', $user->email),
		);	
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['no_kec'] = array(
			'name'  => 'no_kec',
			'id'    => 'no_kec',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('no_kec', $user->no_kec),
		);		
		$this->data['no_kel'] = array(
			'name'  => 'no_kel',
			'id'    => 'no_kel',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('no_kel', $user->no_kel),
		);	
		$this->data['alamat'] = array(
			'name'  => 'alamat',
			'id'    => 'alamat',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('alamat', $user->alamat),
		);	
		$this->data['jenis_industri'] = array(
			'name'  => 'jenis_industri',
			'id'    => 'jenis_industri',
			'class' => 'form-control',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('jenis_industri', $user->jenis_industri),
		);		
		$this->data['password'] = array(
			'name' => 'password',
			'class' => 'form-control',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'class' => 'form-control',
			'id'   => 'password_confirm',
			'type' => 'password'
		);
		//$this->_render_page('auth/edit_user', $this->data);
		

		$this->template->title = 'Edit User';
		$this->data['menu'] = 'users';
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('ujibanding/edit_user', $this->data);
		$this->template->publish();		
		
	}

	public function tampil($id,$tampil)
	{
		$kirim['active'] = $tampil;
		$this->db->update('users',$kirim,array('id'=>$id));
		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}
	
	function username_check($username)
	{
		$str = $this->db->query('select * from users where username = "'.$username.'"');
		
		//echo $str->num_rows();
		
		if ($str->num_rows() <> '0')
		{
			$this->form_validation->set_message('username_check', 'Username sudah digunakan');
			return FALSE;
		}
		else
		{
			return TRUE;
		}			
	}
	/**
	 * Check if an email exist
	 *
	 * @access public
	 * @param string
	 * @return bool
	 */
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
	function email_check_update($email)
	{
		$id = $this->input->post('id');			
		$str = $this->db->query('select * from users where email = "'.$email.'" and id <> "'.$id.'"');
		
		//echo $str->num_rows();
		
		if ($str->num_rows() <> '0')
		{
			$this->form_validation->set_message('email_check_update', 'Email sudah digunakan');
			return FALSE;
		}
		else
		{
			return TRUE;
		}		
		
	}	
	function username_check_update($username)
	{
		$id = $this->input->post('id');
		$str = $this->db->query('select * from users where username = "'.$username.'" and id <> "'.$id.'"');
		
		//echo $str->num_rows();
		
		if ($str->num_rows() <> '0')
		{
			$this->form_validation->set_message('username_check_update', 'Username sudah digunakan');
			return FALSE;
		}
		else
		{
			return TRUE;
		}		
		
		
	}
//change password
	function change_password()
	{
		
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?continue='.urlencode(base_url().'admin/change_password'));

		}elseif (!$this->ion_auth->in_group(array('admin','admin_pelayanan','admin_emskab')))
		{
			$this->session->set_flashdata('message', 'anda tidak berhak..');
			redirect('/', 'refresh');
		}	
		
		
		
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		$user = $this->ion_auth->user()->row();
		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			//$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'class' => 'form-control',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'class' => 'form-control',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'class' => 'form-control',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'class' => 'form-control',
				'type'  => 'hidden',
				'value' => $user->id,
			);
			//render
			//$this->_render_page('auth/change_password', $this->data);
			
			
			$this->template->title = '';
			$this->template->menu = 'change_password';
			$this->template->description = '';		
			$this->template->meta->add('keyword', '');
			$this->template->content->view('admin/change_password', $this->data);
			$this->template->publish();					
			
			
		}
		else
		{
			// print_r("masuk");die();
			$identity = $this->session->userdata('identity');
			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
			// print_r($change);die();
			if ($change)
			{
			// print_r("masuk");die();
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/change_password', 'refresh');
			}
		}
	}
	function logout()
	{
		$this->data['title'] = "Logout";
		//log the user out
		$logout = $this->ion_auth->logout();
		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}
}
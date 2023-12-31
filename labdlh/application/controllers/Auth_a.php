<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}
	//redirect if needed, otherwise display the user list
	function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
			
			$u = $this->db->query('select * from users where is_unit IS NULL ');	
			$this->data['users'] = $u->result();	
			$this->data['units'] = array();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			//$this->_render_page('auth/index', $this->data);
			
			
		$this->template->title = '';
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('auth/index', $this->data);
		$this->template->publish();					
		}
	}
	//log the user in
	function login()
	{
		if ($this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('');
		}	
		if($this->input->is_ajax_request()){
		 echo '<script> window.location.assign("'.base_url().'auth/login"); </script>';
		}
		$this->data['title'] = "Login";
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
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				
				if($this->input->get('continue')){					
					redirect($this->input->get('continue'), 'refresh');	
					//echo $this->input->get('continue');
				}else{							
					redirect('/', 'refresh');
				}
				
				
				
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				
				
				if($this->input->get('continue')){					
					redirect('auth/login?continue='.urlencode($this->input->get('continue')), 'refresh'); 						
				}else{							
					redirect('auth/login', 'refresh');
				}			
				
				
				 //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = $this->session->flashdata('message');
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'class' => 'form-control',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
											'class' => 'form-control',
				'id' => 'password',
				'type' => 'password',
			);
			//$this->_render_page('auth/login', $this->data);
		$this->template->set_template('template/front/default');	
		$this->template->title = '';
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('auth/login', $this->data);
		$this->template->publish();				
			
			
		}
	}
	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";
		//log the user out
		$logout = $this->ion_auth->logout();
		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}
	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
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
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('auth/change_password', $this->data);
		$this->template->publish();					
			
			
		}
		else
		{
			$identity = $this->session->userdata('identity');
			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}
	//forgot password
	function forgot_password()
	{
		//setting validation rules by checking wheather identity is username or email
		if($this->config->item('identity', 'ion_auth') == 'username' )
		{
		   $this->form_validation->set_rules('email', $this->lang->line('forgot_password_username_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email','class' => 'form-control',
				'id' => 'email',
			);
			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}
			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			
			
			//$this->_render_page('auth/forgot_password', $this->data);
			
			
			$this->template->title = '';
			$this->template->description = '';		
			$this->template->meta->add('keyword', '');
			$this->template->content->view('auth/forgot_password', $this->data);
			$this->template->publish();					
			
		}
		else
		{
			// get identity from username or email
			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
			}
			else
			{
				$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
			}
	            	if(empty($identity)) {
	            		if($this->config->item('identity', 'ion_auth') == 'username')
		            	{
                                   $this->ion_auth->set_message('forgot_password_username_not_found');
		            	}
		            	else
		            	{
		            	   $this->ion_auth->set_message('forgot_password_email_not_found');
		            	}
		                $this->session->set_flashdata('message', $this->ion_auth->messages());
                		redirect("auth/forgot_password", 'refresh');
            		}
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});
			if ($forgotten)
			{
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}
	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}
		$user = $this->ion_auth->forgotten_password_check($code);
		if ($user)
		{
			//if the code is valid then display the password reset form
			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');
			if ($this->form_validation->run() == false)
			{
				//display the form
				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'class' => 'form-control',
					'id'   => 'new',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'class' => 'form-control',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;
				//render
				//$this->_render_page('auth/reset_password', $this->data);
				
				$this->template->title = '';
				$this->template->description = '';		
				$this->template->meta->add('keyword', '');
				$this->template->content->view('auth/reset_password', $this->data);
				$this->template->publish();					
				
				
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{
					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);
					show_error($this->lang->line('error_csrf'));
				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}
	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}
		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			// $this->fungsi->telebot('Aktivasi User : '.$id);
			redirect("auth", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}
	//deactivate the user
	function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		$id = (int) $id;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');
		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();
			$this->_render_page('auth/deactivate_user', $this->data);
		} else {
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}
				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}
			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}
	//create a new user
	function create_user()
	{
		$this->data['title'] = "Create User";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		$tables = $this->config->item('tables','ion_auth');
		//validate form input
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[2]|max_length[24]|callback_username_check');
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), '');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|callback_email_check');
		
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');			
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), '');
		$this->form_validation->set_rules('ALAMAT', $this->lang->line('create_user_validation_alamat_label'), '');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		if ($this->form_validation->run() == true)
		{
			$username = $this->input->post('username');
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$additional_data = array(
				'username' => $this->input->post('username'),
				'nik' => $this->input->post('nik'),									  
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'ALAMAT'    => $this->input->post('ALAMAT'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'class' => 'form-control',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'class' => 'form-control',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			
			
			$this->data['nik'] = array(
				'name'  => 'nik',
				'id'    => 'nik',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('nik'),
			);				
			
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name'  => 'company',
				'id'    => 'company',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'class' => 'form-control',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'class' => 'form-control',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'class' => 'form-control',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			//$this->_render_page('auth/create_user', $this->data);
			
		$this->template->title = 'Create User';
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('auth/create_user', $this->data);
		$this->template->publish();					
			
		}
	}
	//edit a user
	function edit_user($id)
	{
		$this->data['title'] = "Edit User";
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}
		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();
		//validate form input
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[2]|max_length[24]|callback_username_check_update');
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), '');
		
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');			
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|callback_email_check_update');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), '');
		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}
			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}
			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'nik' => $this->input->post('nik'),
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
				);
				//update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}
				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
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
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
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
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('auth/edit_user', $this->data);
		$this->template->publish();		
		
		
	}
	// create a new group
	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');
		if ($this->form_validation->run() == TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = $this->session->flashdata('message');
			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);
			$this->_render_page('auth/create_group', $this->data);
		}
	}
	//edit a group
	function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}
		$this->data['title'] = $this->lang->line('edit_group_title');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		$group = $this->ion_auth->group($id)->row();
		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');
		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);
				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}
		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		//pass the user to the view
		$this->data['group'] = $group;
		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';
		$this->data['group_name'] = array(
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);
		$this->_render_page('auth/edit_group', $this->data);
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
	function _render_page($view, $data=null, $render=false)
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$view_html = $this->load->view($view, $this->viewdata, $render);
		if (!$render) return $view_html;
	}
	//create a new user
	function register()
	{
		$this->data['title'] = "Create User";
		//if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//{
		//	redirect('auth', 'refresh');
		//}
		$tables = $this->config->item('tables','ion_auth');
		//validate form input
		//$this->form_validation->set_rules('username', 'Username', 'required|min_length[2]|max_length[24]|callback_username_check');
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), '');
		
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');		
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('phone', 'Telepon', 'required|numeric');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), '');
		$this->form_validation->set_rules('ALAMAT', $this->lang->line('create_user_validation_alamat_label'), '');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		if ($this->form_validation->run() == true)
		{
			//$username = $this->input->post('username');
			
			$username =  strtolower($this->input->post('email'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'ALAMAT'    => $this->input->post('ALAMAT'),
				'phone'      => $this->input->post('phone'),
				'nik'      => $this->input->post('nik'),
			);
		}
		
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			// $this->fungsi->telebot('Pendaftaran User via web : '.$email);
			redirect("auth/register_success", 'refresh');
		} else {
			//display the create user form
			//set the flash data error message if there is one
			//$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			
			$this->data['nik'] = array(
				'name'  => 'nik',
				'id'    => 'nik',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('nik'),
			);			
			
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name'  => 'company',
				'id'    => 'company',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['ALAMAT'] = array(
				'name'  => 'ALAMAT',
				'id'    => 'ALAMAT',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('ALAMAT'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'class' => 'form-control',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'class' => 'form-control',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'class' => 'form-control',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			//$this->_render_page('auth/register_user', $this->data);
			
			$this->template->title = 'Register User';
			$this->template->description = '';		
			$this->template->meta->add('keyword', '');
			$this->template->content->view('auth/register_user', $this->data);
			$this->template->publish();
		}
	}

	function register_success()
	{
		$this->data = '';
		$this->template->title = 'Register Success';
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		$this->template->content->view('auth/register_success', $this->data);
		$this->template->publish();					
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
	/**
	 * Check if an email exist
	 *
	 * @access public
	 * @param string
	 * @return bool
	 */
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
	function mailme()
	{
		// $this->load->library('email');
		// $this->email->from('alan_greenz@rocketmail.com', 'adasdas');
		// $this->email->to('alandwicahyo@gmail.com');
		// $this->email->set_newline("\r\n");
		// $this->email->subject('asdasdasdasd2');
		// $this->email->message('oke');
	 //    if ( ! $this->email->send()) {
	 //        show_error($this->email->print_debugger());
	 //    } 
		// if ($this->email->send())
		// {
		// 	echo 'ok';
		// }
		// else
		// {
		// 	echo 'no ok';
		// }


		// $this->load->library('email');
		// $this->email->to('alandwicahyo@gmail.com');
		// $this->email->from('alan_greenz@rocketmail.com','Admin');
		// $this->email->subject('JUDUL EMAIL (Teks)');
		// $this->email->message('Isi email ditulis disini');
		// $this->email->send();


	    // $to_email = "alandwicahyo@gmail.com"; 

     // 	$config = Array(
	    //         'protocol' => 'smtp',
	    //         'smtp_host' => 'ssl://smtp.googlemail.com',
	    //         'smtp_port' => 465,
	    //         'smtp_user' => 'labdlhbanyuwangi@gmail.com',
	    //         'smtp_pass' => 'labdlh2018a',
	    //         'mailtype'  => 'html', 
	    //         'charset'   => 'iso-8859-1'
	    // );

     //    $this->load->library('email', $config);
     //    $this->email->set_newline("\r\n");   

	    // $this->email->from('labdlhbanyuwangi@gmail.com', 'LAB DLH'); 
	    // $this->email->to($to_email);
	    // $this->email->subject('Data User Lab DLH'); 
	    // $this->email->message('Uji Coba Mengirim Email'); 

	    // $this->email->send();


	    //////////////////////
	    // Konfigurasi email.]
	    // $isi = "
	    // Terimakasih telah mengirim email.
	    // ";
        $config = [
	           'useragent' => 'CodeIgniter',
	           'protocol'  => 'smtp',
	           'mailpath'  => '/usr/sbin/sendmail',
	           'smtp_host' => 'ssl://smtp.gmail.com',
	           'smtp_user' => 'labdlhbanyuwangi@gmail.com',   // Ganti dengan email gmail Anda.
	           'smtp_pass' => 'labdlh2018',             // Password gmail Anda.
	           'smtp_port' => 465,
	           'smtp_keepalive' => TRUE,
	           'smtp_crypto' => 'SSL',
	           'wordwrap'  => TRUE,
	           'wrapchars' => 80,
	           'mailtype'  => 'html',
	           'charset'   => 'iso-8859-1',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];


		//Email content
		$htmlContent = '<h1>Aktivasi User Laboratorium Lingkungan Hidup</h1>';
		$htmlContent .= "<p>Silahkan klik  <a href='https://www.w3schools.com/html/'>Visit our HTML tutorial</a> untuk mengaktifkan user anda.</p>";
 
        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
        $this->email->from('labdlhbanyuwangi@gmail.com', 'labdlh.banyuwangikab.go.id');
        $this->email->to('alandwicahyo@gmail.com');
        $this->email->subject('Kirim Email pada CodeIgniter');
        $this->email->message($htmlContent);
 
        if ($this->email->send())
        {
            echo 'Sukses! email berhasil dikirim.';
        }else{
            echo 'Error! email tidak dapat dikirim.';
        }
	}
}
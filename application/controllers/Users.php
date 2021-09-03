<?php
	class Users extends CI_Controller{

        //User Registration
		public function register(){
            // Check if user is Logged In
            if($this->session->userdata('logged_in')){
                redirect('accounts');
            }

            
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name','Name', 'required');
            $this->form_validation->set_rules('username','Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email','Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password','Password', 'required');
            $this->form_validation->set_rules('password2','Confirm Password', 'matches[password]');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if($this->form_validation->run() === FALSE){
            	$this->load->view('templates/header');
            	$this->load->view('users/register', $data);
            	$this->load->view('templates/footer');
            }else{
            	//Encrypt password
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);

                //Set message
                $this->session->set_flashdata('user_registered','Registration Successful. You can login Now');
                //Redirect login once registered
                redirect('users/login');
            }
		}

        //User Login
        public function login(){
            // Check if user is Logged In
            if($this->session->userdata('logged_in')){
                redirect('accounts');
            }

            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username','Username', 'required');
            $this->form_validation->set_rules('password','Password', 'required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');

            }else{
                //Get username
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));

                //Login user
                $user_id = $this->user_model->login($username, $password);
                
                if($user_id){
                    //Create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);

                    //Set message
                    $this->session->set_flashdata('user_loggedin', 'You are now logged in');
                    redirect('accounts');
                }else{
                    $this->session->set_flashdata('login_failed', 'Your Password is Incorrect');
                     redirect('users/login');
                }
               
            }
        }

        public function logout(){
           //Unset user data
           $this->session->unset_userdata('logged_in');
           $this->session->unset_userdata('user_id');
           $this->session->unset_userdata('username'); 

           //Set message
           $this->session->set_flashdata('user_loggedout', 'You are now logged out');
           redirect('users/login');
        }



        //Check if username exists (return true for registration)
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','That username is taken. Please choose a different one');

            if($this->user_model->check_username_exists($username)){
                return true;
            } else {
                return false;
            }
        }

         //Check if email exists
        function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','That email is taken. Please choose a different one');

            if($this->user_model->check_email_exists($email)){
                return true;
            } else {
                return false;
            }
        }

         //Ensure username exists (Before user login)
        function check_username_exists_login($username){
            $this->form_validation->set_message('check_username_exists_login','The Username does not exist. Register first before Trying to LogIn');

            if($this->user_model->check_username_exists($username)){
                return false;
            } else {
                return true;
            }
        }
	}
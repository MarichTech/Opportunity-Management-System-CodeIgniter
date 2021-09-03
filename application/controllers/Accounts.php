<?php
    class Accounts extends CI_Controller{
        public function index(){
            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'User Accounts';

            $data['accounts'] = $this->account_model->get_accounts();
            //print_r($data['posts']);

            $this->load->view('templates/header');
            $this->load->view('accounts/index',$data);
            $this->load->view('templates/footer');
        }

        public function view($name = NULL){
            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['account'] = $this->account_model->get_accounts($name);

            if(empty($data['account'])){
              show_404();
            }

            $data['title'] = $data['account']['title'];

            $this->load->view('templates/header');
            $this->load->view('accounts/view',$data);
            $this->load->view('templates/footer');
        }

        public function create(){

            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'Create Account';

             //Validate form data
            $this->form_validation->set_rules('name','Name', 'required');
            $this->form_validation->set_rules('email','Email', 'required');
            $this->form_validation->set_rules('phonenumber','Phonenumber', 'required');
            $this->form_validation->set_rules('address','Address', 'required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if($this->form_validation->run() === FALSE){
                //If form is not valid
                $this->load->view('templates/header');
                $this->load->view('accounts/create',$data);
                $this->load->view('templates/footer');
            }else{
                //If form is valid
                //Create Account
                $this->account_model->create_account();

                //Set message
                $this->session->set_flashdata('account_created', 'Your account has been created');
                //Redirect accounts once accounts is created
                redirect('accounts');
            } 
        }

        public function delete($id){
             // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            //Delete Account
            $this->account_model->delete_account($id);

            //Set message
            $this->session->set_flashdata('account_deleted', 'Your post has been Deleted');
            //Redirect accounts once accounts is created
            redirect('accounts');
        }

        public function edit($name){
            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            } 

            $data['account'] = $this->account_model->get_accounts($name);

            if($this->session->userdata('user_id') != $this-> account_model->get_accounts($name)['user_id']){
                redirect('accounts'); 
            }
            
            if(empty($data['account'])){
                show_404();
            }

            $data['title'] = 'Edit Accounts';

            $this->load->view('templates/header');
            $this->load->view('accounts/edit',$data);
            $this->load->view('templates/footer');
        }


        public function update(){

            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
             
            $this->account_model->update_account();

            //Set message
            $this->session->set_flashdata('account_updated', 'Your Account has been Updated');
            //Redirect accounts once accounts is update
            redirect('accounts');
        }
    }
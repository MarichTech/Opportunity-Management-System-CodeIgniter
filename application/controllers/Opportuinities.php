<?php
    class Opportuinities extends CI_Controller{
        public function index(){
            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'User Opportunities';

            $data['opportuinities'] = $this->opportuinity_model->get_opportuinities();
            $data['accounts'] = $this->account_model->get_accounts();
            //print_r($data['posts']);

            $this->load->view('templates/header');
            $this->load->view('opportuinities/index',$data);
            $this->load->view('templates/footer');
        }

        public function view($id = NULL){
            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['opportuinities'] = $this->opportuinity_model->get_opportuinities($id);
            $data['accounts'] = $this->account_model->get_accounts();

            if(empty($data['opportuinities'])){
              show_404();
            }

            $data['title'] = $data['opportuinities']['title'];

            $this->load->view('templates/header');
            $this->load->view('opportuinities/view',$data);
            $this->load->view('templates/footer');
        }

        
        public function createPopup(){

            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'Create Opportunity';

             //Validate form data
            $this->form_validation->set_rules('name','Name', 'required');
            $this->form_validation->set_rules('amount','Amount', 'required');
            $this->form_validation->set_rules('stage','Stage', 'required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if($this->form_validation->run() === FALSE){
                //If form is not valid
                $data['failed'] = 'true';
                $this->load->view('templates/header');
                $this->load->view('pages/home',$data);
                $this->load->view('templates/footer');

            }else{
                //If form is valid
                //Create Account
                $this->opportuinity_model->create_opportunity_pop();

                //Set message
                $this->session->set_flashdata('account_created', 'Your account has been created');
                //Redirect accounts once accounts is created
                redirect('opportuinities');
            } 
        }

        public function create(){

            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'Create Opportunity';
            $data['accounts'] = $this->account_model->get_accounts();

             //Validate form data
             $this->form_validation->set_rules('account_id','Account', 'required');
            $this->form_validation->set_rules('name','Name', 'required');
            $this->form_validation->set_rules('amount','Amount', 'required');
            $this->form_validation->set_rules('stage','Stage', 'required');
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if($this->form_validation->run() === FALSE){
                //If form is not valid
                $this->load->view('templates/header');
                $this->load->view('opportuinities/create',$data);
                $this->load->view('templates/footer');
            }else{
                //If form is valid
                //Create Account
                $this->opportuinity_model->create_opportunity();

                //Set message
                $this->session->set_flashdata('account_created', 'Your account has been created');
                //Redirect accounts once accounts is created
                redirect('opportuinities');
            } 
        }

        public function delete($id){
             // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            //Delete Account
            $this->opportuinity_model->delete_opportunity($id);

            //Set message
            $this->session->set_flashdata('account_deleted', 'Your post has been Deleted');
            //Redirect accounts once accounts is created
            redirect('opportuinities');
        }

        public function edit($id){
            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            } 

            $data['opportuinities'] = $this->opportuinity_model->get_opportuinities($id);

            if($this->session->userdata('user_id') != $this-> opportuinity_model->get_opportuinities($id)['user_id']){
                redirect('opportunities'); 
            }
            
            if(empty($data['opportuinities'])){
                show_404();
            }

            $data['title'] = 'Edit Opportuinity';

            $this->load->view('templates/header');
            $this->load->view('opportuinities/edit',$data);
            $this->load->view('templates/footer');
        }


        public function update(){

            // Check if user is Logged In
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
             
            $this->opportuinity_model->update_opportunity();

            //Set message
            $this->session->set_flashdata('account_updated', 'Your Account has been Updated');
            //Redirect accounts once accounts is update
            redirect('opportuinities');
        }

   

    }
<?php
    class Account_model extends CI_Model{

        public function _construct(){
            $this->load->database();
        }


        public function get_accounts($id = FALSE){
            // Check if name has been passed(not null/empty)
            if($id === FALSE){
                //If name is not empty get single account by name
                $this->db->order_by('accounts.id','DESC');
                $query = $this->db->get_where('accounts', array('user_id' => $this->session->userdata('user_id')));
                return $query->result_array();
            }

             //If name is empty all accounts
            $query = $this->db->get_where('accounts', array('id' => $id));
            return $query->row_array();
        }

        public function create_account($post_image){
            //Create an array to hold account details we want to store in db
            $data = array(
                //Format 'name_of_db_column' => data you want to store in the column(you can use post to get data from form)
                'name'=> $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phonenumber' => $this->input->post('phonenumber'),
                'address' => $this->input->post('address'),
                'user_id' => $this->session->userdata('user_id'),
                'post_image' => $post_image
            );

            return $this->db->insert('accounts', $data);
        }

        public function delete_account($id){
            //Delete an account from db using passed id
            $this->db->where('id',$id);
            $this->db->delete('accounts');
            return true;
        }

         public function update_account(){
           //Create an array to hold account details we want to store in db
           $data = array(
            //Format 'name_of_db_column' => data you want to store in the column(you can use post to get data from form)
            'name'=> $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phonenumber' => $this->input->post('phonenumber'),
            'address' => $this->input->post('address')

           );
           //Update data by the use of passed id
           $this->db->where('id', $this->input->post('id'));
           return $this->db->update('accounts', $data);
        }



    }
    ?>
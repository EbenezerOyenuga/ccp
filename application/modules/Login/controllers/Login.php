<?php

class Login extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->module('Logintemplate');
        $this->load->model("M_Login");
    }
    function index(){
        $this->load->module('Roles');
        $this->session->sess_destroy();
        $data['role'] = $this->roles->create_roles_select();
        $this->logintemplate->call_login_template($data);
    }



    function sign_in(){

        $this->load->library('form_validation');

        //rules for registration

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->index();

        }
        //if validation succeeds
        else{


        if ($this->input->post()){

            $user_id = $this->M_Login->get_userid($this->input->post('username'));
            foreach ($user_id as $key => $value) {
                $userid = ($value->login_id);
            }


            if (isset($userid)){
                $password = sha1($this->input->post('password'));
                $role = $this->input->post('role');
                $userdetails = $this->M_Login->confirm_user_password($userid, $password, $role);

                if (count($userdetails) == 1){

                    foreach ($userdetails as $key => $value) {
                        // Redirect to residence page
                        $this->session->set_userdata(array(
                            'user_id' => $value->login_id,
                            'user_role' => $value->assigned_role,
                            'username' => $value->username,
                            'loggedin' => 1
                        ));
                        if ($value->assigned_role == 1) {


                            redirect(base_url() . 'Admin');
                        } // Redirect to residence page
                        elseif ($value->assigned_role == 2) {

                            redirect(base_url() . 'Residence/show_semesters');

                        } elseif ($value->assigned_role == 3) {

                            redirect(base_url() . 'Worship/show_semesters');
                        } // Redirect to administrator page and populate seession
                        elseif ($value->assigned_role == 4) {

                            redirect(base_url() . 'home');
                        }
                    }
                }
                else{
                    $this->session->set_flashdata('message', 'Incorrect Password or Role.');
                    redirect(base_url().'Login');
                }
            }
            else{
                $this->session->set_flashdata('message', 'Incorrect Username.');
                redirect(base_url().'Login');
            }
        }
        }
    }

    function get_data_from_post(){
        $data['surname'] = $this->input->post('surname', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['role'] = $this->input->post('role', TRUE);
        return $data;
    }

    function sign_out(){
        $this->session->sess_destroy();
        redirect(base_url().'Login');
    }
}

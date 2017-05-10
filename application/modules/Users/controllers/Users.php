<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 6:39 AM
 */
class Users extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Users");
        $this->load->model("M_Login");
        $this->load->model("M_Roles");
        $this->load->model("M_Institutions");
    }
    function display_users(){
        $data = $this->get_data_from_post();
        //$this->load->module("Titles");
        $this->load->module("Roles");
        //$data['title'] = $this->titles->create_titles_select();
        $data['role'] = $this->roles->create_roles_select();
        //$data['users_table'] = $this->create_user_table();
        // setting page up for adding user
        $data['add_update'] = 1;
        $data['button_title'] = 'Add User';
        $data['page_title'] = 'Users';
        $data['content_view'] = 'Users/users_display_v';
        $this->admintemplate->call_admin_template($data);

    }

    function display_change_password(){

        $this->load->module("Admintemplate");
        $data['button_title'] = 'Change Password';
        $data['page_title'] = 'Change Password';
        $data['content_view'] = 'Users/change_password_display_v';
        $this->admintemplate->call_admin_template($data);

    }

    function register($data = NULL){

        $this->load->view('signup_v', $data);

    }

    function register_commuter(){
      $this->load->module('Institutions');
      $data['institutions'] = $this->institutions->create_institutions_select_form();
      $this->load->view('commuterSignup_v', $data);

    }

    function change_password(){
        // load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required');
        $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[new_pass]');

        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_change_password();

        }
        //if validation succeeds
        else{
            $this->load->model('M_Login');

            $userdetails = $this->M_Login->confirm_user_password($this->session->userdata('user_id'), sha1($this->input->post('old_pass')), $this->session->userdata('user_role'));

            if (count($userdetails) == 1){
                $this->M_Login->update_password();
                $this->session->set_flashdata('message', 'Password Updated successfully.');
                $this->display_change_password();

            }
            else{
                $this->session->set_flashdata('message', 'Incorrect Previous Password.');
                $this->display_change_password();
            }
        }

    }
    function get_data_from_post(){
        $data['id'] = $this->input->post('id', TRUE);
        $data['title'] = $this->input->post('title', TRUE);
        $data['firstname'] = $this->input->post('firstname', TRUE);
        $data['surname'] = $this->input->post('surname', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['role'] = $this->input->post('role', TRUE);
        return $data;
    }
    function create_roles_select(){
        $this->load->model('M_Roles');

        $role = $this->M_Roles->get_active_roles();
        $options = "";
        if (count($role)){
            foreach ($role as $key => $value){
                $options .= "<option value = '{$value->ROLE_ID}'>{$value->ROLE}</option>";
            }
        }
        return $options;
    }
    function create_role_select($selected_role)
    {
        $this->load->model('M_Roles');

        $role = $this->M_Roles->get_active_roles();
        $options = "";

        if (count($role)) {
            foreach ($role as $key => $value) {
                if ($selected_role == $value->ROLE_ID) {
                    $selected = "selected=selected ";
                } else {
                    $selected = "";
                }
                $options .= "<option value = '{$value->ROLE_ID}' $selected>{$value->ROLE}</option>";

            }

            return $options;
        }
    }



    function post_user(){
      $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_login.username]|min_length[4]|max_length[15]');
      $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[3]|max_length[255]');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[tbl_login.email]');
      $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric|min_length[11]|is_unique[tbl_users.phonenumber]');
      $this->form_validation->set_rules('institution','Institution','required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
      $this->form_validation->set_rules('conf_pword', 'Confirm Password', 'trim|required|matches[password]|min_length[6]');

      // if validation fails
      if ($this->form_validation->run() == FALSE){
          $this->load->module('Admintemplate');
          $this->register_commuter();

      }
      else{
      //gets id and saves users registration information
      $id = $this->M_Login->add_user_login();
      $this->M_Users->add_user($id);
      $this->M_Roles->assign_role_user_commuter($id);
      $this->session->set_flashdata('reg','Signup Successful!');
      redirect(base_url().'login');
      }
    }

      function signup($add_update){
        // load form validation library
        $this->load->library('form_validation');
        //$this->load->model('M_Institutions');

        //rules for registration

        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[tbl_login.email]');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[3]|max_length[25]');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required|min_length[3]|max_length[25]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('vehicle', 'Vehicle Name', 'trim|required');
        $this->form_validation->set_rules('vehicle_models', 'Vehicle Models', 'trim|required');
        $this->form_validation->set_rules('vehicle_plate', 'Vehicle Plate number', 'trim|required|is_unique[tbl_vehicles.plate_number]');
        $this->form_validation->set_rules('user_pic', 'Passport Picture', 'trim|required|is_unique[tbl_vehicles.plate_number]');
        $this->form_validation->set_rules('vehicle_pic', 'Vehicle Picture', 'trim|required|is_unique[tbl_vehicles.plate_number]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm', 'Confirm password', 'trim|required|');

        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->display_users();
        }
        //if validation succeeds
        else{

                $id = $this->M_Login->add_user_login();
                $files = $_FILES;
                if (!file_exists("./asset/images/Vehicle_Pictures{$id}/")) {
                    mkdir("./asset/images/Vehicle_Pictures{$id}/", 0777, true);
                }

                $vehicle_config = $this->set_vehicle_upload_option($id);
                $this->upload->initialize($vehicle_config);

                if($this->upload->do_upload('vehicle_pic')){
                   $this->M_Vehicles->assign_vehicle($id);
                    $file_path = $vehicle_config['upload_path'].$vehicle_config['file_name'].$this->upload->data('file_ext');
                    $file_thumb_path = $config['upload_path'].$vehicle_config['file_name'].'_thumb'.$this->upload->data('file_ext');

                    $config_thumb = $this->set_vehicle_thumb_option($file_path);

                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_thumb);

                    $this->image_lib->resize();
                    $this->M_Vehicles->update_vehicle_pix($id, $file_path, $file_thumb_path);
                }


                $files = $_FILES;
                if (!file_exists("./asset/images/Users_Pictures/")) {
                    mkdir("./asset/images/Users_Pictures/", 0777, true);
                }

                $user_config = $this->set_user_upload_option($id);
                $this->upload->initialize($user_config);

                if($this->upload->do_upload('user_pic')){
                  $file_path = $user_config['upload_path'].$id.$this->upload->data('file_ext');
                    $this->M_Users->add_user($id);

                }
                $this->M_Roles->assign_role_user($id);


            }
        //redirects to the users page to view the added user
    }

    private function set_vehicle_thumb_option($file_path){
        //resize image options
        $config_thumb = array();
        $config_thumb['image_library'] = 'gd2';
        $config_thumb['source_image'] = $file_path;
        $config_thumb['create_thumb'] = TRUE;
        $config_thumb['maintain_ratio'] = TRUE;
        $config_thumb['width']         = 360;
        $config_thumb['height']       = 240;

        return $config_thumb;
    }
    private function set_vehicle_upload_option($id){
        //upload image options
        $config = array();
        $config['upload_path'] = "./asset/images/Vehicle_Pictures{$id}/";
        $config['file_name'] = date_timestamp_get();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';

        return $config;
    }

    private function set_user_upload_option($id){
        //upload image options
        $config = array();
        $config['upload_path'] = "./asset/images/Users_Pictures/";
        $config['file_name'] = $id;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';

        return $config;
    }

    function delete_user($userid){
        $this->M_Users->delete_user($userid);
        redirect(base_url().'Admin/users');
    }
    function edit_user($id){
        $this->load->module(['Titles', 'Roles']);
        $users = $this->M_Users->edit_user($id);
        if (count($users)>0){
            foreach ($users as $key => $value) {
                $title_id = $value->TITLE_ID;
                $data['firstname'] = "{$value->FIRSTNAME}";
                $data['surname'] = "{$value->SURNAME}";
                $data['email'] = "{$value->EMAIL}";
                $role_id = "{$value->ROLE_ID}";
                $data['id'] = "{$value->LOGIN_ID}";
            }

        }
        $this->load->module('Admintemplate');
        $data['title'] = $this->titles->create_titles_selected($title_id);
        $data['role'] = $this->roles->create_role_select($role_id);
        $data['users_table'] = $this->create_user_table();
        // setting page up for update
        $data['add_update'] = 2;
        $data['button_title'] = 'Update User';
        $data['page_title'] = 'Users';
        $data['content_view'] = 'Users/users_display_v';
        $this->admintemplate->call_admin_template($data);
    }

    /*function create_user_table(){
        $users = $this->M_Users->get_all_users();

        $users_table = "";

        if (count($users)>0){
            $counter = 1;
            foreach ($users as $key => $value){
                $users_table .="<tr>";
                $users_table .="<td>{$counter}</td>";
                $users_table .="<td>{$value->FIRSTNAME} {$value->SURNAME}</td>";
                $users_table .="<td>{$value->EMAIL}</td>";
                $users_table .="<td>{$value->ROLE}</td>";

                $users_table .= "<td><a href='".base_url()."Users/edit_user/{$value->LOGIN_ID}'>Edit</a> | <a href='".base_url()."Users/delete_user/{$value->LOGIN_ID}'>Delete</a></td> ";
                $users_table .= "</tr>";
                $counter++;
            }
            return $users_table;
        }
    }*/

}

<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 6:39 AM
 */
class Roles extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Roles");
    }

    function display_sharing_ratio()
    {
        $data = "";
        $data['button_title'] = 'Update Sharing Ratio';
        $data['page_title'] = 'Sharing Ratio';
        $data['ratio_input'] = $this->create_ratio_input();
        $data['content_view'] = 'Roles/sharing_ratio_v';
        $this->admintemplate->call_admin_template($data);
    }

    function create_roles_select(){
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

    function create_ratio_input()
    {
        $role = $this->M_Roles->get_active_roles();
        $ratio_input = "";

        if (count($role)) {
            $col_ratio = 12/count($role);
            foreach ($role as $key => $value) {

               $ratio_input .= "<div class='col-lg-{$col_ratio} col-md-{$col_ratio} col-sm-{$col_ratio} col-xs-6'>";
               $ratio_input .= "<label>{$value->ROLE} Ratio</label>";
               $ratio_input .= "<div class='input-group'>";
               $ratio_input .= "<div class='form-line'>";
               $ratio_input .= "<input type='number' id='ratio{$value->ROLE_ID}' name='ratio{$value->ROLE_ID}' class='form-control' placeholder='Enter Ratio' value='{$value->SHARING_RATIO}'>";
               $ratio_input .= "</div>";
               $ratio_input .= "<span class='input-group-addon'>%</span>";
               $ratio_input .= "</div>";
               $ratio_input .= "</div>";
            }

    }
        return $ratio_input;
    }

    function update_ratio(){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration
        $role = $this->M_Roles->get_active_roles();
        if (count($role)) {
            foreach ($role as $key => $value)
                $this->form_validation->set_rules("ratio{$value->ROLE_ID}", "{$value->ROLE}", 'trim|required');
        }
        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_sharing_ratio();

        }
        //if validation succeeds
        else{
            $role = $this->M_Roles->get_active_roles();
            if (count($role)) {
                foreach ($role as $key => $value) {
                    $this->M_Roles->update_ratio($value->ROLE_ID, $this->input->post("ratio{$value->ROLE_ID}", TRUE));

                }
            }
            $this->session->set_flashdata('success', 'Pricing updated successfully.');
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/sharing_ratio');
        }
    }
}
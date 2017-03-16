<?php

class Institutions extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->module('Logintemplate');
        $this->load->model("M_Institutions");
    }

    function display_institutions()
    {
        $data['page_title'] = 'Institutions';
        $data['institutions_table'] = $this->create_institutions_table();
        $data['content_view'] = 'Institutions/institutions_v';
        $this->admintemplate->call_admin_template($data);
    }

    function get_data_from_post(){
        $data['institution'] = $this->input->post('institution', TRUE);
        return $data;
    }

    function create_institutions_table(){
        $institutions = $this->M_Institutions->get_all_institutions();
        $institutions_table = "";
        if (count($institutions) >= 0) {
            $counter = 1;
            foreach ($institutions as $key => $value) {
                $institutions_table .= "<tr>";
                $institutions_table .= "<td>{$counter}</td>";
                $institutions_table .= "<td>{$value->INSTITUTION}</td>";
                $institutions_table .= "<td><a href='".base_url()."Admin/edit_institution/{$value->INSTITUTION_ID}'> <i class='material-icons'>edit</i></a></td> ";
                if ($value->status == 1)
                    $institutions_table .= "<td><a href='".base_url()."Institutions/institution_change_status/{$value->INSTITUTION_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                else
                    $institutions_table .= "<td><a href='".base_url()."Institutions/institution_change_status/{$value->INSTITUTION_ID}/1'><i class='material-icons'>check</i></a></td> ";
                $institutions_table .= "</tr>";
                $counter++;
            }
        }
        return $institutions_table;
    }

    function post_user($add_update){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration
        if ($add_update == 1){
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[tbl_institutions.email]');
            $this->form_validation->set_rules('name', 'Contact Name', 'trim|required|is_unique[tbl_institutions.name]');
            $this->form_validation->set_rules('phone', 'Contact Phone', 'trim|required|is_unique[tbl_institutions.phone]');
            $this->form_validation->set_rules('institution', 'Institution', 'trim|required|is_unique[tbl_institutions.institution]');
        }
        else {
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('name', 'Contact Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'Contact Phone', 'trim|required');
            $this->form_validation->set_rules('institution', 'Institution', 'trim|required');
        }

        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_institutions();

        }
        //if validation succeeds
        else{
            if ($add_update == 1)
            {
                //gets id and saves users registration information
                $id = $this->M_Institutions->add_institution();

            }

            else{
                $this->M_Institutions->update_institution();
            }
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/institutions');
        }
    }
}
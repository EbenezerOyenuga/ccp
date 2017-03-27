<?php

class Points extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->module(['Logintemplate', "States", "Institutions"]);
        $this->load->model("M_Institutions");
    }

    function load_point_type()
    {
        if (isset($_GET['type'])) {
            if ($_GET['type'] == 1)
                $this->institutions->create_institutions_select();

            else
                $this->states->create_state_select();
        }
    }
    function display_points()
    {
        $data = $this->get_data_from_post();
        $data['button_title'] = 'Add Points';
        $data['page_title'] = 'Points';
        $data['add_update'] = 1;
        $data['content_view'] = 'Points/points_v';
        $this->admintemplate->call_admin_template($data);
    }

    function get_data_from_post(){
        $data['institution_id'] = $this->input->post('institution_id', TRUE);
        $data['institution'] = $this->input->post('institution', TRUE);
        $data['address'] = $this->input->post('address', TRUE);
        $data['city'] = $this->input->post('city', TRUE);
        $data['state'] = $this->input->post('state', TRUE);
        $data['name'] = $this->input->post('name', TRUE);
        $data['phone'] = $this->input->post('phone', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
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
                $institutions_table .= "<td>{$value->ADDRESS}, {$value->CITY}, {$value->STATE} State</td>";
                $institutions_table .= "<td>{$value->NAME}</td>";
                $institutions_table .= "<td>{$value->PHONE}</td>";
                $institutions_table .= "<td><a href='".base_url()."Admin/edit_institution/{$value->INSTITUTION_ID}'> <i class='material-icons'>edit</i></a></td> ";
                if ($value->STATUS == 1)
                    $institutions_table .= "<td><a href='".base_url()."Institutions/change_status/{$value->INSTITUTION_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                else
                    $institutions_table .= "<td><a href='".base_url()."Institutions/change_status/{$value->INSTITUTION_ID}/1'><i class='material-icons'>check</i></a></td> ";
                $institutions_table .= "</tr>";
                $counter++;
            }
        }
        return $institutions_table;
    }

    function change_status($instid, $status){
        $this->M_Institutions->change_status($instid, $status);
        redirect(base_url().'Admin/institutions');
    }

    function edit_institution($id){
        $this->load->module(['States']);
        $institution = $this->M_Institutions->get_institution($id);
        if (count($institution)>0){
            foreach ($institution as $key => $value) {
                $state_id = $value->STATE_ID;
                $data['institution_id'] = "{$value->INSTITUTION_ID}";
                $data['institution'] = "{$value->INSTITUTION}";
                $data['address'] = "{$value->ADDRESS}";
                $data['city'] = "{$value->CITY}";
                $data['name'] = "{$value->NAME}";
                $data['phone'] = "{$value->PHONE}";
                $data['email'] = "{$value->EMAIL}";
            }

        }
        $this->load->module('Admintemplate');
        $data['states'] = $this->states->create_state_selected($state_id);
        $data['institutions_table'] = $this->create_institutions_table();
        // setting page up for update
        $data['add_update'] = 2;
        $data['button_title'] = 'Update Institution';
        $data['page_title'] = 'Institution';
        $data['content_view'] = 'Institutions/institutions_v';
        $this->admintemplate->call_admin_template($data);
    }

    function post_institution($add_update){
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
        $this->form_validation->set_rules('address', 'Institution Address', 'trim|required');
        $this->form_validation->set_rules('city', 'Institution city', 'trim|required');
        $this->form_validation->set_rules('statedd', 'Institution State', 'trim|required');
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
                $this->session->set_flashdata('success', 'Institution added successfully.');
            }

            else{
                $this->M_Institutions->update_institution();
            }
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/institutions');
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 6:39 AM
 */
class States extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_States');
    }

    function create_states_select(){


        $state= $this->M_States->get_active_states();
        $options = "";
        if (count($state)){
            foreach ($state as $key => $value){
                $options .= "<option value = '{$value->STATE_ID}'>{$value->STATE}</option>";
            }
        }
        return $options;
    }

    function create_state_selected($selected_state)
    {
        $state = $this->M_States->get_active_states();
        $options = "";

        if (count($state)) {
            foreach ($state as $key => $value) {
                if ($selected_state == $value->STATE_ID) {
                    $selected = "selected=selected ";
                } else {
                    $selected = "";
                }
                $options .= "<option value = '{$value->STATE_ID}' $selected>{$value->STATE}</option>";

            }

            return $options;
        }
    }

    function create_state_select()
    {

        $states = $this->M_States->get_active_states();
        echo "<label for='state'>States</label>";
        echo "<div class='form-group'>";
        echo "<div class='form-line'>";
        echo "<select class='form-control show-tick' id='insti_state_dd' name='insti_state_dd' onchange='load_textbox()'>";
        echo "<option value=''>-- Please Select States --</option>";
        if (count($states)) {
            foreach ($states as $key => $value) {

                echo "<option value = '{$value->STATE_ID}'>{$value->STATE}</option>";

            }

        }
        echo "</select>";
        echo "</div>";
        echo "</div>";

    }

    function create_state_select_table()
    {

        $states = $this->M_States->get_active_states();
        echo "<label for='state'>States</label>";
        echo "<div class='form-group'>";
        echo "<div class='form-line'>";
        echo "<select class='form-control show-tick' id='insti_state_dd' name='insti_state_dd' onchange='load_state_table()'>";
        echo "<option value=''>-- Please Select States --</option>";
        if (count($states)) {
            foreach ($states as $key => $value) {

                echo "<option value = '{$value->STATE_ID}'>{$value->STATE}</option>";

            }

        }
        echo "</select>";
        echo "</div>";
        echo "</div>";

    }

    function display_states()
    {
        $data = $this->get_data_from_post();
        $data['button_title'] = 'Add State';
        $data['page_title'] = 'States';
        $data['states_table'] = $this->create_states_table();
        $data['add_update'] = 1;
        $data['content_view'] = 'States/states_v';
        $this->admintemplate->call_admin_template($data);
    }

    function get_data_from_post(){
        $data['state_id'] = $this->input->post('state_id', TRUE);
        $data['state'] = $this->input->post('state', TRUE);
        return $data;
    }

    function create_states_table(){
        $states = $this->M_States->get_all_states();
        $states_table = "";
        if (count($states) >= 0) {
            $counter = 1;
            foreach ($states as $key => $value) {
                $states_table .= "<tr>";
                $states_table .= "<td>{$counter}</td>";
                $states_table .= "<td>{$value->STATE}</td>";
                $states_table .= "<td><a href='".base_url()."Admin/edit_state/{$value->STATE_ID}'> <i class='material-icons'>edit</i></a></td> ";
                if ($value->STATE_STATUS == 1)
                    $states_table .= "<td><a href='".base_url()."States/change_status/{$value->STATE_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                else
                    $states_table .= "<td><a href='".base_url()."States/change_status/{$value->STATE_ID}/1'><i class='material-icons'>check</i></a></td> ";
                $states_table .= "</tr>";
                $counter++;
            }
        }
        return $states_table;
    }

    function change_status($stateid, $status){
        $this->M_States->change_status($stateid, $status);
        redirect(base_url().'Admin/states');
    }

    function edit_state($id){
        $this->load->module(['States']);
        $state = $this->M_States->get_state($id);
        if (count($state)>0){
            foreach ($state as $key => $value) {
                $data['state_id'] = "{$value->STATE_ID}";
                $data['state'] = "{$value->STATE}";
            }

        }
        $this->load->module('Admintemplate');
        $data['states_table'] = $this->create_states_table();
        // setting page up for update
        $data['add_update'] = 2;
        $data['button_title'] = 'Update State';
        $data['page_title'] = 'States';
        $data['content_view'] = 'States/states_v';
        $this->admintemplate->call_admin_template($data);
    }

    function post_state($add_update){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration

        if ($add_update == 1)
            $this->form_validation->set_rules('state', 'State Name', 'trim|required|is_unique[tbl_states.state]');

        else
            $this->form_validation->set_rules('state', 'State Name', 'trim|required');

        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_states();

        }
        //if validation succeeds
        else{
            if ($add_update == 1)
            {
                //gets id and saves users registration information
                $id = $this->M_States->add_state();
                $this->session->set_flashdata('success', 'State added successfully.');
            }

            else{
                $this->M_States->update_state();
                $this->session->set_flashdata('success', 'State updated successfully.');
            }
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/states');
        }
    }
}
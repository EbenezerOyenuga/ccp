<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 6:39 AM
 */
class Vehicles extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Vehicles');
    }

    function create_vehicle_type_select(){


        $vehicle_types= $this->M_Vehicles->get_active_vehicle_types();
        $options = "";
        if (count($vehicle_types)){
            foreach ($vehicle_types as $key => $value){
                $options .= "<option value = '{$value->VEHICLE_TYPE_ID}'>{$value->VEHICLE_TYPE}</option>";
            }
        }
        return $options;
    }

    function create_vehicle_type_selected($selected_vehicle_type)
    {
        $vehicle_types = $this->M_Vehicles->get_active_vehicle_types();
        $options = "";

        if (count($vehicle_types)) {
            foreach ($vehicle_types as $key => $value) {
                if ($selected_vehicle_type == $value->STATE_ID) {
                    $selected = "selected=selected ";
                } else {
                    $selected = "";
                }
                $options .= "<option value = '{$value->VEHICLE_TYPE_ID}' $selected>{$value->VEHICLE_TYPE}</option>";

            }

            return $options;
        }
    }

    /*function create_state_select()
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
*/
    function display_vehicle_types()
    {
        $data = $this->get_data_from_post();
        $data['button_title'] = 'Add Vehicle Type';
        $data['page_title'] = 'Vehicle Types';
        $data['vehicle_types_table'] = $this->create_vehicle_type_table();
        $data['add_update'] = 1;
        $data['content_view'] = 'Vehicles/vehicle_types_v';
        $this->admintemplate->call_admin_template($data);
    }

    function get_data_from_post(){
        $data['vehicle_type_id'] = $this->input->post('vehicle_type_id', TRUE);
        $data['vehicle_type'] = $this->input->post('vehicle_type', TRUE);
        $data['max_number_commuters'] = $this->input->post('max_number_commuters', TRUE);
        return $data;
    }

    function create_vehicle_type_table(){
        $vehicle_types = $this->M_Vehicles->get_all_vehicle_types();
        $vehicle_types_table = "";
        if (count($vehicle_types) >= 0) {
            $counter = 1;
            foreach ($vehicle_types as $key => $value) {
                $vehicle_types_table .= "<tr>";
                $vehicle_types_table .= "<td>{$counter}</td>";
                $vehicle_types_table .= "<td>{$value->VEHICLE_TYPE}</td>";
                $vehicle_types_table .= "<td>{$value->MAX_NUMBER_COMMUTERS}</td>";
                $vehicle_types_table .= "<td><a href='".base_url()."Admin/edit_vehicle_type/{$value->VEHICLE_TYPE_ID}'> <i class='material-icons'>edit</i></a></td> ";
                if ($value->VEHICLE_TYPE_STATUS == 1)
                    $vehicle_types_table .= "<td><a href='".base_url()."Vehicles/change_status/{$value->VEHICLE_TYPE_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                else
                    $vehicle_types_table .= "<td><a href='".base_url()."Vehicles/change_status/{$value->VEHICLE_TYPE_ID}/1'><i class='material-icons'>check</i></a></td> ";
                $vehicle_types_table .= "</tr>";
                $counter++;
            }
        }
        return $vehicle_types_table;
    }

    function change_status($vehicle_typeid, $status){
        $this->M_Vehicles->change_status($vehicle_typeid, $status);
        redirect(base_url().'Admin/vehicle_types');
    }

    function edit_vehicle_type($id){
        $vehicle_type = $this->M_Vehicles->get_vehicle_type($id);
        if (count($vehicle_type)>0){
            foreach ($vehicle_type as $key => $value) {
                $data['vehicle_type_id'] = "{$value->VEHICLE_TYPE_ID}";
                $data['vehicle_type'] = "{$value->VEHICLE_TYPE}";
                $data['max_number_commuters'] = "{$value->MAX_NUMBER_COMMUTERS}";
            }

        }
        $this->load->module('Admintemplate');
        $data['states_table'] = $this->create_vehicle_type_table();
        // setting page up for update
        $data['add_update'] = 2;
        $data['button_title'] = 'Update Vehicle Type';
        $data['page_title'] = 'Vehicle Types';
        $data['content_view'] = 'Vehicles/vehicle_types_v';
        $this->admintemplate->call_admin_template($data);
    }

    function post_vehicle_type($add_update){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration

        if ($add_update == 1)
            $this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'trim|required|is_unique[tbl_vehicle_types.vehicle_type]');

        else
            $this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'trim|required');
        $this->form_validation->set_rules('max_number_commuters', 'Maximum Number of Commuters', 'trim|required');

        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_vehicle_types();

        }
        //if validation succeeds
        else{
            if ($add_update == 1)
            {
                //gets id and saves users registration information
                $id = $this->M_Vehicles->add_vehicle_type();
                $this->session->set_flashdata('success', 'Vehicle Type added successfully.');
            }

            else{
                $this->M_Vehicles->update_vehicle_type();
                $this->session->set_flashdata('success', 'Vehicle Type updated successfully.');
            }
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/vehicle_types');
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 6:39 AM
 */
class ClassType extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Classtype');

    }

    function create_class_select(){


        $class_type= $this->M_Classtype->get_active_classes();
        $options = "";
        if (count($class_type)){
            foreach ($class_type as $key => $value){
                $options .= "<option value = '{$value->CLASS_ID}'>{$value->CLASS_TYPE}</option>";
            }
        }
        return $options;
    }

    function create_classtype_selected($selected_class)
    {
        $class_type = $this->M_Classtype->get_active_classes();
        $options = "";

        if (count($class_type)) {
            foreach ($class_type as $key => $value) {
                if ($selected_class == $value->CLASS_ID) {
                    $selected = "selected=selected ";
                } else {
                    $selected = "";
                }
                $options .= "<option value = '{$value->CLASS_ID}' $selected>{$value->CLASS_TYPE}</option>";

            }

            return $options;
        }
    }

    function display_class_types()
    {
        $data = $this->get_data_from_post();
        $data['button_title'] = 'Add Class Type';
        $data['page_title'] = 'Class Types';
        $data['classes_table'] = $this->create_class_types_table();
        $data['add_update'] = 1;
        $data['content_view'] = 'Classtype/class_type_v';
        $this->admintemplate->call_admin_template($data);
    }

    function get_data_from_post(){
        $data['class_id'] = $this->input->post('class_id', TRUE);
        $data['class_type'] = $this->input->post('class_type', TRUE);
        return $data;
    }

    function create_class_types_table(){
        $class_type = $this->M_Classtype->get_all_classtypes();
        $class_type_table = "";
        if (count($class_type) >= 0) {
            $counter = 1;
            foreach ($class_type as $key => $value) {
                $class_type_table .= "<tr>";
                $class_type_table .= "<td>{$counter}</td>";
                $class_type_table .= "<td>{$value->CLASS_TYPE}</td>";
                $class_type_table .= "<td><a href='".base_url()."Admin/edit_class_type/{$value->CLASS_ID}'> <i class='material-icons'>edit</i></a></td> ";
                if ($value->CLASS_STATUS == 1)
                    $class_type_table .= "<td><a href='".base_url()."Classtype/change_status/{$value->CLASS_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                else
                    $class_type_table .= "<td><a href='".base_url()."Classtype/change_status/{$value->CLASS_ID}/1'><i class='material-icons'>check</i></a></td> ";
                $class_type_table .= "</tr>";
                $counter++;
            }
        }
        return $class_type_table;
    }

    function change_status($stateid, $status){
        $this->M_Classtype->change_status($stateid, $status);
        redirect(base_url().'Admin/class_type');
    }

    function edit_class_type($id){
        $state = $this->M_Classtype->get_classtype($id);
        if (count($state)>0){
            foreach ($state as $key => $value) {
                $data['class_id'] = "{$value->CLASS_ID}";
                $data['class_type'] = "{$value->CLASS_TYPE}";
            }

        }
        $this->load->module('Admintemplate');
        $data['states_table'] = $this->create_class_types_table();
        // setting page up for update
        $data['add_update'] = 2;
        $data['button_title'] = 'Update Class Type';
        $data['page_title'] = 'Class Types';
        $data['content_view'] = 'Classtype/class_type_v';
        $this->admintemplate->call_admin_template($data);
    }

    function post_class_type($add_update){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration

        if ($add_update == 1)
            $this->form_validation->set_rules('class_type', 'Class Type', 'trim|required|is_unique[tbl_class.class_type]');

        else
            $this->form_validation->set_rules('class_type', 'Class Type', 'trim|required');

        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_class_types();

        }
        //if validation succeeds
        else{
            if ($add_update == 1)
            {
                //gets id and saves users registration information
                $id = $this->M_Classtype->add_classtype();
                $this->session->set_flashdata('success', 'Class Type added successfully.');
            }

            else{
                $this->M_Classtype->update_classtype();
                $this->session->set_flashdata('success', 'Class Type updated successfully.');
            }
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/class_type');
        }
    }

    /*
    function create_state_select()
    {

        $class_type = $this->M_Classtype->get_active_classes();
        echo "<label for='state'>Class Type:</label>";
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
}

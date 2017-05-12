<?php

class Points extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->module(['Logintemplate', "States", "Institutions"]);
        $this->load->model("M_Points");
    }

    function load_point_type()
    {
        if (isset($_GET['type'])) {
            if ($_GET['type'] == 1)
                $this->institutions->create_institutions_select_location();

            else
                $this->states->create_state_select();
        }
    }

    function load_point_type_dest()
    {
        if (isset($_GET['type'])) {
            if ($_GET['type'] == 1)
                $this->states->create_state_select_dest();

            else
                $this->institutions->create_institutions_select_location_dest();
        }
    }


    function create_state_point_selected($state_id, $state_point_id)
    {
        $state_points = $this->M_Points->get_active_state_points($state_id);
        $options = "";

        if (count($state_points)) {
            foreach ($state_points as $key => $value) {
                if ($state_point_id == $value->LOCATION_ID) {
                    $selected = "selected=selected ";
                } else {
                    $selected = "";
                }
                $options .= "<option value = '{$value->LOCATION_ID}' $selected>{$value->LOCATION}</option>";

            }

            return $options;
        }

    }

    function load_state_points_select()
    {
        if (isset($_GET['state'])) {
            $states = $this->M_Points->get_active_state_points($_GET['state']);
            echo "<label for='state'>Points</label>";
            echo "<div class='form-group'>";
            echo "<div class='form-line'>";
            echo "<select class='form-control show-tick' id='pointdd' name='pointdd'>";
            echo "<option value=''>-- Please Select Point --</option>";
            if (count($states)) {
                foreach ($states as $key => $value) {

                    echo "<option value = '{$value->LOCATION_ID}'>{$value->LOCATION}</option>";

                }


            }
            echo "</select>";
            echo "</div>";
            echo "</div>";
        }

    }

    function load_state_points_select_dest()
    {
        if (isset($_GET['state'])) {
            $states = $this->M_Points->get_active_state_points($_GET['state']);
            echo "<label for='state'>Destination Point</label>";
            echo "<div class='form-group'>";
            echo "<div class='form-line'>";
            echo "<select class='form-control show-tick' id='dest_pointid' name='dest_point'>";
            echo "<option value=''>-- Please Select Point --</option>";
            if (count($states)) {
                foreach ($states as $key => $value) {

                    echo "<option value = '{$value->LOCATION_ID}'>{$value->LOCATION}</option>";

                }


            }
            echo "</select>";
            echo "</div>";
            echo "</div>";
        }

    }

    function load_point_type_table()
    {
        if (isset($_GET['type'])) {
            if ($_GET['type'] == 1)
                $this->institutions->create_institutions_select_table();

            else
                $this->states->create_state_select_table();
        }
    }

    function load_institution_points_select()
    {
        if (isset($_GET['inst'])) {
            $inst = $this->M_Points->get_insti_point($_GET['inst']);
            echo "<label for='state'>Points</label>";
            echo "<div class='form-group'>";
            echo "<div class='form-line'>";
            echo "<select class='form-control show-tick' id='pointdd' name='pointdd'>";
            echo "<option value=''>-- Please Select Point Location --</option>";
            if (count($inst)) {
                foreach ($inst as $key => $value) {

                    echo "<option value = '{$value->LOCATION_ID}'>{$value->LOCATION}</option>";

                }


            }
            echo "</select>";
            echo "</div>";
            echo "</div>";
        }

    }

    function load_institution_points_select_dest()
    {
        if (isset($_GET['inst'])) {
            $inst = $this->M_Points->get_insti_point($_GET['inst']);
            echo "<label for='state'>Destination Point</label>";
            echo "<div class='form-group'>";
            echo "<div class='form-line'>";
            echo "<select class='form-control show-tick' id='dest_pointid' name='dest_point'>";
            echo "<option value=''>-- Please Select Point Location --</option>";
            if (count($inst)) {
                foreach ($inst as $key => $value) {

                    echo "<option value = '{$value->LOCATION_ID}'>{$value->LOCATION}</option>";

                }


            }
            echo "</select>";
            echo "</div>";
            echo "</div>";
        }

    }


    function load_text_box()
    {
        echo "<label for='point'>Point</label>";
        echo "<div class='form-group'>";
        echo "<div class='form-line'>";
        echo " <input type='text' id='point' name='point' class='form-control' placeholder='Enter Point Name'/>";
        echo "</div>";
        echo "</div>";

    }

    function display_points()
    {
        $data = $this->get_data_from_post();
        $data['points_table'] = $this->create_points_table();
        $data['button_title'] = 'Add Point';
        $data['page_title'] = 'Points';
        $data['add_update'] = 1;
        $data['content_view'] = 'Points/points_v';
        $this->admintemplate->call_admin_template($data);
    }

    function load_point_source_type_table()
    {
        if (isset($_GET['type'])) {

            echo "<table class='table table-bordered table-striped table-hover dataTable js-exportable'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>S/N</th>";
            echo "<th>Points</th>";
            echo "<th>Source</th>";
            echo "<th>Source Type</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tfoot>";
            echo "<tr>";
            echo "<th>S/N</th>";
            echo "<th>Points</th>";
            echo "<th>Source</th>";
            echo "<th>Source Type</th>";
            echo "</tr>";
            echo "</tfoot>";
            echo "</tbody>";
            if ($_GET['type'] == 1){
                $points = $this->M_Points->get_all_insti_points();
                if (count($points) >= 0) {
                    $counter = 1;
                    foreach ($points as $key => $value) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$value->LOCATION}</td>";
                        echo "<td>{$value->INSTITUTION}</td>";
                        echo "<td>Institution</td>";
                        echo "<td><a href='".base_url()."Admin/edit_point/{$value->LOCATION_ID}'> <i class='material-icons'>edit</i></a></td> ";
                        if ($value->STATUS == 1)
                            echo "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                        else
                            echo "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/1'><i class='material-icons'>check</i></a></td> ";
                        echo "</tr>";
                        $counter++;
                    }
                }
            }
            if ($_GET['type'] == 2){
                $points = $this->M_Points->get_all_state_points();
                if (count($points) >= 0) {
                    $counter = 1;
                    foreach ($points as $key => $value) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$value->LOCATION}</td>";
                        echo "<td>{$value->STATE}</td>";
                        echo "<td>State</td>";
                        echo "<td><a href='".base_url()."Admin/edit_point/{$value->LOCATION_ID}'> <i class='material-icons'>edit</i></a></td> ";
                        if ($value->LOCATION_STATUS == 1)
                            echo "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                        else
                            echo "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/1'><i class='material-icons'>check</i></a></td> ";
                        echo "</tr>";
                        $counter++;
                    }
                }
            }


            echo "</tbody>";
            echo "</table>";

        }

    }

    function load_state_table()
    {
        if (isset($_GET['state'])) {

            echo "<table class='table table-bordered table-striped table-hover dataTable js-exportable'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>S/N</th>";
            echo "<th>Points</th>";
            echo "<th>Source</th>";
            echo "<th>Source Type</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tfoot>";
            echo "<tr>";
            echo "<th>S/N</th>";
            echo "<th>Points</th>";
            echo "<th>Source</th>";
            echo "<th>Source Type</th>";
            echo "</tr>";
            echo "</tfoot>";
            echo "</tbody>";

                $points = $this->M_Points->get_state_points($_GET['state']);
                if (count($points) >= 0) {
                    $counter = 1;
                    foreach ($points as $key => $value) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$value->LOCATION}</td>";
                        echo "<td>{$value->STATE}</td>";
                        echo "<td>State</td>";
                        echo "<td><a href='".base_url()."Admin/edit_point/{$value->LOCATION_ID}'> <i class='material-icons'>edit</i></a></td> ";
                        if ($value->LOCATION_STATUS == 1)
                            echo "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                        else
                            echo "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/1'><i class='material-icons'>check</i></a></td> ";
                        echo "</tr>";
                        $counter++;
                    }
                }



            echo "</tbody>";
            echo "</table>";

        }

    }


    function load_insti_table()
    {
        if (isset($_GET['insti'])) {

            echo "<table class='table table-bordered table-striped table-hover dataTable js-exportable'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>S/N</th>";
            echo "<th>Points</th>";
            echo "<th>Source</th>";
            echo "<th>Source Type</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tfoot>";
            echo "<tr>";
            echo "<th>S/N</th>";
            echo "<th>Points</th>";
            echo "<th>Source</th>";
            echo "<th>Source Type</th>";
            echo "</tr>";
            echo "</tfoot>";
            echo "</tbody>";
                $points = $this->M_Points->get_insti_point($_GET['insti']);
                if (count($points) >= 0) {
                    $counter = 1;
                    foreach ($points as $key => $value) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$value->LOCATION}</td>";
                        echo "<td>{$value->INSTITUTION}</td>";
                        echo "<td>Institution</td>";
                        echo "<td><a href='".base_url()."Admin/edit_point/{$value->LOCATION_ID}'> <i class='material-icons'>edit</i></a></td> ";
                        if ($value->LOCATION_STATUS == 1)
                            echo "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                        else
                            echo "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/1'><i class='material-icons'>check</i></a></td> ";
                        echo "</tr>";
                        $counter++;
                    }
                }

            echo "</tbody>";
            echo "</table>";

        }

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

    function create_points_table(){
        $points_table = "";
        $points_institution = $this->M_Points->get_all_insti_points();
        if (count($points_institution) >= 0) {
            $counter = 1;
            foreach ($points_institution as $key => $value) {
                $points_table .= "<tr>";
                $points_table .= "<td>{$counter}</td>";
                $points_table .= "<td>{$value->LOCATION}</td>";
                $points_table .= "<td>{$value->INSTITUTION}</td>";
                $points_table .= "<td>Institution</td>";
                $points_table .= "<td><a href='".base_url()."Admin/edit_point/{$value->LOCATION_ID}'> <i class='material-icons'>edit</i></a></td> ";
                if ($value->STATUS == 1)
                    $points_table .= "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                else
                    $points_table .= "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/1'><i class='material-icons'>check</i></a></td> ";
                $points_table .= "</tr>";
                $counter++;
            }
        }

        $points_institution = $this->M_Points->get_all_state_points();
        if (count($points_institution) >= 0) {
            $counter = 1;
            foreach ($points_institution as $key => $value) {
                $points_table .= "<tr>";
                $points_table .= "<td>{$counter}</td>";
                $points_table .= "<td>{$value->LOCATION}</td>";
                $points_table .= "<td>{$value->STATE}</td>";
                $points_table .= "<td>State</td>";
                $points_table .= "<td><a href='".base_url()."Admin/edit_point/{$value->LOCATION_ID}'> <i class='material-icons'>edit</i></a></td> ";
                if ($value->LOCATION_STATUS == 1)
                    $points_table .= "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                else
                    $points_table .= "<td><a href='".base_url()."Points/change_status/{$value->LOCATION_ID}/1'><i class='material-icons'>check</i></a></td> ";
                $points_table .= "</tr>";
                $counter++;
            }
        }
        return $points_table;
    }

    function change_status($pointid, $status){
        $this->M_Points->change_status($pointid, $status);
        redirect(base_url().'Admin/points');
    }

    function edit_point($id){
        $this->load->model(['M_States'], ['M_Institutions']);
        $point = $this->M_Points->get_point($id);
        if (count($point)>0){
            foreach ($point as $key => $value) {
                $source_type = $value->POINT_TYPE_ID;
                if ($source_type == 1)
                    $insti_id = $value->SOURCE_ID;
                else
                    $state_id = $value->SOURCE_ID;

                $data['source_type'] = $source_type;
                $data['point_id'] = "{$value->LOCATION_ID}";
                $data['point'] = "{$value->LOCATION}";
            }

        }
        $this->load->module('Admintemplate');
        if ($source_type == 1) {
            $insti = $this->M_Institutions->get_institution($insti_id);
            if (count($insti) > 0) {
                foreach ($insti as $key => $value)
                    $data['insti'] = "{$value->INSTITUTION}";
            }
        }
        else{
            $state = $this->M_States->get_state($state_id);
            if (count($state) > 0) {
                foreach ($state as $key => $value)
                    $data['state'] = "{$value->STATE}";
            }
        }
        // setting page up for update
        $data['button_title'] = 'Update Point';
        $data['page_title'] = 'Points';
        $data['content_view'] = 'Points/edit_points_v';
        $this->admintemplate->call_admin_template($data);
    }

    function post_point($add_update){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration


            $this->form_validation->set_rules('pointdds', 'Point Type', 'trim|required');
            $this->form_validation->set_rules('insti_state_dd', 'Institution/State', 'trim|required');
            $this->form_validation->set_rules('point', 'Point Name', 'trim|required');
        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_points();

        }
        //if validation succeeds
        else{
            if ($add_update == 1)
            {
                //gets id and saves users registration information
                $id = $this->M_Points->add_points();
                $this->session->set_flashdata('success', 'Point added successfully.');
            }

            else{
                $this->M_Institutions->update_institution();
            }
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/points');
        }
    }

    function update_point($point_id){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration


        $this->form_validation->set_rules('point', 'Point Name', 'trim|required');
        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_points();

        }
        //if validation succeeds
        else{

                $this->M_Points->update_point($point_id);
            $this->session->set_flashdata('success', 'Point updated successfully.');
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/points');
        }
    }
}

<?php

class Pricing extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->module(['Logintemplate', "States", "Institutions", "Classtype"]);
        $this->load->model("M_Pricing");
    }

    function display_pricing()
    {
        $data = $this->get_data_from_post();
        $data['button_title'] = 'Add Pricing';
        $data['page_title'] = 'Pricing';
        $data['pricing_table'] = $this->create_pricing_table();
        $data['states'] = $this->states->create_states_select();
        $data['classes'] = $this->classtype->create_class_select();
        $data['institutions'] = $this->institutions->create_institution_select();
        $data['add_update'] = 1;
        $data['content_view'] = 'Pricing/pricing_v';
        $this->admintemplate->call_admin_template($data);
    }

    function get_data_from_post(){
        $data['price_id'] = $this->input->post('price_id', TRUE);
        $data['price'] = $this->input->post('price', TRUE);
        return $data;
    }

    function create_pricing_table(){
        $prices = $this->M_Pricing->get_all_prices();
        $prices_table = "";
        if (count($prices) >= 0) {
            $counter = 1;
            foreach ($prices as $key => $value) {
                $prices_table .= "<tr>";
                $prices_table .= "<td>{$counter}</td>";
                $prices_table .= "<td>{$value->INSTITUTION}</td>";
                $prices_table .= "<td>{$value->STATE} State</td>";
                $prices_table .= "<td>{$value->LOCATION}</td>";
                $prices_table .= "<td>{$value->CLASS_TYPE}</td>";
                $price = number_format($value->PRICE);
                $prices_table .= "<td><strike>N</strike>{$price}.00</td>";
                $prices_table .= "<td><a href='".base_url()."Admin/edit_pricing/{$value->PRICE_ID}'> <i class='material-icons'>edit</i></a></td> ";
                if ($value->PRICE_STATUS == 1)
                    $prices_table .= "<td><a href='".base_url()."Pricing/change_status/{$value->PRICE_ID}/0'> <i class='material-icons'>close</i></a></td> ";
                else
                    $prices_table .= "<td><a href='".base_url()."Pricing/change_status/{$value->PRICE_ID}/1'><i class='material-icons'>check</i></a></td> ";
                $prices_table .= "</tr>";
                $counter++;
            }
        }
        return $prices_table;
    }

    function change_status($priceid, $status){
        $this->M_Pricing->change_status($priceid, $status);
        redirect(base_url().'Admin/pricing');
    }

    function edit_pricing($id){
        $pricing = $this->M_Pricing->get_price($id);
        if (count($pricing)>0){
            foreach ($pricing as $key => $value) {
                $state_id = $value->DESTINATION_ID;
                $institution_id = $value->SOURCE_ID;
                $class_id = $value->CLASS_ID;
                $state_point_id = $value->STATE_POINT_ID;
                $data['price_id'] = "{$value->PRICE_ID}";
                $data['price'] = "{$value->PRICE}";
            }

        }

        $this->load->module('Admintemplate');
        $insti = $this->M_Institutions->get_institution($institution_id);
        if (count($insti) > 0) {
            foreach ($insti as $key => $value)
                $data['institution'] = "{$value->INSTITUTION}";
        }
        $state = $this->M_States->get_state($state_id);
        if (count($state) > 0) {
            foreach ($state as $key => $value)
                $data['state'] = "{$value->STATE}";
        }
        $class = $this->M_Classtype->get_classtype($class_id);
        if (count($class) > 0) {
            foreach ($class as $key => $value)
                $data['class'] = "{$value->CLASS_TYPE}";
        }
        $point = $this->M_Points->get_point($state_point_id);
        if (count($point) > 0) {
            foreach ($point as $key => $value)
                $data['point'] = "{$value->LOCATION}";
        }


        $data['state_points'] = $this->points->create_state_point_selected($state_id, $state_point_id);
        // setting page up for update
        $data['button_title'] = 'Update Price';
        $data['page_title'] = 'Pricing';
        $data['content_view'] = 'Pricing/edit_pricing_v';
        $this->admintemplate->call_admin_template($data);
    }

    function post_price($add_update){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration

        if ($add_update == 1){
            $this->form_validation->set_rules('instidd', 'Institution', 'trim|required');
            $this->form_validation->set_rules('statedd', 'States', 'trim|required');
            $this->form_validation->set_rules('pointdd', 'Points', 'trim|required');
            $this->form_validation->set_rules('classdd', 'Class', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');

        }
        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_pricing();

        }
        //if validation succeeds
        else{
            if ($add_update == 1)
            {
                //gets id and saves users registration information
                $id = $this->M_Pricing->add_price();
                $this->session->set_flashdata('success', 'Price added successfully.');
            }
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/pricing');
        }
    }

    function update_price(){
        // load form validation library
        $this->load->library('form_validation');

        //rules for registration

        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        // if validation fails
        if ($this->form_validation->run() == FALSE){
            $this->load->module('Admintemplate');
            $this->display_pricing();

        }
        //if validation succeeds
        else{

            $this->M_Pricing->update_price();
            $this->session->set_flashdata('success', 'Pricing updated successfully.');
            //redirects to the users page to view the added user
            redirect(base_url().'Admin/pricing');
        }
    }

}
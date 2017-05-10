<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 12:37 PM
 */
class M_Vehicles extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_vehicle_type(){

        $posted_data = array(
            'VEHICLE_TYPE' => $this->input->post('vehicle_type', TRUE),
            'MAX_NUMBER_COMMUTERS' => $this->input->post('max_number_commuters', TRUE),
            'VEHICLE_TYPE_STATUS' => 1
        );
        $this->db->insert('tbl_vehicle_types', $posted_data);

        return $this->db->insert_id();
    }


    function get_vehicle_type($vehicle_type_id){
        $this->db->select('*');
        $this->db->from('tbl_vehicle_types');
        $this->db->where('vehicle_type_id', $vehicle_type_id);
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_vehicle_types(){
        $this->db->select('*');
        $this->db->from('tbl_vehicle_types');
        $query = $this->db->get();
        return $query->result();
    }

    function get_active_vehicle_types(){
        $this->db->select('*');
        $this->db->from('tbl_vehicle_types');
        $this->db->where('vehicle_type_status', 1);
        $this->db->order_by('vehicle_type');
        $query = $this->db->get();

        return $query->result();
    }

    function change_status($id, $status){
        $this->db->set('vehicle_type_status', $status);
        $this->db->where('vehicle_type_id', $id);

        return $this->db->update('tbl_vehicle_types');
    }

    function update_vehicle_type(){
        $this->db->set('vehicle_type', $this->input->post('vehicle_type', TRUE));
        $this->db->set('max_number_commuters', $this->input->post('max_number_commuters', TRUE));
        $this->db->where('vehicle_type_id', $this->input->post('vehicle_type_id', TRUE));


        return $this->db->update('tbl_vehicle_types');

    }

}

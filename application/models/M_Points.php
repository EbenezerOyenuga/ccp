<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 12:37 PM
 */
class M_Points extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_points(){

        $posted_data = array(
            'POINT_TYPE_ID' => $this->input->post('pointdds', TRUE),
            'SOURCE_ID' => $this->input->post('insti_state_dd', TRUE),
            'LOCATION' => $this->input->post('point', TRUE),
            'LOCATION_STATUS' => 1
        );
        $this->db->insert('tbl_locations', $posted_data);

        return $this->db->insert_id();
    }


    function get_point($point_id){
        $this->db->select('*');
        $this->db->from('tbl_locations');
        $this->db->where('location_id', $point_id);
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_insti_points(){
        $this->db->select('*');
        $this->db->from('tbl_locations');
        $this->db->join('tbl_institutions', 'institution_id = source_id');
        $this->db->where('point_type_id', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function get_insti_point($insti_id){
        $this->db->select('*');
        $this->db->from('tbl_locations');
        $this->db->join('tbl_institutions', 'institution_id = source_id');
        $this->db->where('point_type_id', 1);
        $this->db->where('source_id', $insti_id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_state_points(){
        $this->db->select('*');
        $this->db->from('tbl_locations');
        $this->db->join('tbl_states', 'state_id = source_id');
        $this->db->where('point_type_id', 2);
        $query = $this->db->get();
        return $query->result();
    }

    function get_state_points($state_id){
    $this->db->select('*');
    $this->db->from('tbl_locations');
    $this->db->join('tbl_states', 'state_id = source_id');
    $this->db->where('point_type_id', 2);
    $this->db->where('source_id', $state_id);
    $query = $this->db->get();
    return $query->result();
}

    function get_active_state_points($state_id){
        $this->db->select('*');
        $this->db->from('tbl_locations');
        $this->db->join('tbl_states', 'state_id = source_id');
        $this->db->where('point_type_id', 2);
        $this->db->where('source_id', $state_id);
        $this->db->where('location_status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function change_status($id, $status){
        $this->db->set('location_status', $status);
        $this->db->where('location_id', $id);

        return $this->db->update('tbl_locations');
    }

    function update_point($point_id){
        $this->db->set('location', $this->input->post('point', TRUE));
        $this->db->where('location_id', $point_id);


        return $this->db->update('tbl_locations');

    }

}
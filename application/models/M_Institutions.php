<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 12:37 PM
 */
class M_Institutions extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_institution(){

        $posted_data = array(
            'INSTITUTION' => $this->input->post('institution', TRUE),
            'ADDRESS' => $this->input->post('address', TRUE),
            'CITY' => $this->input->post('city', TRUE),
            'STATE_ID' => $this->input->post('statedd', TRUE),
            'NAME' => $this->input->post('name', TRUE),
            'PHONE' => $this->input->post('phone', TRUE),
            'EMAIL' => $this->input->post('email', TRUE),
            'STATUS' => 1
        );
        $this->db->insert('tbl_institutions', $posted_data);

        return $this->db->insert_id();
    }

    function get_school($school_id){
        $this->db->select('*');
        $this->db->from('schools');
        $this->db->where('schoolid', $school_id);
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_institutions(){
        $this->db->select('*');
        $this->db->from('tbl_institutions');
        $this->db->join('tbl_states', 'tbl_institutions.STATE_ID = tbl_states.STATE_ID');
        $query = $this->db->get();
        return $query->result();
    }

    function get_active_institutions(){
        $this->db->select('*');
        $this->db->from('tbl_institutions');
        $this->db->where('status', 1);
        $this->db->order_by('institution');
        $query = $this->db->get();

        return $query->result();
    }

    function get_institution($id){
        $this->db->select('*');
        $this->db->from('tbl_institutions');
        $this->db->where('institution_id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    function change_status($id, $status){
        $this->db->set('status', $status);
        $this->db->where('institution_id', $id);

        return $this->db->update('tbl_institutions');
    }

    function update_institution(){
        $this->db->set('institution', $this->input->post('institution', TRUE));
        $this->db->set('address', $this->input->post('address', TRUE));
        $this->db->set('city', $this->input->post('city', TRUE));
        $this->db->set('name', $this->input->post('name', TRUE));
        $this->db->set('phone', $this->input->post('phone', TRUE));
        $this->db->set('email', $this->input->post('email', TRUE));
        $this->db->where('institution_id', $this->input->post('institution_id', TRUE));

        return $this->db->update('tbl_institutions');
    }
}
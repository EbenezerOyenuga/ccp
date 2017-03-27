<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 12:37 PM
 */
class M_States extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_state(){

        $posted_data = array(
            'STATE' => $this->input->post('state', TRUE),
            'STATE_STATUS' => 1
        );
        $this->db->insert('tbl_states', $posted_data);

        return $this->db->insert_id();
    }


    function get_school($state_id){
        $this->db->select('*');
        $this->db->from('tbl_states');
        $this->db->where('state_id', $state_id);
        $query = $this->db->get();

        return $query->result();
    }

    function get_all_states(){
        $this->db->select('*');
        $this->db->from('tbl_states');
        $query = $this->db->get();
        return $query->result();
    }

    function get_active_states(){
        $this->db->select('*');
        $this->db->from('tbl_states');
        $this->db->where('state_status', 1);
        $this->db->order_by('state');
        $query = $this->db->get();

        return $query->result();
    }

    function change_status($id, $status){
        $this->db->set('state_status', $status);
        $this->db->where('state_id', $id);

        return $this->db->update('tbl_states');
    }

    function get_state($id){
        $this->db->select('*');
        $this->db->from('tbl_states');
        $this->db->where('state_id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    function update_state(){
        $this->db->set('state', $this->input->post('state', TRUE));
        $this->db->where('state_id', $this->input->post('state_id', TRUE));


        return $this->db->update('tbl_states');

    }

}
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

    function update_state($state_id, $state_name){
        $this->db->set('state', $state_name);
        $this->db->where('state_id', $state_id);


        return $this->db->update('tbl_states');

    }

}
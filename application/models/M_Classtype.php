<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 12:37 PM
 */
class M_Classtype extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_classtype(){

        $posted_data = array(
            'CLASS_TYPE' => $this->input->post('class_type', TRUE),
            'CLASS_STATUS' => 1
        );
        $this->db->insert('tbl_class', $posted_data);

        return $this->db->insert_id();
    }

    function get_all_classtypes(){
        $this->db->select('*');
        $this->db->from('tbl_class');
        $query = $this->db->get();
        return $query->result();
    }

    function get_active_classes(){
        $this->db->select('*');
        $this->db->from('tbl_class');
        $this->db->where('class_status', 1);
        $this->db->order_by('class_type');
        $query = $this->db->get();

        return $query->result();
    }

    function change_status($id, $status){
        $this->db->set('class_status', $status);
        $this->db->where('class_id', $id);

        return $this->db->update('tbl_class');
    }

    function get_classtype($id){
        $this->db->select('*');
        $this->db->from('tbl_class');
        $this->db->where('class_id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    function update_classtype(){
        $this->db->set('class_type', $this->input->post('class_type', TRUE));
        $this->db->where('class_id', $this->input->post('class_id', TRUE));


        return $this->db->update('tbl_class');

    }

}
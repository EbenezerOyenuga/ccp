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

    function load_school($school_id, $school_name){

        $posted_data = array(
            'schoolId' => $school_id,
            'school' => $school_name
        );
        $this->db->insert('schools', $posted_data);

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
        $query = $this->db->get();
        return $query->result();
    }

    function get_active_schools(){
        $this->db->select('*');
        $this->db->from('schools');
        $this->db->where('status', 1);
        $this->db->order_by('school');
        $query = $this->db->get();

        return $query->result();
    }

    function change_status($id, $status){
        $this->db->set('status', $status);
        $this->db->where('schoolid', $id);

        return $this->db->update('schools');
    }

    function update_schools($school_id, $school_name){
        $this->db->set('school', $school_name);
        $this->db->where('schoolId', $school_id);


        return $this->db->update('schools');

    }
    function update_school($school_id, $schoolPic){
        $this->db->set('school_motto', $this->input->post('motto', TRUE));;
        $this->db->set('school_picture', $schoolPic);;
        $this->db->where('schoolId', $school_id);

        return $this->db->update('schools');

    }
}
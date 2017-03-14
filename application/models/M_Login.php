<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 12:37 PM
 */
class M_Login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_userid($email){
        $this->db->select('loginid');
        $this->db->from('login');
        $this->db->where('uname', $email);
        $query = $this->db->get();

        return $query->result();
    }
    function confirm_user_password($userid, $password, $role){

        $this->db->select('assigned_role, username, role, login_id, role_id');
        $this->db->from('tbl_login');
        $this->db->join('tbl_assigned_roles', 'tbl_login.login_id = tbl_assigned_roles.login_id');
        $this->db->join('tbl_roles', 'role_id = assigned_role');
        $this->db->where('login_id', $userid);
        $this->db->where('password', $password);
        $this->db->where('assigned_role', $role);

        $query = $this->db->get();

        return $query->result();
    }

    function update_password(){

        $this->db->set('password', sha1($this->input->post('new_pass', TRUE)));
        $this->db->where('login_id', $this->session->userdata('user_id'));

        return $this->db->update('tbl_login');
    }
}
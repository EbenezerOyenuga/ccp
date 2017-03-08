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

        $this->db->select('assigned_role, uname, nam, role, loginid, roleid');
        $this->db->from('login');
        $this->db->join('assigned_roles', 'loginid = login_id');
        $this->db->join('roles', 'roleid = assigned_role');
        $this->db->join('titles', 'login.titleid = titles.titleid');
        $this->db->where('loginid', $userid);
        $this->db->where('password', $password);
        $this->db->where('assigned_role', $role);

        $query = $this->db->get();

        return $query->result();
    }

    function confirm_admin_password($userid, $password, $role){

        $this->db->select('assigned_role, uname, nam, role, loginId, roleid');
        $this->db->from('login');
        $this->db->join('assigned_roles', 'loginid = login_id');
        $this->db->join('roles', 'roleid = assigned_role');
        $this->db->where('loginid', $userid);
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
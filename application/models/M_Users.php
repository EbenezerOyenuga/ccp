<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 12:37 PM
 */
class M_Users extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_users($dept){
        $this->db->select('nam, loginId');
        $this->db->from('login');
        $this->db->join('assigned_roles', 'login.loginId = assigned_roles.login_id');
        $this->db->join('roles', 'assigned_roles.assigned_role = roles.roleid');
        $query = $this->db->get();

        return $query->result();
    }

    function add_user($id){
        $posted_data = array(
          'login_id' => $id,
          'phonenumber' => $this->input->post('phone', TRUE),
          'firstname' => ucwords($this->input->post('name', TRUE)),
          'institution_id' => $this->input->post('institution', TRUE),
            /*'TITLE_ID' => $this->input->post('title', TRUE),
            'FIRSTNAME' => $this->input->post('firstname', TRUE),
            'SURNAME' => $this->input->post('surname', TRUE),
            'PASSWORD' => sha1('Password1')*/
        );
        $this->db->insert('tbl_users', $posted_data);

        return $this->db->insert_id();
    }

    function update_user(){
        $this->db->set('EMAIL', $this->input->post('email', TRUE));
        $this->db->set('TITLE_ID', $this->input->post('title', TRUE));
        $this->db->set('FIRSTNAME', $this->input->post('firstname', TRUE));
        $this->db->set('SURNAME', $this->input->post('surname', TRUE));
        $this->db->where('EMAIL', $this->input->post('email', TRUE));

        return $this->db->update('tbl_login');
    }

    function update_role(){

        $this->db->set('ASSIGNED_ROLE', $this->input->post('role', TRUE));
        $this->db->where('LOGIN_ID', $this->input->post('id', TRUE));

        return $this->db->update('tbl_assigned_roles');
    }

    function get_all_users(){
        $this->db->select('*');
        $this->db->from('tbl_login');
        $this->db->join('tbl_assigned_roles', 'tbl_login.login_id = tbl_assigned_roles.login_id');
        $this->db->join('tbl_roles', 'tbl_assigned_roles.assigned_role = tbl_roles.role_id');
        $query = $this->db->get();

        return $query->result();
    }

    function get_department_lecturers($deptId){
        $this->db->select('loginId, nam');
        $this->db->from('login');
        $this->db->join('assigned_roles', 'login.loginId = assigned_roles.login_id');
        $this->db->join('roles', 'assigned_roles.assigned_role = roles.roleid');
        $this->db->join('titles', 'login.titleId = titles.titleId');
        $this->db->where('assigned_role', 3);
        $this->db->where('deptId', $deptId);
        $query = $this->db->get();

        return $query->result();
    }

    function get_active_publishers(){
        $this->db->select('nam, phone, uname, title');
        $this->db->from('login');
        $this->db->join('assigned_roles', 'login.loginId = assigned_roles.login_id');
        $this->db->join('roles', 'assigned_roles.assigned_role = roles.roleid');
        $this->db->join('titles', 'login.titleId = titles.titleId');
        $this->db->where('assigned_role', 2);
        $query = $this->db->get();

        return $query->result();
    }

    function edit_user($id){
        $this->db->select('*');
        $this->db->from('tbl_login');
        $this->db->join('tbl_assigned_roles', 'tbl_login.login_id = tbl_assigned_roles.login_id');
        $this->db->join('tbl_titles', 'tbl_login.title_id = tbl_titles.titleid');
        $this->db->join('tbl_roles', 'tbl_assigned_roles.assigned_role = tbl_roles.role_id');
        $this->db->where('tbl_login.login_id', $id);
        $query = $this->db->get();

        return $query->result();
    }
    function delete_user($id){
        $this->db->where('login_id', $id);

        return $this->db->delete('tbl_login');
    }
}

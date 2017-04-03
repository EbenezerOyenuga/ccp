<?php

class Admin extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->module([
            'Institutions', 'Users', 'Points', 'Classtype', 'Pricing', 'Roles', 'ForwardedScores', 'ApproveResubmissions', 'Admintemplate'
        ]);
        $this->load->model(['M_Login', 'M_Institutions']);
    }

    function index(){
        $data['page_title'] = 'Dashboard';
        $data['num_institutions'] = count($this->M_Institutions->get_active_institutions());
        $data['content_view'] = 'Admin/dashboard_v';
        $this->admintemplate->call_admin_template($data);
    }

    function institutions(){
        $this->institutions->display_institutions();
    }

    function edit_institution($id){
        $this->institutions->edit_institution($id);
    }

    function states(){
        $this->states->display_states();
    }

    function edit_state($id){
        $this->states->edit_state($id);
    }
    function edit_point($id){
        $this->points->edit_point($id);
    }

    function points(){
        $this->points->display_points();
    }

    function users(){
        $this->users->display_users();
    }

    function change_password(){
        $this->users->display_change_password();
    }

    function class_type(){
        $this->classtype->display_class_types();
    }
    function edit_class_type($id){
        $this->classtype->edit_class_type($id);
    }

    function pricing(){
        $this->pricing->display_pricing();
    }
    function edit_pricing($id){
        $this->pricing->edit_pricing($id);
    }
    function sharing_ratio(){
        $this->roles->display_sharing_ratio();
    }

    function vehicles(){
        $this->roles->display_vehicle_types();
    }
}
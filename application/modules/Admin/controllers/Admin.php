<?php

class Admin extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->module([
            'Institutions', 'Users', 'Pass', 'Weights', 'Requirements', 'ApproveScores', 'ForwardedScores', 'ApproveResubmissions', 'Admintemplate'
        ]);
        $this->load->model(['M_Login']);
    }

    function index(){
        $data['page_title'] = 'Dashboard';
        $data['content_view'] = 'Admin/dashboard_v';
        $this->admintemplate->call_admin_template($data);
    }

    function institutions(){
        $this->institutions->display_institutions();
    }

    function edit_institution($id){
        $this->institutions->edit_institution($id);
    }
    function load_programs($semester_id){
        $this->loadstudents->display_programs($semester_id);
    }

    function users(){
        $this->users->display_users();
    }

    function change_password(){
        $this->users->display_change_password();
    }

    function pass(){
        $this->pass->display_pass();
    }

    function weights(){
        $this->weights->display_weights();
    }

    function weight_edit($id){
        $this->weights->edit_weight($id);
    }

    function requirements(){
        $this->requirements->display_requirements();
    }

    function graded_semesters(){
        $this->approvescores->display_semesters();
    }

    function show_graded_programs($semester){
        $this->approvescores->display_programs($semester);
    }

    function show_graded_levels($semester, $program){
        $this->approvescores->display_levels($semester, $program);
    }

    function show_graded_students($semester, $program, $level){
        $this->approvescores->display_students($semester, $program, $level);
    }

    function forwarded_semesters(){
        $this->forwardedscores->display_semesters();
    }

    function show_forwarded_programs($semester){
        $this->forwardedscores->display_programs($semester);
    }

    function show_forwarded_levels($semester, $program){
        $this->forwardedscores->display_levels($semester, $program);
    }

    function show_forwarded_students($semester, $program, $level){
        $this->forwardedscores->display_students($semester, $program, $level);
    }

    function show_resubmission_requests(){
        $this->approveresubmissions->display_resubmission_requests();
    }

    function show_pending_resubmissions(){
        $this->approveresubmissions->display_pending_resubmissions();
    }

    function show_resubmissions(){
        $this->approveresubmissions->display_resubmissions();
    }

    function show_rejections(){
        $this->approveresubmissions->display_rejections();
    }
    function addUser(){
        $this->users->addUser();
    }
}
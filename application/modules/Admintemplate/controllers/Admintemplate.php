<?php

class Admintemplate extends MY_Controller{
    function __construct()
    {
        parent::__construct();
    }
    function call_admin_template($data = NULL){
        //call login template
        $this->load->model('M_Semesters_Scores');
        $data['num_resub_req'] = count($this->M_Semesters_Scores->get_resubmission_requests());
        $data['num_resub_pending'] = count($this->M_Semesters_Scores->get_pending_resubmissions());
        $data['num_resubs'] = count($this->M_Semesters_Scores->get_resubmissions());
        $data['num_rej'] = count($this->M_Semesters_Scores->get_rejections());
        $data['num_for'] = count($this->M_Semesters_Scores->get_forward());
        $this->load->view('admin_template_v', $data);
    }
}
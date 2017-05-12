<?php
/**
 * Created by PhpStorm.
 * User: Software Developer
 * Date: 2/27/2017
 * Time: 2:51 PM
 */
class Home extends MY_Controller{
    function __construct()
    {
        parent::__construct();
    }
    public function index($data = NULL){
        //call login template
        //$this->load->model('M_Semesters_Scores');
        //$data['num_resub_req'] = count($this->M_Semesters_Scores->get_resubmission_requests());
        $this->load->module('Classtype');
        $data['class'] = $this->classtype->create_class_select();
        $this->load->view('homee_v', $data);
    }
}

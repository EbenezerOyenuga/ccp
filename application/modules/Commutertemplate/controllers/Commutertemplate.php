<?php

class Commutertemplate extends MY_Controller{
    function __construct()
    {
        parent::__construct();
    }
    function call_commuter_template($data = NULL){
        //call login template

        $this->load->view('commuter_template_v', $data);
    }
}

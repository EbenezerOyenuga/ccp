<?php

class Logintemplate extends MY_Controller{
    function __construct()
    {
        parent::__construct();
    }
    function call_login_template($data){
        //call login template
        $this->load->view('login_templatee_v', $data);
    }
}

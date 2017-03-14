<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 6:39 AM
 */
class Roles extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Roles");
    }

    function create_roles_select(){
        $role = $this->M_Roles->get_active_roles();
        $options = "";
        if (count($role)){
            foreach ($role as $key => $value){
                $options .= "<option value = '{$value->ROLE_ID}'>{$value->ROLE}</option>";
            }
        }
        return $options;
    }
    function create_role_select($selected_role)
    {
        $role = $this->M_Roles->get_active_roles();
        $options = "";

        if (count($role)) {
            foreach ($role as $key => $value) {
                if ($selected_role == $value->ROLE_ID) {
                    $selected = "selected=selected ";
                } else {
                    $selected = "";
                }
                $options .= "<option value = '{$value->ROLE_ID}' $selected>{$value->ROLE}</option>";

            }

            return $options;
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 6:39 AM
 */
class States extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_States');
    }

    function create_states_select(){


        $state= $this->M_States->get_active_states();
        $options = "";
        if (count($state)){
            foreach ($state as $key => $value){
                $options .= "<option value = '{$value->STATE_ID}'>{$value->STATE}</option>";
            }
        }
        return $options;
    }

    function create_state_selected($selected_state)
    {
        $state = $this->M_States->get_active_states();
        $options = "";

        if (count($state)) {
            foreach ($state as $key => $value) {
                if ($selected_state == $value->STATE_ID) {
                    $selected = "selected=selected ";
                } else {
                    $selected = "";
                }
                $options .= "<option value = '{$value->STATE_ID}' $selected>{$value->STATE}</option>";

            }

            return $options;
        }
    }
}
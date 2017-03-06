<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 6:39 AM
 */
class Titles extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Titles");
    }

    function create_titles_select(){

        $title = $this->M_Titles->get_active_titles();
        $options = "";
        if (count($title)){
            foreach ($title as $key => $value){
                $options .= "<option value = '{$value->titleId}'>{$value->title}</option>";
            }
        }
        return $options;
    }
    function create_titles_selected($selected_title){

        $title = $this->M_Titles->get_active_titles();
        $options = "";

        if (count($title)) {
            foreach ($title as $key => $value) {
                if ($selected_title == $value->titleId) {
                    $selected = "selected=selected ";
                } else {
                    $selected = "";
                }
                $options .= "<option value = '{$value->titleId}' $selected>{$value->title}</option>";

            }

            return $options;
        }
    }
}
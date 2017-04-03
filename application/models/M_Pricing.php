<?php

/**
 * Created by PhpStorm.
 * User: ebene
 * Date: 12/1/2016
 * Time: 12:37 PM
 */
class M_Pricing extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_price(){

        $posted_data = array(
            'SOURCE_ID' => $this->input->post('instidd', TRUE),
            'DESTINATION_ID' => $this->input->post('statedd', TRUE),
            'STATE_POINT_ID' => $this->input->post('pointdd', TRUE),
            'CLASS_ID' => $this->input->post('classdd', TRUE),
            'PRICE' => $this->input->post('price', TRUE),
            'PRICE_STATUS' => 1
        );
        $this->db->insert('tbl_pricing', $posted_data);

        return $this->db->insert_id();
    }

    function get_all_prices(){
        $this->db->select('tbl_pricing.SOURCE_ID, DESTINATION_ID, PRICE_ID, PRICE, INSTITUTION, STATE, CLASS_TYPE, PRICE_STATUS, LOCATION');
        $this->db->from('tbl_pricing');
        $this->db->join('tbl_states', 'DESTINATION_ID = STATE_ID');
        $this->db->join('tbl_institutions', 'SOURCE_ID = INSTITUTION_ID');
        $this->db->join('tbl_class', 'tbl_class.CLASS_ID = tbl_pricing.CLASS_ID');
        $this->db->join('tbl_locations', 'LOCATION_ID = STATE_POINT_ID');
        $query = $this->db->get();
        return $query->result();
    }

    function get_active_pricess(){
        $this->db->select('*');
        $this->db->from('tbl_institutions');
        $this->db->where('status', 1);
        $this->db->order_by('institution');
        $query = $this->db->get();

        return $query->result();
    }

    function get_price($id){
        $this->db->select('*');
        $this->db->from('tbl_pricing');
        $this->db->where('price_id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    function change_status($id, $status){
        $this->db->set('price_status', $status);
        $this->db->where('price_id', $id);

        return $this->db->update('tbl_pricing');
    }

    function update_price(){
        $this->db->set('price', $this->input->post('price', TRUE));
        $this->db->where('price_id', $this->input->post('price_id', TRUE));

        return $this->db->update('tbl_pricing');
    }
}
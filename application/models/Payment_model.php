<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_payment($data)
    {
        return $this->db->insert('payments', $data);
    }

    public function get_service_payments($package_id)
    {
        $this->db->select('
            cppt.id,
            cppt.package_id,
            cppt.payment_amount,
            cppt.expected_amount,            
            cppt.payment_date,
            cppt.payment_method AS payment_transaction_method,
            cppt.payment_status AS payment_status, 
            cppt.notes,
            cppt.added_on,
            cpt.status AS service_status,      
            cpt.service_name                   
        ');
        $this->db->from('client_package_payments_tbl cppt');
        $this->db->join('client_packages_tbl cpt', 'cpt.id = cppt.package_id', 'left');
        $this->db->where('cppt.package_id', $package_id);
        $this->db->order_by('cppt.payment_date', 'DESC');
        $this->db->order_by('cppt.added_on', 'DESC');
        $query = $this->db->get();

        log_message('debug', 'DEBUGGING Payment_model::get_service_payments - Package ID: ' . $package_id);
        log_message('debug', 'DEBUGGING Payment_model::get_service_payments - Last Query: ' . $this->db->last_query());


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_client_general_payments($client_id)
    {
        $this->db->select('id, client_id, package_id, payment_amount, expected_amount, payment_date, payment_method, payment_status, notes, added_on');
        $this->db->where('client_id', $client_id);
        $this->db->group_start();
        $this->db->where('package_id', NULL);
        $this->db->or_where('package_id', 0);
        $this->db->group_end();
        $this->db->order_by('payment_date', 'DESC');
        $this->db->order_by('added_on', 'DESC');
        $query = $this->db->get('payments');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
}

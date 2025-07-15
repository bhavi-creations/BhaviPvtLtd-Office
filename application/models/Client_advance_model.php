<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_advance_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // --- Client Advances Functions ---

    public function insert_client_advance($data) {
        $data['balance_amount'] = $data['amount'];
        return $this->db->insert('client_advance_tbl', $data);
    }

    public function get_all_client_advances() {
        $this->db->select('ca.*');
        $this->db->from('client_advance_tbl ca');
        $this->db->order_by('ca.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_client_advance_by_id($client_advance_id) {
        $this->db->select('ca.*');
        $this->db->from('client_advance_tbl ca');
        $this->db->where('ca.id', $client_advance_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_client_advance($client_advance_id, $data) {
        $this->db->where('id', $client_advance_id);
        return $this->db->update('client_advance_tbl', $data);
    }

    public function delete_client_advance($client_advance_id) {
        $this->db->where('id', $client_advance_id);
        return $this->db->delete('client_advance_tbl');
    }

    // --- Installment Payments Functions ---

    public function add_installment_payment($data) {
        // CORRECTED: Typo $thisthis to $this
        $this->db->insert('installment_payments_tbl', $data);

        $client_advance_id = $data['client_advance_id'];
        $amount_paid = $data['amount_paid'];

        $advance = $this->get_client_advance_by_id($client_advance_id);

        if ($advance) {
            $new_paid_amount = $advance['paid_amount'] + $amount_paid;
            $new_balance_amount = $advance['balance_amount'] - $amount_paid;
            
            $status = ($new_balance_amount <= 0) ? 'Completed' : 'Active';

            $update_data = [
                'paid_amount' => $new_paid_amount,
                'balance_amount' => $new_balance_amount,
                'status' => $status
            ];
            $this->update_client_advance($client_advance_id, $update_data);
        }
        return $this->db->affected_rows();
    }

    public function get_installments_for_advance($client_advance_id) {
        $this->db->where('client_advance_id', $client_advance_id);
        $this->db->order_by('payment_date', 'ASC');
        $query = $this->db->get('installment_payments_tbl');
        return $query->result_array();
    }
}
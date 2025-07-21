<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients_model extends CI_Model
{


    function insert_clients($data)
    {
        $this->db->insert("clients_tbl", $data);
        return $this->db->insert_id();
    }

    function insert_quote($data2)
    {
        $this->db->insert("quote", $data2);
        return $this->db->insert_id();
    }

    function select_clients()
    {
        $this->db->where('client_id !=', 0);
        $qry = $this->db->get('clients_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function select_clients_byID($id)
    {

        $this->db->where('client_id', $id);
        $qry = $this->db->get('clients_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function delete_clients($id)
    {
        $this->db->where('client_id', $id);
        $this->db->delete("clients_tbl");
        $this->db->affected_rows();
    }

    function delete_quote($id)
    {
        $this->db->where('client_id', $id);
        $this->db->delete("quote");
        $this->db->affected_rows();
    }

    function update_clients($data, $id)
    {
        $this->db->where('client_id', $id);
        $this->db->update('clients_tbl', $data);
        $this->db->affected_rows();
    }

    function update_quote($data2, $id)
    {
        $this->db->where('client_id', $id);
        $this->db->update('quote', $data2);
        return $this->db->affected_rows();
    }

    function select_quote_byID($id)
    {
        $this->db->where('client_id', $id);
        $qry = $this->db->get('quote');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }












    function get_client($client_id)
    {
        $this->db->where('client_id', $client_id);
        $query = $this->db->get('clients_tbl');
        return $query->row_array();
    }

    /**
     * Get only clients who have at least one service/package assigned.
     * @return array
     */
    public function get_clients_with_services()
    {
        $this->db->distinct();
        $this->db->select('t1.client_id, t1.client_name, t1.client_email, t1.client_mobile');
        $this->db->from('clients_tbl as t1');
        $this->db->join('client_packages_tbl as t2', 't1.client_id = t2.client_id', 'inner');
        $this->db->order_by('t1.client_name', 'ASC');
        return $this->db->get()->result_array();
    }



    public function get_payments($service_id = null)
    { // or pass client_id for general payments
        $this->db->select('id, package_id, payment_amount, expected_amount, payment_date, payment_method, payment_status, notes, added_on');
        $this->db->from('payments_table'); // IMPORTANT: Replace 'payments_table' with the actual name of your payments database table!

        if ($service_id) {
            $this->db->where('package_id', $service_id); // Assuming 'package_id' is the column linking payments to services
        } else {
            // If you're using this for general client payments, you'll need to pass client_id
            // For example: public function get_payments($client_id, $service_id = null) { ... }
            // $this->db->where('client_id', $client_id); // Add this line for general payments, adjust column name
        }

        $query = $this->db->get();
        return $query->result_array(); // This returns an array of payment data
    }
}

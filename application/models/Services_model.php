<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services_model extends CI_Model
{

    // =============================
    // CLIENT PACKAGES (SERVICES)
    // =============================

    /**
     * Get all services/packages for a specific client.
     * @param int $client_id
     * @return array
     */
    public function get_client_services($client_id)
    {
        return $this->db->get_where('client_packages_tbl', ['client_id' => $client_id])->result_array();
    }

    /**
     * Get details of a single service/package.
     * @param int $service_id
     * @return array|null
     */
    public function get_service($service_id)
    {
        return $this->db->get_where('client_packages_tbl', ['id' => $service_id])->row_array();
    }

    /**
     * Add a new service/package for a client.
     * @param array $data
     * @return int Inserted ID
     */
    public function add_service($data)
    {
        $this->db->insert('client_packages_tbl', $data);
        return $this->db->insert_id();
    }

    /**
     * Update the paid amount and status for a specific service.
     * This method will be called after a payment is made or deleted.
     * Only applies if a specific package_id is provided.
     * @param int $package_id
     */
    public function update_service_paid_amount_and_status($package_id)
    {
        if (empty($package_id)) {
            return; // Do nothing if no specific package is associated with the payment
        }

        // Calculate total amount paid for this specific package
        $this->db->select_sum('payment_amount');
        $this->db->where('package_id', $package_id);
        $query = $this->db->get('client_package_payments_tbl');
        $paid_for_this_service = $query->row()->payment_amount ?? 0;

        // Get the total amount of the service
        $service_details = $this->get_service($package_id);
        $total_service_amount = $service_details['amount'] ?? 0; // Handle case if service not found

        $status = 'pending';
        if ($total_service_amount > 0 && $paid_for_this_service >= $total_service_amount) {
            $status = 'paid';
        } elseif ($paid_for_this_service > 0) {
            $status = 'partially_paid';
        }

        $this->db->where('id', $package_id);
        $this->db->update('client_packages_tbl', [
            'paid_amount' => $paid_for_this_service,
            'status' => $status
        ]);
    }

   public function get_client_total_outstanding($client_id) {
        $this->db->select_sum('(amount - paid_amount)', 'outstanding_total');
        $this->db->where('client_id', $client_id);
        $this->db->where('status !=', 'paid');
        $query = $this->db->get('client_packages_tbl');

        // This line now correctly returns the outstanding total
        return $query->row()->outstanding_total ?? 0.00;
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
    '); // ALL COMMENTS HAVE BEEN REMOVED FROM INSIDE THIS STRING
    $this->db->from('client_package_payments_tbl cppt');
    $this->db->join('client_packages_tbl cpt', 'cpt.id = cppt.package_id', 'left');
    $this->db->where('cppt.package_id', $package_id);
    $this->db->order_by('cppt.payment_date', 'DESC');
    $this->db->order_by('cppt.added_on', 'DESC');

    // These debugging lines are PHP comments and are fine outside the select string
    $last_query = $this->db->last_query();
    error_log("DEBUG SQL Query: " . $last_query); 

    $query = $this->db->get();

    if ($query) {
        $result = $query->result_array();
        error_log("DEBUG Query Result Count: " . count($result));
        error_log("DEBUG Query Result Data: " . json_encode($result)); 
        return $result;
    } else {
        error_log("DEBUG Query Failed: " . $this->db->error()['message']);
        return false;
    }
}

   
    public function add_service_payment($data)
    {
        $this->db->insert('client_package_payments_tbl', $data);
        $payment_id = $this->db->insert_id();

        // If a specific package_id is provided, update its paid amount and status
        if (!empty($data['package_id'])) {
            $this->update_service_paid_amount_and_status($data['package_id']);
        }

        return $payment_id;
    }

    /**
     * Delete a payment and recalculate the associated service's paid amount/status.
     * @param int $payment_id
     */
    public function delete_service_payment($payment_id)
    {
        // Get payment details before deletion to get package_id
        $payment = $this->db->get_where('client_package_payments_tbl', ['id' => $payment_id])->row_array();
        if ($payment) {
            $package_id = $payment['package_id'];
            $this->db->delete('client_package_payments_tbl', ['id' => $payment_id]);

            // If the payment was linked to a specific package, recalculate its status
            if (!empty($package_id)) {
                $this->update_service_paid_amount_and_status($package_id);
            }
            return $this->db->affected_rows();
        }
        return 0;
    }



    public function delete_all_services_for_client($client_id)
    {
        $this->db->where('client_id', $client_id);
        $this->db->delete('client_packages_tbl');
        return $this->db->affected_rows();
    }
}

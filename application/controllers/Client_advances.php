<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_advances extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Client_advance_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        // Add authentication check here if your admin panel requires it
        // if (!$this->session->userdata('is_logged_in')) {
        //     redirect('auth/login');
        // }
    }

    public function index() {
        $data['title'] = 'Manage Client Advances';
        $data['advances'] = $this->Client_advance_model->get_all_client_advances();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/client_advance/list', $data);
        $this->load->view('admin/footer');
    }

    public function add() {
        $data['title'] = 'Add New Client Advance';

        $this->form_validation->set_rules('client_name', 'Client Name', 'required|max_length[255]');
        $this->form_validation->set_rules('amount', 'Total Amount', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('description', 'Description', 'max_length[500]');
        $this->form_validation->set_rules('end_date', 'End Date', 'callback_valid_date_range');
        $this->form_validation->set_rules('advance_type', 'Advance Type', 'max_length[50]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/client_advance/add', $data);
            $this->load->view('admin/footer');
        } else {
            $amount = $this->input->post('amount');
            $total_installments = 1; // Always set to 1 as planned installments are removed from UI
            $monthly_installment_amount = round($amount / $total_installments, 2); // Will be equal to amount

            $insert_data = array(
                'client_name' => $this->input->post('client_name'),
                'advance_type' => $this->input->post('advance_type'),
                'amount' => $amount,
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date') ? $this->input->post('end_date') : NULL,
                'description' => $this->input->post('description'),
                'total_installments' => $total_installments,
                'monthly_installment_amount' => $monthly_installment_amount,
                'status' => 'Active'
            );

            if ($this->Client_advance_model->insert_client_advance($insert_data)) {
                $this->session->set_flashdata('success', 'Client Advance added successfully.');
                redirect('client_advances');
            } else {
                $this->session->set_flashdata('error', 'Failed to add client advance.');
                redirect('client_advances/add');
            }
        }
    }

    public function view($client_advance_id) {
        $data['advance'] = $this->Client_advance_model->get_client_advance_by_id($client_advance_id);
        $data['installments'] = $this->Client_advance_model->get_installments_for_advance($client_advance_id);

        if (empty($data['advance'])) {
            show_404();
        }

        $data['title'] = 'Client Advance Details - ' . $data['advance']['client_name'];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/client_advance/view', $data);
        $this->load->view('admin/footer');
    }
    
    public function edit($client_advance_id) {
        $data['title'] = 'Edit Client Advance';
        $data['advance'] = $this->Client_advance_model->get_client_advance_by_id($client_advance_id);

        if (empty($data['advance'])) {
            show_404();
        }

        $this->form_validation->set_rules('client_name', 'Client Name', 'required|max_length[255]');
        $this->form_validation->set_rules('amount', 'Total Amount', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('description', 'Description', 'max_length[500]');
        $this->form_validation->set_rules('end_date', 'End Date', 'callback_valid_date_range');
        $this->form_validation->set_rules('advance_type', 'Advance Type', 'max_length[50]');
        $this->form_validation->set_rules('status', 'Status', 'required|max_length[20]');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/client_advance/edit', $data);
            $this->load->view('admin/footer');
        } else {
            $new_amount = $this->input->post('amount');
            $current_paid_amount = $data['advance']['paid_amount']; // Get current paid amount

            $total_installments = 1; // Still 1 as per previous decision
            $new_monthly_installment_amount = round($new_amount / $total_installments, 2);

            // Recalculate balance based on new total amount and existing paid amount
            $new_balance_amount = $new_amount - $current_paid_amount;
            
            // Determine status based on new balance
            $new_status = $this->input->post('status');
            if ($new_balance_amount <= 0) {
                $new_status = 'Completed';
            } else if ($new_status == 'Completed' && $new_balance_amount > 0) {
                // If user tried to set to completed but balance is still positive, revert to Active
                $new_status = 'Active';
            }


            $update_data = array(
                'client_name' => $this->input->post('client_name'),
                'advance_type' => $this->input->post('advance_type'),
                'amount' => $new_amount, // Use new amount
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date') ? $this->input->post('end_date') : NULL,
                'description' => $this->input->post('description'),
                'total_installments' => $total_installments,
                'monthly_installment_amount' => $new_monthly_installment_amount,
                'balance_amount' => $new_balance_amount, // Update balance amount
                'status' => $new_status, // Update status
            );

            if ($this->Client_advance_model->update_client_advance($client_advance_id, $update_data)) {
                $this->session->set_flashdata('success', 'Client Advance updated successfully.');
                redirect('client_advances/view/' . $client_advance_id);
            } else {
                $this->session->set_flashdata('error', 'Failed to update client advance.');
                redirect('client_advances/edit/' . $client_advance_id);
            }
        }
    }

    public function delete($client_advance_id) {
        if ($this->Client_advance_model->delete_client_advance($client_advance_id)) {
            $this->session->set_flashdata('success', 'Client Advance deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete client advance.');
        }
        redirect('client_advances');
    }

    public function add_payment($client_advance_id) {
        $data['title'] = 'Add Installment Payment';
        $data['advance'] = $this->Client_advance_model->get_client_advance_by_id($client_advance_id);

        if (empty($data['advance'])) {
            show_404();
        }

        $this->form_validation->set_rules('amount_paid', 'Amount Paid', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'max_length[50]');
        $this->form_validation->set_rules('remarks', 'Remarks', 'max_length[500]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/client_advance/add_payment', $data);
        } else {
            $amount_paid = $this->input->post('amount_paid');
            if ($amount_paid > $data['advance']['balance_amount']) {
                 $this->session->set_flashdata('error', 'Amount paid cannot exceed the remaining balance. Please check the amount.');
                 redirect('client_advances/view/' . $client_advance_id);
            }

            $payment_data = array(
                'client_advance_id' => $client_advance_id,
                'payment_date' => $this->input->post('payment_date'),
                'amount_paid' => $amount_paid,
                'payment_method' => $this->input->post('payment_method'),
                'remarks' => $this->input->post('remarks')
            );

            if ($this->Client_advance_model->add_installment_payment($payment_data)) {
                $this->session->set_flashdata('success', 'Installment payment added successfully.');
                redirect('client_advances/view/' . $client_advance_id);
            } else {
                $this->session->set_flashdata('error', 'Failed to add installment payment.');
                redirect('client_advances/add_payment/' . $client_advance_id);
            }
        }
        $this->load->view('admin/footer');
    }

    // Custom validation callback for date range
    public function valid_date_range($end_date) {
        $start_date = $this->input->post('start_date');
        if (!empty($end_date) && !empty($start_date) && strtotime($end_date) < strtotime($start_date)) {
            $this->form_validation->set_message('valid_date_range', 'The End Date must be after or equal to the Start Date.');
            return FALSE;
        }
        return TRUE;
    }
}
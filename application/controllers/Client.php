<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }
        // Load necessary helpers, libraries, and models
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session'); // Ensure session library is loaded
        $this->load->model('Payment_model');
        // Load your existing Clients_model and the new Services_model
        $this->load->model('Clients_model');
        $this->load->model('Services_model'); // Load the new model here
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/add-client');
        $this->load->view('admin/footer');
    }

    public function manage_client()
    {
        $data['content'] = $this->Clients_model->select_clients();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-client', $data);
        $this->load->view('admin/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('name', 'Clients Name', 'required');
        $this->form_validation->set_rules('email', 'Clients Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Clients Mobile', 'required');

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $details = $this->input->post('details');
        $refered = $this->input->post('refered');
        $status = 1;

        $project_duration = $this->input->post('project_duration');
        $digital_services = $this->input->post('digital_services');
        $images = $this->input->post('images');
        $description = $this->input->post('description');
        $SEO = $this->input->post('SEO');
        $links = $this->input->post('links');
        $filteredLink = filter_var($links, FILTER_SANITIZE_URL);
        $payment_installments = $this->input->post('payment_installments');

        if ($this->form_validation->run() !== FALSE) {
            $client_id = $this->Clients_model->insert_clients(array(
                'client_name' => $name,
                'client_email' => $email,
                'client_mobile' => $mobile,
                'client_address' => $address,
                'client_details' => $details,
                'refered_by' => $refered,
                'status' => $status
            ));

            $quote_inserted = FALSE;
            if ($client_id) {
                $quote_id = $this->Clients_model->insert_quote(array(
                    'client_id' => $client_id,
                    'project_duration' => $project_duration,
                    'digital_services' => $digital_services,
                    'images' => $images,
                    'description' => $description,
                    'SEO' => $SEO,
                    'links' => $filteredLink,
                    'payment_installments' => $payment_installments
                ));
                if ($quote_id) {
                    $quote_inserted = TRUE;
                }
            }

            if ($client_id && $quote_inserted) {
                $this->session->set_flashdata('success', "New Client Added Successfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, New Client Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->index();
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'Clients Name', 'required');
        $this->form_validation->set_rules('email', 'Clients Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Clients Mobile', 'required');

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $details = $this->input->post('details');
        $refered = $this->input->post('refered');
        $updated = date('Y-m-d H:i:s');
        $status = 1;


        $project_duration = $this->input->post('project_duration');
        $digital_services = $this->input->post('digital_services');
        $images = $this->input->post('images');
        $description = $this->input->post('description');
        $SEO = $this->input->post('SEO');
        $links = $this->input->post('links');
        $filteredLink = filter_var($links, FILTER_SANITIZE_URL);
        $payment_installments = $this->input->post('payment_installments');


        if ($this->form_validation->run() !== FALSE) {
            $this->Clients_model->update_clients(array(
                'client_name' => $name,
                'client_email' => $email,
                'client_mobile' => $mobile,
                'client_address' => $address,
                'client_details' => $details,
                'refered_by' => $refered,
                'status' => $status,
                'updated_on' => $updated
            ), $id);

            $this->Clients_model->update_quote(array(
                'project_duration' => $project_duration,
                'digital_services' => $digital_services,
                'images' => $images,
                'description' => $description,
                'SEO' => $SEO,
                'links' => $filteredLink,
                'payment_installments' => $payment_installments
            ), $id);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Client Updated Successfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Client Update Failed or No Changes Made.");
            }
            redirect(base_url() . "client/manage_client");
        } else {
            $this->edit($id);
        }
    }


    function edit($id)
    {
        $data['content'] = $this->Clients_model->select_clients_byID($id);
        $data['quote'] = $this->Clients_model->select_quote_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-client', $data);
        $this->load->view('admin/footer');
    }

    function view_quote($id)
    {
        $data['content'] = $this->Clients_model->select_quote_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/view-quote', $data);
        $this->load->view('admin/footer');
    }

    function delete($id)
    {
        $this->Clients_model->delete_quote($id);
        $this->Clients_model->delete_clients($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Client Deleted Successfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Client Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    // ===========================================
    // NEW METHODS FOR CLIENT SERVICES & PAYMENTS
    // ===========================================

    /**
     * Displays a detailed view of a client's services and payments.
     * This is the NEW client details page.
     * Accessible via: http://your_base_url/client/view_details/CLIENT_ID
     * @param int $client_id
     */
    public function view_details($client_id)
    {
        // Get client basic details
        $data['client'] = $this->Clients_model->get_client($client_id);
        if (empty($data['client'])) {
            show_404(); // Client not found, show CodeIgniter's 404 page
        }

        // Get all services for this client
        $data['services'] = $this->Services_model->get_client_services($client_id);

        // Get total outstanding amount for this client
        $data['total_outstanding'] = $this->Services_model->get_client_total_outstanding($client_id);

        // Load the view using your existing admin template structure
        $this->load->view('admin/header');
        $this->load->view('admin/clients/details_view', $data); // <--- CORRECTED VIEW PATH
        $this->load->view('admin/footer');
    }




    public function add_payment_action()
    {
        // Prevent direct browser access
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // Validation rules
        // package_id is optional as a payment might be general for client's overall due
        $this->form_validation->set_rules('package_id', 'Service ID', 'integer'); // Allows empty string for non-specific package
        $this->form_validation->set_rules('payment_amount', 'Payment Amount', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('expected_amount', 'Expected Amount', 'required|numeric|greater_than[0]'); // ADD THIS LINE: Validation for Expected Amount
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'required|callback_valid_date');
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'required|max_length[100]');
        $this->form_validation->set_rules('payment_status', 'Payment Status', 'required|max_length[50]'); // ADD THIS LINE: Validation for Payment Status
        $this->form_validation->set_rules('notes', 'Notes', 'max_length[500]'); // It's good practice to add a rule for notes too if collected

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => 'error', 'message' => validation_errors()];
        } else {
            // Collect data
            $package_id = $this->input->post('package_id');
            $data = [
                'package_id'     => !empty($package_id) ? $package_id : NULL, // Set to NULL if no specific package ID
                'payment_amount' => $this->input->post('payment_amount'),
                'expected_amount' => $this->input->post('expected_amount'), // ADD THIS LINE: Get Expected Amount from POST data
                'payment_date'   => $this->input->post('payment_date'),
                'payment_method' => $this->input->post('payment_method'),
                'payment_status' => $this->input->post('payment_status'), // ADD THIS LINE: Get Payment Status from POST data
                'notes'          => $this->input->post('notes'),
                'added_on'       => date('Y-m-d H:i:s') // Automatically set added_on timestamp
            ];

            // Call the model to add the payment
            $insert_id = $this->Services_model->add_service_payment($data);
            if ($insert_id) {
                $response = ['status' => 'success', 'message' => 'Payment recorded successfully!', 'payment_id' => $insert_id];
            } else {
                $response = ['status' => 'error', 'message' => 'Failed to record payment.'];
            }
        }
        echo json_encode($response);
    }

    public function get_service_payments_ajax($service_id)
    {
        // Ensure this is an AJAX request for security and proper response format
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        header('Content-Type: application/json'); // Tell the browser to expect JSON

        $payments = $this->Services_model->get_service_payments($service_id);

        if ($payments) {
            echo json_encode(['status' => 'success', 'payments' => $payments]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No payments found for this service.']);
        }
    }



    public function get_general_payments_ajax($client_id)
    {
        $response = array('status' => 'error', 'message' => 'Invalid request');

        if ($this->input->is_ajax_request() && $client_id) {
            // Assuming your Payment_model has a method like get_client_general_payments
            $payments = $this->Payment_model->get_client_general_payments($client_id);

            if ($payments !== false) { // Check if the query was successful
                $response = array(
                    'status' => 'success',
                    'payments' => $payments
                );
            } else {
                $response['message'] = 'Failed to fetch general payments from the database.';
            }
        } else {
            $response['message'] = 'Access denied or missing client ID.';
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


















    public function select_client_for_services()
    {
        // Use the new model function to get only clients with services
        $data['clients'] = $this->Clients_model->get_clients_with_services();
        $this->load->view('admin/header');
        $this->load->view('admin/clients/select_client_for_services_view', $data); // Load this modified view
        $this->load->view('admin/footer');
    }

    /**
     * Displays the form to add a new service for a client.
     * This will show a dropdown of all clients.
     * Accessible via: http://your_base_url/client/add_service_page
     */
    public function add_service_page()
    {
        $data['all_clients'] = $this->Clients_model->select_clients(); // Get ALL clients for the dropdown
        $this->load->view('admin/header');
        $this->load->view('admin/clients/add_service_form_view', $data); // New view for the form
        $this->load->view('admin/footer');
    }

    /**
     * Handles adding a new service for a client via AJAX.
     * This existing method will now be used by the new 'add_service_form_view'.
     * No changes needed here, assuming it was already correct from previous instructions.
     */
    public function add_service_action()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $this->form_validation->set_rules('client_id', 'Client', 'required|integer');
        $this->form_validation->set_rules('service_name', 'Service Name', 'required|max_length[255]');
        $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('service_date', 'Service Start Date', 'required|callback_valid_date');
        $this->form_validation->set_rules('service_end_date', 'Service End Date', 'callback_valid_date|callback_end_date_after_start[service_date]'); // VALIDATION FOR END DATE
        $this->form_validation->set_rules('description', 'Description', 'max_length[1000]');

        if ($this->form_validation->run() == FALSE) {
            $response = ['status' => 'error', 'message' => validation_errors()];
        } else {
            $client_id = $this->input->post('client_id');
            $data = [
                'client_id'        => $client_id,
                'service_name'     => $this->input->post('service_name'),
                'amount'           => $this->input->post('amount'),
                'payment_method'   => $this->input->post('payment_method'), // NEW: Add this line
                'service_date'     => $this->input->post('service_date'),
                'service_end_date' => $this->input->post('service_end_date') ? $this->input->post('service_end_date') : NULL, // Add this line
                'description'      => $this->input->post('description')
            ];

            $insert_id = $this->Services_model->add_service($data);
            if ($insert_id) {
                $response = ['status' => 'success', 'message' => 'Service added successfully!', 'service_id' => $insert_id];
            } else {
                $response = ['status' => 'error', 'message' => 'Failed to add service.'];
            }
        }
        echo json_encode($response);
    }

    // NEW CUSTOM VALIDATION CALLBACK: Ensure this function exists in your Client.php
    /**
     * Custom validation callback to ensure end date is on or after start date.
     * @param string $end_date The value of the service_end_date field.
     * @param string $start_date_field The name of the service_date field.
     * @return bool
     */
    public function end_date_after_start($end_date, $start_date_field)
    {
        if (empty($end_date)) { // If end date is optional and empty, it's valid
            return TRUE;
        }

        $start_date = $this->input->post($start_date_field);

        if (strtotime($end_date) < strtotime($start_date)) {
            $this->form_validation->set_message('end_date_after_start', 'The {field} must be on or after the Service Start Date.');
            return FALSE;
        }
        return TRUE;
    }

    // Ensure your valid_date function is also present and correct:
    public function valid_date($date)
    {
        if (preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches)) {
            if (checkdate($matches[2], $matches[3], $matches[1])) {
                return TRUE;
            }
        }
        $this->form_validation->set_message('valid_date', 'The {field} field must be in YYYY-MM-DD format and a valid date.');
        return FALSE;
    }

    /**
     * Deletes all services and packages for a specific client.
     * This action is triggered from the select_client_for_services_view.
     * @param int $client_id
     */
    public function delete_client_services($client_id)
    {
        if (empty($client_id) || !is_numeric($client_id)) {
            $this->session->set_flashdata('error', "Invalid client ID.");
            redirect(base_url('client/select_client_for_services'));
        }

        $affected_rows = $this->Services_model->delete_all_services_for_client($client_id);

        if ($affected_rows > 0) {
            $this->session->set_flashdata('success', "All services for client ID {$client_id} deleted successfully.");
        } else {
            // Could mean client had no services, or an error occurred.
            // If they had no services, it's fine, so no error flashdata needed.
            $client_details = $this->Clients_model->get_client($client_id);
            if ($client_details && $this->Services_model->get_client_services($client_id)) {
                $this->session->set_flashdata('error', "Failed to delete services for client ID {$client_id}.");
            } else {
                $this->session->set_flashdata('info', "Client ID {$client_id} had no services to delete.");
            }
        }
        redirect(base_url('client/select_client_for_services')); // Redirect back to the filtered list
    }
}

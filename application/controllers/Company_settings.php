<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models, libraries, and helpers
        $this->load->model('Company_settings_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload'); // CodeIgniter's upload library
        // Add authentication check here if your admin panel requires it
        // if (!$this->session->userdata('is_logged_in')) {
        //  redirect('auth/login');
        // }
    }

    public function index() {
        // Ensure the single row for assets exists in the DB
        // The model method will now be responsible for returning full paths for display
        $data['assets'] = $this->Company_settings_model->ensure_assets_row_exists(); 
        $data['title'] = 'Company Assets & Payslip Settings';

        // Load the view for managing company settings
        $this->load->view('admin/header', $data);
        $this->load->view('admin/company_settings', $data);
        $this->load->view('admin/footer');
    }

    public function upload_asset() {
        $asset_type = $this->input->post('asset_type'); // 'company_logo', 'company_stamp', 'digital_signature'
        $asset_id = $this->input->post('asset_id'); // ID of the company_assets_tbl row (should be 1)

        if (!$asset_type || !$asset_id) {
            $this->session->set_flashdata('error', 'Invalid asset type or ID.');
            redirect('Company_settings');
        }

        $upload_dir = './uploads/company_assets/'; // Define upload directory
        if (!is_dir($upload_dir)) { // Create directory if it doesn't exist
            mkdir($upload_dir, 0777, TRUE);
        }

        $config['upload_path']   = $upload_dir; // Upload to this directory
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048; // 2MB max size
        $config['encrypt_name']  = TRUE; // Encrypt file name for security and uniqueness

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($asset_type)) { // Use asset_type as the file input name
            $error_message = $this->upload->display_errors();
            log_message('error', 'File upload error for ' . $asset_type . ': ' . $error_message);
            $this->session->set_flashdata('error', $error_message);
        } else {
            $upload_data = $this->upload->data();
            $file_name_only = $upload_data['file_name']; // <<< IMPORTANT CHANGE: Get only the filename

            $data_to_update = array($asset_type . '_path' => $file_name_only); // <<< IMPORTANT CHANGE: Store only filename

            // Get current assets to delete old file from server if it exists
            // We need the full path to the old file on disk for unlink()
            $current_assets = $this->Company_settings_model->get_company_assets(FALSE); // Pass FALSE to get raw DB values
            $old_file_name_db = $current_assets[$asset_type . '_path'] ?? null;
            $old_full_path = '';

            if ($old_file_name_db) {
                // Construct the full server path for the old file
                $old_full_path = FCPATH . 'uploads/company_assets/' . $old_file_name_db;
            }

            if ($this->Company_settings_model->update_company_assets($asset_id, $data_to_update)) {
                // Delete old file from server if it exists and is different from new one
                if ($old_full_path && $old_file_name_db != $file_name_only && file_exists($old_full_path)) {
                    unlink($old_full_path);
                }
                $this->session->set_flashdata('success', ucfirst(str_replace('_', ' ', $asset_type)) . ' uploaded successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update ' . ucfirst(str_replace('_', ' ', $asset_type)) . ' path in database.');
                // If DB update fails, delete the newly uploaded file to prevent orphans
                unlink($upload_dir . $file_name_only); // Delete the new file from server
            }
        }
        redirect('Company_settings');
    }

    public function delete_asset($asset_type, $asset_id) {
        if (!$asset_type || !$asset_id) {
            $this->session->set_flashdata('error', 'Invalid asset type or ID for deletion.');
            redirect('Company_settings');
        }

        $data_to_update = array($asset_type . '_path' => NULL); // Set DB value to NULL

        // Get current assets to delete old file from server
        // We need the full path to the old file on disk for unlink()
        $current_assets = $this->Company_settings_model->get_company_assets(FALSE); // Pass FALSE to get raw DB values
        $old_file_name_db = $current_assets[$asset_type . '_path'] ?? null;
        $old_full_path = '';

        if ($old_file_name_db) {
            // Construct the full server path for the old file
            $old_full_path = FCPATH . 'uploads/company_assets/' . $old_file_name_db;
        }

        if ($this->Company_settings_model->update_company_assets($asset_id, $data_to_update)) {
            if ($old_full_path && file_exists($old_full_path)) {
                unlink($old_full_path);
            }
            $this->session->set_flashdata('success', ucfirst(str_replace('_', ' ', $asset_type)) . ' deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete ' . ucfirst(str_replace('_', ' ', $asset_type)) . '.');
        }
        redirect('Company_settings');
    }
}
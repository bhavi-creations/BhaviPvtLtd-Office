<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Extra_Work extends CI_Controller // The class name stays the same
{
    public function __construct()
    {
        parent::__construct();
        // Load necessary helpers and libraries
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('text');    
        // Load the Extra_Work_model
        $this->load->model('Extra_Work_model');

        // --- Admin Authentication Check (IMPORTANT!) ---
        // You should replace this with your actual admin login/session check logic.
        /*
        if (!$this->session->userdata('is_admin_logged_in')) { // Replace 'is_admin_logged_in' with your actual session key
            redirect('admin/login'); // Replace 'admin/login' with your admin login URL
        }
        */
        // ------------------------------------------------
    }

    public function manage_all_entries()
    {
        $data['work_entries'] = $this->Extra_Work_model->get_all_extra_work_for_admin();

        // --- LOAD YOUR ADMIN TEMPLATE PARTS HERE ---
        $this->load->view('admin/header');
        $this->load->view('admin/extra_work/manage_all_extra_work', $data);
        $this->load->view('admin/footer');
        // ---------------------------------------------
    }






    // Add this new method
public function view_entry($work_id = null)
{
    if ($work_id === null) {
        // No ID provided, redirect to manage page
        $this->session->set_flashdata('error', 'No extra work entry ID provided.');
        redirect('admin/extra-work/manage');
    }

    $data['entry'] = $this->Extra_Work_model->get_extra_work_by_id($work_id);

    if (empty($data['entry'])) {
        // Entry not found
        $this->session->set_flashdata('error', 'Extra work entry not found.');
        redirect('admin/extra-work/manage');
    }

    $this->load->view('admin/header');
    $this->load->view('admin/extra_work/view_extra_work_details', $data); // New view for details
    $this->load->view('admin/footer');
}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payslip_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Pdf_lib');
        $this->load->model('Staff_model');
        $this->load->model('Salary_model');
        $this->load->model('Company_settings_model'); // <<< ADDED: Load Company_settings_model
        $this->load->helper('url');
    }

    /**
     * Generates and saves a payslip PDF for a given staff member, month, and year.
     *
     * @param int $staff_id The ID of the staff member.
     * @param int $month The month for which the payslip is generated (e.g., 01 for January).
     * @param int $year The year for which the payslip is generated (e.g., 2023).
     * @return string|bool The filename of the saved PDF file on success, or false on failure.
     */
    public function generate_and_save_payslip_pdf($staff_id, $month, $year) {
        $staff_details = $this->Staff_model->select_staff_byID($staff_id);
        $salary_data = $this->Salary_model->get_staff_salary_details_for_payslip($staff_id, $month, $year);
        $company_assets = $this->Company_settings_model->get_company_assets(TRUE); // <<< ADDED: Fetch company assets

        if (!$staff_details || !$salary_data) {
            log_message('error', 'Payslip generation failed: Staff or Salary data not found for staff_id: ' . $staff_id . ', month: ' . $month . ', year: ' . $year);
            return false;
        }

        $employee_name = isset($staff_details[0]['staff_name']) ? $staff_details[0]['staff_name'] : 'unknown_employee';
        $employee_name_clean = url_title($employee_name, 'underscore', TRUE);
        $month_padded = str_pad($month, 2, '0', STR_PAD_LEFT);

        $file_name = $employee_name_clean . '_' . $month_padded . '_' . $year . '.pdf';

        $data = [
            'staff' => (object)($staff_details[0] ?? []),
            'salary' => (object)$salary_data,
            'month_name' => date('F', mktime(0, 0, 0, $month, 10)),
            'year' => $year,
            'company_assets' => (object)($company_assets ?? []) // <<< ADDED: Pass company assets to the view
        ];

        $html_content = $this->load->view('admin/payslip_template', $data, TRUE);

        $upload_dir = FCPATH . 'uploads/payslips/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, TRUE);
        }

        $full_path = $upload_dir . $file_name;

        try {
            $this->pdf_lib->generatePdfFromHtml($html_content, $full_path);

            if (file_exists($full_path)) {
                return $file_name;
            } else {
                log_message('error', 'Payslip PDF file not created at: ' . $full_path);
                return false;
            }
        } catch (Exception $e) {
            log_message('error', 'Error generating payslip PDF: ' . $e->getMessage());
            return false;
        }
    }
}
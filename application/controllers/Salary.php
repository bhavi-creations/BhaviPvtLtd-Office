<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salary extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // Ensure Session library is always loaded here or in autoload.php
        $this->load->library('session'); // Redundant if in autoload, but harmless
        if (! $this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }
        $this->load->model('Salary_model');
        $this->load->model('Staff_model');
        $this->load->model('Payslip_model');
        // $this->load->model('Company_model');
        $this->load->model('Company_settings_model');
        $this->load->helper('download');
        $this->load->helper('file');
    }

    public function my_payslips()
    {
        // Ensure only staff (usertype 2) can access this
        if ($this->session->userdata('usertype') != 2) {
            $this->session->set_flashdata('error', 'Access denied. You are not authorized to view this page.');
            redirect(base_url()); // Redirect to main dashboard or admin page
        }

        $staff_id = $this->session->userdata('userid'); // Get the logged-in staff's ID

        if (empty($staff_id)) {
            $this->session->set_flashdata('error', 'Your session has expired or employee ID is missing. Please log in again.');
            redirect(base_url() . 'login');
            return;
        }

        $data['payslips'] = $this->Salary_model->get_staff_payslips($staff_id);

        $this->load->view('staff/header');
        $this->load->view('staff/my_payslips', $data);
        $this->load->view('staff/footer');
    }

    /**
     * Securely download a payslip for the currently logged-in staff member.
     * @param int $salary_id The ID of the salary record (which has the payslip path).
     */
    public function download_my_payslip($salary_id)
    {
        // Ensure only staff (usertype 2) can access this
        if ($this->session->userdata('usertype') != 2) {
            show_error('Access denied. You are not authorized to download this file.', 403);
            return;
        }

        $logged_in_staff_id = $this->session->userdata('userid'); // Get the logged-in staff's ID

        if (empty($logged_in_staff_id)) {
            show_error('Unauthorized access. Employee ID not found in session.', 403);
            return;
        }

        // 1. Get payslip path AND staff_id from the database using salary_id (from Salary_model)
        $payslip_meta_data = $this->Salary_model->get_payslip_path_by_salary_id($salary_id);

        if ($payslip_meta_data) {
            // CRUCIAL SECURITY CHECK: Verify that the payslip belongs to the logged-in employee
            if ($payslip_meta_data->staff_id != $logged_in_staff_id) {
                log_message('error', 'Attempted unauthorized payslip download. Salary ID: ' . $salary_id . ', Logged-in Staff ID: ' . $logged_in_staff_id . ', Payslip Staff ID: ' . $payslip_meta_data->staff_id);
                show_error('Access denied. This payslip does not belong to your account.', 403);
                return;
            }

            $full_file_path = FCPATH . $payslip_meta_data->payslip_pdf_path;

            if (file_exists($full_file_path)) {
                // 2. Get month and year from salary_tbl for the filename
                $salary_date_info = $this->Salary_model->get_salary_month_year($salary_id);

                // 3. Get staff details for the name using the new method
                $staff_details = $this->Staff_model->select_staff_byID($payslip_meta_data->staff_id);

                $staff_name_for_file = 'Employee'; // Default if name not found
                $month_name_for_file = 'Month';
                $year_for_file = 'Year';

                // Adjusted access: Check if $staff_details is not empty AND if the 'staff_name' key exists in the first element
                if (!empty($staff_details) && isset($staff_details[0]['staff_name'])) {
                    // Access using associative array key
                    $staff_name_for_file = str_replace(' ', '_', strtolower($staff_details[0]['staff_name']));
                }

                if ($salary_date_info) {
                    $month_name_for_file = date('F', mktime(0, 0, 0, $salary_date_info->month, 1));
                    $year_for_file = $salary_date_info->year;
                }

                $download_filename = "{$staff_name_for_file}_{$month_name_for_file}_{$year_for_file}_Payslip.pdf";

                force_download($download_filename, file_get_contents($full_file_path));
            } else {
                log_message('error', 'Employee Payslip download failed: File not found at ' . $full_file_path . ' for Salary ID: ' . $salary_id);
                $this->session->set_flashdata('error', 'Payslip file not found. Please contact support.');
                redirect(base_url('salary/my_payslips'));
            }
        } else {
            log_message('error', 'Employee Payslip download failed: No record found for Salary ID ' . $salary_id);
            $this->session->set_flashdata('error', 'Invalid payslip record or record not found.');
            redirect(base_url('salary/my_payslips'));
        }
    }


    public function generate_payslip_pdf($staff_id, $pay_month, $pay_year)
    {
        // --- 1. Fetch Employee and Salary Data ---
        // You'll need to ensure your Salary_model has a method like this
        // to get specific salary record for a staff for a given month/year.
        $employee_salary_data = $this->Salary_model->get_staff_salary_details_for_payslip($staff_id, $pay_month, $pay_year);

        if (empty($employee_salary_data)) {
            // Handle case where no salary data is found for the given month/employee
            $this->session->set_flashdata('error', 'Salary data not found for the selected employee and month/year.');
            redirect(base_url('salary/manage_payslips')); // Redirect back to a relevant page
        }

        // Assuming $employee_salary_data contains $staff and $salary objects/arrays
        $data['staff'] = $employee_salary_data['staff'];
        $data['salary'] = $employee_salary_data['salary'];
        $data['month_name'] = date('F', mktime(0, 0, 0, $pay_month, 10)); // Convert month number to name
        $data['year'] = $pay_year;

        // Fetch company assets (logo, stamp, signature) - assuming this is in a model like Settings_model or Company_model
        $this->load->model('Company_model'); // Load your Company_model or equivalent
        $data['company_assets'] = $this->Company_model->get_company_assets(); // Fetch paths for logo, stamp, signature

        // --- DEBUGGING IMAGE PATHS ---
        log_message('debug', 'Company Logo Path: ' . ($data['company_assets']->company_logo_path ?? 'Not Set'));
        log_message('debug', 'Company Stamp Path: ' . ($data['company_assets']->company_stamp_path ?? 'Not Set'));
        log_message('debug', 'Digital Signature Path: ' . ($data['company_assets']->digital_signature_path ?? 'Not Set'));
        // --- END DEBUGGING IMAGE PATHS ---


        // --- 2. Load the HTML content for the payslip ---
        $html_payslip = $this->load->view('admin/payslip_template', $data, true); // true makes it return content, not display it

        // --- 3. Generate PDF using Payslip_model ---
        $file_name = 'payslip_' . $data['staff']->employee_id . '_' . $pay_month . '_' . $pay_year . '.pdf';
        $save_path = 'uploads/payslips/' . $file_name; // Path relative to FCPATH

        // Ensure the directory exists
        if (!is_dir(FCPATH . 'uploads/payslips')) {
            mkdir(FCPATH . 'uploads/payslips', 0777, true); // Create directory with write permissions
        }

        // Generate and save PDF using the Payslip_model method
        $pdf_generated = $this->Payslip_model->generate_and_save_payslip_pdf($html_payslip, $save_path);


        if ($pdf_generated) {
            // --- 4. Update the salary_tbl with the payslip path ---
            $this->Salary_model->update_salary_payslip_path($data['salary']->id, $save_path); // Assuming $data['salary']->id is the salary record ID

            $this->session->set_flashdata('success', 'Payslip generated and saved successfully!');
            redirect(base_url('salary/manage_payslips')); // Redirect to the payslip list
        } else {
            $this->session->set_flashdata('error', 'Failed to generate payslip PDF.');
            redirect(base_url('salary/manage_payslips'));
        }
    }

    public function index()
    {
        $data['departments'] = $this->Department_model->select_departments();
        $this->load->view('admin/header');
        $this->load->view('admin/add-salary', $data);
        $this->load->view('admin/footer');
    }

    public function invoice($id)
    {
        $data['content'] = $this->Salary_model->select_salary_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/salary-invoice', $data);
        $this->load->view('admin/footer');
    }

    public function invoice_print($id)
    {
        $data['content'] = $this->Salary_model->select_salary_byID($id);
        $this->load->view('admin/invoice-print', $data);
    }

    public function staff_invoice($id)
    {
        $data['content'] = $this->Salary_model->select_salary_byID($id);
        $this->load->view('staff/header');
        $this->load->view('staff/salary-invoice', $data);
        $this->load->view('staff/footer');
    }

    public function staff_invoice_print($id)
    {
        $data['content'] = $this->Salary_model->select_salary_byID($id);
        $this->load->view('staff/invoice-print', $data);
    }

    public function manage()
    {
        $data['staff'] = $this->Staff_model->select_staff();
        $data['content'] = $this->Salary_model->select_salary();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-salary', $data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $staff = $this->session->userdata('userid');
        $data['content'] = $this->Salary_model->select_salary_byStaffID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/view-salary', $data);
        $this->load->view('staff/footer');
    }
    public function insert()
    {
        $current_month = date('m');
        $current_year = date('Y');

        $id = $this->input->post('staff_id');
        $basic = $this->input->post('basic_salary');
        $allowance = $this->input->post('add_allowance');
        $add_working_days_array = $this->input->post('add_working_days');
        $working_days_month_fixed = $this->input->post('working_days_month');
        $employee_login_days_actual_array = $this->input->post('employee_login_days');
        $no_of_leaves = $this->input->post('no_of_leaves');
        $salary_per_day = $this->input->post('salary_per_day');
        $total = $this->input->post('salary_to_be_paid');
        $added = $this->session->userdata('userid');

        $gross_salary_array = $this->input->post('gross_salary');
        $pf_deduction_array = $this->input->post('pf_deduction');
        $esi_deduction_array = $this->input->post('esi_deduction');
        $professional_tax_deduction_array = $this->input->post('professional_tax_deduction');
        $tds_deduction_array = $this->input->post('tds_deduction');
        $other_deductions_array = $this->input->post('other_deductions');
        $net_payable_salary_array = $this->input->post('net_payable_salary');


        $affected_rows_count = 0;

        if (is_array($id) && count($id) > 0) {
            // --- REMOVED: Manual loading and instantiation of Payslip controller ---
            // This was causing the "Unable to locate specified class: Session.php" error
            // $this->load->library('user_agent');
            // $this->load->helper('url');
            // require_once APPPATH . 'controllers/Payslip.php';
            // $payslip_controller = new Payslip();
            // $payslip_controller->__construct();
            // --- END REMOVED CODE ---

            for ($i = 0; $i < count($id); $i++) {
                $staff_id_val = $id[$i] ?? null;
                $basic_salary_val = str_replace(',', '', $basic[$i] ?? '0');
                $basic_salary_val = intval($basic_salary_val);
                $allowance_val = $allowance[$i] ?? 0;
                $add_working_days_val = $add_working_days_array[$i] ?? 0;
                $working_days_month_val = $working_days_month_fixed[$i] ?? null;
                $employee_login_days_val = $employee_login_days_actual_array[$i] ?? 0;
                $no_of_leaves_val = $no_of_leaves[$i] ?? 0;
                $salary_per_day_val = $salary_per_day[$i] ?? 0;
                $total_val = $total[$i] ?? 0;

                $gross_salary_val = $gross_salary_array[$i] ?? ($basic_salary_val + $allowance_val);
                $pf_deduction_val = $pf_deduction_array[$i] ?? 0;
                $esi_deduction_val = $esi_deduction_array[$i] ?? 0;
                $professional_tax_deduction_val = $professional_tax_deduction_array[$i] ?? 0;
                $tds_deduction_val = $tds_deduction_array[$i] ?? 0;
                $other_deductions_val = $other_deductions_array[$i] ?? 0;
                $total_deductions_val = $pf_deduction_val + $esi_deduction_val + $professional_tax_deduction_val + $tds_deduction_val + $other_deductions_val;
                $net_payable_salary_val = $gross_salary_val - $total_deductions_val;

                $worked_days_val = ($employee_login_days_val !== null ? (int)$employee_login_days_val : 0) +
                    ($add_working_days_val !== null ? (int)$add_working_days_val : 0);

                if (is_numeric($total_val) && $total_val > 0) {
                    $data = array(
                        'staff_id'                   => $staff_id_val,
                        'basic_salary'               => $basic_salary_val,
                        'allowance'                  => $allowance_val,
                        'gross_salary'               => $gross_salary_val,
                        'working_days'               => $working_days_month_val,
                        'worked_days'                => $worked_days_val,
                        'actual_login_days'          => $employee_login_days_val,
                        'added_working_days'         => $add_working_days_val,
                        'no_of_leaves'               => $no_of_leaves_val,
                        'salary_per_day'             => $salary_per_day_val,
                        'total'                      => $total_val,
                        'pf_deduction'               => $pf_deduction_val,
                        'esi_deduction'              => $esi_deduction_val,
                        'professional_tax_deduction' => $professional_tax_deduction_val,
                        'tds_deduction'              => $tds_deduction_val,
                        'other_deductions'           => $other_deductions_val,
                        'net_payable_salary'         => $net_payable_salary_val,
                        'added_by'                   => $added,
                        'updated_on'                 => date('Y-m-d'),
                        'month'                      => (int)$current_month,
                        'year'                       => (int)$current_year
                    );

                    $this->Salary_model->insert_salary($data);
                    $salary_id = $this->db->insert_id();

                    if ($salary_id) {
                        // <<< UPDATED: Call the method from the Payslip_model
                        $payslip_pdf_path = $this->Payslip_model->generate_and_save_payslip_pdf(
                            $staff_id_val,
                            $current_month,
                            $current_year
                        );

                        if ($payslip_pdf_path) {
                            $this->Salary_model->update_payslip_path($salary_id, $payslip_pdf_path);
                            $affected_rows_count++;
                        } else {
                            log_message('error', 'Failed to generate or save payslip for staff_id: ' . $staff_id_val);
                        }
                    } else {
                        log_message('error', 'Failed to insert salary for staff_id: ' . $staff_id_val);
                    }
                }
            }

            if ($affected_rows_count > 0) {
                $this->session->set_flashdata('success', "Salary Added Successfully for " . $affected_rows_count . " staff members. Payslips generated.");
            } else {
                $this->session->set_flashdata('error', "Sorry, Salary Adding Failed or No valid records were inserted. Please check calculations and ensure 'Total' is greater than 0.");
            }
        } else {
            $this->session->set_flashdata('error', "No staff data submitted for salary calculation. Please select a department with staff.");
        }

        redirect('Salary/manage');
    }

    public function update()
    {
        $id = $this->input->post('txtid');
        $department = $this->input->post('txtdepartment');
        $data = $this->Department_model->update_department(array('department_name' => $department), $id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Salary Updated Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Salary Update Failed.");
        }
        redirect(base_url() . "department/manage_department");
    }


    function edit($id)
    {
        $data['content'] = $this->Department_model->select_department_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-department', $data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        $data = $this->Salary_model->delete_salary($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Salary Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Salary Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function get_salary_list()
    {
        $dept_id = $this->input->post('dept', TRUE); // Sanitize input
        $current_month = date('m'); // These are still useful for get_employee_login_days and display
        $current_year = date('Y');

        // CORRECTED LINE: Call get_staff_without_current_month_salary with only one parameter
        $staff_details = $this->Salary_model->get_staff_without_current_month_salary($dept_id);

        // Your debugging code (uncomment if needed)
        // echo '<pre>';
        // var_dump($staff_details);
        // echo '</pre>';
        // die();

        if (!empty($staff_details)) {
            echo '<div class="box-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="salaryDataTable">
                                <thead>
                                    <tr>
                                        <th>Staff Name</th>
                                        <th>Basic Salary</th>
                                        <th>Working Days (Month)</th>
                                        <th>Employee Login Days</th>
                                        <th>No. of Leaves</th>
                                        <th>Add Working Days</th>
                                        <th>Add Allowance</th>
                                        <th>Salary to be Paid</th>
                                    </tr>
                                </thead>
                                <tbody>';

            $fixed_working_days_in_month = 25; // Set fixed working days to 25
            foreach ($staff_details as $staff) {
                // Access 'salary' directly from the $staff array (as selected by st.* in the model)
                $basic_salary = $staff['salary'];

                // For new entries, allowance and additional working days should start at 0
                $allowance = 0; // Initialize allowance to 0 for new entries
                $add_working_days_input = 0;
                $add_allowance_input = 0;

                // Fetch employee login days for current month using the new model method
                $employee_login_days = $this->Salary_model->get_employee_login_days($staff['id'], $current_year, $current_month);

                $no_of_leaves = $fixed_working_days_in_month - $employee_login_days;
                if ($no_of_leaves < 0) $no_of_leaves = 0; // Ensure leaves aren't negative

                // Initial calculation for 'Salary to be Paid' (client-side JS will refine this)
                $salary_per_day = ($basic_salary > 0 && $fixed_working_days_in_month > 0) ? ($basic_salary / $fixed_working_days_in_month) : 0;
                $initial_salary_to_be_paid = ($salary_per_day * ($employee_login_days + $add_working_days_input)) + $add_allowance_input;

                echo '<tr>
                        <td>' . htmlspecialchars($staff["staff_name"]) . '</td>
                        <td>
                            <input type="hidden" name="staff_id[]" value="' . $staff["id"] . '">
                            <input type="text" name="basic_salary[]" class="form-control basic-salary" value="' . number_format($basic_salary, 2) . '" readonly>
                        </td>
                        <td>
                            <input type="text" name="working_days_month[]" class="form-control working-days-month" value="' . $fixed_working_days_in_month . '" readonly>
                        </td>
                        <td>
                            <input type="text" name="employee_login_days[]" class="form-control employee-login-days" value="' . $employee_login_days . '" readonly>
                        </td>
                        <td>
                            <input type="text" name="no_of_leaves[]" class="form-control no-of_leaves" value="' . $no_of_leaves . '" readonly>
                        </td>
                        <td>
                            <input type="number" name="add_working_days[]" class="form-control add-working-days" value="' . $add_working_days_input . '" min="0">
                        </td>
                        <td>
                            <input type="number" name="add_allowance[]" class="form-control add-allowance" value="' . $add_allowance_input . '" min="0">
                        </td>
                        <td>
                            <input type="text" name="salary_to_be_paid[]" class="form-control salary-to-be-paid" value="' . number_format($initial_salary_to_be_paid, 2) . '" readonly>
                        </td>
                    </tr>';
            }

            echo '</tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit Salary</button>
                </div>';
        } else {
            echo '<div class="box-body"><p>No staff found for the selected department or all staff have a salary entry for this month.</p></div>';
        }
    }

    public function view_all_payslips()
    {
        if (! $this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }

        $data['title'] = "All Generated Payslips";
        $data['all_payslips'] = $this->Salary_model->get_all_payslip_details();

        // Loading header, main content, and footer as specified by you.
        $this->load->view('admin/header', $data); // Assuming header.php is in application/views/admin/
        $this->load->view('admin/all_payslips', $data); // Your main payslips content
        $this->load->view('admin/footer'); // Assuming footer.php is in application/views/admin/

    }

    public function view_payslip($salary_id)
    {
        if (! $this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }

        $this->load->helper('download');
        $this->load->helper('file');

        // IMPORTANT CHANGE: Now get_payslip_path_by_salary_id returns an object.
        // Let's rename the variable to reflect that it's data, not just a path.
        $payslip_data_object = $this->Salary_model->get_payslip_path_by_salary_id($salary_id);

        // Check if an object was returned AND if it contains the path property
        if ($payslip_data_object && isset($payslip_data_object->payslip_pdf_path)) {

            // Now, extract the actual path string from the object
            $payslip_relative_path = $payslip_data_object->payslip_pdf_path;
            $full_file_path = FCPATH . $payslip_relative_path;

            // --- DEBUG LINES (OPTIONAL: You can remove these after it's working) ---
            log_message('debug', 'Attempting to view payslip. Salary ID: ' . $salary_id);
            log_message('debug', 'Relative Path from DB: ' . $payslip_relative_path); // This line is now fixed
            log_message('debug', 'Full Server Path: ' . $full_file_path);
            log_message('debug', 'File exists: ' . (file_exists($full_file_path) ? 'TRUE' : 'FALSE'));
            // --- END DEBUG LINES ---

            if (file_exists($full_file_path)) {
                // force_download will read the file from $full_file_path
                force_download($full_file_path, NULL);
            } else {
                log_message('error', 'Payslip file not found on server: ' . $full_file_path);
                show_error('Payslip file not found. It may have been moved or deleted.', 404);
            }
        } else {
            log_message('error', 'Payslip path or data not found in database for salary ID: ' . $salary_id);
            show_error('Payslip not found for this record.', 404);
        }
    }








    public function test_payslip_view($staff_id = null, $month = null, $year = null)
    {
        if (! $this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }

        // You'll need to provide actual data here to see a realistic output.
        // Replace with actual IDs/month/year from your database for a staff member that has salary data.
        // Example:
        if ($staff_id === null) {
            // Fetch a sample staff_id, month, year from your database
            // For example, get the latest salary record
            $sample_salary_data = $this->Salary_model->get_latest_salary_record_for_testing(); // You might need to add this method to your Salary_model
            if ($sample_salary_data) {
                $staff_id = $sample_salary_data->staff_id;
                $month = $sample_salary_data->month;
                $year = $sample_salary_data->year;
            } else {
                echo "No sample salary data found. Please provide staff_id, month, year in the URL or populate your database.";
                return;
            }
        }


        $staff_details = $this->Staff_model->select_staff_byID($staff_id);
        $salary_data = $this->Salary_model->get_staff_salary_details_for_payslip($staff_id, $month, $year);

        // Assuming Company_settings_model is the one for company assets
        $company_assets = $this->Company_settings_model->get_company_assets(TRUE);


        if (!$staff_details || !$salary_data) {
            echo "Error: Staff or Salary data not found for the provided parameters. Check your database or URL.";
            return;
        }

        // Prepare data array, similar to how generate_payslip_pdf prepares it
        $data = [
            'staff' => (object)($staff_details[0] ?? []),
            'salary' => (object)$salary_data,
            'month_name' => date('F', mktime(0, 0, 0, $month, 10)),
            'year' => $year,
            'company_assets' => (object)($company_assets ?? [])
        ];

        // Load the view directly without generating PDF
        $this->load->view('admin/payslip_template', $data);
    }
}

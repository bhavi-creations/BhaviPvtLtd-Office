<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // Load necessary helpers, libraries, and models for the entire controller
        $this->load->helper('url');
        $this->load->helper('form'); // Needed for form_open(), form_close(), form_error()
        $this->load->library('form_validation'); // Needed for validating form inputs
        $this->load->library('session'); // Needed for session data and flash messages

        // Load your application models
        $this->load->model('Home_model');
        $this->load->model('Department_model'); // Used in index()
        $this->load->model('Staff_model');     // Used in index()
        $this->load->model('Leave_model');     // Used in index()
        $this->load->model('Salary_model');    // Used in index()
        $this->load->model('Attendance_model'); // Used in logout_record()
    }

    /**
     * Handles changing the password for logged-in admin users.
     */
    public function change_password()
    {
        // 1. Authentication and Authorization Check
        // If the user is NOT logged in, redirect them to the login page.
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'));
        }
        // If the logged-in user is NOT an admin (usertype 1), show an error and redirect.
        if ($this->session->userdata('usertype') != 1) {
            $this->session->set_flashdata('error', 'You do not have permission to access this page.');
            redirect(base_url('/')); // Redirect to their default dashboard (e.g., staff dashboard)
        }

        // 2. Process Form Submission (when the form is submitted via POST request)
        if ($this->input->post()) {
            // Set validation rules for the form fields
            $this->form_validation->set_rules('current_password', 'Current Password', 'required');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]'); // New password must be at least 6 characters
            $this->form_validation->set_rules('confirm_password', 'Confirm New Password', 'required|matches[new_password]'); // Must match new password

            // Run the validation
            if ($this->form_validation->run() == FALSE) {
                // Validation failed. The form_error() function in the view will automatically display the errors.
                // No need to explicitly pass errors here unless you want to handle them differently.
            } else {
                // Validation passed. Proceed to attempt password change.
                $user_id = $this->session->userdata('userid'); // Get the currently logged-in admin's ID from the session
                $current_password = $this->input->post('current_password'); // Get the submitted current password
                $new_password = $this->input->post('new_password');       // Get the submitted new password

                // Call the Home_model to update the password in the database
                $update_result = $this->Home_model->update_password($user_id, $current_password, $new_password);

                if ($update_result > 0) {
                    // Password updated successfully (affected rows > 0 means a row was updated)
                    $this->session->set_flashdata('success', 'Password changed successfully!');
                    redirect('home/change_password'); // Redirect to the same page to prevent form re-submission and display success message
                } else {
                    // Password update failed (e.g., current password was incorrect, or new password was same as old)
                    $this->session->set_flashdata('error', 'Failed to change password. Please check your current password and try again.');
                    redirect('home/change_password'); // Redirect to display error message
                }
            }
        }

        // 3. Load the View (This part runs for both initial page load and when validation fails)
        // It loads your admin header, the change password form, and your admin footer.
        $this->load->view('admin/header'); // Assuming you have an admin header file (e.g., application/views/admin/header.php)
        $this->load->view('admin/change_password'); // The view file we just updated
        $this->load->view('admin/footer'); // Assuming you have an admin footer file (e.g., application/views/admin/footer.php)
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('usertype') == 1) {
                $data['department'] = $this->Department_model->select_departments();
                $data['staff'] = $this->Staff_model->select_staff();
                $data['leave'] = $this->Leave_model->select_leave_forApprove();
                $data['salary'] = $this->Salary_model->sum_salary();

                $this->load->view('admin/header');
                $this->load->view('admin/dashboard', $data);
                $this->load->view('admin/footer');
            } else {
                $staff = $this->session->userdata('userid');
                $data['leave'] = $this->Leave_model->select_leave_byStaffID($staff);
                $this->load->view('staff/header');
                $this->load->view('staff/dashboard', $data);
                $this->load->view('staff/footer');
            }
        }
    }

    public function login_page()
    {
        $this->load->view('login');
    }

    public function error_page()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/error_page');
        $this->load->view('admin/footer');
    }

    function login()
    {
        $un = $this->input->post('txtusername');
        $pw = $this->input->post('txtpassword');
        $this->load->model('Home_model');
        $check_login = $this->Home_model->logindata($un, $pw);
        if ($check_login <> '') {
            if ($check_login[0]['status'] == 1) {
                if ($check_login[0]['usertype'] == 1) {
                    $data = array(
                        'logged_in'  =>  TRUE,
                        'username' => $check_login[0]['username'],
                        'usertype' => $check_login[0]['usertype'],
                        'userid' => $check_login[0]['id'],
                        'loginid' => $check_login[0]['login_id'],
                        'staff_data' => $check_login[0]['staff_data'],
                    );
                    $this->session->set_userdata($data);
                    redirect('/');
                } elseif ($check_login[0]['usertype'] == 2) {
                    $data = array(
                        'logged_in'  =>  TRUE,
                        'username' => $check_login[0]['username'],
                        'usertype' => $check_login[0]['usertype'],
                        'userid' => $check_login[0]['id'],
                        'loginid' => $check_login[0]['login_id'],
                        'staff_data' => $check_login[0]['staff_data'],
                    );
                    $this->session->set_userdata($data);
                    redirect('/');
                } else {
                    $this->session->set_flashdata('login_error', 'Sorry, you cant login right now.', 300);
                    redirect(base_url() . 'login');
                }
            } else {
                $this->session->set_flashdata('login_error', 'Sorry, your account is blocked.', 300);
                redirect(base_url() . 'login');
            }
        } else {
            $this->session->set_flashdata('login_error', 'Please check your username or password and try again.', 300);
            redirect(base_url() . 'login');
        }
    }

    public function insert_login_record()
    {
        $staff_id = $this->session->userdata('staff_data')['id'];
        $login_record = array(
            'staff_id' => $staff_id,
            'login_date_time' => date('Y-m-d H:i:s'),
            'logout_date_time' => NULL,
            'ip_address' => $this->Home_model->getIPAddress(),
            'status' => 1,
        );
        $this->Home_model->insert_login_records($login_record);
        echo json_encode(['status' => 'success']);
    }

    public function logout_record()
    {
        $staff_id = $this->session->userdata('staff_data')['id'];
        $attendance_today = $this->Attendance_model->select_attendance_by_date($staff_id, date('Y-m-d'));
        if ($attendance_today) {
            $this->Home_model->logoutdata($attendance_today['id']);
        }
        echo json_encode(['status' => 'success']);
    }

    public function logout()
    {
        $data = $this->session->get_userdata();
        // $logoutdata = $this->Home_model->logoutdata($data['loginid']);
        // if ($logoutdata > 0) {
        $this->session->sess_destroy();
        redirect(base_url() . 'login');
        // } else {
        //     $this->session->set_flashdata('login_error', 'Please check your username or password and try again.', 300);
        //     redirect(base_url() . 'login');
        // }
    }
}

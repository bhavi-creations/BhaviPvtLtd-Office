<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Home extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
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

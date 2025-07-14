<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }

    public function manage()
    {
        $data['staff']=$this->Staff_model->select_staff();
        $data['content']=$this->Attendance_model->select_attendance();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-attendance',$data);
        $this->load->view('admin/footer');
    }

    public function staff_attendance()
    {
        $data = $this->session->get_userdata();
        $data['content']=$this->Attendance_model->select_attendance_by_staff_id($data['userid']);
        $this->load->view('staff/header');
        $this->load->view('staff/view-attendance',$data);
        $this->load->view('staff/footer');
    }
}

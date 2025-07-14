<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_Reports extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        // $staff=$this->session->userdata('userid');
        $data['projects']=$this->Projects_model->select_projects();
        $data['tasks']=$this->Project_Tasks_model->select_project_tasks();
        $this->load->view('admin/header');
        $this->load->view('admin/add-work-reports',$data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['staff']=$this->Staff_model->select_staff();
        $data['content']=$this->Work_Reports_model->select_work_reports();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-work-reports',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $staff=$this->session->userdata('userid');
        $data['content']=$this->Work_Reports_model->select_work_reports_by_staffID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/view-work-reports',$data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('task_id', 'Task', 'required');
        $this->form_validation->set_rules('staff_id', 'Staff Id', 'required');
        $this->form_validation->set_rules('work_details', 'Work Details', 'required');
        $this->form_validation->set_rules('work_status', 'Work Status', 'required');
        $this->form_validation->set_rules('on_date', 'Work Date', 'required');

        $name=$this->input->post('project_id');
        $task_id=$this->input->post('task_id');
        $staff_id=$this->input->post('staff_id');
        $details=$this->input->post('work_details');
        $status=$this->input->post('work_status');
        $date_time=$this->input->post('on_date');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Work_Reports_model->insert_work_reports(array('project_id'=>$name,'task_id'=>$task_id,'staff_id'=>$staff_id,'work_details'=>addslashes($details),'work_status'=>$status,'on_date'=>$date_time));
            
            if($data==true)
            {
                $this->session->set_flashdata('success', "New Report Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Report Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->index();
            return false;

        } 
    }

    public function update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('task_id', 'Task', 'required');
        $this->form_validation->set_rules('work_details', 'Work Details', 'required');
        $this->form_validation->set_rules('work_status', 'Work Status', 'required');
        $this->form_validation->set_rules('on_date', 'Work Date', 'required');
        
        $id=$this->input->post('work_report_id');
        $name=$this->input->post('project_id');
        $task_id=$this->input->post('task_id');
        $staff_id=$this->input->post('staff_id');
        $details=$this->input->post('work_details');
        $status=$this->input->post('work_status');
        $date_time=$this->input->post('on_date');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Work_Reports_model->update_work_reports(array('project_id'=>$name,'task_id'=>$task_id,'staff_id'=>$staff_id,'work_details'=>addslashes($details),'work_status'=>$status,'on_date'=>$date_time),$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Report Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Report Update Failed.");
            }
            redirect(base_url()."manage-work-reports");
        }
        else{
            $this->edit($id);
            return false;

        } 
    }

    function edit($id)
    {
        $data['projects']=$this->Projects_model->select_projects();
        $data['tasks']=$this->Project_Tasks_model->select_project_tasks();
        $data['content']=$this->Work_Reports_model->select_work_reports_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-work-reports',$data);
        $this->load->view('admin/footer');
    }

    function delete($id)
    {
        
        $data=$this->Work_Reports_model->delete_work_reports($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Work Report Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Work Report Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    // staff
    public function staff_index()
    {
        $staff=$this->session->userdata('userid');
        $data['projects']=$this->Projects_model->select_projects();
        $data['tasks']=$this->Project_Tasks_model->select_project_tasks_by_staffID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/add-staff-work-reports',$data);
        $this->load->view('staff/footer');
    }

    public function staff_insert()
    {
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('task_id', 'Task', 'required');
        $this->form_validation->set_rules('staff_id', 'Staff Id', 'required');
        $this->form_validation->set_rules('work_details', 'Work Details', 'required');
        $this->form_validation->set_rules('work_status', 'Work Status', 'required');
        $this->form_validation->set_rules('on_date', 'Work Date', 'required');

        $name=$this->input->post('project_id');
        $task_id=$this->input->post('task_id');
        $staff_id=$this->input->post('staff_id');
        $details=$this->input->post('work_details');
        $status=$this->input->post('work_status');
        $date_time=$this->input->post('on_date');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Work_Reports_model->insert_work_reports(array('project_id'=>$name,'task_id'=>$task_id,'staff_id'=>$staff_id,'work_details'=>addslashes($details),'work_status'=>$status,'on_date'=>$date_time));
            
            if($data==true)
            {
                $this->session->set_flashdata('success', "New Report Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Report Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->staff_index();
            return false;
        } 
    }

    public function staff_update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('task_id', 'Task', 'required');
        $this->form_validation->set_rules('work_details', 'Work Details', 'required');
        $this->form_validation->set_rules('work_status', 'Work Status', 'required');
        $this->form_validation->set_rules('on_date', 'Work Date', 'required');
        
        $id=$this->input->post('work_report_id');
        $name=$this->input->post('project_id');
        $task_id=$this->input->post('task_id');
        $staff_id=$this->input->post('staff_id');
        $details=$this->input->post('work_details');
        $status=$this->input->post('work_status');
        $date_time=$this->input->post('on_date');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Work_Reports_model->update_work_reports(array('project_id'=>$name,'task_id'=>$task_id,'staff_id'=>$staff_id,'work_details'=>addslashes($details),'work_status'=>$status,'on_date'=>$date_time),$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Report Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Report Update Failed.");
            }
            redirect(base_url()."view-work-reports");
        }
        else{
            $this->staff_edit($id);
            return false;
        } 
    }

    function staff_edit($id)
    {
        $staff=$this->session->userdata('userid');
        $data['projects']=$this->Projects_model->select_projects();
        $data['tasks']=$this->Project_Tasks_model->select_project_tasks_by_staffID($staff);
        $data['content']=$this->Work_Reports_model->select_work_reports_byID($id);
        $this->load->view('staff/header');
        $this->load->view('staff/edit-staff-work-reports',$data);
        $this->load->view('staff/footer');
    }

    function staff_delete($id)
    {
        
        $data=$this->Work_Reports_model->delete_work_reports($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Work Report Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Work Report Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}

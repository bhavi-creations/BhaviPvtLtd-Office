<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holidays extends CI_Controller {

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
        $this->load->view('admin/header');
        $this->load->view('admin/add-holidays');
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content']=$this->Holidays_model->select_holidays();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-holidays',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $data['content']=$this->Holidays_model->select_holidays();
        $this->load->view('staff/header');
        $this->load->view('staff/view-holidays',$data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('txtholidayname', 'Holiday Name', 'required');
        $this->form_validation->set_rules('txtholidaydate', 'Holiday Date', 'required');

        $name=$this->input->post('txtholidayname');
        $date=$this->input->post('txtholidaydate');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Holidays_model->insert_holidays(array('holiday_name'=>$name,'holiday_date'=>$date,'holiday_status'=>1));
            
            if($data==true)
            {
                
                $this->session->set_flashdata('success', "New Holiday Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Holiday Adding Failed.");
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
        $this->form_validation->set_rules('txtholidayname', 'Holiday Name', 'required');
        $this->form_validation->set_rules('txtholidaydate', 'Holiday Date', 'required');
        
        $id=$this->input->post('txtid');
        $name=$this->input->post('txtholidayname');
        $date=$this->input->post('txtholidaydate');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Holidays_model->update_holidays(array('holiday_name'=>$name,'holiday_date'=>$date,'holiday_status'=>1),$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Holiday Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Holiday Update Failed.");
            }
            redirect(base_url()."manage-holidays");
        }
        else{
            $this->index();
            return false;

        } 
    }


    function edit($id)
    {
        $data['content']=$this->Holidays_model->select_holidays_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-holidays',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        
        $data=$this->Holidays_model->delete_holidays($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Holiday Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Holiday Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    



}

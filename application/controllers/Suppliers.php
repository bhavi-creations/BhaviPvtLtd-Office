<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {

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
        $this->load->view('admin/add-suppliers');
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content']=$this->Suppliers_model->select_suppliers();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-suppliers',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $data['content']=$this->Suppliers_model->select_suppliers();
        $this->load->view('staff/admin/header');
        $this->load->view('staff/view-suppliers',$data);
        $this->load->view('staff/admin/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required');
        $this->form_validation->set_rules('address', 'Supplier Address', 'required');
        $this->form_validation->set_rules('contact_name', 'Contact Name', 'required');
        $this->form_validation->set_rules('contact_phone', 'Contact Phone', 'required');
        // $this->form_validation->set_rules('notes', 'Notes', 'required');

        $supplier_name=$this->input->post('supplier_name');
        $address=$this->input->post('address');
        $contact_name=$this->input->post('contact_name');
        $contact_phone=$this->input->post('contact_phone');
        $notes=addslashes($this->input->post('notes'));

        if($this->form_validation->run() !== false)
        {
            $data=$this->Suppliers_model->insert_suppliers(array('supplier_name'=>$supplier_name,'address'=>$address,'contact_name'=>$contact_name,'contact_phone'=>$contact_phone,'notes'=>$notes));
            
            if($data==true)
            {
                $this->session->set_flashdata('success', "New Supplier Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Supplier Adding Failed.");
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
        $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required');
        $this->form_validation->set_rules('address', 'Supplier Address', 'required');
        $this->form_validation->set_rules('contact_name', 'Contact Name', 'required');
        $this->form_validation->set_rules('contact_phone', 'Contact Phone', 'required');
        // $this->form_validation->set_rules('notes', 'Notes', 'required');

        $id=$this->input->post('id');
        $supplier_name=$this->input->post('supplier_name');
        $address=$this->input->post('address');
        $contact_name=$this->input->post('contact_name');
        $contact_phone=$this->input->post('contact_phone');
        $notes=addslashes($this->input->post('notes'));

        if($this->form_validation->run() !== false)
        {
            $data=$this->Suppliers_model->update_suppliers(array('supplier_name'=>$supplier_name,'address'=>$address,'contact_name'=>$contact_name,'contact_phone'=>$contact_phone,'notes'=>$notes),$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Supplier Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Supplier Update Failed.");
            }
            redirect(base_url()."manage-suppliers");
        }
        else{
            $this->edit($id);
            return false;
        } 
    }


    function edit($id)
    {
        $data['content']=$this->Suppliers_model->select_suppliers_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-suppliers',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        $data=$this->Suppliers_model->delete_suppliers($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Supplier Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Supplier Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}

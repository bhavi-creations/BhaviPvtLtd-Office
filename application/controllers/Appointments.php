<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }else{
            $this->check_permissions();
        }
    }

    function check_permissions(){
        $staff_data = $this->session->userdata('staff_data');
        if( $this->session->userdata('usertype') == 2){
            $permissions = $staff_data['permissions'];
            if(isset($permissions['0'])){
                $permission = $permissions['0']['permission'];
            }else{
                $permission = 'no_access';
            } 
            if($permission == 'no_access'){
                $this->session->set_flashdata('error', "Sorry, You don't have permission to access appointments.");
                redirect(base_url().'home');
            }
            return $permission;
        }else{
            return 'no_access';
        }
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/add-appointments');
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content']=$this->Appointments_model->select_appointments();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-appointments',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $data['content']=$this->Appointments_model->select_appointments();
        $this->load->view('staff/header');
        $this->load->view('staff/view-staff-appointments',$data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('client', 'Client Name', 'required');
        $this->form_validation->set_rules('status', 'Client Status', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('service', 'Service', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');        $this->form_validation->set_rules('lead_type', 'Lead Type', 'required');
        $this->form_validation->set_rules('close_status', 'Closing Status', 'required');

        $client=$this->input->post('client');
        $status=$this->input->post('status');
        $remarks=$this->input->post('remarks');
        $service=$this->input->post('service');
        $follow_up_date=$this->input->post('follow_up_date');
        $date=$this->input->post('date');
        $lead_type=$this->input->post('lead_type');
        $close_status=$this->input->post('close_status');
        $location=$this->input->post('location');
        $files=$_FILES["files"];

        if($this->form_validation->run() !== false)
        {
            $this->load->library('upload');
            $config['upload_path']= 'uploads/marketing/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['files[]']['name']= $files['name'][$key];
                $_FILES['files[]']['type']= $files['type'][$key];
                $_FILES['files[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['files[]']['error']= $files['error'][$key];
                $_FILES['files[]']['size']= $files['size'][$key];
        
                $fileName = time()."_".$image;
        
                $files[] = $fileName;
        
                $config['file_name'] = $fileName;
        
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('files[]')) {
                    $file_data =   $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            $file_names = implode(',',$file_names);

            $data=$this->Appointments_model->insert_appointments(array('client'=>$client,'status'=>$status,'remarks'=>$remarks,'service'=>$service,'images'=>$file_names,'location'=>$location,'lead_type'=>$lead_type,'date'=>$date,'follow_up_date'=>$follow_up_date,'close_status'=>$close_status));
            
            if($data==true)
            {
                
                $this->session->set_flashdata('success', "New Appointment Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Appointment Adding Failed.");
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
        $this->form_validation->set_rules('client', 'Client Name', 'required');
        $this->form_validation->set_rules('status', 'Client Status', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('service', 'Service', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');        $this->form_validation->set_rules('lead_type', 'Lead Type', 'required');
        $this->form_validation->set_rules('close_status', 'Closing Status', 'required');
        
        $id=$this->input->post('appointment_id');
        $client=$this->input->post('client');
        $status=$this->input->post('status');
        $remarks=$this->input->post('remarks');
        $service=$this->input->post('service');
        $date=$this->input->post('date');
        $follow_up_date=$this->input->post('follow_up_date');
        $lead_type=$this->input->post('lead_type');
        $close_status=$this->input->post('close_status');
        $location=$this->input->post('location');
        $prev_files=$this->input->post('prev_files');
        $files=$_FILES["files"];

        if($this->form_validation->run() !== false)
        {
            $this->load->library('upload');
            $config['upload_path']= 'uploads/marketing/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['files[]']['name']= $files['name'][$key];
                $_FILES['files[]']['type']= $files['type'][$key];
                $_FILES['files[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['files[]']['error']= $files['error'][$key];
                $_FILES['files[]']['size']= $files['size'][$key];
        
                $fileName = time()."_".$image;
        
                $files[] = $fileName;
        
                $config['file_name'] = $fileName;
        
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('files[]')) {
                    $file_data =   $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            if(count($file_names)){
                $file_names = implode(',',$file_names);
                $file_names = $file_names.','.$prev_files;
            }else{
                $file_names = $prev_files;
            }

            $data=$this->Appointments_model->update_appointments(array('client'=>$client,'status'=>$status,'remarks'=>$remarks,'service'=>$service,'images'=>$file_names,'location'=>$location,'lead_type'=>$lead_type,'date'=>$date,'follow_up_date'=>$follow_up_date,'close_status'=>$close_status),$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Appointment Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Appointment Update Failed.");
            }
            redirect(base_url()."manage-appointments");
        }
        else{
            $this->index();
            return false;

        } 
    }


    function edit($id)
    {
        $data['content']=$this->Appointments_model->select_appointments_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-appointments',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        
        $data=$this->Appointments_model->delete_appointments($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Appointment Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Appointment Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function staff_add()
    {
        if($this->check_permissions() == 'edit_access'){
            $this->load->view('staff/header');
            $this->load->view('staff/add-staff-appointments');
            $this->load->view('staff/footer');
        }else{
            $this->session->set_flashdata('error', "Sorry, You don't have permission to access appointments.");
            redirect(base_url().'home');
        }
    }

    public function staff_insert()
    {
        $this->form_validation->set_rules('client', 'Client Name', 'required');
        $this->form_validation->set_rules('status', 'Client Status', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('service', 'Service', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');        $this->form_validation->set_rules('lead_type', 'Lead Type', 'required');
        $this->form_validation->set_rules('close_status', 'Closing Status', 'required');

        $client=$this->input->post('client');
        $status=$this->input->post('status');
        $remarks=$this->input->post('remarks');
        $service=$this->input->post('service');
        $follow_up_date=$this->input->post('follow_up_date');
        $date=$this->input->post('date');
        $lead_type=$this->input->post('lead_type');
        $close_status=$this->input->post('close_status');
        $location=$this->input->post('location');
        $files=$_FILES["files"];

        if($this->form_validation->run() !== false)
        {
            $this->load->library('upload');
            $config['upload_path']= 'uploads/marketing/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['files[]']['name']= $files['name'][$key];
                $_FILES['files[]']['type']= $files['type'][$key];
                $_FILES['files[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['files[]']['error']= $files['error'][$key];
                $_FILES['files[]']['size']= $files['size'][$key];
        
                $fileName = time()."_".$image;
        
                $files[] = $fileName;
        
                $config['file_name'] = $fileName;
        
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('files[]')) {
                    $file_data =   $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            $file_names = implode(',',$file_names);

            $data=$this->Appointments_model->insert_appointments(array('client'=>$client,'status'=>$status,'remarks'=>$remarks,'service'=>$service,'images'=>$file_names,'location'=>$location,'lead_type'=>$lead_type,'date'=>$date,'follow_up_date'=>$follow_up_date,'close_status'=>$close_status));
            
            if($data==true)
            {
                
                $this->session->set_flashdata('success', "New Appointment Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Appointment Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->staff_add();
            return false;

        } 
    }

    public function staff_update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('client', 'Client Name', 'required');
        $this->form_validation->set_rules('status', 'Client Status', 'required');
        // $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        // $this->form_validation->set_rules('service', 'Service', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');        $this->form_validation->set_rules('lead_type', 'Lead Type', 'required');
        $this->form_validation->set_rules('close_status', 'Closing Status', 'required');
        
        $id=$this->input->post('appointment_id');
        $client=$this->input->post('client');
        $status=$this->input->post('status');
        $remarks=$this->input->post('remarks');
        $service=$this->input->post('service');
        $date=$this->input->post('date');
        $follow_up_date=$this->input->post('follow_up_date');
        $lead_type=$this->input->post('lead_type');
        $close_status=$this->input->post('close_status');
        $location=$this->input->post('location');
        $prev_files=$this->input->post('prev_files');
        $files=$_FILES["files"];

        if($this->form_validation->run() !== false)
        {
            $this->load->library('upload');
            $config['upload_path']= 'uploads/marketing/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['files[]']['name']= $files['name'][$key];
                $_FILES['files[]']['type']= $files['type'][$key];
                $_FILES['files[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['files[]']['error']= $files['error'][$key];
                $_FILES['files[]']['size']= $files['size'][$key];
        
                $fileName = time()."_".$image;
        
                $files[] = $fileName;
        
                $config['file_name'] = $fileName;
        
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('files[]')) {
                    $file_data =   $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            if(count($file_names)){
                $file_names = implode(',',$file_names);
                $file_names = $file_names.','.$prev_files;
            }else{
                $file_names = $prev_files;
            }

            $data=$this->Appointments_model->update_appointments(array('client'=>$client,'status'=>$status,'remarks'=>$remarks,'service'=>$service,'images'=>$file_names,'location'=>$location,'lead_type'=>$lead_type,'date'=>$date,'follow_up_date'=>$follow_up_date,'close_status'=>$close_status),$id);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Appointment Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Appointment Update Failed.");
            }
            redirect(base_url()."view-staff-appointments");
        }
        else{
            $this->staff_add();
            return false;

        } 
    }


    function staff_edit($id)
    {
        if($this->check_permissions() == 'edit_access'){
            $data['content']=$this->Appointments_model->select_appointments_byID($id);
            $this->load->view('staff/header');
            $this->load->view('staff/edit-staff-appointments',$data);
            $this->load->view('staff/footer');
        }else{
            $this->session->set_flashdata('error', "Sorry, You don't have permission to access appointments.");
            redirect(base_url().'home');
        }
    }


    function staff_delete($id)
    {
        if($this->check_permissions() == 'edit_access'){
            $data=$this->Appointments_model->delete_appointments($id);
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Appointment Deleted Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Appointment Delete Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Sorry, You don't have permission to access appointments.");
            redirect(base_url().'home');
        }
    }

    function deleteFile($id,$filename)
    {
        $result=$this->Appointments_model->select_appointments_byID($id);
        $prev_files = $result['0']['images'];
        
        $files = explode(',',$prev_files);
        print_r($files);
        foreach ($files as $key => $value){
            if ($value == $filename) {
                unlink(FCPATH .'uploads/marketing/'.$filename);
                unset($files[$key]);
            }
        }
        $file_names = implode(',',$files);

        $data=$this->Appointments_model->delete_marketing_file(array('images'=>$file_names),$id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Appointments File Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Appointments File Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

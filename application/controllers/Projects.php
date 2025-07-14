<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

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
        $this->load->view('admin/add-projects');
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content']=$this->Projects_model->select_projects();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-projects',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $data['content']=$this->Projects_model->select_projects();
        $this->load->view('staff/header');
        $this->load->view('staff/view-projects',$data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('project_name', 'Project Name', 'required');
        // $this->form_validation->set_rules('project_link', 'Project Link', 'required');
        // $this->form_validation->set_rules('project_details', 'Project Details', 'required');
        // $this->form_validation->set_rules('project_status', 'Project Status', 'required');
        $this->form_validation->set_rules('project_date', 'Project Date', 'required');

        $name=$this->input->post('project_name');
        $link=$this->input->post('project_link');
        $details=$this->input->post('project_details');
        $status=$this->input->post('project_status');
        $date_time=$this->input->post('project_date');
        $files=$_FILES["project_files"];

        if($this->form_validation->run() !== false)
        {
            $this->load->library('upload');
            $config['upload_path']= 'uploads/project-files/';
            $config['allowed_types'] ='gif|jpg|png|jpeg|doc|docx|csv|html|mp3|mp4|svg|pdf|txt|xls|xlsx|xml';

            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['project_files[]']['name']= $files['name'][$key];
                $_FILES['project_files[]']['type']= $files['type'][$key];
                $_FILES['project_files[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['project_files[]']['error']= $files['error'][$key];
                $_FILES['project_files[]']['size']= $files['size'][$key];
        
                $fileName = time()."_".$image;
        
                $project_files[] = $fileName;
        
                $config['file_name'] = $fileName;
        
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('project_files[]')) {
                    $file_data =   $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            $file_names = implode(',',$file_names);
            // echo $file_names;

            $data=$this->Projects_model->insert_projects(array('project_name'=>$name,'project_link'=>$link,'project_details'=>addslashes($details),'project_files'=>$file_names,'status'=>$status,'date_time'=>$date_time));

            // $new_name = time()."_".$_FILES["project_files"]['name'];
            // $config['file_name'] = $new_name;

            // $this->load->library('upload', $config);
            // if ( ! $this->upload->do_upload('project_files'))
            // {
            //     $data=$this->Projects_model->insert_projects(array('project_name'=>$name,'project_link'=>$link,'project_details'=>addslashes($details),'status'=>$status,'date_time'=>$date_time));
            // }
            // else
            // {
            //     $image_data =   $this->upload->data();

            //     $data=$this->Projects_model->insert_projects(array('project_name'=>$name,'project_link'=>$link,'project_details'=>addslashes($details),'project_files'=>$image_data['file_name'],'status'=>$status,'date_time'=>$date_time));
            // }
            
            if($data==true)
            {
                $this->session->set_flashdata('success', "New Project Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Project Adding Failed.");
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
        $this->form_validation->set_rules('project_name', 'Project Name', 'required');
        // $this->form_validation->set_rules('project_link', 'Project Link', 'required');
        // $this->form_validation->set_rules('project_details', 'Project Details', 'required');
        // $this->form_validation->set_rules('project_status', 'Project Status', 'required');
        $this->form_validation->set_rules('project_date', 'Project Date', 'required');
        
        $id=$this->input->post('project_id');
        $name=$this->input->post('project_name');
        $link=$this->input->post('project_link');
        $details=$this->input->post('project_details');
        $status=$this->input->post('project_status');
        $date_time=$this->input->post('project_date');
        $prev_files=$this->input->post('project_prev_files');
        $files=$_FILES["project_files"];

        if($this->form_validation->run() !== false)
        {
            $this->load->library('upload');
            $config['upload_path']= 'uploads/project-files/';
            $config['allowed_types'] ='gif|jpg|png|jpeg|doc|docx|csv|html|mp3|mp4|svg|pdf|txt|xls|xlsx|xml';

            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['project_files[]']['name']= $files['name'][$key];
                $_FILES['project_files[]']['type']= $files['type'][$key];
                $_FILES['project_files[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['project_files[]']['error']= $files['error'][$key];
                $_FILES['project_files[]']['size']= $files['size'][$key];
        
                $fileName = time()."_".$image;
        
                $project_files[] = $fileName;
        
                $config['file_name'] = $fileName;
        
                $this->upload->initialize($config);
        
                if ($this->upload->do_upload('project_files[]')) {
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
            // echo $file_names;
            $data=$this->Projects_model->update_projects(array('project_name'=>$name,'project_link'=>$link,'project_details'=>addslashes($details),'project_files'=>$file_names,'status'=>$status,'date_time'=>$date_time),$id);

                // $new_name = time()."_".$_FILES["project_files"]['name'];
                // $config['file_name'] = $new_name;

                // $this->load->library('upload', $config);
                // if ( ! $this->upload->do_upload('project_files'))
                // {
                //     $data=$this->Projects_model->update_projects(array('project_name'=>$name,'project_link'=>$link,'project_details'=>addslashes($details),'status'=>$status,'date_time'=>$date_time),$id);
                // }
                // else
                // {
                //     $image_data =   $this->upload->data();

                //     $data=$this->Projects_model->update_projects(array('project_name'=>$name,'project_link'=>$link,'project_details'=>addslashes($details),'project_files'=>$image_data['file_name'],'status'=>$status,'date_time'=>$date_time),$id);
                // }
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Project Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Project Update Failed.");
            }
            redirect(base_url()."manage-projects");
        }
        else{
            $this->edit($id);
            return false;

        } 
    }


    function edit($id)
    {
        $data['content']=$this->Projects_model->select_projects_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-projects',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        
        $data=$this->Projects_model->delete_projects($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Project Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Project Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function deleteFile($id,$filename)
    {
        $result=$this->Projects_model->select_projects_byID($id);
        $prev_files = $result['0']['project_files'];
        
        $files = explode(',',$prev_files);
        print_r($files);
        foreach ($files as $key => $value){
            if ($value == $filename) {
                unlink(FCPATH .'uploads/project-files/'.$filename);
                unset($files[$key]);
            }
        }
        $file_names = implode(',',$files);

        $data=$this->Projects_model->delete_project_file(array('project_files'=>$file_names),$id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Project File Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Project File Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}

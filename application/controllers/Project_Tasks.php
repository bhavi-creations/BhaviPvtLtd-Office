<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_Tasks extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }
    }


    public function index()
    {
        $data['clients'] = $this->Clients_model->select_clients();
        $data['projects'] = $this->Projects_model->select_projects();
        $data['staff'] = $this->Staff_model->select_staff();
        $data['departments'] = $this->Department_model->select_departments();
        $this->load->view('admin/header');
        $this->load->view('admin/add-project-tasks', $data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['staff'] = $this->Staff_model->select_staff();
        $data['content'] = $this->Project_Tasks_model->select_project_tasks();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-project-tasks', $data);
        $this->load->view('admin/footer');
    }

    //added func by rajkumar

    public function manage_worksheets()
    {
        // Load the required models at the beginning
        $this->load->model('Staff_model');
        $this->load->model('Worksheet_model');

        // Retrieve staff data and worksheets
        $data['staff'] = $this->Staff_model->select_staff();
        $data['content'] = $this->Worksheet_model->select_worksheets_all();
        $data['designer'] = $this->Worksheet_model->select_designer_worksheets();
        $data['social'] = $this->Worksheet_model->select_socialmedia_worksheets();
        $data['website'] = $this->Worksheet_model->select_website_worksheets();
        $data['seo'] = $this->Worksheet_model->select_seo_worksheets();
        // Load the views
        $this->load->view('admin/header');
        $this->load->view('admin/manage-worksheets', $data);
        $this->load->view('admin/footer');
        // return $result; 
    }


    public function view()
    {
        $staff = $this->session->userdata('userid');
        $data['content'] = $this->Project_Tasks_model->select_project_tasks_by_staffID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/view-project-tasks', $data);
        $this->load->view('staff/footer');
    }

    public function view_worksheets($id)   //added function 
    {
        $this->load->model('Worksheet_model');
        // $staff = $this->session->userdata('userid');
        $data['content'] = $this->Worksheet_model->select_worksheet_byID($id);
        $this->load->view('staff/header');
        $this->load->view('staff/view-worksheets', $data);   //added view file
        $this->load->view('staff/footer');
        
    }

    public function insert()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_id', 'Project ID', 'required');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', '');
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');
        $this->form_validation->set_rules('task_details', 'Task Details', 'required');
        // $this->form_validation->set_rules('task_status', 'Task Status', 'required');
        // $this->form_validation->set_rules('due_date', 'Task Due Date', 'required');
        // $this->form_validation->set_rules('completed_date', 'Task Completed Date', 'required');
        $this->form_validation->set_rules('assign_date[]', 'Assign Date', '');
        $this->form_validation->set_rules('client_name[]', 'Client Name', '');

        //Designer table form validations
        $this->form_validation->set_rules('work_type_designer[]', 'Type of Work', '');
        $this->form_validation->set_rules('desc_designer[]', 'Desc Designer', '');
        $this->form_validation->set_rules('ref_link_designer[]', 'Ref link designer', '');
        $this->form_validation->set_rules('content_designer[]', 'Content Designer', '');
        $this->form_validation->set_rules('ref_file_designer[]', 'File Designer', '');

        // // Social Media form validation
        $this->form_validation->set_rules('work_type_socialmedia[]', 'Type of social media work', '');
        $this->form_validation->set_rules('desc_socialmedia[]', 'Desc of social media', '');
        $this->form_validation->set_rules('fb_ads_socialmedia[]', 'about Fb ads', '');
        $this->form_validation->set_rules('g_ads_socailmedia[]', 'about G ads social media', '');

        // Website table form validation
        $this->form_validation->set_rules('website_type[]', 'Type of website', '');
        $this->form_validation->set_rules('desc_website[]', 'Desc about website', '');
        $this->form_validation->set_rules('delivery_date[]', 'website delivery date', '');

        // SEO table form validation
        $this->form_validation->set_rules('p_kw_SEO[]', 'Present Keyword SEO', '');
        $this->form_validation->set_rules('target_kw_SEO[]', 'Target keyword SEO', '');
        $this->form_validation->set_rules('gmb_SEO[]', 'Google My Business SEO', '');



        if ($this->form_validation->run() !== false) {
            $project_id = $this->input->post('project_id');
            $assigned_to = $this->input->post('assigned_to');
            $assigned_to = implode(',', $this->input->post('assigned_to'));
            $department = $this->input->post('department');
            $task_name = $this->input->post('task_name');
            $task_details = $this->input->post('task_details');
            $task_status = $this->input->post('task_status');
            $task_priority = $this->input->post('task_priority');
            $task_daily = $this->input->post('task_daily');
            $due_date = $this->input->post('due_date');
            $completed_date = $this->input->post('completed_date');
            $department_value = $department[0];

            $arr = array(
                'project_id' => $project_id,
                'assigned_to' => $assigned_to,
                'task_name' => addslashes($task_name),
                'task_details' => addslashes($task_details),
                'task_status' => $task_status,
                'task_priority' => $task_priority,
                'task_daily' => $task_daily,
                'due_date' => $due_date,
                'completed_date' => $completed_date,
                'department' => $department_value
            );
            // $this->db->insert("project_tasks_tbl", $data);
            // $task_id = $this->db->insert_id();
            // $this->db->insert('project_task_tbl', $arr);



            // Get data from the form for the 'designer' table
            $assign_dates = $this->input->post('assign_date');
            $client_names = $this->input->post('client_name');
            $client_name_socialmedia = $this->input->post('client_name_socialmedia');
            $work_type_designer = $this->input->post('work_type_designer');
            $desc_designer = $this->input->post('desc_designer');
            $ref_link_designer = $this->input->post('ref_link_designer');
            $content_designer = $this->input->post('content_designer');
            $work_type_socialmedia = $this->input->post('work_type_socialmedia');
            $desc_socialmedia = $this->input->post('desc_socialmedia');
            $fb_ads_socialmedia = $this->input->post('fb_ads_socialmedia');
            $g_ads_socialmedia = $this->input->post('g_ads_socialmedia');
            $website_type = $this->input->post('website_type');
            $desc_website = $this->input->post('desc_website');
            $delivery_date = $this->input->post('delivery_date');
            $p_kw_SEO = $this->input->post('p_kw_SEO');
            $target_kw_SEO = $this->input->post('target_kw_SEO');
            $gmb_SEO = $this->input->post('gmb_SEO');
            $assign_date_socialmedia = $this->input->post('assign_date_socialmedia');
            $assign_date_web = $this->input->post('assign_date_web');
            $assign_date_seo = $this->input->post('assign_date_seo');
            $client_name_web = $this->input->post('client_name_web');
            $client_name_seo = $this->input->post('client_name_seo');
            $assigned_to = $this->input->post('assigned_to');
            $department = $this->input->post('department');


            $data = $this->Project_Tasks_model->insert_project_tasks($arr);


            $data2 = array();
            $loop_data = [];
            // designer fields
            if ($department['0'] == 11) {
                $loop_data = $assign_dates;
                for ($i = 0; $i < count($loop_data); $i++) {

                    $file_name = "";
                    $file_tmp = "";

                    foreach ($_FILES as $fkey => $fvalue) {
                        $file_paths = [];
                        if (isset($_FILES[$fkey])) {
                            $fileArrays = $_FILES[$fkey];

                            // $file_paths = array(); 
                            $assigned_to_value = $assigned_to[0];
                            $department_value = $department[0];

                            for ($j = 0; $j < count($fileArrays['name']); $j++) {
                                $file_name = $fileArrays['name'][$j];
                                $file_tmp = $fileArrays['tmp_name'][$j];

                                $file_path = "assets/designer_imgs/" . $file_name;
                                move_uploaded_file($file_tmp, $file_path);

                                // Store the file path in the array
                                $file_paths[] = $file_path;
                            }
                        }
                        $serialized_file_paths[] = serialize($file_paths);
                    }
                    $data2[] = array(
                        'staff_id' => $assigned_to_value,
                        'department' => $department_value,
                        'project_task_id' => $data,
                        'assign_date' => $assign_dates[$i],
                        'client_name' => $client_names[$i],
                        'work_type_designer' => $work_type_designer[$i],
                        'desc_designer' => $desc_designer[$i],
                        'ref_link_designer' => $ref_link_designer[$i],
                        'content_designer' => $content_designer[$i],
                        'ref_file_designer' => $serialized_file_paths[$i],
                    );
                    $file_paths = array();
                }
            } else if ($department['0'] == 6) {
                $loop_data = $assign_date_socialmedia;
                $data2 = array();
                $assigned_to_value = $assigned_to[0];
                $department_value = $department[0];
                for ($i = 0; $i < count($loop_data); $i++) {
                    $data2[] = array(
                        'staff_id' => $assigned_to_value,
                        'department' => $department_value,
                        'project_task_id' => $data,
                        'assign_date' => $assign_date_socialmedia[$i],
                        'client_name' => $client_name_socialmedia[$i],
                        'work_type_socialmedia' => $work_type_socialmedia[$i],
                        'desc_socialmedia' => $desc_socialmedia[$i],
                        'g_ads_socialmedia' => $g_ads_socialmedia[$i],
                        'fb_ads_socialmedia' => $fb_ads_socialmedia[$i],
                    );
                }
            } else if ($department['0'] == 16) {
                $loop_data = $assign_date_web;
                $assigned_to_value = $assigned_to[0];
                $department_value = $department[0];
                for ($i = 0; $i < count($loop_data); $i++) {
                    $data2[] = array(
                        'staff_id' => $assigned_to_value,
                        'department' => $department_value,
                        'project_task_id' => $data,
                        'assign_date' => $assign_date_web[$i],
                        'client_name' => $client_name_web[$i],
                        'website_type' => $website_type[$i],
                        'desc_website' => $desc_website[$i],
                        'delivery_date' => $delivery_date[$i],
                    );
                }
            } else if ($department['0'] == 15 || $department['0'] == 17) {
                $loop_data = $assign_date_seo;
                $assigned_to_value = $assigned_to[0];
                $department_value = $department[0];
                for ($i = 0; $i < count($loop_data); $i++) {
                    $data2[] = array(
                        'staff_id' => $assigned_to_value,
                        'department' => $department_value,
                        'project_task_id' => $data,
                        'assign_date' => $assign_date_seo[$i],
                        'client_name' => $client_name_seo[$i],
                        'p_kw_SEO' => $p_kw_SEO[$i],
                        'target_kw_SEO' => $target_kw_SEO[$i],
                        'gmb_SEO' => $gmb_SEO[$i],
                    );
                }
            }
            // $task_id = $this->Project_Tasks_model->insert_project_tasks($arr);
            // $data = $this->Project_Tasks_model->insert_project_tasks($arr);
            $data2 = $this->Project_Tasks_model->insert_worksheets($data2);

            if ($data == true and $data2 == true) {
                $this->session->set_flashdata('success', "New Project Task Added Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, New Project Task Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->index();
            return false;
        }
    }

    // public function update()
    // {
    //     $this->load->helper('form');
    //     $this->form_validation->set_rules('project_id', 'Project ID', 'required');
    //     $this->form_validation->set_rules('assigned_to[]', 'Assigned To', 'required');
    //     $this->form_validation->set_rules('task_name', 'Task Name', 'required');
    //     $this->form_validation->set_rules('task_details', 'Task Details', 'required');
    //     $this->form_validation->set_rules('task_status', 'Task Status', 'required');
    //     $this->form_validation->set_rules('due_date', 'Task Due Date', 'required');
    //     // $this->form_validation->set_rules('completed_date', 'Task Completed Date', 'required');

    //     $id = $this->input->post('id');

    //     if ($this->form_validation->run() !== false) {

    //         $project_id = $this->input->post('project_id');
    //         // $assigned_to=$this->input->post('assigned_to');
    //         $assigned_to = implode(',', $this->input->post('assigned_to'));
    //         $task_name = $this->input->post('task_name');
    //         $task_details = $this->input->post('task_details');
    //         $task_status = $this->input->post('task_status');
    //         $task_priority = $this->input->post('task_priority');
    //         $task_daily = $this->input->post('task_daily');
    //         $due_date = $this->input->post('due_date');
    //         $completed_date = $this->input->post('completed_date');

    //         $arr = array(
    //             'project_id' => $project_id,
    //             'assigned_to' => $assigned_to,
    //             'task_name' => addslashes($task_name),
    //             'task_details' => addslashes($task_details),
    //             'task_status' => $task_status,
    //             'task_priority' => $task_priority,
    //             'task_daily' => $task_daily,
    //             'due_date' => $due_date,
    //             'completed_date' => $completed_date
    //         );
    //         $data = $this->Project_Tasks_model->update_project_tasks($arr, $id);

    //         if ($this->db->affected_rows() > 0) {
    //             $this->session->set_flashdata('success', "Project Task Updated Succesfully");
    //         } else {
    //             $this->session->set_flashdata('error', "Sorry, Project Task Update Failed.");
    //         }
    //         redirect(base_url() . "manage-project-tasks");
    //     } else {
    //         $this->edit($id);
    //         return false;
    //     }
    // }
    public function update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('project_id', 'Project ID', 'required');
        $this->form_validation->set_rules('assigned_to', 'Assigned To', '');
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');
        $this->form_validation->set_rules('task_details', 'Task Details', 'required');
        // $this->form_validation->set_rules('task_status', 'Task Status', 'required');
        // $this->form_validation->set_rules('due_date', 'Task Due Date', 'required');
        // $this->form_validation->set_rules('completed_date', 'Task Completed Date', 'required');
        $this->form_validation->set_rules('assign_date[]', 'Assign Date', '');
        $this->form_validation->set_rules('client_name[]', 'Client Name', '');

        //Designer table form validations
        $this->form_validation->set_rules('work_type_designer[]', 'Type of Work', '');
        $this->form_validation->set_rules('desc_designer[]', 'Desc Designer', '');
        $this->form_validation->set_rules('ref_link_designer[]', 'Ref link designer', '');
        $this->form_validation->set_rules('content_designer[]', 'Content Designer', '');
        $this->form_validation->set_rules('ref_file_designer[]', 'File Designer', '');

        // // Social Media form validation
        $this->form_validation->set_rules('work_type_socialmedia[]', 'Type of social media work', '');
        $this->form_validation->set_rules('desc_socialmedia[]', 'Desc of social media', '');
        $this->form_validation->set_rules('fb_ads_socialmedia[]', 'about Fb ads', '');
        $this->form_validation->set_rules('g_ads_socailmedia[]', 'about G ads social media', '');

        // Website table form validation
        $this->form_validation->set_rules('website_type[]', 'Type of website', '');
        $this->form_validation->set_rules('desc_website[]', 'Desc about website', '');
        $this->form_validation->set_rules('delivery_date[]', 'website delivery date', '');

        // SEO table form validation
        $this->form_validation->set_rules('p_kw_SEO[]', 'Present Keyword SEO', '');
        $this->form_validation->set_rules('target_kw_SEO[]', 'Target keyword SEO', '');
        $this->form_validation->set_rules('gmb_SEO[]', 'Google My Business SEO', '');
        // $this->form_validation->set_rules('completed_date', 'Task Completed Date', 'required');

        $id = $this->input->post('id');
        if ($this->form_validation->run() !== false) {

            $project_id = $this->input->post('project_id');
            // $assigned_to=$this->input->post('assigned_to');
            $assigned_to = implode(',', $this->input->post('assigned_to'));
            $task_name = $this->input->post('task_name');
            $task_details = $this->input->post('task_details');
            $task_status = $this->input->post('task_status');
            $task_priority = $this->input->post('task_priority');
            $task_daily = $this->input->post('task_daily');
            $due_date = $this->input->post('due_date');
            $completed_date = $this->input->post('completed_date');

            $arr = array(
                'project_id' => $project_id,
                'assigned_to' => $assigned_to,
                'task_name' => addslashes($task_name),
                'task_details' => addslashes($task_details),
                'task_status' => $task_status,
                'task_priority' => $task_priority,
                'task_daily' => $task_daily,
                'due_date' => $due_date,
                'completed_date' => $completed_date
            );

            $data = $this->Project_Tasks_model->update_project_tasks($arr, $id);

            $designer_ids = $this->input->post('designer_id');
            $assigned_to_values = $this->input->post('assigned_to')[0];

            foreach ($designer_ids as $index => $designer_id) {
                // Retrieve other input values for the corresponding row
                $assign_date = $this->input->post('assign_date')[$index];
                $client_name = $this->input->post('client_name')[$index];
                $work_type_designer = $this->input->post('work_type_designer')[$index];
                $desc_designer = $this->input->post('desc_designer')[$index];
                $ref_link_designer = $this->input->post('ref_link_designer')[$index];
                $content_designer = $this->input->post('content_designer')[$index];
                $assigned_to_designer = $assigned_to_values;
                // ... add other fields as needed
                echo $assigned_to_designer;
                // Update the database using your model
                $this->Project_Tasks_model->updateDesignerRow($assigned_to_designer,$designer_id, $assign_date, $client_name, $work_type_designer, $desc_designer, $ref_link_designer, $content_designer);
            }

            $socialmedia_ids = $this->input->post('socialmedia_id');
            $assigned_to_values = $this->input->post('assigned_to')[0];

            foreach ($socialmedia_ids as $index => $socialmedia_id) {
                // Retrieve other input values for the corresponding row
                $assign_date_socialmedia = $this->input->post('assign_date_socialmedia')[$index];
                $client_name_socialmedia = $this->input->post('client_name_socialmedia')[$index];
                $work_type_socialmedia = $this->input->post('work_type_socialmedia')[$index];
                $desc_socialmedia = $this->input->post('desc_socialmedia')[$index];
                $g_ads_socialmedia = $this->input->post('g_ads_socialmedia')[$index];
                $fb_ads_socialmedia = $this->input->post('fb_ads_socialmedia')[$index];
                $assigned_to_socialmedia = $assigned_to_values;

                // ... add other fields as needed
        
                // Update the database using your model
                $this->Project_Tasks_model->updateSocialMediaRow($assigned_to_socialmedia,$socialmedia_id, $assign_date_socialmedia, $client_name_socialmedia, $work_type_socialmedia, $desc_socialmedia, $g_ads_socialmedia, $fb_ads_socialmedia);
            }
           
            $website_ids = $this->input->post('website_id');
            $assigned_to_values = $this->input->post('assigned_to')[0];
            foreach ($website_ids as $index => $website_id) {
                // Retrieve other input values for the corresponding row
                $assign_date_web = $this->input->post('assign_date_web')[$index];
                $client_name_web = $this->input->post('client_name_web')[$index];
                $website_type = $this->input->post('website_type')[$index];
                $desc_website = $this->input->post('desc_website')[$index];
                $delivery_date = $this->input->post('delivery_date')[$index];
                $assigned_to_web = $assigned_to_values;

                // ... add other fields as needed
        
                // Update the database using your model
                $this->Project_Tasks_model->updateWebsiteRow($assigned_to_web,$website_id, $assign_date_web, $client_name_web, $website_type, $desc_website, $delivery_date);
            }

            $seo_ids = $this->input->post('SEO_id');
            $assigned_to_values = $this->input->post('assigned_to')[0];
            foreach ($seo_ids as $index => $seo_id) {
                // Retrieve other input values for the corresponding row
                $assign_date_seo = $this->input->post('assign_date_seo')[$index];
                $client_name_seo = $this->input->post('client_name_seo')[$index];
                $p_kw_SEO = $this->input->post('p_kw_SEO')[$index];
                $target_kw_SEO = $this->input->post('target_kw_SEO')[$index];
                $gmb_SEO = $this->input->post('gmb_SEO')[$index];
                $assigned_to_seo = $assigned_to_values;

                // ... add other fields as needed
        
                // Update the database using your model
                $this->Project_Tasks_model->updateSEOrow($assigned_to_seo,$seo_id, $assign_date_seo, $client_name_seo, $p_kw_SEO, $target_kw_SEO, $gmb_SEO);
            }
        

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Project Task Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Project Task Update Failed.");
            }
            redirect(base_url() . "manage-project-tasks");
        } else {
            $this->edit($id);
            return false;
        }
    }


    // public function update_worksheets()
    // {
    //     $this->load->library('form_validation');

    //     $this->form_validation->set_rules('assign_date[]', 'Assign Date', '');
    //     $this->form_validation->set_rules('client_name[]', 'Client Name', '');

    //     //Designer table form validations
    //     $this->form_validation->set_rules('work_type_designer[]', 'Type of Work', '');
    //     $this->form_validation->set_rules('desc_designer[]', 'Desc Designer', '');
    //     $this->form_validation->set_rules('ref_link_designer[]', 'Ref link designer', '');
    //     $this->form_validation->set_rules('content_designer[]', 'Content Designer', '');
    //     $this->form_validation->set_rules('ref_file_designer[]', 'File Designer', '');

    //     // // Social Media form validation
    //     $this->form_validation->set_rules('work_type_socialmedia[]', 'Type of social media work', '');
    //     $this->form_validation->set_rules('desc_socialmedia[]', 'Desc of social media', '');
    //     $this->form_validation->set_rules('fb_ads_socialmedia[]', 'about Fb ads', '');
    //     $this->form_validation->set_rules('g_ads_socailmedia[]', 'about G ads social media', '');

    //     // Website table form validation
    //     $this->form_validation->set_rules('website_type[]', 'Type of website', '');
    //     $this->form_validation->set_rules('desc_website[]', 'Desc about website', '');
    //     $this->form_validation->set_rules('delivery_date[]', 'website delivery date', '');

    //     // SEO table form validation
    //     $this->form_validation->set_rules('p_kw_SEO[]', 'Present Keyword SEO', '');
    //     $this->form_validation->set_rules('target_kw_SEO[]', 'Target keyword SEO', '');
    //     $this->form_validation->set_rules('gmb_SEO[]', 'Google My Business SEO', '');

    //     if ($this->form_validation->run() !== false) {
    //         // Retrieve data from the form
    //         $worksheet_id = $this->input->post('worksheet_id');
    //         $assigned_to = implode(',', $this->input->post('assigned_to'));
    //         $department = $this->input->post('department');
    //         $assign_date = $this->input->post('assign_date');
    //         $client_name = $this->input->post('client_name');
    //         $work_type_designer = $this->input->post('work_type_designer');
    //         $desc_designer = $this->input->post('desc_designer');
    //         // Add more fields as needed for other departments

    //         // Update the main project task record
    //         $arr = array(
    //             'assigned_to' => $assigned_to,
    //             // Add more fields as needed
    //         );
    //         $this->Project_Tasks_model->update_worksheets($arr, $worksheet_id);

    //         // Update or insert data for the specific department
    //         if ($department == 13) { // Designer
    //             $loop_data = $assign_date; // Assuming assign_date is used for Designer

    //             for ($i = 0; $i < count($loop_data); $i++) {
    //                 $file_name = "";
    //                 $file_tmp = "";

    //                 foreach ($_FILES as $fkey => $fvalue) {
    //                     $file_paths = [];
    //                     if (isset($_FILES[$fkey])) {
    //                         $fileArrays = $_FILES[$fkey];

    //                         // $file_paths = array(); 
    //                         $assigned_to_value = $assigned_to[0];
    //                         $department_value = $department[0];

    //                         for ($j = 0; $j < count($fileArrays['name']); $j++) {
    //                             $file_name = $fileArrays['name'][$j];
    //                             $file_tmp = $fileArrays['tmp_name'][$j];

    //                             $file_path = "assets/designer_imgs/" . $file_name;
    //                             move_uploaded_file($file_tmp, $file_path);

    //                             // Store the file path in the array
    //                             $file_paths[] = $file_path;
    //                         }
    //                     }
    //                     $serialized_file_paths[] = serialize($file_paths);
    //                 }
    //                 $data2[] = array(
    //                     'staff_id' => $assigned_to_value,
    //                     'department' => $department_value,
    //                     'project_task_id' => $data,
    //                     'assign_date' => $assign_dates[$i],
    //                     'client_name' => $client_names[$i],
    //                     'work_type_designer' => $work_type_designer[$i],
    //                     'desc_designer' => $desc_designer[$i],
    //                     'ref_link_designer' => $ref_link_designer[$i],
    //                     'content_designer' => $content_designer[$i],
    //                     'ref_file_designer' => $serialized_file_paths[$i],
    //                 );
    //                 $file_paths = array();
    //             }
    //         } elseif ($department == 12) { // Social Media
    //             $loop_data = $assign_date_socialmedia;
    //             $data2 = array();
    //             $assigned_to_value = $assigned_to[0];
    //             $department_value = $department[0];
    //             for ($i = 0; $i < count($loop_data); $i++) {
    //                 $data2[] = array(
    //                     'staff_id' => $assigned_to_value,
    //                     'department' => $department_value,
    //                     'project_task_id' => $data,
    //                     'assign_date' => $assign_date_socialmedia[$i],
    //                     'client_name' => $client_name_socialmedia[$i],
    //                     'work_type_socialmedia' => $work_type_socialmedia[$i],
    //                     'desc_socialmedia' => $desc_socialmedia[$i],
    //                     'g_ads_socialmedia' => $g_ads_socialmedia[$i],
    //                     'fb_ads_socialmedia' => $fb_ads_socialmedia[$i],
    //                 );
    //             }
    //         } elseif ($department == 10) { // Website
    //             $loop_data = $assign_date_web;
    //             $assigned_to_value = $assigned_to[0];
    //             $department_value = $department[0];
    //             for ($i = 0; $i < count($loop_data); $i++) {
    //                 $data2[] = array(
    //                     'staff_id' => $assigned_to_value,
    //                     'department' => $department_value,
    //                     'project_task_id' => $data,
    //                     'assign_date' => $assign_date_web[$i],
    //                     'client_name' => $client_name_web[$i],
    //                     'website_type' => $website_type[$i],
    //                     'desc_website' => $desc_website[$i],
    //                     'delivery_date' => $delivery_date[$i],
    //                 );
    //             }
    //         } elseif ($department == 11) { // SEO
    //             $loop_data = $assign_date_seo;
    //             $assigned_to_value = $assigned_to[0];
    //             $department_value = $department[0];
    //             for ($i = 0; $i < count($loop_data); $i++) {
    //                 $data2[] = array(
    //                     'staff_id' => $assigned_to_value,
    //                     'department' => $department_value,
    //                     'project_task_id' => $data,
    //                     'assign_date' => $assign_date_seo[$i],
    //                     'client_name' => $client_name_seo[$i],
    //                     'p_kw_SEO' => $p_kw_SEO[$i],
    //                     'target_kw_SEO' => $target_kw_SEO[$i],
    //                     'gmb_SEO' => $gmb_SEO[$i],
    //                 );
    //             }
    //         }

    //         // Handle success or failure
    //         if ($this->db->affected_rows() > 0) {
    //             $this->session->set_flashdata('success', "Worksheets Updated Successfully");
    //         } else {
    //             $this->session->set_flashdata('error', "Sorry, Worksheets Update Failed.");
    //         }
    //         redirect($_SERVER['HTTP_REFERER']);
    //     } else {
    //         // Form validation failed, handle accordingly
    //         $this->index(); // Redirect to your index or another appropriate page
    //         return false;
    //     }
    // }


    function edit($id)
    {
        $this->load->model('Worksheet_model');
        $data['projects'] = $this->Projects_model->select_projects();
        $data['staff'] = $this->Staff_model->select_staff();
        $data['content'] = $this->Project_Tasks_model->select_project_tasks_byID($id);
        $data['worksheet'] = $this->Worksheet_model->select_worksheet_byID($id);
        $data['departments'] = $this->Department_model->select_departments();
        $data['clients'] = $this->Clients_model->select_clients();
        $this->load->view('admin/header');
        $this->load->view('admin/edit-project-tasks', $data);
        $this->load->view('admin/footer');
    }


    // function edit_worksheet($id)
    // {
    //     $this->load->model('Worksheet_model');
    //     $data['clients'] = $this->Clients_model->select_clients();
    //     $data['staff'] = $this->Staff_model->select_staff();
    //     $data['content'] = $this->Worksheet_model->select_worksheet_byID($id);
    //     $this->load->view('admin/header');
    //     $this->load->view('admin/edit-worksheet', $data);
    //     $this->load->view('admin/footer');
    // }

    function delete($id)
    {
        $data = $this->Project_Tasks_model->delete_project_tasks($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Project Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Project Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    function delete_worksheets($id)
    {
        $this->load->model('Worksheet_model');
        $data = $this->Worksheet_model->delete_worksheet($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Project Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Project Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}

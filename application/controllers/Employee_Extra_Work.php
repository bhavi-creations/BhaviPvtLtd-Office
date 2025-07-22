<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Employee panel controller for managing extra work
class Employee_Extra_Work extends CI_Controller
{
    public $employee_id;
    public function __construct()
    {
        parent::__construct();

        // --- ADD THESE TWO LINES FOR DEBUGGING ---
        // echo "<pre>";
        // var_dump($this->session->userdata());
        // echo "</pre>";
        // die("Debugging session data for VIEW button click...");
        // ------------------------------------------

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'));
        }

        $this->employee_id = $this->session->userdata('userid');
        $this->load->helper('text');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session'); // You can consider commenting this line out if 'session' is already autoloaded to avoid the "already loaded" debug message, but keep it for now if unsure.

        $this->load->model('Extra_Work_model');

        if (ENVIRONMENT === 'development') {
            log_message('debug', 'DEBUG: Employee_Extra_Work::__construct - $this->session->userdata("logged_in"): ' . ($this->session->userdata('logged_in') ? 'TRUE' : 'FALSE'));
            log_message('debug', 'DEBUG: Employee_Extra_Work::__construct - $this->employee_id: ' . $this->employee_id);
            log_message('debug', 'DEBUG: $this->Extra_Work_model type: ' . gettype($this->Extra_Work_model));
            if (is_null($this->Extra_Work_model)) {
                log_message('error', 'DEBUG: Extra_Work_model is NULL after loading. This indicates an issue with model loading.');
            }
        }
    }


    public function add_my_entry()
    {
        $this->load->view('staff/header');
        $this->load->view('staff/extra_work/add_my_extra_work_view');
        $this->load->view('staff/footer');
    }

    /**
     * Handles the form submission for adding a new extra work entry for the logged-in employee.
     */
    public function add_my_entry_action()
    {
        $this->form_validation->set_rules('project_name', 'Project Name', 'required|max_length[255]');
        $this->form_validation->set_rules('task', 'Task', 'required|max_length[255]');
        $this->form_validation->set_rules('work_description', 'Work Description', 'required|max_length[1000]');
        $this->form_validation->set_rules('hours_worked', 'Hours Worked', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('work_date', 'Work Date', 'required|callback_valid_date');
        $this->form_validation->set_rules('assigned_by', 'Assigned By', 'max_length[255]');
        $this->form_validation->set_rules('work_status', 'Work Status', 'required|in_list[not_yet_started,on_going,completed,pending]');
        $this->form_validation->set_rules('notes', 'Notes', 'max_length[1000]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->add_my_entry();
        } else {
            $data = [
                'employee_id'      => $this->employee_id,
                'project_name'     => $this->input->post('project_name'),
                'task'             => $this->input->post('task'),
                'work_description' => $this->input->post('work_description'),
                'hours_worked'     => $this->input->post('hours_worked'),
                'work_date'        => $this->input->post('work_date'),
                'assigned_by'      => $this->input->post('assigned_by'),
                'work_status'      => $this->input->post('work_status'),
                'notes'            => $this->input->post('notes'),
            ];

            $insert_id = $this->Extra_Work_model->add_extra_work_entry($data);

            if ($insert_id) {
                $this->session->set_flashdata('success', "Your extra work entry added successfully!");
            } else {
                $this->session->set_flashdata('error', "Failed to add your extra work entry.");
            }
            redirect(base_url('extra-work/my/manage')); // Using the route for consistency
        }
    }

    /**
     * Displays only the logged-in employee's extra work entries.
     */
    public function manage_my_entries()
    {
        $data['work_entries'] = $this->Extra_Work_model->get_extra_work_entries($this->employee_id);
        $this->load->view('staff/header');
        $this->load->view('staff/extra_work/manage_my_extra_work_view', $data);
        $this->load->view('staff/footer');
    }

    /**
     * Displays the form for the logged-in employee to edit one of their own extra work entries.
     * @param int $work_id
     */
    public function edit_my_entry($work_id)
    {
        $work_entry = $this->Extra_Work_model->get_extra_work_entry_by_id($work_id);
        if (empty($work_entry) || $work_entry['employee_id'] != $this->employee_id) {
            $this->session->set_flashdata('error', 'You are not authorized to edit this work entry or it does not exist.');
            redirect(base_url('extra-work/my/manage')); // Using the route for consistency
        }
        $data['work_entry'] = $work_entry;
        $this->load->view('staff/header');
        $this->load->view('staff/extra_work/edit_my_extra_work_view', $data);
        $this->load->view('staff/footer');
    }

    /**
     * Handles the form submission for updating an extra work entry by the logged-in employee.
     * @param int $work_id
     */
    public function update_my_entry_action($work_id)
    {
        $existing_entry = $this->Extra_Work_model->get_extra_work_entry_by_id($work_id);
        if (empty($existing_entry) || $existing_entry['employee_id'] != $this->employee_id) {
            $this->session->set_flashdata('error', 'Unauthorized attempt to update a work entry.');
            redirect(base_url('extra-work/my/manage')); // Using the route for consistency
        }

        $this->form_validation->set_rules('project_name', 'Project Name', 'required|max_length[255]');
        $this->form_validation->set_rules('task', 'Task', 'required|max_length[255]');
        $this->form_validation->set_rules('work_description', 'Work Description', 'required|max_length[1000]');
        $this->form_validation->set_rules('hours_worked', 'Hours Worked', 'required|numeric|greater_than[0]');
        $this->form_validation->set_rules('work_date', 'Work Date', 'required|callback_valid_date');
        $this->form_validation->set_rules('assigned_by', 'Assigned By', 'max_length[255]');
        $this->form_validation->set_rules('work_status', 'Work Status', 'required|in_list[not_yet_started,on_going,completed,pending]');
        $this->form_validation->set_rules('notes', 'Notes', 'max_length[1000]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->edit_my_entry($work_id);
        } else {
            $data = [
                'project_name'     => $this->input->post('project_name'),
                'task'             => $this->input->post('task'),
                'work_description' => $this->input->post('work_description'),
                'hours_worked'     => $this->input->post('hours_worked'),
                'work_date'        => $this->input->post('work_date'),
                'assigned_by'      => $this->input->post('assigned_by'),
                'work_status'      => $this->input->post('work_status'),
                'notes'            => $this->input->post('notes'),
            ];

            if ($this->Extra_Work_model->update_extra_work_entry($work_id, $data)) {
                $this->session->set_flashdata('success', "Your extra work entry updated successfully!");
            } else {
                $this->session->set_flashdata('error', "Failed to update your extra work entry or no changes made.");
            }
            redirect(base_url('extra-work/my/manage')); // Using the route for consistency
        }
    }

    /**
     * Deletes an extra work entry for the logged-in employee.
     * @param int $work_id
     */
    public function delete_my_entry($work_id)
    {
        $existing_entry = $this->Extra_Work_model->get_extra_work_entry_by_id($work_id);
        if (empty($existing_entry) || $existing_entry['employee_id'] != $this->employee_id) {
            $this->session->set_flashdata('error', 'You are not authorized to delete this work entry or it does not exist.');
            redirect(base_url('extra-work/my/manage')); // Using the route for consistency
        }

        if ($this->Extra_Work_model->delete_extra_work_entry($work_id)) {
            $this->session->set_flashdata('success', "Your extra work entry deleted successfully!");
        } else {
            $this->session->set_flashdata('error', "Failed to delete your extra work entry.");
        }
        redirect(base_url('extra-work/my/manage')); // Using the route for consistency
    }

    /**
     * Custom validation callback for date format.
     */
    public function valid_date($date)
    {
        if (preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches)) {
            if (checkdate($matches[2], $matches[3], $matches[1])) {
                return TRUE;
            }
        }
        $this->form_validation->set_message('valid_date', 'The {field} field must be in YYYY-MM-DD format and a valid date.');
        return FALSE;
    }





    public function view_my_entry($work_id = null)
    {
        if (empty($work_id) || !is_numeric($work_id)) {
            $this->session->set_flashdata('error', 'Invalid extra work entry ID.');
            redirect(base_url('employee/employee_extra_work/manage_my_extra_work'));
        }

        $data['entry'] = $this->Extra_Work_model->get_extra_work_entry_by_id($work_id);

        // Ensure the entry belongs to the logged-in employee (security check)
        if ($data['entry'] && $data['entry']['employee_id'] == $this->employee_id) {
            $this->load->view('staff/header');
            $this->load->view('staff/extra_work/view_my_extra_work_details_view', $data); // Load the new view
            $this->load->view('staff/footer');
        } else {
            $this->session->set_flashdata('error', 'Extra work entry not found or you do not have permission to view it.');
            redirect(base_url('employee/employee_extra_work/manage_my_extra_work'));
        }
    }
}

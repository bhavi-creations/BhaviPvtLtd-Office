<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Work_Reports_model extends CI_Model
{

    // Constructor: Load necessary models only once
    function __construct()
    {
        parent::__construct();
        $this->load->database(); // Ensure database is loaded
        // Load these models once, instead of inside loops
        $this->load->model('Project_Tasks_model', 'tasks_model');
        $this->load->model('Staff_model', 'staff_model');
        $this->load->model('Projects_model', 'projects_model');
    }

    function insert_work_reports($data)
    {
        $this->db->insert("work_reports_tbl", $data);
        return $this->db->insert_id();
    }

    function select_work_reports()
    {
        $this->db->order_by('work_reports_tbl.on_date', 'DESC');
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            foreach ($result as $key => $result_data) {
                // Task data lookup and safe assignment
                $task_id = $result_data['task_id'];
                $task_result = $this->tasks_model->select_project_tasks_byID($task_id);
                // Check if result is not empty and has the first index
                if (!empty($task_result) && isset($task_result[0])) {
                    $result[$key]['task_data'] = $task_result[0];
                } else {
                    // Provide a default empty structure if task data not found
                    $result[$key]['task_data'] = array('task_name' => 'N/A'); // Default for the view
                }

                // Staff data lookup and safe assignment
                $staff_id = $result_data['staff_id'];
                $staff_result = $this->staff_model->select_staff_byID($staff_id);
                // Check if result is not empty and has the first index
                if (!empty($staff_result) && isset($staff_result[0])) {
                    $result[$key]['staff_data'] = $staff_result[0];
                } else {
                    // Provide a default empty structure if staff data not found
                    $result[$key]['staff_data'] = array('staff_name' => 'N/A', 'employee_id' => 'N/A'); // Default for the view
                }
            }
            return $result;
        }
        return array(); // Return empty array if no results
    }

    function select_work_reports_byID($id)
    {
        $this->db->where('work_reports_tbl.id', $id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            // Assuming this function is for single ID, result will have only one entry
            // You might want to get only one row (row_array()) here if it's always one result.
            // If select_project_tasks_byID returns row_array(), it would be null on no result
            // if it returns result_array() it would be empty array on no result
            // For now, let's keep the existing logic and add the same safety checks if needed later

            // Add task and staff data for this single report if needed for edit view
            if (!empty($result) && isset($result[0])) {
                $result_data = $result[0]; // Get the first (and only) row

                // Task data lookup and safe assignment
                $task_id = $result_data['task_id'];
                $task_result = $this->tasks_model->select_project_tasks_byID($task_id);
                if (!empty($task_result) && isset($task_result[0])) {
                    $result[0]['task_data'] = $task_result[0];
                } else {
                    $result[0]['task_data'] = array('task_name' => 'N/A');
                }

                // Staff data lookup and safe assignment
                $staff_id = $result_data['staff_id'];
                $staff_result = $this->staff_model->select_staff_byID($staff_id);
                if (!empty($staff_result) && isset($staff_result[0])) {
                    $result[0]['staff_data'] = $staff_result[0];
                } else {
                    $result[0]['staff_data'] = array('staff_name' => 'N/A', 'employee_id' => 'N/A');
                }
            }
            return $result;
        }
        return array(); // Return empty array if no results
    }

    function select_work_reports_by_staffID($id)
    {
        $this->db->where('work_reports_tbl.staff_id', $id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();

        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            foreach ($result as $key => $result_data) {
                // Task data lookup
                $task_id = $result_data['task_id'];
                $task_result = $this->tasks_model->select_project_tasks_byID($task_id);

                // Safely assign task_data (this addresses the error at line 63)
                if (!empty($task_result) && isset($task_result[0])) {
                    $result[$key]['task_data'] = $task_result[0];
                } else {
                    // If task data is not found, provide a default empty structure
                    $result[$key]['task_data'] = array('task_name' => 'N/A');
                }

                // Staff data lookup
                $staff_id = $result_data['staff_id'];
                $staff_result = $this->staff_model->select_staff_byID($staff_id);

                // Safely assign staff_data
                if (!empty($staff_result) && isset($staff_result[0])) {
                    $result[$key]['staff_data'] = $staff_result[0];
                } else {
                    // Provide a default empty structure if staff data not found
                    $result[$key]['staff_data'] = array('staff_name' => 'N/A', 'employee_id' => 'N/A');
                }

                // --- ADDED: Project data lookup ---
                $project_id = $result_data['project_id'];
                $project_result = $this->projects_model->select_project_byID($project_id);

                if (!empty($project_result) && isset($project_result[0])) {
                    $result[$key]['project_data'] = $project_result[0];
                } else {
                    // Provide a default if the project is not found
                    $result[$key]['project_data'] = array('project_name' => 'N/A');
                }
                // --- END ADDED ---
            }
            return $result;
        }
        return array(); // Always return an empty array if no records found for staff ID
    }
    function select_work_reports_by_taskID($id)
    {
        $this->db->where_in('work_reports_tbl.id', $id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function select_work_reports_by_projectID($id)
    {
        $this->db->where_in('work_reports_tbl.id', $id);
        $this->db->select("work_reports_tbl.*");
        $this->db->from("work_reports_tbl");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function delete_work_reports($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("work_reports_tbl");
        return $this->db->affected_rows(); // Return affected rows for proper check
    }

    function update_work_reports($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('work_reports_tbl', $data);
        return $this->db->affected_rows(); // Return affected rows for proper check
    }
}

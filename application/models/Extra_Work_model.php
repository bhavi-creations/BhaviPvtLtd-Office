<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Extra_Work_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Inserts a new employee extra work entry into the database.
     * @param array $data Data to be inserted (employee_id, project_name, task, work_description, hours_worked, work_date, assigned_by, work_status, notes)
     * @return int Inserted ID or 0 on failure.
     */
    public function add_extra_work_entry($data)
    {
        // --- DEBUGGING START ---
        if (ENVIRONMENT === 'development') {
            log_message('debug', 'DEBUG: Extra_Work_model::add_extra_work_entry - Data received: ' . print_r($data, true));
        }
        // --- DEBUGGING END ---

        $insert_status = $this->db->insert('employee_extra_work_tbl', $data);

        // --- DEBUGGING START ---
        if (ENVIRONMENT === 'development') {
            log_message('debug', 'DEBUG: Extra_Work_model::add_extra_work_entry - Insert Status: ' . ($insert_status ? 'TRUE' : 'FALSE'));
            log_message('debug', 'DEBUG: Extra_Work_model::add_extra_work_entry - Last Query: ' . $this->db->last_query());

            if (!$insert_status) {
                // Get the last database error
                $db_error = $this->db->error();
                log_message('error', 'ERROR: Extra_Work_model::add_extra_work_entry - Database Error Code: ' . $db_error['code'] . ' Message: ' . $db_error['message']);
            }
        }
        // --- DEBUGGING END ---

        if ($insert_status) {
            return $this->db->insert_id();
        } else {
            return 0; // Return 0 explicitly on failure
        }
    }

    public function get_extra_work_entries($employee_id = null)
    {
        $this->db->select('ew.*, s.staff_name AS employee_name, s.email AS employee_email, s.mobile AS employee_mobile');
        $this->db->from('employee_extra_work_tbl ew');
        $this->db->join('staff_tbl s', 's.id = ew.employee_id', 'left'); // Corrected JOIN with staff_tbl
        if ($employee_id) {
            $this->db->where('ew.employee_id', $employee_id);
        }
        $this->db->order_by('ew.work_date', 'DESC');
        $this->db->order_by('ew.added_on', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_extra_work_entry_by_id($work_id)
    {
        $this->db->select('ewe.*'); // Select only from the main table
        $this->db->from('employee_extra_work_tbl ewe');
        // Removed the JOINs as per your clarification
        $this->db->where('ewe.work_id', $work_id);
        $query = $this->db->get();

        // Remove the debugging lines if they are still present
        if ($query === FALSE) {
            echo "<pre>";
            echo "Database Query Failed!\n";
            echo "Last Query: " . $this->db->last_query() . "\n";
            print_r($this->db->error());
            echo "</pre>";
            die("Error debugging...");
        }

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return null;
    }
    public function update_extra_work_entry($work_id, $data)
    {
        $this->db->where('work_id', $work_id);
        return $this->db->update('employee_extra_work_tbl', $data);
    }

    public function delete_extra_work_entry($work_id)
    {
        $this->db->where('work_id', $work_id);
        $this->db->delete('employee_extra_work_tbl');
        return $this->db->affected_rows() > 0;
    }


    public function get_all_employees()
    {
        $this->db->select('id AS employee_id, staff_name AS employee_name');
        $this->db->order_by('staff_name', 'ASC');
        $query = $this->db->get('staff_tbl');
        return $query->result_array();
    }

    public function employee_exists($employee_id)
    {
        $this->db->where('id', $employee_id);
        $query = $this->db->get('staff_tbl');
        return $query->num_rows() > 0;
    }












public function get_all_extra_work_for_admin()
{
    // Select all columns from employee_extra_work_tbl (ewe.*)
    // Select staff_name and employee_id as staff_employee_id from staff_tbl (s)
    // Select department_name from department_tbl (d)
    $this->db->select('ewe.*, s.staff_name, s.employee_id AS staff_employee_id, d.department_name');

    // Use the correct table name for extra work entries
    $this->db->from('employee_extra_work_tbl ewe');

    // Join staff_tbl using the correct table name
    // Assuming 'ewe.employee_id' links to 's.id' in 'staff_tbl'
    $this->db->join('staff_tbl s', 's.id = ewe.employee_id', 'left');

    // Join department_tbl using the correct table name
    // Assuming 's.department_id' links to 'd.id' in 'department_tbl'
    $this->db->join('department_tbl d', 'd.id = s.department_id', 'left');

    // Add back the order by clauses from your working code
    $this->db->order_by('ewe.work_date', 'DESC');
    $this->db->order_by('ewe.added_on', 'DESC');

    $query = $this->db->get();
    return $query->result_array();
}
    public function get_extra_work_by_id($work_id)
{
    // Select all columns from employee_extra_work_tbl (ewe.*)
    // Select staff_name and employee_id as staff_employee_id from staff_tbl (s)
    // Select department_name from department_tbl (d)
    $this->db->select('ewe.*, s.staff_name, s.employee_id AS staff_employee_id, d.department_name');

    // Use the correct table name for extra work entries
    $this->db->from('employee_extra_work_tbl ewe'); 

    // Join staff_tbl using the correct table name
    // Assuming 'ewe.employee_id' links to 's.id' in 'staff_tbl'
    $this->db->join('staff_tbl s', 's.id = ewe.employee_id', 'left'); 

    // Join department_tbl using the correct table name
    // Assuming 's.department_id' links to 'd.id' in 'department_tbl'
    $this->db->join('department_tbl d', 'd.id = s.department_id', 'left'); 

    $this->db->where('ewe.work_id', $work_id); // Use alias 'ewe' for work_id
    $query = $this->db->get();
    return $query->row_array();
}
}

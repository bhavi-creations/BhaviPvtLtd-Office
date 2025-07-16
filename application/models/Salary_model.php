<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salary_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert_salary($data)
    {
        $this->db->insert("salary_tbl", $data);
        return $this->db->affected_rows(); // Updated to return affected rows
    }

    // This method now accepts optional filters for staff name and date range
    public function select_salary($staff_name_filter = null, $start_date_filter = null, $end_date_filter = null)
    {
        $this->db->select("salary_tbl.*, salary_tbl.worked_days, salary_tbl.actual_login_days, salary_tbl.added_working_days, staff_tbl.staff_name, staff_tbl.pic, department_tbl.department_name"); // Added new columns
        $this->db->from("salary_tbl");
        $this->db->join("staff_tbl", 'staff_tbl.id = salary_tbl.staff_id');
        $this->db->join("department_tbl", 'department_tbl.id = staff_tbl.department_id');

        // Default sorting
        $this->db->order_by('salary_tbl.added_on', 'DESC');
        $this->db->order_by('staff_tbl.staff_name', 'ASC');

        // Apply Staff Name filter if provided
        if (!empty($staff_name_filter)) {
            $this->db->like('staff_tbl.staff_name', $staff_name_filter);
        }

        // Apply Date Range filters
        if (!empty($start_date_filter) && !empty($end_date_filter)) {
            $this->db->where('DATE(salary_tbl.added_on) >=', $start_date_filter);
            $this->db->where('DATE(salary_tbl.added_on) <=', $end_date_filter);
        }

        $qry = $this->db->get();

        // --- ADD THESE LINES FOR DEBUGGING ---
        // echo "<pre>Last Query: " . $this->db->last_query() . "</pre>";
        // echo "<pre>Query Results: ";
        // var_dump($qry->result_array());
        // echo "</pre>";
        // -------------------------------------

        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        }
        return []; // Return an empty array if no results
    }

    function select_salary_byID($id)
    {
        $this->db->where('salary_tbl.id', $id);
        $this->db->select("salary_tbl.*, salary_tbl.actual_login_days, salary_tbl.added_working_days, staff_tbl.staff_name,staff_tbl.city,staff_tbl.state,staff_tbl.country,staff_tbl.mobile,staff_tbl.email,department_tbl.department_name"); // Added new columns
        $this->db->from("salary_tbl");
        $this->db->join("staff_tbl", 'staff_tbl.id=salary_tbl.staff_id');
        $this->db->join("department_tbl", 'department_tbl.id=staff_tbl.department_id');
        $qry = $this->db->get();

        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
        return [];
    }

    function select_salary_byStaffID($staffid)
    {
        $this->db->where('salary_tbl.staff_id', $staffid);
        $this->db->select("salary_tbl.*, salary_tbl.actual_login_days, salary_tbl.added_working_days, staff_tbl.staff_name,staff_tbl.city,staff_tbl.state,staff_tbl.country,staff_tbl.mobile,staff_tbl.email,department_tbl.department_name"); // Added new columns
        $this->db->from("salary_tbl");
        $this->db->join("staff_tbl", 'staff_tbl.id=salary_tbl.staff_id');
        $this->db->join("department_tbl", 'department_tbl.id=staff_tbl.department_id');
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
        return [];
    }

       function select_staff_byID($id)
    {
        $this->db->where('id', $id); // Assuming the primary key column for staff is 'id'
        $qry = $this->db->get('staff_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array(); // Return as array of associative arrays
            return $result;
        }
        return [];
    }

    function select_staff_byEmail($email)
    {
        $this->db->where('email', $email);
        $qry = $this->db->get('staff_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
        return [];
    }

    function sum_salary()
    {
        $this->db->select_sum('total');
        $qry = $this->db->get('salary_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->row_array(); // Changed to row_array() to get a single row
            return $result['total'] ?? 0; // Access 'total' directly or return 0 if null
        }
        return 0;
    }

    function delete_salary($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("salary_tbl");
        return $this->db->affected_rows();
    }

    function update_staff($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('staff_tbl', $data);
        return $this->db->affected_rows();
    }

    // New methods from main branch:

    public function insert_basic_salary($staff_id, $basic_salary)
    {
        $data = array(
            'staff_id' => $staff_id,
            'basic_salary' => $basic_salary,
            'added_by' => 1, // set your user ID or admin ID dynamically
            'updated_on' => date('Y-m-d'),
        );
        return $this->db->insert('salary_tbl', $data);
    }

    public function insert_staff_salaries()
    {
        $this->db->where('salary >', 0);
        $staffs = $this->db->get('staff_tbl')->result();

        foreach ($staffs as $staff) {
            $this->db->where('staff_id', $staff->id);
            $exists = $this->db->get('salary_tbl')->row();

            if (!$exists) {
                $data = array(
                    'staff_id'       => $staff->id,
                    'basic_salary'   => $staff->salary,
                    'allowance'      => 0,
                    'working_days'   => 0,
                    'worked_days'    => 0,
                    'actual_login_days' => 0, // Added new column
                    'added_working_days' => 0, // Added new column
                    'no_of_leaves'   => 0,
                    'salary_per_day' => 0,
                    'total'          => 0,
                    'gross_salary' => 0.00,
                    'pf_deduction' => 0.00,
                    'esi_deduction' => 0.00,
                    'professional_tax_deduction' => 0.00,
                    'tds_deduction' => 0.00,
                    'other_deductions' => 0.00,
                    'net_payable_salary' => 0.00,
                    'added_by'       => 1, // update dynamically
                    'updated_on'     => date('Y-m-d'),
                );
                $this->db->insert('salary_tbl', $data);
            }
        }
    }

    public function sync_staff_salaries()
    {
        $this->db->where('salary >', 0);
        $staffs = $this->db->get('staff_tbl')->result();

        foreach ($staffs as $staff) {
            $this->db->where('staff_id', $staff->id);
            $query = $this->db->get('salary_tbl');

            $data = array(
                'basic_salary'   => $staff->salary,
                'updated_on'     => date('Y-m-d'),
                'added_by'       => 1 // change this dynamically if needed
            );

            if ($query->num_rows() > 0) {
                $this->db->where('staff_id', $staff->id);
                $this->db->update('salary_tbl', $data);
            } else {
                $data['staff_id'] = $staff->id;
                $data['allowance'] = 0;
                $data['working_days'] = 0;
                $data['worked_days'] = 0;
                $data['actual_login_days'] = 0; // Added new column
                $data['added_working_days'] = 0; // Added new column
                $data['no_of_leaves'] = 0;
                $data['salary_per_day'] = 0;
                $data['total'] = 0;
                $data['gross_salary'] = 0.00;
                $data['pf_deduction'] = 0.00;
                $data['esi_deduction'] = 0.00;
                $data['professional_tax_deduction'] = 0.00;
                $data['tds_deduction'] = 0.00;
                $data['other_deductions'] = 0.00;
                $data['net_payable_salary'] = 0.00;

                $this->db->insert('salary_tbl', $data);
            }
        }
    }

    public function sync_salary_for_staff($staff_id)
    {
        $staff = $this->db->get_where('staff_tbl', ['id' => $staff_id])->row();

        if ($staff && $staff->salary > 0) {
            $data = [
                'basic_salary'   => $staff->salary,
                'updated_on'     => date('Y-m-d'),
                'added_by'       => 1 // update dynamically if needed
            ];

            $exists = $this->db->get_where('salary_tbl', ['staff_id' => $staff_id])->row();

            if ($exists) {
                $this->db->where('staff_id', $staff_id);
                $this->db->update('salary_tbl', $data);
            } else {
                $data['staff_id'] = $staff_id;
                $data['allowance'] = 0;
                $data['working_days'] = 0;
                $data['worked_days'] = 0;
                $data['actual_login_days'] = 0; // Added new column
                $data['added_working_days'] = 0; // Added new column
                $data['no_of_leaves'] = 0;
                $data['salary_per_day'] = 0;
                $data['total'] = 0;
                $data['gross_salary'] = 0.00;
                $data['pf_deduction'] = 0.00;
                $data['esi_deduction'] = 0.00;
                $data['professional_tax_deduction'] = 0.00;
                $data['tds_deduction'] = 0.00;
                $data['other_deductions'] = 0.00;
                $data['net_payable_salary'] = 0.00;

                $this->db->insert('salary_tbl', $data);
            }
        }
    }

    public function get_staff_with_salary_details_by_department($department_id)
    {
        $this->db->select('s.id, s.staff_name, s.salary as basic_salary_from_staff_tbl, d.department_name, st.basic_salary, st.allowance, st.working_days, st.worked_days, st.actual_login_days, st.added_working_days, st.no_of_leaves, st.salary_per_day, st.total'); // Added new columns
        $this->db->from('staff_tbl s');
        $this->db->join('department_tbl d', 'd.id = s.department_id');
        $this->db->join('salary_tbl st', 'st.staff_id = s.id', 'left');
        $this->db->where('s.department_id', $department_id);
        $this->db->order_by('s.staff_name', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_employee_login_days($staff_id, $year, $month)
    {
        $this->db->select('COUNT(DISTINCT DATE(login_date_time)) as login_days');
        $this->db->from('login_records_tbl');
        $this->db->where('staff_id', $staff_id);
        $this->db->where('YEAR(login_date_time)', $year);
        $this->db->where('MONTH(login_date_time)', $month);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['login_days'] ?? 0;
    }

    public function get_staff_salary_details_for_payslip($staff_id, $pay_month, $pay_year)
    {
        $this->db->select('s.*, st.staff_name, st.email, st.mobile as phone, st.address, st.employee_id as staff_employee_id, dt.department_name as department_name'); // <<< CHANGED HERE: dt.dept_name to dt.department_name
        // Add placeholders for designation, bank_account_no, pan_adhar_no if they are not in staff_tbl or other joined tables
        $this->db->select("'' as designation, '' as bank_account_no, '' as pan_adhar_no");

        $this->db->from('salary_tbl s');
        $this->db->join('staff_tbl st', 'st.id = s.staff_id');
        $this->db->join('department_tbl dt', 'dt.id = st.department_id', 'left');

        $this->db->where('s.staff_id', $staff_id);
        $this->db->where('s.month', $pay_month);
        $this->db->where('s.year', $pay_year);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return null;
    }

    // You might also need a method to update the payslip_pdf_path
    public function update_payslip_path($salary_id, $file_path)
    {
        $this->db->where('id', $salary_id);
        $this->db->update('salary_tbl', array('payslip_pdf_path' => $file_path));
        return $this->db->affected_rows();
    }

    // This method finds staff without a salary entry for the CURRENT month/year.
    public function get_staff_without_current_month_salary($department_id = NULL)
    {
        // Get current month and year
        $current_month = date('m');
        $current_year = date('Y');

        $this->db->select('st.*, d.department_name'); // Selects all columns from staff_tbl (including 'salary')
        $this->db->from('staff_tbl st');
        $this->db->join('department_tbl d', 'd.id = st.department_id', 'left');

        // LEFT JOIN with salary_tbl, specifically looking for entries for the current month and year
        $this->db->join(
            'salary_tbl s',
            's.staff_id = st.id AND s.month = ' . $current_month . ' AND s.year = ' . $current_year,
            'left'
        );

        // Filter by department if provided
        if ($department_id !== NULL) {
            $this->db->where('st.department_id', $department_id);
        }

        // Only select staff who do NOT have a salary entry for the current month and year
        $this->db->where('s.id IS NULL');

        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_all_payslip_details()
    {
        $this->db->select('s.id as salary_id, s.payslip_pdf_path, s.month, s.year, st.staff_name, st.employee_id');
        $this->db->from('salary_tbl s');
        $this->db->join('staff_tbl st', 'st.id = s.staff_id');
        $this->db->where('s.payslip_pdf_path IS NOT NULL'); // Only get records with a payslip
        $this->db->where('s.payslip_pdf_path != ""'); // And not empty string
        $this->db->order_by('s.year', 'DESC');
        $this->db->order_by('s.month', 'DESC');
        $this->db->order_by('st.staff_name', 'ASC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return all results as an array of arrays
        }
        return []; // Return empty array if no payslips found
    }



    // public function get_payslip_path_by_salary_id($salary_id)
    // {
    //     $this->db->select('payslip_pdf_path');
    //     $this->db->where('id', $salary_id);
    //     $query = $this->db->get('salary_tbl');  

    //     if ($query->num_rows() > 0) {
    //         $row = $query->row();
    //         return $row->payslip_pdf_path;
    //     }
    //     return null;
    // }



    public function get_payslip_path_by_salary_id($salary_id)
    {
        $this->db->select('payslip_pdf_path, staff_id');
        $this->db->from('salary_tbl');
        $this->db->where('id', $salary_id);
        $query = $this->db->get();
        return $query->row(); // Returns a single object or NULL
    }

    public function get_salary_month_year($salary_id)
    {
        $this->db->select('month, year');
        $this->db->from('salary_tbl');
        $this->db->where('id', $salary_id);
        $query = $this->db->get();
        return $query->row(); // Returns a single object (e.g., $obj->month, $obj->year) or NULL
    }
    public function get_staff_payslips($staff_id)
    {
        $this->db->select('s.id as salary_id, s.payslip_pdf_path, s.month, s.year, st.staff_name, st.employee_id');
        $this->db->from('salary_tbl s');
        $this->db->join('staff_tbl st', 'st.id = s.staff_id');
        $this->db->where('s.staff_id', $staff_id); // Filter by the specific staff_id
        $this->db->where('s.payslip_pdf_path IS NOT NULL'); // Only get records with a payslip
        $this->db->where('s.payslip_pdf_path != ""'); // And not empty string
        $this->db->order_by('s.year', 'DESC');
        $this->db->order_by('s.month', 'DESC');
        $this->db->order_by('st.staff_name', 'ASC'); // Optional: keep for consistency

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return []; // Return empty array if no payslips found
    }





    public function get_latest_salary_record_for_testing()
    {
        $this->db->select('staff_id, month, year');
        $this->db->from('salary_tbl');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row(); // Return a single row object
    }
}

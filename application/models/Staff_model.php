<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff_model extends CI_Model
{


    function insert_staff($data)
    {
        $this->db->insert("staff_tbl", $data);
        return $this->db->insert_id();
    }

    function select_staff()
    {
        $this->db->order_by('staff_tbl.id', 'DESC');
        $this->db->select("staff_tbl.*,department_tbl.department_name");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl", 'department_tbl.id=staff_tbl.department_id');
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function select_staff_byID($id)
    {
        $this->db->where('staff_tbl.id', $id);
        $this->db->select("staff_tbl.*,department_tbl.department_name");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl", 'department_tbl.id=staff_tbl.department_id');
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            $result['0']['permissions'] = $this->select_staff_permissions($id);
            return $result;
        }
    }

     function select_login_data($id)
    {
        $this->db->where('login_tbl.id', $id);
        $qry = $this->db->get('login_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function select_staff_byEmail($email)
    {
        $this->db->where('email', $email);
        $qry = $this->db->get('staff_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function select_staff_byDept($dpt)
    {
        $this->db->where('staff_tbl.department_id', $dpt);
        $this->db->select("staff_tbl.*, department_tbl.department_name, salary_tbl.basic_salary");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl", "department_tbl.id = staff_tbl.department_id");
        $this->db->join("salary_tbl", "salary_tbl.staff_id = staff_tbl.id", "left"); // <-- added join
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        }
    }


    function select_staff_permissions($staff_id)
    {
        $this->db->where('staff_id', $staff_id);
        $qry = $this->db->get('permissions_tbl');
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            return $result;
        }
    }

    function delete_staff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("staff_tbl");
        $this->db->affected_rows();
    }


    function update_staff($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('staff_tbl', $data);
        $this->db->affected_rows();
         return $this->db->affected_rows(); // <--- ADD 'return' here
    }

    function check_current_password($current_password, $id)
    {
        $this->db->where('id', $id);
        $this->db->where('password', $current_password);
        $this->db->select('*');
        $this->db->from('login_tbl');
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_password($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('login_tbl', $data);
        $this->db->affected_rows();
    }

    function delete_staff_file($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('staff_tbl', $data);
        $this->db->affected_rows();
    }

    function update_permission($data)
    {
        $staff_id = $data['staff_id'];
        $module = $data['module'];
        $this->db->where('staff_id', $staff_id);
        $this->db->where('module', $module);
        $qry = $this->db->get('permissions_tbl');
        if ($qry->num_rows() > 0) {
            $this->db->where('staff_id', $staff_id);
            $this->db->where('module', $module);
            $this->db->update('permissions_tbl', $data);
            if ($this->db->affected_rows()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->insert("permissions_tbl", $data);
            return $this->db->insert_id();
        }
    }


    
}

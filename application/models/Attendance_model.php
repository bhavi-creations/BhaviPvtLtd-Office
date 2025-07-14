<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {

    function select_attendance()
    {
        $this->db->order_by('login_records_tbl.id','DESC');
        $this->db->select("login_records_tbl.*,staff_tbl.*");
        $this->db->from("login_records_tbl");
        $this->db->join("staff_tbl",'staff_tbl.id=login_records_tbl.staff_id');
        $this->db->where("login_records_tbl.staff_id !=",'1');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_attendance_by_staff_id($id)
    {
        $this->db->where('login_records_tbl.staff_id',$id);
        $this->db->select("login_records_tbl.*,staff_tbl.*");
        $this->db->from("login_records_tbl");
        $this->db->join("staff_tbl",'staff_tbl.id=login_records_tbl.staff_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_attendance_by_date($staff_id, $date)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->where('DATE(login_date_time)', $date);
        $qry = $this->db->get('login_records_tbl');
        if ($qry->num_rows() > 0) {
            $results = $qry->result_array();
            foreach ($results as $result) {
                if ($result['logout_date_time'] === NULL) {
                    return $result;
                }
            }
        }
        return false;
    }

    function get_last_login($staff_id)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->order_by('login_date_time', 'DESC');
        $qry = $this->db->get('login_records_tbl', 1);
        if ($qry->num_rows() > 0) {
            return $qry->row_array();
        }
        return false;
    }

}

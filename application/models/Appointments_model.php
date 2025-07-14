<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments_model extends CI_Model {


    function insert_appointments($data)
    {
        $this->db->insert("appointments_tbl",$data);
        return $this->db->insert_id();
    }

    function select_appointments()
    {
        $this->db->order_by('appointments_tbl.date','ASC');
        $this->db->select("appointments_tbl.*");
        $this->db->from("appointments_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_appointments_byID($id)
    {
        $this->db->where('appointments_tbl.appointment_id',$id);
        $this->db->select("appointments_tbl.*");
        $this->db->from("appointments_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_appointments($id)
    {
        $this->db->where('appointment_id', $id);
        $this->db->delete("appointments_tbl");
        $this->db->affected_rows();
    }
    
    function update_appointments($data,$id)
    {
        $this->db->where('appointment_id', $id);
        $this->db->update('appointments_tbl',$data);
        $this->db->affected_rows();
    }

    function delete_marketing_file($data,$id)
    {
        $this->db->where('appointment_id', $id);
        $this->db->update('appointments_tbl',$data);
        $this->db->affected_rows();
    }
}

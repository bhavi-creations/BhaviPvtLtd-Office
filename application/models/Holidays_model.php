<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holidays_model extends CI_Model {


    function insert_holidays($data)
    {
        $this->db->insert("holidays_tbl",$data);
        return $this->db->insert_id();
    }

    function select_holidays()
    {
        $this->db->order_by('holidays_tbl.holiday_date','ASC');
        $this->db->select("holidays_tbl.*");
        $this->db->from("holidays_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_holidays_byID($id)
    {
        $this->db->where('holidays_tbl.id',$id);
        $this->db->select("holidays_tbl.*");
        $this->db->from("holidays_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_holidays($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("holidays_tbl");
        $this->db->affected_rows();
    }
    
    function update_holidays($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('holidays_tbl',$data);
        $this->db->affected_rows();
    }
}

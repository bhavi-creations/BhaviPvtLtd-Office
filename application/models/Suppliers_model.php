<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers_model extends CI_Model {


    function insert_suppliers($data)
    {
        $this->db->insert("suppliers_tbl",$data);
        return $this->db->insert_id();
    }

    function select_suppliers()
    {
        $this->db->select("suppliers_tbl.*");
        $this->db->from("suppliers_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_suppliers_byID($id)
    {
        $this->db->where('suppliers_tbl.id',$id);
        $this->db->select("suppliers_tbl.*");
        $this->db->from("suppliers_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_suppliers($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("suppliers_tbl");
        $this->db->affected_rows();
    }
    
    function update_suppliers($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('suppliers_tbl',$data);
        $this->db->affected_rows();
    }
}

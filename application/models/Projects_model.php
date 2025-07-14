<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects_model extends CI_Model {


    function insert_projects($data)
    {
        $this->db->insert("projects_tbl",$data);
        return $this->db->insert_id();
    }

    function select_projects()
    {
        $this->db->order_by('projects_tbl.project_name','ASC');
        $this->db->select("projects_tbl.*");
        $this->db->from("projects_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_projects_byID($id)
    {
        $this->db->where('projects_tbl.id',$id);
        $this->db->select("projects_tbl.*");
        $this->db->from("projects_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_projects($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("projects_tbl");
        $this->db->affected_rows();
    }
    
    function update_projects($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('projects_tbl',$data);
        $this->db->affected_rows();
    }

    function delete_project_file($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('projects_tbl',$data);
        $this->db->affected_rows();
    }
}

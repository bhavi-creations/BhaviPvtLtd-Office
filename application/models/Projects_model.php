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

    function select_project_byID($id)
    {
        $this->db->where('id', $id); // Assuming 'id' is the primary key in your projects table
        $this->db->select("id, project_name"); // Select only the ID and name
        $this->db->from("projects_tbl"); // <--- CONFIRM YOUR PROJECTS TABLE NAME HERE (e.g., 'projects' or 'project_tbl')
        $qry = $this->db->get();
        if ($qry->num_rows() > 0)
        {
            return $qry->result_array(); // Returns an array, e.g., [['id' => 1, 'project_name' => 'Project A']]
        }
        return array(); // Return an empty array if no project found
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Worksheet_model extends CI_Model {

    function select_worksheets_all()
    {
        $this->db->select('worksheet_tbl.*, staff_tbl.staff_name');
        $this->db->from('worksheet_tbl');
        $this->db->join('staff_tbl', 'worksheet_tbl.staff_id = staff_tbl.id', 'left');
        $this->db->order_by('worksheet_tbl.assign_date', 'ASC');
    
        $query = $this->db->get();
    
        if ($query === FALSE) {
            // Debugging code
            echo $this->db->last_query(); // Output the last executed query
            die('Query failed: ' . $this->db->error());
        }
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }

    function select_designer_worksheets()
    {
        $this->db->select('wt.*,  staff_tbl.staff_name');
        $this->db->from('worksheet_tbl as wt');
        $this->db->where('wt.department', 11);
        $this->db->join('staff_tbl', 'wt.staff_id = staff_tbl.id', 'left');
        $this->db->order_by('wt.assign_date', 'ASC');
        $query = $this->db->get();
    
        if ($query === FALSE) {
            // Debugging code
            echo 'Query failed: ' . $this->db->error()['message']; // Use ['message'] to access the error message
            die();
        }
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }

    function select_socialmedia_worksheets()
    {
        $this->db->select('wt.*,  staff_tbl.staff_name');
        $this->db->from('worksheet_tbl as wt');
        $this->db->where('wt.department', 6);
        $this->db->join('staff_tbl','wt.staff_id = staff_tbl.id','left');
        $this->db->order_by('wt.assign_date' , 'ASC');
        $query = $this->db->get();
        if ($query === FALSE) {
            echo 'Query failed: ' . $this->db->error()['message']; // Use ['message'] to access the error message
            die();
        }
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }
    
    function select_website_worksheets()
    {
        $this->db->select('wt.*,  staff_tbl.staff_name');
        $this->db->from('worksheet_tbl as wt');
        $this->db->where('wt.department', 16);
        $this->db->join('staff_tbl','wt.staff_id = staff_tbl.id','left');
        $this->db->order_by('wt.assign_date' , 'ASC');
        $query = $this->db->get();
        if ($query === FALSE) {
            echo 'Query failed: ' . $this->db->error()['message']; // Use ['message'] to access the error message
            die();
        }
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();

    }
    
    function select_seo_worksheets()
    {
        $this->db->select('wt.*,  staff_tbl.staff_name');
        $this->db->from('worksheet_tbl as wt');
        $this->db->where('wt.department', 15);
        $this->db->join('staff_tbl','wt.staff_id = staff_tbl.id','left');
        $this->db->order_by('wt.assign_date' , 'ASC');
        $query = $this->db->get();
        if ($query === FALSE) {
            echo 'Query failed: ' . $this->db->error()['message']; // Use ['message'] to access the error message
            die();
        }
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }
    
    function delete_worksheet($id)
    {
        // Retrieve image paths before deleting the row
        $this->db->select('ref_file_designer');
        $this->db->where('id', $id);
        $query = $this->db->get('worksheet_tbl');
    
        if ($query === false) {
            // Handle the query error
            die('Database error: ' . $this->db->error());
        }
    
        $row = $query->row();
    
        // Check if the row exists before proceeding
        if ($row) {
            $imagePaths = unserialize($row->ref_file_designer);
    
            // Delete the row from the database
            $this->db->where('id', $id);
            $this->db->delete("worksheet_tbl");
    
            // Delete associated images from the folder
            if (is_array($imagePaths)) {
                foreach ($imagePaths as $imagePath) {
                    $fullImagePath = FCPATH . $imagePath; // Assuming FCPATH is the base path of your project
                    if (file_exists($fullImagePath)) {
                        unlink($fullImagePath); // Delete the file
                    }
                }
            }
    
            return $this->db->affected_rows();
        } else {
            // Handle the case when the row does not exist
            die('Row not found for ID ' . $id);
        }
    }
    
    function select_worksheet_byID($id)
    {
        $this->db->where('worksheet_tbl.project_task_id',$id);
        $this->db->select('worksheet_tbl.*, staff_tbl.staff_name');
        $this->db->from("worksheet_tbl");
        $this->db->join('staff_tbl', 'worksheet_tbl.staff_id = staff_tbl.id', 'left');
        $query = $this->db->get();
    
        if ($query === FALSE) {
            // Debugging code
            echo $this->db->last_query(); // Output the last executed query
            die('Query failed: ' . $this->db->error());
        }
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
        return array();
    }

    // function select_worksheet_byproject_task_id()
    // {
    //     $this->db->where('')
    //     $this->db->select('worksheet_tbl.*');
    // }

    // public function update_worksheets($data, $worksheet_id)
    // {
    //     // Assuming 'project_tasks_tbl' is your main table
    //     $this->db->where('id', $worksheet_id);
    //     $this->db->update('worksheet_tbl', $data);
    // }
}



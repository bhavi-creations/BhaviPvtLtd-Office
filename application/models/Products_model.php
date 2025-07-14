<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {


    function insert_products($data)
    {
        $this->db->insert("products_tbl",$data);
        return $this->db->insert_id();
    }

    function select_products()
    {
        $this->db->select("products_tbl.*,suppliers_tbl.*");
        $this->db->from("products_tbl");
        $this->db->join("suppliers_tbl",'suppliers_tbl.id=products_tbl.supplier');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_products_byID($id)
    {
        $this->db->where('products_tbl.product_id',$id);
        $this->db->select("products_tbl.*");
        $this->db->from("products_tbl");
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_products($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete("products_tbl");
        $this->db->affected_rows();
    }
    
    function update_products($data,$id)
    {
        $this->db->where('product_id', $id);
        $this->db->update('products_tbl',$data);
        $this->db->affected_rows();
    }
}

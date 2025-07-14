<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients_model extends CI_Model {


    function insert_clients($data)
    {
        $this->db->insert("clients_tbl",$data);
        return $this->db->insert_id();
    }

    function insert_quote($data2)
    {
        $this->db->insert("quote",$data2);
        return $this->db->insert_id();
    }

    function select_clients()
    {
        $this->db->where('client_id !=',0);
        $qry=$this->db->get('clients_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_clients_byID($id)
    {

        $this->db->where('client_id',$id);
        $qry=$this->db->get('clients_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_clients($id)
    {
        $this->db->where('client_id', $id);
        $this->db->delete("clients_tbl");
        $this->db->affected_rows();
    }

    function delete_quote($id)
    {
        $this->db->where('client_id', $id);
        $this->db->delete("quote");
        $this->db->affected_rows();
    }

    function update_clients($data,$id)
    {
        $this->db->where('client_id', $id);
        $this->db->update('clients_tbl',$data);
        $this->db->affected_rows();
    }

    function update_quote($data2,$id)
    {
        $this->db->where('client_id',$id);
        $this->db->update('quote',$data2);
        return $this->db->affected_rows();
    }

    function select_quote_byID($id)
    {
        $this->db->where('client_id', $id);
        $qry=$this->db->get('quote');
        if($qry->num_rows()>0){
            $result=$qry->result_array();
            return $result;
        }
    }
}

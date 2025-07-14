<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    function logindata($un,$pw)
    {
        $this->db->where('username',$un);
        $this->db->where('password',md5($pw));
        $qry=$this->db->get("login_tbl");
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            $login_record = array(
                'staff_id'=> $result['0']['id'],
                'login_date_time'=> date('Y-m-d H:i:s'),
                'logout_date_time'=> NULL,
                'ip_address'=> $this->getIPAddress(),
                'status'=> 1,
            );
            // $login_id = $this->insert_login_records($login_record);
            // $result['0']['login_id'] = $login_id;
            $staff_data = $this->Staff_model->select_staff_byID($result['0']['id']);
            $result['0']['staff_data'] = $staff_data['0'];
            return $result;
        }
    }

    function getIPAddress()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }  
    
    function insert_login_records($data)
    {
        $this->db->insert("login_records_tbl",$data);
        return $this->db->insert_id();
    }

    function insert_login($data)
    {
        $this->db->insert("login_tbl",$data);
        return $this->db->insert_id();
    }

    function logoutdata($id){
        $logout_record = array(
            'logout_date_time'=> date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('login_records_tbl',$logout_record);
        return $this->db->affected_rows();
    }

    function update_rooms($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('room_tbl',$data);
    }

    function select_reservation()
    {
        $this->db->order_by('reservation_tbl.id','DESC');
        $this->db->select("reservation_tbl.*,room_tbl.roomname,booking_tbl.name,booking_tbl.email,booking_tbl.phno");
        $this->db->from("reservation_tbl");
        $this->db->join("room_tbl",'room_tbl.id=reservation_tbl.room');
        $this->db->join("booking_tbl",'booking_tbl.id=reservation_tbl.booking_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_countries()
    {
        $qry=$this->db->get('country_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }
    function select_rooms_byID($id)
    {

        $this->db->where('id',$id);
        $qry=$this->db->get('room_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_login_byID($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("login_tbl");
        $this->db->affected_rows();
    }




}

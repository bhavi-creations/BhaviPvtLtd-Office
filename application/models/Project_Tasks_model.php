<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_Tasks_model extends CI_Model
{

    function insert_project_tasks($data)
    {
        // print_r($data);      
        $this->db->insert("project_tasks_tbl", $data);
        // echo $this->db->last_query(); // Print the last executed query
        return $this->db->insert_id();
    }

    function insert_worksheets($data2)
    {
        // print_r($data2);
        // $mergedData = array_merge($data2);
        $this->db->insert_batch("worksheet_tbl", $data2);
        // echo $this->db->last_query();
        return $this->db->insert_id();
    }

    function select_project_tasks()
    {
        $this->db->order_by('pt.due_date', 'ASC');
        $this->db->select("pt.*, pt.id as p_id, p.*");
        $this->db->from("project_tasks_tbl pt");
        $this->db->join("projects_tbl p", "pt.project_id = p.id", "left");
        $qry = $this->db->get();

        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();

            foreach ($result as $key => $result_data) {
                $staff_id = $result_data['assigned_to'];
                $staff_data = explode(',', $staff_id);

                foreach ($staff_data as $key2 => $single_staff_id) {
                    $this->load->model('Staff_model', 'staff_model');
                    $staff_result = $this->staff_model->select_staff_byID($single_staff_id);

                    // Add a null check before accessing the array offset
                    if (!empty($staff_result)) {
                        $result[$key]['staff_data'][$key2] = $staff_result['0'];
                    } else {
                        // Handle the case when $staff_result is null or empty
                        $result[$key]['staff_data'][$key2] = null; // or handle it accordingly
                    }
                }
            }
            return $result;
        }
    }


    function select_project_tasks_byID($id)
    {
        $this->db->where('pt.id', $id);
        $this->db->select("pt.*,pt.id as p_id,p.*");
        $this->db->from("project_tasks_tbl pt");
        $this->db->join("projects_tbl p", "pt.project_id = p.id", "left");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            foreach ($result as $key => $result_data) {
                $staff_id = $result_data['assigned_to'];
                $staff_data = explode(',', $staff_id);
                foreach ($staff_data as $key2 => $single_staff_id) {
                    $this->load->model('Staff_model', 'staff_model');
                    $staff_result = $this->staff_model->select_staff_byID($single_staff_id);
                    $result[$key]['staff_data'][$key2] = $staff_result['0'];
                }
            }
            return $result;
        }
    }


    function select_project_tasks_by_staffID($id)
    {
        $this->db->where_in('pt.assigned_to', $id);
        $this->db->or_where('pt.id', 0);
        $this->db->select("pt.*,pt.id as p_id,p.*");
        $this->db->from("project_tasks_tbl pt");
        $this->db->join("projects_tbl p", "pt.project_id = p.id", "left");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            foreach ($result as $key => $result_data) {
                $staff_id = $result_data['assigned_to'];
                $staff_data = explode(',', $staff_id);
                foreach ($staff_data as $key2 => $single_staff_id) {
                    $this->load->model('Staff_model', 'staff_model');
                    $staff_result = $this->staff_model->select_staff_byID($single_staff_id);
                    $result[$key]['staff_data'][$key2] = $staff_result['0'];
                }
            }
            return $result;
        }
    }

    function select_project_tasks_by_projectID($id)
    {
        $this->db->where_in('pt.project_id', $id);
        $this->db->select("pt.*,pt.id as p_id,p.*");
        $this->db->from("project_tasks_tbl pt");
        $this->db->join("projects_tbl p", "pt.project_id = p.id", "left");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            $result = $qry->result_array();
            foreach ($result as $key => $result_data) {
                $staff_id = $result_data['assigned_to'];
                $staff_data = explode(',', $staff_id);
                foreach ($staff_data as $key2 => $single_staff_id) {
                    $this->load->model('Staff_model', 'staff_model');
                    $staff_result = $this->staff_model->select_staff_byID($single_staff_id);
                    $result[$key]['staff_data'][$key2] = $staff_result['0'];
                }
            }
            return $result;
        }
    }

    function delete_project_tasks($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("project_tasks_tbl");
        $this->db->affected_rows();
    }

    function update_project_tasks($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('project_tasks_tbl', $data);
        $this->db->affected_rows();
    }

    public function updateDesignerRow($assigned_to_designer, $designer_id, $assign_date, $client_name, $work_type_designer, $desc_designer, $ref_link_designer, $content_designer)
    {
        $data = array(
            'assign_date' => $assign_date,
            'client_name' => $client_name,
            'work_type_designer' => $work_type_designer,
            'desc_designer' => $desc_designer,
            'ref_link_designer' => $ref_link_designer,
            'content_designer' => $content_designer,
            'staff_id' => $assigned_to_designer,
            // ... add other fields as needed
        );

        $this->db->where('id', $designer_id);
        $this->db->update('worksheet_tbl', $data);
    }


    public function updateSocialMediaRow($assigned_to_socialmedia, $socialmedia_id, $assign_date_socialmedia, $client_name_socialmedia, $work_type_socialmedia, $desc_socialmedia, $g_ads_socialmedia, $fb_ads_socialmedia)
    {
        $data = array(
            'assign_date' => $assign_date_socialmedia,
            'client_name' => $client_name_socialmedia,
            'work_type_socialmedia' => $work_type_socialmedia,
            'desc_socialmedia' => $desc_socialmedia,
            'g_ads_socialmedia' => $g_ads_socialmedia,
            'fb_ads_socialmedia' => $fb_ads_socialmedia,
            'staff_id' => $assigned_to_socialmedia,

            // ... add other fields as needed
        );

        $this->db->where('id', $socialmedia_id);
        $this->db->update('worksheet_tbl', $data);
    }


    public function updateWebsiteRow($assigned_to_web, $website_id, $assign_date_web, $client_name_web, $website_type, $desc_website, $delivery_date)
    {
        $data = array(
            'assign_date' => $assign_date_web,
            'client_name' => $client_name_web,
            'website_type' => $website_type,
            'desc_website' => $desc_website,
            'delivery_date' => $delivery_date,
            'staff_id' => $assigned_to_web,
            // ... add other fields as needed
        );

        $this->db->where('id', $website_id);
        $this->db->update('worksheet_tbl', $data);
    }

    public function updateSEOrow($assigned_to_seo, $seo_id, $assign_date_seo, $client_name_seo, $p_kw_SEO, $target_kw_SEO, $gmb_SEO)
    {
        $data = array(
            'assign_date' => $assign_date_seo,
            'client_name' => $client_name_seo,
            'p_kw_SEO' => $p_kw_SEO,
            'target_kw_SEO' => $target_kw_SEO,
            'gmb_SEO' => $gmb_SEO,
            'staff_id' => $assigned_to_seo,
            // ... add other fields as needed
        );

        $this->db->where('id', $seo_id);
        $this->db->update('worksheet_tbl', $data);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        $data['suppliers']=$this->Suppliers_model->select_suppliers();
        $this->load->view('admin/header');
        $this->load->view('admin/add-products',$data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content']=$this->Products_model->select_products();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-products',$data);
        $this->load->view('admin/footer');
    }

    public function view()
    {
        $data['content']=$this->Products_model->select_products();
        $this->load->view('staff/header');
        $this->load->view('staff/view-products',$data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('date_added', 'Adding Date', 'required');
        $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
        $this->form_validation->set_rules('original_price', 'Original Price', 'required');
        $this->form_validation->set_rules('selling_price', 'Selling Price', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        // $this->form_validation->set_rules('quantity_left', 'quantity left', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');

        $product_name = $this->input->post('product_name');
        $brand_name = $this->input->post('brand_name');
        $category = $this->input->post('category');
        $date_added = $this->input->post('date_added');
        $expiry_date = $this->input->post('expiry_date');
        $original_price = $this->input->post('original_price');
        $selling_price = $this->input->post('selling_price');
        $supplier = $this->input->post('supplier');
        $quantity = $this->input->post('quantity');
        $quantity_left = $this->input->post('quantity');
        $status = $this->input->post('status');

        if($this->form_validation->run() !== false)
        {
            $data=$this->Products_model->insert_products(
                array(
                    'product_name'=>$product_name,
                    'brand_name' => $brand_name,
                    'category' => $category,
                    'date_added' => $date_added,
                    'expiry_date' => $expiry_date,
                    'original_price' => $original_price,
                    'selling_price' => $selling_price,
                    'supplier' => $supplier,
                    'quantity' => $quantity,
                    'quantity_left' => $quantity_left,
                    'status' => $status,
                )
            );
            
            if($data==true)
            {
                $this->session->set_flashdata('success', "New Product Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Product Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->index();
            return false;
        } 
    }

    public function update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('date_added', 'Adding Date', 'required');
        $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
        $this->form_validation->set_rules('original_price', 'Original Price', 'required');
        $this->form_validation->set_rules('selling_price', 'Selling Price', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('quantity_left', 'quantity left', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');

        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $brand_name = $this->input->post('brand_name');
        $category = $this->input->post('category');
        $date_added = $this->input->post('date_added');
        $expiry_date = $this->input->post('expiry_date');
        $original_price = $this->input->post('original_price');
        $selling_price = $this->input->post('selling_price');
        $supplier = $this->input->post('supplier');
        $quantity = $this->input->post('quantity');
        $quantity_left = $this->input->post('quantity_left');
        $status = $this->input->post('status');


        if($this->form_validation->run() !== false)
        {
            $data=$this->Products_model->update_products(
                array(
                    'product_name'=>$product_name,
                    'brand_name' => $brand_name,
                    'category' => $category,
                    'date_added' => $date_added,
                    'expiry_date' => $expiry_date,
                    'original_price' => $original_price,
                    'selling_price' => $selling_price,
                    'supplier' => $supplier,
                    'quantity' => $quantity,
                    'quantity_left' => $quantity_left,
                    'status' => $status,
                ),$product_id
            );
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', "Product Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Product Update Failed.");
            }
            redirect(base_url()."manage-products");
        }
        else{
            $this->edit($product_id);
            return false;
        } 
    }


    function edit($product_id)
    {
        $data['suppliers']=$this->Suppliers_model->select_suppliers();
        $data['content']=$this->Products_model->select_products_byID($product_id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-products',$data);
        $this->load->view('admin/footer');
    }


    function delete($product_id)
    {
        $data=$this->Products_model->delete_products($product_id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Product Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Product Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}

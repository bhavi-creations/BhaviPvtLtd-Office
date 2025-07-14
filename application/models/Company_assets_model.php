<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_assets_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Fetches a company asset's file path by its type (e.g., 'logo', 'signature', 'stamp').
     * Assumes you have a table like 'company_assets_tbl' with 'asset_type' and 'file_path' columns.
     * Example:
     * CREATE TABLE `company_assets_tbl` (
     * `id` INT AUTO_INCREMENT PRIMARY KEY,
     * `asset_type` VARCHAR(50) NOT NULL UNIQUE,
     * `file_path` VARCHAR(255) NOT NULL,
     * `uploaded_at` DATETIME DEFAULT CURRENT_TIMESTAMP
     * );
     */
    public function get_asset_by_type($type) {
        $this->db->where('asset_type', $type);
        $query = $this->db->get('company_assets_tbl'); // Replace 'company_assets_tbl' with your actual table name
        return $query->row_array(); // Returns a single row containing the asset data (e.g., ['id' => 1, 'asset_type' => 'logo', 'file_path' => 'uploads/logo.png'])
    }
}
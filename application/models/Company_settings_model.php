<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Get the single row of company assets (logo, stamp, signature paths)
    public function get_company_assets() {
        return $this->db->get('company_assets_tbl')->row_array();
    }

    // Insert initial company asset paths (should only happen once)
    public function insert_company_assets($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('company_assets_tbl', $data);
    }

    // Update existing company asset paths
    public function update_company_assets($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('company_assets_tbl', $data);
    }

    // Helper to ensure an initial row exists, or retrieve it
    public function ensure_assets_row_exists() {
        $assets = $this->get_company_assets();
        if (empty($assets)) {
            // If no row exists, insert a default empty one
            $this->insert_company_assets([]);
            return $this->get_company_assets(); // Fetch the newly inserted row
        }
        return $assets;
    }


    public function get_asset_by_type($type) {
    $this->db->where('asset_type', $type); // Assuming a column 'asset_type'
    $query = $this->db->get('company_assets_tbl'); // Your table name for company assets
    return $query->row_array();
}

}
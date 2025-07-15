<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for base_url() if needed elsewhere, though FCPATH is used here.
    }

    /**
     * Get the single row of company assets (logo, stamp, signature paths).
     *
     * @param bool $return_full_path If TRUE, prepend base path to filenames. If FALSE, return raw filenames from DB.
     * @return array|null The row of company assets, with full paths if requested, or null if no row.
     */
    public function get_company_assets($return_full_path = TRUE) {
        $assets = $this->db->get('company_assets_tbl')->row_array();

        if ($assets && $return_full_path) {
            $base_upload_path = 'uploads/company_assets/';

            // Prepend base path to each asset's filename if it exists
            if (!empty($assets['company_logo_path'])) {
                $assets['company_logo_path'] = $base_upload_path . $assets['company_logo_path'];
            }
            if (!empty($assets['company_stamp_path'])) {
                $assets['company_stamp_path'] = $base_upload_path . $assets['company_stamp_path'];
            }
            if (!empty($assets['digital_signature_path'])) {
                $assets['digital_signature_path'] = $base_upload_path . $assets['digital_signature_path'];
            }
        }
        return $assets;
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
        // This will call get_company_assets() which now returns full paths by default
        $assets = $this->get_company_assets(TRUE); 
        if (empty($assets)) {
            // If no row exists, insert a default empty one
            // We insert an empty array, the controller will handle saving filenames
            $this->insert_company_assets([]); 
            // Fetch the newly inserted row, ensuring full paths are returned
            return $this->get_company_assets(TRUE); 
        }
        return $assets;
    }

    // This method seems to be based on a different schema (asset_type column)
    // and is not directly used in the current Company_settings flow.
    // Keeping it for now but note it's likely not functional with company_assets_tbl.
    public function get_asset_by_type($type) {
        $this->db->where('asset_type', $type); // Assuming a column 'asset_type'
        $query = $this->db->get('company_assets_tbl'); // Your table name for company assets
        return $query->row_array();
    }
}
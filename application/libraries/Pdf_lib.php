<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf_lib {

    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    /**
     * Generates a PDF from HTML content and saves it to a specified path.
     *
     * @param string $html_content The HTML content to convert to PDF.
     * @param string $output_path The full path where the PDF file should be saved.
     * @return bool True on success, false on failure.
     */
    public function generatePdfFromHtml($html_content, $output_path) {
        try {
            // Configure Dompdf options
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
            $options->set('isRemoteEnabled', true);     // Enable loading of remote assets (e.g., images from URLs)
            $options->set('defaultFont', 'sans-serif'); // Set a default font
            $options->set('chroot', FCPATH); // IMPORTANT: Set chroot to your project root for local image paths

            // Initialize Dompdf for THIS specific generation
            // This ensures a fresh instance for each PDF, solving the multiple-generation issue.
            $pdf = new Dompdf($options);

            // Load HTML into Dompdf
            $pdf->loadHtml($html_content);

            // Set paper size and orientation (e.g., A4 portrait)
            $pdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $pdf->render();

            // Get the PDF output
            $pdf_output = $pdf->output();

            // Removed $pdf->clear(); and unset($pdf); as they were causing an error.
            // Re-instantiating $pdf above is sufficient for managing state between renders.

            // Save the PDF to the specified file path
            if (file_put_contents($output_path, $pdf_output) !== FALSE) {
                return true;
            } else {
                log_message('error', 'Pdf_lib: Failed to write PDF content to ' . $output_path);
                return false;
            }
        } catch (Exception $e) {
            log_message('error', 'Pdf_lib: Error during PDF generation: ' . $e->getMessage());
            return false;
        }
    }

    // You can add other PDF-related methods here as needed
}
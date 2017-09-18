<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class BuatPdf {
    
    function buatpdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'domPDF class is loaded.');
    }
 
    function load($html, $filename)
    { 
		define('DOMPDF_ENABLE_AUTOLOAD', false);
        require_once('/third_party/dompdf/dompdf_config.inc.php');
         
         $dompdf = new DOMPDF();
    	$dompdf->load_html($html);
    	$dompdf->render();
    	$dompdf->stream($filename.'.pdf',array("Attachment"=>0));
    }
}
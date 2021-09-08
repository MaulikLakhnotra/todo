<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once dirname(__FILE__).'\dompdf\autoload.inc.php';
// var_dump(dirname(__FILE__).'\dompdf\autoload.inc.php');
// Dompdf namespace use Dompdf\Dompdf;
use Dompdf\Dompdf;
class Pdf
{ 
    public function __construct()
    {
        
        $pdf = new DOMPDF(); 
        // $pdf = new Dompdf\DOMPDF();
        $CI = & get_instance();
        $CI->dompdf = $pdf; 
    } 
} 
?>
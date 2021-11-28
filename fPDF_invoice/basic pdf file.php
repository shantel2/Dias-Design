<?php 
$var = "Testing 1 and 2";
?>


<!-- DEBUGGING MODE -->
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>
<!-- END OF DEBUGGING MODE -->

<?php
ob_start();
define('FPDF_FONTPATH','font/');
require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('courier','B',16);
$pdf->Cell(40,10,"{$var}");
$pdf->Output();
ob_end_flush(); 
?>
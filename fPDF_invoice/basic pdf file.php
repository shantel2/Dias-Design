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
define('FPDF_FONTPATH','fpdf/font/');
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();


    //set font to arial, bold, 14pt
    $pdf->SetFont('courier','B',16);

    //Cell(width , height , text , border , end line , [align] )

    $pdf->Cell(130 ,5,'Dias Designs',0,0);
    $pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

    //set font to arial, regular, 12pt
    $pdf->SetFont('courier','B',12);

    $pdf->Cell(130 ,5,'876-555-555',0,0);
    $pdf->Cell(59 ,5,'',0,1);//end of line

    $pdf->Cell(130 ,5,'Dias-Design@gmail.com',0,0);
    $pdf->Cell(25 ,5,'Date',0,0);
    $pdf->Cell(34 ,5,'[dd/mm/yyyy]',0,1);//end of line

    $pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
    $pdf->Cell(25 ,5,'Invoice #',0,0);
    $pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

    $pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
    $pdf->Cell(25 ,5,'Customer ID',0,0);
    $pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189 ,10,'',0,1);//end of line

    //billing address
    $pdf->Cell(100 ,5,'Bill to',0,1);//end of line

    //add dummy cell at beginning of each line for indentation
    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,'[Name]',0,1);

    $pdf->Cell(10 ,5,'',0,0);
    $pdf->Cell(90 ,5,'[E-mail]',0,1);

    // $pdf->Cell(10 ,5,'',0,0);
    // $pdf->Cell(90 ,5,'[Address]',0,1);

    // $pdf->Cell(10 ,5,'',0,0);
    // $pdf->Cell(90 ,5,'[Phone]',0,1);

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189 ,10,'',0,1);//end of line

    //invoice contents
    $pdf->SetFont('courier','B',12);

    $pdf->Cell(130 ,5,'Description',1,0);
    $pdf->Cell(25 ,5,'Discount',1,0);
    $pdf->Cell(34 ,5,'Amount',1,1);//end of line

    $pdf->SetFont('courier','B',12);

    //Numbers are right-aligned so we give 'R' after new line parameter

    $pdf->Cell(130 ,5,'UltraCool Fridge',1,0);
    $pdf->Cell(25 ,5,'-',1,0);
    $pdf->Cell(34 ,5,'3,250',1,1,'R');//end of line

    $pdf->Cell(130 ,5,'Supaclean Diswasher',1,0);
    $pdf->Cell(25 ,5,'-',1,0);
    $pdf->Cell(34 ,5,'1,200',1,1,'R');//end of line

    $pdf->Cell(130 ,5,'Something Else',1,0);
    $pdf->Cell(25 ,5,'-',1,0);
    $pdf->Cell(34 ,5,'1,000',1,1,'R');//end of line

    //summary
    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Subtotal',0,0);
    $pdf->Cell(4 ,5,'$',1,0);
    $pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Taxable',0,0);
    $pdf->Cell(4 ,5,'$',1,0);
    $pdf->Cell(30 ,5,'0',1,1,'R');//end of line

    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Tax Rate',0,0);
    $pdf->Cell(4 ,5,'$',1,0);
    $pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

    $pdf->Cell(130 ,5,'',0,0);
    $pdf->Cell(25 ,5,'Total Due',0,0);
    $pdf->Cell(4 ,5,'$',1,0);
    $pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

    
    $pdf->Output();
    ob_end_flush(); 



?>

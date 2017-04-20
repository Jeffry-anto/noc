<?php
require('html2pdf.php');

if(isset($_POST['text']))
{
//	$run="march2017";
	$pdf=new PDF_HTML('P','mm','A4');
        $pdf->SetFont('Arial','',14);
        $pdf->AddPage();
	$pageWidth = 210;
        $pageHeight = 297;


   $margin = 10;
  $pdf->Rect( 5,5,200 ,287);

	
   $pdf->Image('images/banner1.jpg',10,10,190,15);
    $pdf->WriteHTML("<br><br><br><br>");
	$pdf->MultiCell(0,10,'National Programme on Technology Enhanced Learning (NPTEL)',0,'C');
	 $pdf->SetFont('Times','',12);
	$pdf->MultiCell(0,10,'Receipt for successful payment of fees for online courses conducted by NPTEL',0,'C');
    $pdf->MultiCell(0,10,'Course run:'.$run,0,'C');
	 $pdf->SetFont('Times','',10);
	$pdf->WriteHTML($_POST['name']);
	$pdf->WriteHTML($_POST['text2']);
	$pdf->WriteHTML($_POST['text3']);
	$pdf->WriteHTML($_POST['text4']);
	$pdf->WriteHTML($_POST['text5']);
	$pdf->WriteHTML($_POST['text6']);
	$pdf->WriteHTML($_POST['text7']);
	 $pdf->SetFont('Arial','',9);
	$pdf->WriteHTML($_POST['text8']);
	  $pdf->WriteHTML("<br><br>");
	  $pdf->SetFont('Times','',10);
	$pdf->MultiCell(0,10,'Authority Signature',0,'R');
	$pdf->Image('images/sign.png',150,160,50,20);
$fname = $_POST['appno'].".pdf";
    $pdf->Output('D',$fname);
    exit;
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 10/11/16
 * Time: 7:30 PM
 */
require('fpdf.php');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: access-control-allow-credentials, access-control-allow-headers, access-control-allow-methods, access-control-allow-origin");

class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Logo

        // $this->Image('../admin/logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Title',1,0,'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
//
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
    }
}
$cat="student";
$name=$_GET["name"];
$status="CONFIRMED";
$event_db="dhoom";
$count="ONE";
$code="prefix.Yay.some.QR.coamdas.dasda.sd.asdasd.asda.sdmas.dasd.asd.end";
$code=$code.".".md5($code.$secret_word);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Image('passes/'.$cat.'/'.$event_db.'_sd.png',0,0,210,297);
//$pdf->Image('../admin/logo.png',60,60,30,30);
$pdf->Image('http://brca.iitd.ac.in/rdv-reg/qrcode.php?code='.$code,144,75,50,0,'PNG');
if($cat=="student")
    $pdf->Image('http://brca.iitd.ac.in/rdv-reg/qrcode.php?code='.$code,175,223,20,0,'PNG');
else
    $pdf->Image('http://brca.iitd.ac.in/rdv-reg/qrcode.php?code='.$code,175,217,20,0,'PNG');
$pdf->Cell(0,49,'',0,2);
$pdf->Cell(29);
$padd = strlen($name)/2;
$pdf->Cell(0,5,$name,0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(30+$padd);
$pdf->Cell(0,10,"Admits ".$count,0,1);
if($cat=="student")
{
    $pdf->SetFont('Arial','B',25);
    $pdf->Cell(0,45,'',0,2);
    $pdf->Cell(50);
    $pdf->Cell(0,10,"Status: ".$status,0,1);
}
$pdf->Output($name.".pdf",'D');
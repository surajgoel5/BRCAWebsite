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

$kerberos = $_GET["kerberos"];
$token = $_GET["token"];
$event = $_GET["e"];
$event_db = $_GET["e"];
$cat = $_GET["cat"];
if($cat=="_") $cat="staff";
if($cat=="~") $cat="profs";
if($cat=="*") $cat="student";
include('db-info.php');
if($event[0]=="b") $event="Blitzkrieg";
if($event[0]=="s") $event="Spectrum";
if($event[0]=="d") $event="Dhoom";
if($event[0]=="k") $event="Kaleidoscope";
if($event[0]=="j") $event="Mukhatib";
if($event[0]=="B") $event_db="blitz";
if($event[0]=="S") $event_db="spectrum";
if($event[0]=="D") $event_db="dhoom";
if($event[0]=="K") $event_db="kaleidoscope";
if($event[0]=="M") $event_db="javed";
// user authentication
if($token!=md5($kerberos.$secret_word))
    die('{"success":false,"message":"token mismatch"}');
$name = $_GET["name"];
$r=$con->query("SELECT * from `".$cat."_"."$event_db` where kerberos='$kerberos'");
if($r->num_rows==1)
{
    $row=$r->fetch_assoc();
    $name = $row["name"];
    if($row["relation1"]=="undefined")
        $count="ONE";
    else if($row["relation2"]=="undefined")
        $count="TWO";
    else if($row["relation3"]=="undefined")
        $count="THREE";
    else
        $count="FOUR";
    if($cat=="student"){
        $status=$row["status"];
        $count="ONE";
    }
}
else
    die("Malformed URL");
$code="prefix.".$kerberos.".".$token.".".$event_db.".".$cat.".".$count.".end";
$code=$code.".".md5($code.$secret_word);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Image('passes/'.$cat.'/'.$event_db.'_sd.png',0,0,210,297);
//$pdf->Image('../admin/logo.png',60,60,30,30);
$pdf->Image('http://brca.iitd.ac.in/rdv-reg/qrcode.php?code='.$code,144,75,50,0,'PNG');
$pdf->Image('http://brca.iitd.ac.in/rdv-reg/qrcode.php?code='.$code,175,217,20,0,'PNG');
$pdf->Cell(0,49,'',0,2);
$pdf->Cell(29);
$padd = strlen($name)/2;
$pdf->Cell(0,5,$name,0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(29+$padd);
$pdf->Cell(0,10,"Admits ".$count,0,1);
if($cat=="student")
{
    $pdf->SetFont('Arial','B',25);
    $pdf->Cell(0,44,'',0,2);
    $pdf->Cell(50);
    $pdf->Cell(0,10,"Status: ".$status,0,1);
}
$pdf->Output('','');
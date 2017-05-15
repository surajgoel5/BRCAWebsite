<?php
/* Caveat: I'm not a PHP programmer, so this may or may
 * not be the most idiomatic code...
 *
 * FPDF is a free PHP library for creating PDFs:
 * http://www.fpdf.org/
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("fpdf/fpdf.php");
class PDF extends FPDF {
    const DPI = 96;
    const MM_IN_INCH = 25.4;
    const A4_HEIGHT = 297;
    const A4_WIDTH = 210;
    // tweak these values (in pixels)
    const MAX_WIDTH = 800;
    const MAX_HEIGHT = 500;
    function pixelsToMM($val) {
        return $val * self::MM_IN_INCH / self::DPI;
    }
    function resizeToFit($imgFilename) {
        list($width, $height) = getimagesize($imgFilename);
        $widthScale = self::MAX_WIDTH / $width;
        $heightScale = self::MAX_HEIGHT / $height;
        $scale = 0.65;//min($widthScale, $heightScale);
        return array(
            round($this->pixelsToMM($scale * $width)),
            round($this->pixelsToMM($scale * $height))
        );
    }
    function centreImage($img) {
        list($width, $height) = $this->resizeToFit($img);
        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img,
            -10,
            7,
            $width,
            $height
        );
    }
}
// usage:
$pdf = new PDF();
$num = "14521";
$number = $num;
//$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
$no = round($number);
$point = round($number - $no, 2) * 100;
$hundred = null;
$digits_1 = strlen($no);
$i = 0;
$str = array();
$words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
while ($i < $digits_1) {
    $divider = ($i == 2) ? 10 : 100;
    $number = floor($no % $divider);
    $no = floor($no / $divider);
    $i += ($divider == 10) ? 1 : 2;
    if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
    } else $str[] = null;
}
$str = array_reverse($str);
$result = implode('', $str);
$result  = $result."only";
$pdf->AddPage("P");
$pdf->centreImage("pfc.jpg");
$pdf->Image('images/tick.png',115,78);
$pdf->Image('images/tick.png',75,70);
$pdf->Image('images/tick.png',79,117);
$pdf->SetFont('Arial','',14);
$pdf -> SetXY(60,144);    // set the cursor at Y position 5
$pdf->Cell(80, 10, $num);
$pdf->SetFont('Arial','',10);
if(strlen($result)<50){
    $pdf -> SetXY(115,144);    // set the cursor at Y position 5
    $pdf->Cell(80, 10, $result);
}
else{
    $pdf -> SetXY(115,140);    // set the cursor at Y position 5
    $pdf->Cell(80, 10, substr($result,0,45)."-");
    $pdf -> SetXY(115,144);    // set the cursor at Y position 5
    $pdf->Cell(80, 10, "-".substr($result,45));
}
$pdf -> SetXY(136,173);    // set the cursor at Y position 5
$pdf->Cell(80, 10, 'Name of CP');
$pdf -> SetXY(30,239);    // set the cursor at Y position 5
$pdf->Cell(80, 10, 'Name of CP');
$pdf -> SetXY(30,243);    // set the cursor at Y position 5
$pdf->Cell(80, 10, 'Name of VP');
$pdf -> SetXY(30,247);    // set the cursor at Y position 5
$pdf->Cell(80, 10, 'Name of P');
$pdf->Output();
?>
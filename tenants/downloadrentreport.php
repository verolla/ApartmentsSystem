<?php
ob_end_clean();
require('../fpdf.php');
require('dbconnect1.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../nyumbaImages/nyu.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(115,15,'Nyumba Apartments Management System',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class


 /*$queryItems = "SELECT * from payment ";
    //$resultItems = $mysqli->query($queryItems);
    while($rowItems = mysql_fetch_array($queryItems)){

        $payId = $rowItems['payID'];
        $apartid = $rowItems['ApartID'];
        $houseid = $rowItems['HID']; 
        $amount = $rowItems['amountPaid'];
        $bank = $rowItems['Bank'];
        $Date = $rowItems['datePaid'];
        $TID = $rowItems['TID'];
        $month = $rowItems['month'];
        $AccountNo = $rowItems['AccountNo'];

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(57.5);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$payID,0);

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(57.5);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$ApartID,0);

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(1);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$HID,0); 

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(51);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$TID,0); 

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(55);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$amount,0);

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(58);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$Date,0); 

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(62);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$unit,0);

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(66);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$bank,0);

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(66);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$AccountNo,0);

        $pdf->SetFont('Arial','',10);
        $pdf->SetY(66);
        $pdf->SetX(50);
        $pdf->Cell(20,6,$month,0); }*/
//for($i=1;$i<=40;$i++)



$sel = array (1,3);

$result=mysql_query("select * from `payment`  ");

//Initialize the 3 columns and the total
$c_code = "";
$c_name = "";
$c_price = "";
$total = 0;

//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{ 
   $code =$row['payID'];
   $name = substr($row['TID'],0,20);
   $real_price = $row['amountPaid'];
   $show =$row['HID'];

 $c_code = $c_code.$code."\n";
 $c_name = $c_name.$name."\n";
 $c_price = $c_price.$show."\n";

//Sum all the Prices (TOTAL)
    $total = $total+$real_price;
}
mysql_close();

$total = $total;
   $pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetFont('Times','',12); //$pdf->Cell(0,10,'Printing line number '.$i,0,1);
//$pdf->Output();

$pdf->SetFont('Arial','',12);
$pdf->SetY(26);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$c_code,1);
$pdf->SetY(26);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$c_name,1);
$pdf->SetY(26);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$c_price,1,'R');
$pdf->SetX(135);
$pdf->MultiCell(30,6,'Ksh. '.$total,1,'R');

//$filename="payments.pdf";
$pdf->Output();

//echo'<a href="payments.pdf">Download your Payments</a>';
?>
<?php
//include connection file 
include_once("koneksi.php");
include_once('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'PDAP',1,0,'C');
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

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('id_riwayat'=>'ID', 'id_pengguna'=> 'Pengguna', 'id_tagihan' => 'Tagihan' ,'jlh_debit'=> 'Jumlah Debit','jlh_tagihan'=> 'Jumlah tagihan', 'tanggal' => "Tanggal");

$result = mysqli_query($connString, "SELECT * FROM tbl_riwayat") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM tbl_riwayat");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(35,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(35,12,$column,1);
}
$pdf->Output();
?>
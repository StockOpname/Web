<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../logo/logo.jpeg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT. MATAHARI SURYA MITRA PANGAN',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telp  : 085109157777',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Industri Mendit Barat No 88A',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Kec. Pakis Kab. Malang',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Barang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jenis', 1, 0, 'C');
// $pdf->Cell(4, 0.8, 'Suplier', 1, 0, 'C');
// $pdf->Cell(4.5, 0.8, 'modal', 1, 0, 'C');
// $pdf->Cell(4.5, 0.8, 'harga', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'jumlah', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah SMALL', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah MEDIUM', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah LARGE', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query = $conn->query("select * from barang");
while ($lihat = mysqli_fetch_array($query)) {
	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama'], 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['jenis'], 1, 0, 'C');
	// $pdf->Cell(4, 0.8, $lihat['suplier'],1, 0, 'C');
	// $pdf->Cell(4.5, 0.8, $lihat['modal'], 1, 0,'C');
	// $pdf->Cell(4.5, 0.8, $lihat['harga'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['jumlah'], 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['Jumlah SMALL'], 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['Jumlah MEDIUM'], 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['Jumlah LARGE'], 1, 1, 'C');
	$no++;
}

$pdf->Output("laporan_buku.pdf","I");

?>


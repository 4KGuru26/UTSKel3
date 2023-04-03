<?php
require_once('fpdf185/fpdf.php');
session_start();

$pdf = new FPDF('L', 'mm', array(120, 80));
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->image("src/$_SESSION[fotoCetak]", 45, null, 30);
$pdf->cell(0, 15, "Student ID = $_SESSION[IDCetak]", 0, 1, 'C');
$pdf->cell(0, 0, "Student Name = $_SESSION[namaCetak]", 0, 0, 'C');
$pdf->Output();
?>
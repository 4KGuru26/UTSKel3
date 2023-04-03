<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", 'root', '');
$query = "select count(1) from berkas_siswa";
$result = $db->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);
$total = $row["count(1)"];
$query = "select * from berkas_siswa";
$result = $db->query($query);


$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', 'ID Berkas');
$activeWorksheet->setCellValue('B1', 'ID Siswa');
$activeWorksheet->setCellValue('C1', 'Nama Siswa');
$activeWorksheet->setCellValue('D1', 'Nama Ayah');
$activeWorksheet->setCellValue('E1', 'Nama Ibu');
$activeWorksheet->setCellValue('F1', 'Ijazah');
$activeWorksheet->setCellValue('G1', 'Akte');
for($i = 2; $i <= $total+1; $i++) {
    $row = $result->fetch(PDO::FETCH_NUM);
    $x = 65;
    for($j = 0; $j < 7; $j++) {
        $cell = chr($x++) . $i;
        $activeWorksheet->setCellValue("$cell", $row[$j]);
    }
}
$writer = new Xlsx($spreadsheet);
$writer->save('print/berkas_siswa.xlsx');
header('location: berkas.php');
?>
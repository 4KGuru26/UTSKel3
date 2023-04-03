<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", 'root', '');
$query = "select count(1) from username_siswa";
$result = $db->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);
$total = $row["count(1)"];
$query = "select ID_Siswa, nama, tempatLahir, tanggalLahir, alamat, jarak, status from username_siswa";
$result = $db->query($query);


$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', 'ID Siswa');
$activeWorksheet->setCellValue('B1', 'Nama Siswa');
$activeWorksheet->setCellValue('C1', 'Tempat Lahir');
$activeWorksheet->setCellValue('D1', 'Tanggal Lahir');
$activeWorksheet->setCellValue('E1', 'Alamat');
$activeWorksheet->setCellValue('F1', 'Jarak Rumah (Km)');
$activeWorksheet->setCellValue('G1', 'Status');
for($i = 2; $i <= $total+1; $i++) {
    $row = $result->fetch(PDO::FETCH_NUM);
    $x = 65;
    for($j = 0; $j < 7; $j++) {
        $cell = chr($x++) . $i;
        $activeWorksheet->setCellValue("$cell", $row[$j]);
    }
}
$writer = new Xlsx($spreadsheet);
$writer->save('print/data_pendaftar.xlsx');
header('location: data_pendaftar.php');
?>
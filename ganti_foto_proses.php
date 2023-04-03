<?php
session_start();
$filename = $_FILES['foto']['name'];
$temp_file = $_FILES['foto']['tmp_name'];
$file_ext = explode('.', $filename);
$file_ext = end($file_ext);
$file_ext = strtolower($file_ext);

switch($file_ext) {
    case 'jpg':
    case 'jpeg':
    case 'png':
    case 'svg':
        move_uploaded_file($temp_file, "src/$filename");
        break;
    default:
        $_SESSION['notImg'] = true;
        header("location: ganti_foto.php");
        die();
}

$db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
$query = "update username_siswa set foto = '$filename' where ID_Siswa = {$_SESSION['id']}";
$db->query($query);
header("location: profil.php");
?>
<?php
    session_start();
    $filename1 = $_FILES['ijazah']['name'];
    $temp_file1 = $_FILES['ijazah']['tmp_name'];
    $file_ext1 = explode('.', $filename1);
    $file_ext1 = end($file_ext1);
    $file_ext1 = strtolower($file_ext1);

    switch($file_ext1) {
        case 'pdf':
            move_uploaded_file($temp_file1, "src/$filename1");
            break;
        default:
            $_SESSION['ijazahNotPdf'] = true;
            header("location: upload_berkas.php");
            die();
    }

    $filename2 = $_FILES['akte']['name'];
    $temp_file2 = $_FILES['akte']['tmp_name'];
    $file_ext2 = explode('.', $filename2);
    $file_ext2 = end($file_ext2);
    $file_ext2 = strtolower($file_ext2);

    switch($file_ext2) {
        case 'pdf':
            move_uploaded_file($temp_file2, "src/$filename2");
            break;
        default:
            $_SESSION['akteNotPdf'] = true;
            header("location: upload_berkas.php");
            die();
    }

    $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
    $query = "insert into berkas_siswa(ID_Siswa, nama_siswa, nama_ayah, nama_ibu, ijazah, akte)
    values(?, ?, ?, ?, ?, ?)";

    $result = $db->prepare($query);
    $result->execute([$_SESSION['id'],$_SESSION['nama'], $_POST['ayah'], $_POST['ibu'], $filename1, $filename2]);

    $query = "update username_siswa set status = 'Belum Diterima' where ID_Siswa = {$_SESSION['id']}";
    $result = $db->query($query);

    header("location: halaman_utama.php");
?>
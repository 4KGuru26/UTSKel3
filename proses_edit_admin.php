<?php
session_start();
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$jabatan = $_POST['jabatan'];

$db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");

$sql = "UPDATE username_admin
        SET Nama = '$name', Username = '$username', Password = '$password', Jabatan = '$jabatan'
        WHERE ID_Admin = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$_SESSION['id']]);

header("location: profil_admin.php");
?>
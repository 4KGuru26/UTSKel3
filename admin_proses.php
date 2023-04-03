<?php
    session_start();
    $username = $_POST['username'];
    $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", 'root', '');
    $query = "select * from username_admin where Username=?";

    $result = $db->prepare($query);
    $result->execute([$_POST['username']]);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if(!password_verify($_POST['password'], $row['Password'])) {
        $_SESSION['isWrong'] = true;
        header('location: admin.php');
        die();
    }

    $_SESSION['id'] = $row['ID_Admin'];
    header("location: halaman_utama_admin.php");
?>
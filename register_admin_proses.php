<?php
    session_start();
    if($_POST['password'] !== $_POST['passwordConfirm']) {
        $_SESSION['notEqual'] = true;
        header("location: register_admin.php");
    }

    $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
    $en_pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "insert into username_admin(Nama, Password, Username, Jabatan) values(?,?,?,?)";
    $result = $db->prepare($query);

    $result->execute([$_POST['name'], $en_pass, $_POST['username'], "Admin Bawah"]);
    header("location: halaman_utama_admin.php");


?>
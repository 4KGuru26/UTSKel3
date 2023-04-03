<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Utama</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <style>
    #click a {
        display:block;
        width:100%;
        text-decoration:none;
        color: black;
    }
    </style>
    <body>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <div class="col-6">
            <a href="index.php">
                <img src="FOTO/logo.png" class="img-responsive" width="100" height="100">   
                <a class="navbar-brand" href="index.php"><b>Tadika Mesra</b></a>   
            </a>
            </div>
            <div class="col-6 d-flex justify-content-end" style="padding-right: 20px">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="javascript:history.go(-1)">Back</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
        <br>
        <?php
        $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
        $query = "select * from username_admin where ID_Admin = $_GET[id]";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container">
            <h1>Admin MySchool - Edit Admin</h1>
            <?php
            echo "<pre>";
            echo "Nama : $row[nama] <br>";
            echo "Username : $row[tempatLahir] <br>";
            echo "Tanggal Lahir : $row[tanggalLahir] <br>";
            echo "Password : $row[alamat] <br>";
            echo "Jabatan : $row[jarak] km <br>";
            echo "</pre>";
            ?>
        </div>
    </body>
</html>
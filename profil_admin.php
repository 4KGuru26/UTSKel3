<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Utama</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <div class="col-2">
                    <a href="halaman_utama_admin.php">
                        <img src="FOTO/logo.png" class="img-responsive" width="100" height="100">
                        <a class="navbar-brand" href="halaman_utama_admin.php"><b>Tadika Mesra</b></a>
                    </a>
                </div>
                <div class="col-8">
                    <ul class="navbar-nav navbar-expand-lg justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link icon-link" href="data_pendaftar.php">Daftar Siswa Baru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-link" href="berkas.php">Lihat Berkas</a>
                        </li>
                        <?php
                            session_start();
                            $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
                            $query = "select jabatan from username_admin where ID_Admin = $_SESSION[id]";

                            $result = $db->query($query);
                            $row = $result->fetch(PDO::FETCH_ASSOC);
                            if($row['jabatan'] === "Admin Tinggi") {
                        ?>

                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link icon-link" href="user_edit.php">Admin Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-link active" href="profil_admin.php">Profil</a>
                        </li>
                    </ul>
                </div>
                <div class="col-2 d-flex justify-content-end" style="padding-right: 20px">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link icon-link"  href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>  
        </nav>
        <br>
        <div class="container">
            <h1>Admin MySchool - Profil</h1>
            <br/>
            <?php
                $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
                $query = "select * from username_admin where ID_Admin = ?";
                $result = $db->prepare($query);
                $result->execute([$_SESSION['id']]);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                echo "<pre>";
                echo "ID Admin : $row[ID_Admin] <br>";
                echo "Nama : $row[Nama] <br>";
                echo "Username : $row[Username] <br>";
                echo "Password : $row[Password] <br>";
                echo "Jabatan : $row[Jabatan] <br>";
                echo "</pre>";
            ?>
            <a href="edit_profil_admin.php"><button class="btn btn-primary">Edit Profil</button></a>
            <div class="d-flex flex-column">
                <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>
    </body>
</html>
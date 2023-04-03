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
                        <li class="nav-item">
                            <a class="nav-link icon-link active" href="user_edit.php">Admin Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-link" href="profil_admin.php">Profil</a>
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
        <?php
        $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
        $query = "select count(1) from username_admin";

        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $total = $row["count(1)"];

        $query = "select * from username_admin";
        $result = $db->query($query);
        ?>
        <div class="container">
            <h1>Admin MySchool - Edit Admin</h1>
            <a href="register_admin.php"><button class="btn btn-primary">Tambah Admin</button></a>
            <table class=table>
            <tr>    
                <th class='col col-md-2'>ID Admin</th>
                <th class='col col-md-2'>Nama</th>
                <th class='col col-md-2'>Username</th>
                <th class='col col-md-2'>Jabatan</th>
                <th class='col col-md-2'>Edit/Delete</th>
            </tr>
            <?php
    $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
    $query = "select count(1) from username_admin";

    $result = $db->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $total = $row["count(1)"];

    $query = "select * from username_admin";
    $result = $db->query($query);
?>
<div class="container">
    <?php 
    session_start();
    if ($_SESSION['Jabatan'] !== "Admin Bawah") : ?>
    <?php endif; ?>
    <table class=table>
        <?php
        for($i = 0; $i < $total; $i++) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            echo "<table class='table table-striped'>
            <tr>
                <td id=click class='col col-md-2'>{$row['ID_Admin']}</td>
                <td id=click class='col col-md-2'>{$row['Nama']}</td>
                <td id=click class='col col-md-2'>{$row['Username']}</td>
                <td id=click class='col col-md-2'>{$row['Jabatan']}</td>
                <td class='col col-md-2'>";
                    if ($_SESSION['Jabatan'] !== 'Admin Bawah') {
                        echo "<a href=update_admin.php?id={$row['ID_Admin']}&opt=edit>Edit</a> 
                        <a href=update_admin.php?id={$row['ID_Admin']}&opt=delete>Delete</a>";
                    }
                echo "</td>
            </tr>
            </table>";
        }
        ?>
    </table>
</div>

    </body>
</html>
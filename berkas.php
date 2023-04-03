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
                        <a class="nav-link icon-link active" href="berkas.php">Lihat Berkas</a>
                    </li>
                    <?php
                        session_start();
                        $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
                        $query = "select jabatan from username_admin where ID_Admin = $_SESSION[id]";

                        $result = $db->query($query);
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        if($row['jabatan'] === "Admin Tinggi") {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link icon-link" href="user_edit.php">Admin Users</a>
                    </li>
                    <?php } ?>
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
        $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", 'root', '');
        $query = "select * from berkas_siswa";
        $result2 = $db->query($query);
        $query = "select count(1) from berkas_siswa";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $total = $row["count(1)"];
        ?>
        <div class="container">
            <h1>Admin MySchool - Cek Berkas Siswa</h1>
            <a href="print_berkas.php"><button class="btn btn-primary">Print</button></a>
            <table class=table>
            <tr>    
                <th class='col col-md-2'>Nama</th>
                <th class='col col-md-2'>Nama Ayah</th>
                <th class='col col-md-2'>Nama Ibu</th>
                <th class='col col-md-2'>Ijazah</th>
                <th class='col col-md-2'>Akte</th>
                <th class='col col-md-2'>Persetujuan</th>
            </tr>
            <?php
            for($i = 0; $i < $total; $i++) {
                $row2 = $result2->fetch(PDO::FETCH_ASSOC);
                echo "<table class='table table-striped'>
                <tr>
                    <td id=click class='col col-md-2'><a href=detail_siswa.php?id={$row2['ID_Siswa']}>{$row2['nama_siswa']}</a></td>
                    <td id=click class='col col-md-2'><a href=detail_siswa.php?id={$row2['ID_Siswa']}>{$row2['nama_ayah']}</a></td>
                    <td id=click class='col col-md-2'><a href=detail_siswa.php?id={$row2['ID_Siswa']}>{$row2['nama_ibu']}</a></td>
                    <td id=click class='col col-md-2'><a href=detail_siswa.php?id={$row2['ID_Siswa']}>{$row2['ijazah']}</a></td>
                    <td id=click class='col col-md-2'><a href=detail_siswa.php?id={$row2['ID_Siswa']}>{$row2['akte']}</a></td>
                    <td class='col col-md-2'>
                        <a href=persetujuan_berkas.php?id={$row2['ID_Siswa']}&opt=terima>Terima</a> 
                        <a href=persetujuan_berkas.php?id={$row2['ID_Siswa']}&opt=tolak>Tolak</a>
                    </td>
                </tr>
                </table>";
            }
            ?>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Utama</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <?php
        session_start();
        $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
        $query = "select * from username_siswa where ID_Siswa = $_SESSION[id]";
        $res = $db->query($query);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        ?>
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
                            <a href="status.php" ><button class="btn">Status</button></a>
                        </li>
                        <?php if(!($row['status'] === "Belum Terdaftar")) { ?>
                            <li class="nav-item">
                            <a href="upload_berkas.php"><button class="btn">Upload Berkas</button></a>
                            </li>
                                <?php if(!($row['status'] !== "Diterima")) { ?>
                                    <li class="nav-item">
                                        <a href="cetak.php"><button class="btn">Cetak Kartu Siswa</button></a>
                                    </li>
                                <?php }?>
                            <li class="nav-item">
                                <a href="profil.php"><button class="btn">Profil</button></a>
                            </li>
                        <?php }?>
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
            <h1>MySchool - Upload Berkas</h1>
            <form action="upload_berkas_proses.php" method="post" enctype="multipart/form-data">
                <label for="ayah" class="form-label">Nama Ayah</label>
                <input type="text" name="ayah" class="form-control">
            </br>
                <label for="ibu" class="form-label">Nama Ibu</label>
                <input type="text" name="ibu" class="form-control">
            </br>
                <label for="ijazah" class="form-label" >Ijazah</label>
                <input type="file" name="ijazah" class="form-control"/>
            </br>
                <label for="akte" class="form-label">Akte</label>
                <input type="file" name="akte" class="form-control"/>
            </br>
            <?php if(isset($_SESSION['ijazahNotPdf'])) { ?>
                <div class="alert alert-danger" role="alert">
                    File ijazah harus PDF!
                </div>
            <?php } else if(isset($_SESSION['akteNotPdf'])) {?>
                <div class="alert alert-danger" role="alert">
                    File akte harus PDF!
                </div>
            <?php }?>
                <button type="submit" class="btn btn-primary">Upload Berkas</button>
            </form>
        </div>
    </body>
</html>
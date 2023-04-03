<!DOCTYPE html>
<html>

<head>
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
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

    <div class="container">
        <marquee class="text-center fs-1"><b>Tadika Mesra Junior High School</b></marquee>
        <br />
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="FOTO/sekolah3.jpg" class="d-block w-100" alt="1">
                </div>
                <div class="carousel-item">
                    <img src="FOTO/sekolah2.jpg" class="d-block w-100" alt="2">
                </div>
                <div class="carousel-item">
                    <img src="FOTO/sekolah1.jpg" class="d-block w-100" alt="3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </br>
        <br>
        <div class="text-center fs-3">
            <p>Tadika Mesra Junior High School as a non-profit organization in the education field also called to develop the
                nation through preparing young generations with the best education.</p>
        </div>

        <br>
        <?php
        $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", 'root', '');
        $query = "select count(1) from username_siswa";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $total = $row["count(1)"];
        ?>
        <div class="container text-center">
            <a>Jumlah siswa yang sudah diterima: <?php echo $total; ?></a><br>
            <a>Jumlah maksimum siswa yang diterima: 10</a><br />
            <br>
        </div>
        <br>
        
    </div>
    <footer class="text-center text-lg-start bg-light text-muted" style="padding-top: 0.2px;">
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-center">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            You can visit the information about the workers in <a href="about_us.php">here</a>.
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-center">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i>Universitas Multimedia Nusantara</p>
                        <p>
                        </p>
                        <p><i class="fas fa-phone me-3"></i>+62-21.5422.0808</p>
                        <p><i class="fas fa-print me-3"></i>+62-21.5422.0800</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Universitas Multimedia Nusantara
        </div>
    </footer>
</body>

</html>
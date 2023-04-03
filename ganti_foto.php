<!DOCTYPE html>
<html>
    <head>
        <title>Ganti Foto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <div class="col-6">
                    <a href="index.php">
                        <img src="FOTO/logo.png" class="img-responsive" width="100" height="100">   
                        <a class="navbar-brand" href="index.php"><b>Tadika Mesra</b></a>   
                    </a>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-end" style="padding-right: 20px">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="halaman_utama.php">Back</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    
        <br>
        <div class="container">
            <h1>MySchool - Ganti Foto</h1>
            <?php
            session_start();
            $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
            $query = "select * from username_siswa where ID_siswa = ?";
            $result = $db->prepare($query);
            $result->execute([$_SESSION['id']]);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            echo "<img src=./src/$row[foto] style=width:20% height:20%/> <br>";
            ?>
            <form action="ganti_foto_proses.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" required/>
                </div>
                <?php if(isset($_SESSION['notImg'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        Foto must be an image!
                    </div>
                <?php $_SESSION['notImg'] = false;}?>
                <button type="submit" class="btn btn-primary">Change Picture</button>
            </form>
        </div>
    </body>
</html> 
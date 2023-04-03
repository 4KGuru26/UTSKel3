<!DOCTYPE html>
<html>
    <head>
        <title>Form Registrasi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <div class="col-6">
                    <a href="index.php">
                        <img src="FOTO/logo.png" class="img-responsive" width="100" height="100">   
                        <a class="navbar-brand" href="index.php"><b>Tadika Mesra</b></a>   
                    </a>
                </div>
                <div class="col-6">
                    <ul class="navbar-nav navbar-expand-lg justify-content-end">
                        <li class="nav-item ">
                            <a class="nav-link icon-link active" href="siswa.php">Login as Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-link" href="admin.php">Login as Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="container">
            <h1>Admin MySchool - Edit Profil</h1>
            <?php
            session_start();
            $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
            $query = "select * from username_admin where ID_Admin = ?";
            $result = $db->prepare($query);
            $result->execute([$_SESSION['id']]);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            ?>
            <form action="proses_edit_admin.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row["Nama"]?>" required/>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $row["Username"]?>" required/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $row["Password"]?>" required/>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="<?php echo $row["Jabatan"]?>" required/>
                </div>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </form>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Form Registrasi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <?php
            session_start();
            require_once 'vendor/autoload.php';
            use Gregwar\Captcha\CaptchaBuilder;
            use Gregwar\Captcha\PhraseBuilder;
    
            $capPhrase = new PhraseBuilder(4);
            $builder = new CaptchaBuilder(null, $capPhrase);
            $builder->build();
            $_SESSION['phrase'] = $builder->getPhrase();
            $builder->save('foto/out.jpg');
        ?>
        <nav class="navbar navbar-expand-lg bg-info">
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
                            <a class="nav-link icon-link" href="siswa.php">Login as Admin</a>
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
            <h1>Registrasi</h1>
            <form action="register_proses.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="confirm" class="form-label">Latitude</label>
                    <input type="text" name="latitude" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Longitude</label>
                    <input type="text" name="longitude" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="confirm" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required/>
                </div>
                <div class="mb-3">
                    <label for="confirm" class="form-label">Enter Captcha: </label> <br>
                    <img src="<?php echo $builder->inline(); ?>" alt="captcha"/><br><br>
                    <?php
                    echo $builder->getPhrase();
                    ?>  
                    <input type="text" name="captcha" class="form-control" required/>
                </div>
                <?php if(isset($_SESSION['maxStudent'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        Student quota is reached!
                    </div>
                <?php session_destroy();} else if(isset($_SESSION['diffPass'])) {?>
                    <div class="alert alert-danger" role="alert">
                        Password and Confirm Password is not the same!
                    </div>
                <?php session_destroy();} else if(isset($_SESSION['diffCapt'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        Captcha is not correct!
                    </div>
                <?php session_destroy();} else if(isset($_SESSION['notImg'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        Foto must be an image!
                    </div>
                <?php session_destroy();}?>
                <button type="submit" class="btn btn-primary">Register</button>
                <p>Already have an account? <a href="siswa.php">Login</a></p>
            </form>
        </div>
    </body>
</html>
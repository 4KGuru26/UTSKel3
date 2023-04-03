<!DOCTYPE html>
<html>
    <head>
        <title>Proses Registrasi</title>
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
                            <a class="nav-link icon-link" href="siswa.php">Login as Siswa</a>
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
            <h1>Proses Registrasi</h1>
            <?php
            session_start();
            $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
            require_once 'vendor/autoload.php';
            use Gregwar\Captcha\CaptchaBuilder;

            $builder = new CaptchaBuilder;
            $builder->build();
            $query = "select count(1) from username_siswa";
            $result = $db->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $total = $row["count(1)"];
            if($total >= 10) {
                $_SESSION['maxStudent'] = true;
                header("location: register.php");
                die();
            }
            if($_POST['password'] != $_POST['confirm_password']) {
                $_SESSION['diffPass'] = true;
                header("location: register.php");
                die();
            }
            if($_POST['captcha'] === $_SESSION['phrase']) {
                $filename = $_FILES['foto']['name'];
                $temp_file = $_FILES['foto']['tmp_name'];
                $file_ext = explode('.', $filename);
                $file_ext = end($file_ext);
                $file_ext = strtolower($file_ext);

                switch($file_ext) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'svg':
                        move_uploaded_file($temp_file, "src/$filename");
                        break;
                    default:
                        $_SESSION['notImg'] = true;
                        header("location: register.php");
                        die();
                }


                $nameArr = explode(" ", strtolower($_POST['name']));
                if(isset($nameArr[1])) $username = $nameArr[0] . "." . $nameArr[1] . "@tadika.com";
                else if(!isset($nameArr[1])) $username = $nameArr[0] . "@tadika.com";
                echo $username;
                $mainLat = -6.256787240967942; // latitude umn
                $mainLng = 106.61857029921752; // longitude umn
                $en_pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $lat = $_POST['latitude'];
                $lng = $_POST['longitude'];
                $distance = (6371 * acos((cos(deg2rad($mainLat))) * (cos(deg2rad($lat))) * (cos(deg2rad($lng) - deg2rad($mainLng)) )+ ((sin(deg2rad($mainLat))) * (sin(deg2rad($lat))))));
    
                $query = "insert into username_siswa (nama, Username, Password, tempatLahir, tanggalLahir, alamat, jarak, foto, status)
                            VALUES(?,?,?,?,?,?,?,?, 'Belum Terdaftar')";
    
                $result = $db->prepare($query);
                $result->execute([$_POST['name'], $username, $en_pass, $_POST['tempatLahir'], $_POST['tanggalLahir'], $_POST['alamat'], $distance, $filename]);
                
            }
            else {
                $_SESSION['diffCapt'] = true;
                header("location: register.php");
                die();
            }

            ?>
            <p>Proses Registrasi berhasil</p>
            <a href="siswa.php"><button class="btn btn-primary">Login</button></a>
            <a href="index.php"><button class="btn btn-primary">Home</button></a>
        </div>
    </body>
</html>
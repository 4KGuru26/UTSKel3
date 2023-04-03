<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Successful</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <?php
            session_start();
            if($_POST['new_password'] != $_POST['confirm_password']) {
                $_SESSION['diffPass'] = true;
                header("location: forgotpass.php");
                die();
            }
            $db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
            $query = "update username_siswa set Password=? where Username=?";

            $result = $db->prepare($query);
            $result->execute([password_hash($_POST['new_password'], PASSWORD_BCRYPT), $_POST['username']]);

        ?>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Tadika Mesra</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="siswa.php">Login as Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Login as Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            Change Password Successful
        </div>
    </body>
</html>
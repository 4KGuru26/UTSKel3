<?php
$db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
$query = "select * from username_siswa";
$result = $db->query($query);
if($_GET['opt'] == "terima") {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $query = "update username_siswa set status = 'Terdaftar' where ID_Siswa = {$_GET['id']}";
        $db->query($query);
    }
} else if($_GET['opt'] == "tolak") {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $query = "update username_siswa set status = 'Ditolak' where ID_Siswa = {$_GET['id']}";
        $db->query($query);
    }
}
header("location: data_pendaftar.php");
?>
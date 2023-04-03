<?php
$db = new PDO("mysql:host=localhost;dbname=uts_kelompok3", "root", "");
$query = "select * from username_admin";
$result = $db->query($query);
if($_GET['opt'] == "edit") {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        header("edit_admin.php");
        $db->query($query);
    }
} else if($_GET['opt'] == "delete") {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $query = "delete username_admin set status = 'Ditolak' where ID_Siswa = {$_GET['id']}";
        $db->query($query);
    }
}
header("location: edit_admin.php");
?>
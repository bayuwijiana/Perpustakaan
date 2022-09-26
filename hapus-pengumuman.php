<?php	
include("config.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM notifikasi WHERE id_notifikasi='$id'");
header("location:menu-admin.php #pengumuman");

?>
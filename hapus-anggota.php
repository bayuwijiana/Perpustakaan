<?php	
include("config.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM usser WHERE id_usser='$id'");
header("location:menu-admin.php #anggota");

?>
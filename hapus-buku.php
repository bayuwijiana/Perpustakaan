<?php	
include("config.php");

$id=$_GET['id'];



mysqli_query($conn,"DELETE FROM buku WHERE id_buku ='$id'");
header("location:menu-admin.php #buku");


?>
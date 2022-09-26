<?php	
include("config.php");

$id=$_GET['id'];



mysqli_query($conn,"DELETE FROM tb_admin WHERE id_admin ='$id'");
header("location:menu-admin.php #setting-akun");


?>
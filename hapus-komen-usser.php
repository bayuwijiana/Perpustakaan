<?php	
include("config.php");

$id_komentar=$_GET['id_komentar'];

mysqli_query($conn,"DELETE FROM komentar WHERE id='$id_komentar'");
header("location:menu-usser.php #komentar");


?>
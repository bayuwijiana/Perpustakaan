<?php	
include("config.php");
$id=$_POST['id'];
$status_perpus=$_POST['status_perpus'];

mysqli_query($conn,"UPDATE usser SET status_perpus='$status_perpus' WHERE id='$id' ");



header("location:menu-admin.php #angota");

?>
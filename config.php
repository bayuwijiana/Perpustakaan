<?php	
$host="localhost";
$usser="root";
$pass="";
$db="perpustakaan";

$conn=mysqli_connect($host,$usser,$pass,$db) or die("Error".mysqli_error($conn));

?>
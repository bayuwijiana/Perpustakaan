<?php	
include("config.php");

$ussername="petugas_perpus";
$isi_komentar=$_POST['isi_komentar'];
mysqli_query($conn,"INSERT INTO komentar VALUES ('','$ussername','$isi_komentar')");
header("location:menu-admin.php#komentar");

?>
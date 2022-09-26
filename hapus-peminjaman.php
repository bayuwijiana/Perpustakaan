<?php	
include("config.php");

$id_buku=$_POST['id_buku'];
$ussername2=$_POST['ussername'];
$id_peminjaman=$_POST['id_peminjaman'];
$jumlah=$_POST['jumlah'];

$data1=mysqli_query($conn,"SELECT * FROM buku WHERE id_buku='$id_buku'");
$data2 = mysqli_fetch_array($data1);

$stok_buku=$data2['stok_buku'];
$stok_buku=$stok_buku+$jumlah;

mysqli_query($conn,"UPDATE buku SET stok_buku = '$stok_buku' WHERE id_buku='$id_buku' ");

mysqli_query($conn,"DELETE FROM peminjaman WHERE id_peminjaman ='$id_peminjaman'");



$a=mysqli_query($conn,"SELECT ussername FROM peminjaman WHERE ussername='$ussername2'");
if(mysqli_fetch_assoc($a)){

}else{
$xx="TIDAK MEMINJAM";
mysqli_query($conn,"UPDATE usser SET status_perpus='$xx' WHERE ussername='$ussername2'");

}




header("location:peminjaman.php");


?>

<?php	

session_start();

 
    if(!isset($_SESSION["login-admin"])){
        echo "<script>
                     alert('silahkan log in dahulu');
                    window.location ='login.php';
             </script>";
    }

    
    if(isset($_POST["konfirmasi"])){
        include("config.php");

        $id_peminjaman=$_POST['id_peminjaman'];
        $id_buku=$_POST['id_buku'];
        $ussername3=$_POST['ussername'];
        $jumlah=$_POST['jumlah'];
        $tanggal_pengembalian=$_POST['tanggal_pengembalian'];
        $tanggal_peminjaman=$_POST['tanggal_peminjaman'];
        
        $a=$tanggal_peminjaman."a";
        $b=$tanggal_pengembalian."b";
        

        // tahun validasi
        $z=1;
        for ($i=0; $i <4 ; $i++) {     
            if($a[$i]>$b[$i]  ){
                $z=$z+1;
            }
        }

        // bulan validasi
        for ($i=5; $i <7 ; $i++) {     
            if($a[$i]>$b[$i]){
                $z=$z+1;
            }
        }

            //tanggal validasi
        
            if($a[5]==$b[5]){
                 
            
                    if($a[8]>$b[8]){
                        $z=$z+1;   
                    }
                    elseif($a[8]==$b[8]){
                         if($a[9]>$b[9]){
                            $z=$z+1;
                         }
                   }
    
    
            }
    

            if($a[6]==$b[6]){
             
                    if($a[8]>$b[8]){
                            $z=$z+1;
                    }
                    if($a[8]==$b[8]){
                            if($a[9]>$b[9]){
                                $z=$z+1;
                            }
                    }
               
            }
  
        if($z>1){
            echo "<script>
                        alert('input tanggal kembali harus melebihi tanggal pinjam');
                        window.location='peminjaman.php';
                </script>";
        }else{
        
            $data=mysqli_query($conn," SELECT * FROM peminjaman WHERE id_peminjaman='$id_peminjaman' ");
            while($data2=mysqli_fetch_array($data)){
                    $status_peminjaman=$data2['status_peminjaman'];
            }
            if($status_peminjaman=="DI KONFIRMASI"){
                    echo "<script>
                            alert('Telah dikonfirmasi');
                          </script>";
            }else{
                $data=mysqli_query($conn," SELECT * FROM buku WHERE id_buku='$id_buku' ");
                while($data2=mysqli_fetch_array($data)){
                        $stok_buku=$data2['stok_buku'];
                }
                $stok2=$stok_buku;
                $stok_buku=$stok_buku-$jumlah; 
                    if($stok_buku< 0){
                        echo "<script>
                                alert('buku kurang tidak bisa mengkonfirmasi');
                              </script>";
                        $stok_buku=$stok2; 
                    }else{
                        mysqli_query($conn," UPDATE peminjaman SET status_peminjaman='DI KONFIRMASI',tanggal_pengembalian='$tanggal_pengembalian' WHERE id_peminjaman='$id_peminjaman' ");


                        mysqli_query($conn," UPDATE buku SET stok_buku='$stok_buku' WHERE id_buku='$id_buku' ");

                    //    /////////////////
                        $px="MEMINJAM";

                         mysqli_query($conn,"UPDATE usser SET status_perpus='$px' WHERE ussername='$ussername3'");
                    }
            }

         }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>peminjaman-perpustakaan</title>
    <link rel="icon" type="icon" href="assets/img/logo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">DIGITAL library</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="assets/img/logo.png" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="menu-admin.php#home"> BERANDA</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#notifikasi">DATA PEMINJAMAN</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
<!-- NOTIFIKASI -->
        <section class="resume-section" id="notifikasi">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    DATA 
                    <span class="text-primary">PEMINJAMAN</span>
                </h1>
                <h2 class="mb-5">DATA</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <div class="table-responsive">
                            <table   border="1" class="table table-stripped">
                                <tr>
                                    <th>no</th>
                                    <th>id_peminjaman</th>
                                    <th>ussername</th>
                                    <th>id_buku</th>
                                    <th>jumlah</th>
                                    <th>peminjaman</th>
                                    <th>pengembalian</th>
                                    <th>status</th>
                                    <th>Options</th>
                                </tr>
                                <?php	
                                    include("config.php");
                                    $nomor=1;
                                    $query_mysql=mysqli_query($conn,"SELECT * FROM peminjaman ");
                                    while($data=mysqli_fetch_array($query_mysql)){
                                ?>
                                    <tr>
                                        <td><?= 	$nomor++?></td>
                                        <td><?= 	$data['id_peminjaman']?></td>
                                        <td><?= 	$data['ussername']?></td>
                                        <td><?= 	$data['id_buku']?></td>
                                        <td><?= 	$data['jumlah']?></td>
                                        <td><?= 	$data['tanggal_peminjaman']?></td>
                                        <td><?= 	$data['tanggal_pengembalian']?></td>
                                        <td> <?= 	$data['status_peminjaman']?></td>
                                        <td>
                                              
                                                 <!-- Button trigger modal -->
                                                <button style="width:100% ; height:50px" name="konfirmasi2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">KONFIRMASI </button>
                                            
                                        </td>
                                           
                                        <td>
                                             <form action="hapus-peminjaman.php" method="post">   
                                                  <input type="hidden" name="id_peminjaman" id="id" value="<?= 	$data['id_peminjaman']?>" >
                                                  <input type="hidden" name="id_buku" id="id" value="<?= 	$data['id_buku']?>" >
                                                  
                                                  <input type="hidden" name="jumlah" id="id" value="<?= 	$data['jumlah']?>" >
                                                  
                                                  <input type="hidden" name="ussername" id="id" value="<?= 	$data['ussername']?>" >
                                                  
                                                 <button style="width:100% ; height:50px"  name="hapus">hapus</button>
                                                 
                                            </form>
                                        </td>
                                        
                                            
                                        </td>
                                    </tr>
                                <?php	}?>
                            </table>
                            
                        </div>
                    
                    </div>
                </div>
            </div>
        </section>
        <p id="info">MAKER INFO<br>by.bayu wijiana</p>
                <div class="social-icons">
                    <a class="social-icon" href="https://twitter.com/BayuEzzio" target="blank"><i
                            class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="https://www.facebook.com/bayu.wijiana" target="blank"><i
                            class="fab fa-facebook-f"></i></a>
                </div>
        <hr class="m-0" />     
    </div>
                <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">ANDA YAKIN MENGKONFIRMASI ?</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-footer">
        
        
         <form action="" method="post">
             <?php	
                include("config.php");
                    $nomor=1;
                    $query_mysql=mysqli_query($conn,"SELECT * FROM peminjaman ");
                    while($data=mysqli_fetch_array($query_mysql)){
            ?>
                 <input type="hidden" name="id_peminjaman" id="id" value="<?= 	$data['id_peminjaman']?>" >
                <input type="hidden" name="id_buku" id="id" value="<?= 	$data['id_buku']?>" >
                <input type="hidden" name="jumlah" id="id" value="<?= 	$data['jumlah']?>" >
                <input type="hidden" name="tanggal_peminjaman" id="id" value="<?= 	$data['tanggal_peminjaman']?>" >
                 <input type="hidden" name="ussername" id="id" value="<?= 	$data['ussername']?>" >
                                                  
                
            <?php	}?>
            <b>tanggal_pengembalian</b><input style="width:100%"  name="tanggal_pengembalian" type="date" required>
            <button  name="konfirmasi">KIRIM</button>
      <button style="width:30% " type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>

        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
<footer>
    <p>
    <h5>Semua fitur di situs ini dapat digunakan secara gratis.</h5>
    Website ini disiapkan untuk penilaian tengah semerster Pelatihan Pemrograman Web PHP<br>Berkelanjutan
    Pemberdayaan masyarakat
    Beasiswa Program (PUB).<br>
    <b>copyright@bayu_ezzio-2021 </b>
    </p>
</footer>


</html>
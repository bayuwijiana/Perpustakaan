<?php	
session_start();
    
     if(!isset($_SESSION["login-usser"])){
        echo "<script>
                     alert('silahkan log in dahulu');
                     window.location ='login.php';
             </script>";
    }
    
    $login=$_SESSION["login-usser"];
    $ussername=$_SESSION["ussername"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>USSER-perpustakaan</title>
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
            <span class="d-block d-lg-none">USSER</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="assets/img/logo.png" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href=" #home"><?= 	$ussername?>-HOME</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href=" #buku">BUKU</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#notifikasi">NOTIFIKASI</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#komentar">KOMENTAR</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href=" #peminjaman">PEMINJAMAN</a></li>
                 
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="home">
            <div class="resume-section-content">
                <div class="pilihan">
                <!-- Button trigger modal -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">LOG OUT
                </button>
                </div>
                <h1 class="mb-0">
                    School
                    <span class="text-primary">library</span>
                </h1>
                <div class="subheading mb-5">
                    <br>
                    <marquee>" Our lives are changed by two things: through the people we love and the books we read      -  <a
                            href="mailto:name@email.com">smkn2banyumas@Gmail.com "</a>
                         - " Our lives are changed by two things: through the people we love and the books we read "     -</marquee>
                </div>
                <class class="lead mb-5"></class>
                
                <p id="info">MAKER INFO<br>by.bayu wijiana</p>
                <div class="social-icons">
                    <a class="social-icon" href="https://twitter.com/BayuEzzio" target="blank"><i
                            class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="https://www.facebook.com/bayu.wijiana" target="blank"><i
                            class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- BUKU-->
        <section class="resume-section" id="buku">
            <div class="resume-section-content">
                <h2 class="mb-5 mb-6">BUKU</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <form action="" method="post" >
                                    <h3 class="mb-6">CARI BUKU</h3>
                                    <input type="text" name="keyword_buku" size="40px" placeholder ="cari buku " autokomplit="off">
                                    <button type="submit" name="cari_buku">cari</button>
                                </form><br>
                                <br>        
                                <form  action="" method="post" >
                                    <button type="submit" name="semua-buku" class="btn btn-info">Lihat semua buku</button>
                                </form><br>
                                <form  action="" method="post" >
                                    <button type="submit" name="sedikit-buku">Lihat lebih sedikit</button>
                                </form>
                        <br>
                         <h3 class="mb-0 mb-6">JENIS-BUKU</h3>
                                
                            <br>
                            <div>
                             <div class="lis-buku table-responsive" >
                                 <table  border="1" cellpadding="13%" >
                                    <tr >
                                        <th>No</th>
                                        <th>nama_buku</th>
                                        <th>jenis_buku</th>
                                        <th>stok</th>
                                        <th>status_buku</th>
                                        <th>Options</th>
                                        
                                    </tr>
                                    <?php	
                                        include("config.php");
                                        $nomor=1;

                                        if(isset($_POST["cari_buku"])){
                                            $keyword_buku=$_POST['keyword_buku'];
                                                if($keyword_buku==""){
                                                    echo "<script>
                                                            alert('input untuk pencarian buku')
                                                            window.location='menu-usser.php #anggota';
                                                        </script>";
                                                }

                                            $query_mysql=mysqli_query($conn,"SELECT * FROM buku WHERE stok_buku = '$keyword_buku' OR nama_buku LIKE '%$keyword_buku%' OR jenis_buku LIKE '%$keyword_buku%' OR status_buku LIKE '$keyword_buku%'  ");

                                            while($data=mysqli_fetch_array($query_mysql)){
                                    ?>
                                                <tr>
                                                    <td><?= 	$nomor++?></td>
                                                    <td><?= 	$data['nama_buku']?></td>
                                                    <td><?= 	$data['jenis_buku']?></td>
                                                    <td><?= 	$data['stok_buku']?></td>
                                                    <td><?= 	$data['status_buku']?></td>
                                                    <td>
                                                        <a href="pinjam-buku.php?id=<?= 	$data['id_buku']?>">PINJAM </a>
 
                                                    </td>
                                                </tr>
                                        
                                    <?php	}
                                    }elseif( isset($_POST["semua-buku"])){
                                        $query_mysql=mysqli_query($conn,"SELECT * FROM buku ORDER BY jenis_buku");

                                            while($data=mysqli_fetch_array($query_mysql)){
                                    ?>
                                                <tr>
                                                    <td><?= 	$nomor++?></td>
                                                    <td><?= 	$data['nama_buku']?></td>
                                                    <td><?= 	$data['jenis_buku']?></td>
                                                    <td><?= 	$data['stok_buku']?></td>
                                                    <td><?= 	$data['status_buku']?></td>
                                                    <td>                                                            <a href="pinjam-buku.php?id=<?= 	$data['id_buku']?>">PINJAM </a>
                                                    </td>
                                                    
                                                </tr>
                                    <?php	}
                                    }elseif(isset($_POST["sedikit-buku"]) || !isset($_POST["semua-buku"]) || !isset($_POST["cari-buku"])){
                                            $query_mysql=mysqli_query($conn,"SELECT * FROM buku LIMIT 1,5");

                                            while($data=mysqli_fetch_array($query_mysql)){        
                                    ?>        
                                                <tr>
                                                    <td><?= 	$nomor++?></td>
                                                    <td><?= 	$data['nama_buku']?></td>
                                                    <td><?= 	$data['jenis_buku']?></td>
                                                    <td><?= 	$data['stok_buku']?></td>
                                                    <td><?= 	$data['status_buku']?></td>
                                                    <td>
                                                            <a href="pinjam-buku.php?id=<?= 	$data['id_buku']?>">PINJAM </a>
                                                    </td>
                                                </tr>

                                    <?php	}
                                    }
                                    ?>
                                </table>
                             </div>
                            </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- NOTIFIKASI -->
        <section class="resume-section" id="notifikasi">
            <div class="resume-section-content">
                <h2 class="mb-5 mb-6">NOTIFIKASI</h2>
                <h5>
                    Silahkan pantau jadwal pengembalian buku semester dan informasi <br>
                    lainnya seputar Perpustakaan SMK Negeri 2 Banyumas
                </h5><br>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        
                            <table   border="1" cellpadding="40%">
                                <tr>
                                    <th>urutan</th>
                                    <th>isi</th>
                                </tr>
                                
                                <?php	
                                    include("config.php");
                                    $nomor=1;
                                    $query_mysql=mysqli_query($conn,"SELECT * FROM notifikasi ");
                                    while($data=mysqli_fetch_array($query_mysql)){
                                ?>
                                    <tr>
                                        <td><?= 	$nomor++?></td>
                                        <td><?= 	$data['isi_notifikasi']?></td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                <?php	}?>
                            </table>
                            <div id="komentar" class="table-responsive">
                                <table   border="1" cellpadding="25%" >
                                    <tr>
                                        <th>komentar</th>
                                    </tr>
                                    <?php	                            
                                        if(isset($_POST['lihat-sedikit']) || !isset($_POST['lihat-semua'])){
                                            include("config.php");
                                            $nomor=1;
                                            $query_mysql=mysqli_query($conn,"SELECT * FROM komentar LIMIT 1,2 ");
                                            while($data=mysqli_fetch_array($query_mysql)){
                                                $ussername_2=$data['ussername'];
                                    ?>
                                                <tr>
                                                    <td>@<?=$data['ussername'] ?> : <?=$data['isi_komentar'] ?>

                                                    <?php if($ussername==$ussername_2){?>
                                                        <a href="hapus-komen-usser.php?id_komentar=<?= 	$data['id']?>">Hapus</a>
                                                    <?php	} ?>
                                                    <td>  
                                                </tr>
                                            <?php	}?>
                                                <tr>
                                                    <td style="width: 100%">
                                                        <form action="komentar-aksi.php" method="post" >


                                                            <input type="hidden" name="ussername" value="<?= 	$ussername?>">
                                                            <input style="width:80% "type="text" name="isi_komentar" placeholder="Tulis komentar anda " required>
                                                            <button name="kirim-komentar">kirim</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                 <?php }else{

                                            include("config.php");
                                            $nomor=1;
                                            $query_mysql=mysqli_query($conn,"SELECT * FROM komentar ");
                                            while($data=mysqli_fetch_array($query_mysql)){
                                                $ussername_2=$data['ussername'];
                                ?>
                                            <tr>
                                                   <td>@<?=$data['ussername'] ?> : <?=$data['isi_komentar'] ?>

                                                    <?php if($ussername==$ussername_2){?>
                                                        <a href="hapus-komen-usser.php?id_komentar=<?= 	$data['id']?>">Hapus</a>
                                                    <?php	} ?>
                                                    <td>
                                                
                                            </tr>
                                        <?php	}?>
                                            <tr>
                                                <td style="width:100%">
                                                        <form action="komentar-aksi.php" method="post" >
                                                            
                                                            <input type="hidden" name="ussername" value="<?= 	$ussername?>">
                                                            <input style="width:80% "type="text" name="isi_komentar" placeholder="Tulis komentar anda " required>
                                                            <button name="kirim-komentar">kirim</button>
                                                        </form>
                                                    </td>
                                            </tr>
                             <?php } ?>
                                    </div>
                            </table>

                            <form action="" method="post">
                                <button type ="submit" name="lihat-sedikit" >
                                    lihat lebih sedikit
                                </button>
                                <button type ="submit" name="lihat-semua" >
                                    lihat semua komentar
                                </button>
                            </form>
                        
                    </div>
                </div>
            </div>
        </section>
        <hr class="m-0" />    
        <section class="resume-section" id="peminjaman">
            <div class="resume-section-content">
                <h2 class="mb-5 mb-6">PEMINJAMAN</h2>
                <h5 class="mb-6">
                    PEMINJAMAN ANDA
                </h5><br>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <div class="table-responsive">
                            <table   border="1" cellpadding="10%" class="table table-stripped">
                                <tr>
                                    <th>no</th>
                                    <th>ussername</th>
                                    <th>jumlah</th>
                                    <th>nama_buku</th>
                                    <th>waktu_peminjaman</th>
                                    <th>waktu_pengembalian</th>
                                    <th>status_peminjaman</th>
                                </tr>
                                <?php	
                                    include("config.php");
                                    $nomor=1;
                                    $query_mysql=mysqli_query($conn,"SELECT * FROM peminjaman  WHERE ussername='$ussername' ");
                                    
                                    while($data=mysqli_fetch_array($query_mysql)){
                                ?>
                                    <tr>
                                        <td><?= 	$nomor++?></td>
                                        <td><?= 	$data['ussername']?></td>
                                        <td><?= 	$data['jumlah']?></td>
                                        
                                        <?php	
                                            $id_buku2=$data['id_buku'];
                                            $query_mysql2=mysqli_query($conn,"SELECT nama_buku FROM buku  WHERE id_buku='$id_buku2' ");
                                              while($data2=mysqli_fetch_array($query_mysql2)){
                                        ?>
                                                <td><?= 	$data2['nama_buku']?></td>
                                        <?php 	}?>
                                        <td><?= 	$data['tanggal_peminjaman']?></td>
                                        <td><?= 	$data['tanggal_pengembalian']?></td>
                                        <td><?= 	$data['status_peminjaman']?></td>
                                        </td>
                                    </tr>
                                <?php	}?>
                            </table>
                            
                        </div>

                    
                    </div>
                </div>

            </div>
        </section>
        <hr class="m-0" />    
                                
    </div>
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hello <?= 	$ussername?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Anda yakin akan LOG OUT ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
        <button type="button" ><a href="logout.php">IYA</a></button>
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
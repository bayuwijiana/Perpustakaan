<?php	
session_start();
$_SESSION['jenis_buku']="";

if(!isset($_SESSION["login-admin"])){
        echo "<script>
                     alert('silahkan log in dahulu');
                   window.location ='login.php';
             </script>";
    }

   
    if(isset($_POST["kirim_notifikasi"])){
        $isi=$_POST["isi_notifikasi"];

        if($isi==""){
            echo "<script>
                    alert('silahkan isi terlebih dahulu');
                    window.location='menu-admin.php #pengumuman';
                </script>";
        }else{
                include("config.php");
                mysqli_query($conn,"INSERT INTO notifikasi VALUES ('','$isi')") or die("Error".mysqli_error($conn));
                header("location:menu-admin.php #pengumuman");

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
    <title>ADMIN-perpustakaan</title>
    <link rel="icon" type="icon" href="assets/img/logo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="fontawesome/css/all.css"></script>
    <script src="fontawesome/css/all.min.css"></script>
    <script src="fontawesome/js/all.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">ADMIN</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="assets/img/logo.png" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href=" #home">HOME-ADMIN</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href=" #buku">BUKU</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="peminjaman.php">PEMINJAMAN</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href=" #anggota">ANGGOTA</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href=" #pengumuman">BUAT PENGUMUMAN</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#komentar">KOMENTAR</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href=" #setting-akun">SETTING AKUN</a></li>
                
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="home">
            <div class="resume-section-content">
                <div class="pilihan">
                    <div class="login">
                            <a href="logout.php"><b>LOG OUT</b></a>
                    </div>
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
                        <br>
                                <div id="tambah-admin">
                                        <a href="tambah-buku.php">Tambah buku</a>
                                </div>
                                
                        <br>
                        <form action="" method="post" >
                                    <h3 class="mb-6">CARI BUKU</h3>
                                    <input type="text" name="keyword_buku" size="40px" placeholder ="cari buku " autokomplit="off">
                                    <button type="submit" name="cari_buku" style="background-color:cyan"><i class="fas fa-search"></i></button>
                                </form><br>
                                <br>        
                                <form  action="" method="post" >
                                    <button 
                                      type="submit" name="semua-buku">Lihat semua buku</button>
                                    <button  type="submit" name="sedikit-buku">Lihat lebih sedikit</button>
                                </form>
                        <br>
                         <h3 class="mb-0 mb-6">JENIS-BUKU</h3>
                                
                            <br>
                             <div class="lis-buku table-responsive">
                                 <table id="table-buku"  border="1" cellpadding="13%" >
                                    <tr>
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
                                                            window.location='menu-admin.php #buku';
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
                                                            <a href="edit-buku.php?id=<?= 	$data['id_buku']?>">     Edit buku  </a>||
                                                            <a href="hapus-buku.php?id=<?= 	$data['id_buku']?>">   <i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                        
                                    <?php	}
                                    }elseif(isset($_POST["semua-buku"]) ){
                                        $query_mysql=mysqli_query($conn,"SELECT * FROM buku ORDER BY jenis_buku");


                                            while($data=mysqli_fetch_array($query_mysql)){
                                    ?>
                                                <tr>
                                                    <td><?= 	$nomor++?></td>
                                                    <td><?= 	$data['nama_buku']?></td>
                                                    <td><?= 	$data['jenis_buku']?></td>
                                                    <td><?= 	$data['stok_buku']?></td>
                                                    <td><?= 	$data['status_buku']?></td>
                                                    <td>
                                                            <a href="edit-buku.php?id=<?= 	$data['id_buku']?>">     Edit buku  </a>||
                                                            <a href="hapus-buku.php?id=<?= 	$data['id_buku']?>">     Hapus </a>
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
                                                            <a href="edit-buku.php?id=<?= 	$data['id_buku']?>">Edit buku </a> ||
                                                            <a href="hapus-buku.php?id=<?= 	$data['id_buku']?>">     Hapus </a>
                                                            
                                                    </td>
                                                </tr>
                                    <?php	}
                                    }
                                    ?>       

                                </table>



                                <!-- ////////////////////////////////////////////////////////////////////////// -->
                             </div>
                             </div>
                        </div>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- ANGGOTA -->
        <section class="resume-section" id="anggota">
            <div class="resume-section-content">
                <h2 class="mb-5 mb-6">ANGGOTA</h2>
                <h5>
                   berikut  adalah siswa yang telah mendaftar anggota Perpustakaan SMK Negeri 2 Banyumas
                </h5><br>
                <form action="" method="post" >
                    <h3 class="mb-6">CARI ANGGOTA</h3>
                    <input type="text" name="keyword" size="40px" placeholder ="cari nama " autokomplit="off">
                    <button  type="submit" name="cari">cari</button>
                </form><br>        
                <form  action="" method="post" >
                     <button type="submit" name="semua">Lihat semua anggota</button>
                </form>
                <br>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div >
                        <div class="table-responsive">
                            <table id="table-anggota"  border="1" cellpadding="40%">
                                <tr>
                                    <th>No</th>
                                    <th>ussername</th>
                                    <th>status_perpus</th>
                                    <th>Options</th>
                                </tr>
                                <?php	
                                    include("config.php");
                                    include ("function.php");
                                    $nomor=1;


                                    if(isset($_POST["cari"])){
                                        $keyword=$_POST['keyword'];
                                        if($keyword==""){
                                            echo "<script>
                                                    alert('input untuk pencarian anggota')
                                                    window.location='menu-admin.php #anggota';
                                                 </script>";
                                        }


                                        $query_mysql=mysqli_query($conn,"SELECT * FROM usser WHERE ussername LIKE '%$keyword%' OR status_perpus LIKE '%$keyword%' ");
                                        
                                            while($data=mysqli_fetch_array($query_mysql)){
                                ?>
                                                <tr>
                                                    <td><?= 	$nomor++?></td>
                                                    <td><?= 	$data['ussername']?></td>
                                                    <td><?= 	$data['status_perpus']?></td>
                                                    <td>
                                                            
                                                            <a href="hapus-anggota.php?id=<?= 	$data['id_usser']?>">  Hapus </a>
                                                    </td>
                                                </tr>
                                    <?php	}
                                    }elseif(!isset($_POST["cari"]) || isset($_POST["semua"])){
                                        
                                                $query_mysql=mysqli_query($conn,"SELECT * FROM usser ");
                                                while($data=mysqli_fetch_array($query_mysql)){
                                        ?>
                                                        <tr>
                                                            <td><?= 	$nomor++?></td>
                                                            <td><?= 	$data['ussername']?></td>
                                                            <td><?= 	$data['status_perpus']?></td>
                                                            <td>
                                                                    
                                                                    <a href="hapus-anggota.php?id=<?= 	$data['id_usser']?>">     Hapus </a>
                                                            </td>
                                                        </tr>
                                                <?php	}?>
                                    <?php	}?>
                            </table>
                            
                        </div>
                    
                    </div>
                </div>

            </div>
        </section>
        <hr class="m-0" />         
        <!-- PENGUMUMAN-->
        <section class="resume-section" id="pengumuman">
            <div class="resume-section-content">
                <h2 class="mb-5 mb-6">BUAT PENGUMUMAN</h2>
                                <div class="buat">
                        <h5 class ="mb-6">BUAT PENGUMUMAN</h5>
                        <div class="subheading mb-3">Perpustakaan Smk Negeri 2 Banyumas</div>
                                <p>
                                    <br>Silahkan buat pengumuman di bawah ini.<br>Pengumuman dapat dilihat semua orang.
                                </p><br></ul>
                                <form action="" method="post">
                                    <div class="table-responsive">
                                        <table >
                                            <tr>
                                                <td>
                                                    <textarea name="isi_notifikasi" id="isi-notifikasi" cols="100" rows="10"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button type="submit" name="kirim_notifikasi">Kirim</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                        <div class="subheading mb-3"><h2 class="mb-6"> pengumuman </h2></div>
                    </div>
                
                <h5>
                    Silahkan pantau jadwal pengembalian buku semester dan informasi <br>
                    lainnya seputar Perpustakaan SMK Negeri 2 Banyumas
                </h5><br>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <div >
                            <table   border="1" cellpadding="40%">
                                <tr>
                                    <th>urutan</th>
                                    <th>isi</th>
                                    <th>Options</th>
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
                                            
                                                <a href="hapus-pengumuman.php?id=<?= 	$data['id_notifikasi']?>">     Hapus </a>
                                         </td>
                                    </tr>
                                <?php	}?>
                            </table>
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
                                    ?>
                                                <tr>
                                                        <td>@<?=$data['ussername'] ?> : <?=$data['isi_komentar'] ?> <a href="hapus-komen.php?id_komentar=<?= 	$data['id']?>">     Hapus </a> </td>
                                                </tr>
                                            <?php	}?>
                                                <tr>
                                                    <td>
                                                        <form action="komentar-admin.php" method="post">
                                                            <textarea name="isi_komentar" id="5" cols="100" rows="2" placeholder="tulis komentar anda"required></textarea>
                                                            <input type="hidden" name ="ussername" value="<?= 	$ussername?>">
                                                            <button name="kirim-komentar">kirim</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                 <?php }else{

                                            include("config.php");
                                            $nomor=1;
                                            $query_mysql=mysqli_query($conn,"SELECT * FROM komentar ");
                                            while($data=mysqli_fetch_array($query_mysql)){
                                ?>
                                            <tr>
                                                <td>@<?=$data['ussername'] ?> : <?=$data['isi_komentar'] ?> <a href="hapus-komen.php?id_komentar=<?= 	$data['id']?>">     Hapus </a> </td>
                                                
                                            </tr>
                                        <?php	}?>
                                            <tr>
                                                <td>
                                                    <form action="komentar-admin.php" method="post">
                                                        <textarea name="isi_komentar" id="5" cols="90" rows="2" placeholder="tulis komentar anda"required></textarea>
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

            </div>
        </section>
        <hr class="m-0" />
                <!-- SETTING AKUN-->
        <section class="resume-section" id="setting-akun">
            <div class="resume-section-content">
                <h2 class="mb-5 mb-6">SETTING AKUN</h2>
                <div class="subheading mb-3">Perpustakaan Smk Negeri 2 Banyumas</div>
                <table id="table-anggota"  border="1" cellpadding="20%">
                    <b>Admin Utama</b>
                    <tr> 
                        <th>1</th>
                        <th>admin</th>
                        <th>
                            <a href="ubah-password-admin.php?id=">     Ubah Password </a>
                        </th>
                    </tr>
                </table>
                <br>
                <div id="tambah-admin">
                        <a href="registrasi-admin.php">Tambah admin</a>
                </div>
                <br>
                <table id="table-anggota"  border="1" cellpadding="20%">
                                <tr>
                                    <th>No</th>
                                    <th>ussername</th>
                                    <th>Options</th>
                                </tr>
                                
                                <?php	
                                    include("config.php");
                                    $nomor=2;
                                    $query_mysql=mysqli_query($conn,"SELECT * FROM tb_admin WHERE ussername !='admin'   ");
                                    while($data=mysqli_fetch_array($query_mysql)){
                                ?>
                                    <tr>
                                        <td><?= 	$nomor++?></td>
                                        <td><?= 	$data['ussername']?></td>
                                         <td>
                                                <a href="hapus-admin.php?id=<?= 	$data['id_admin']?>">     Hapus </a>
                                         </td>
                                    </tr>
                                <?php	}?>
                    </table>
                    
            </div>
                    
        </section>
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
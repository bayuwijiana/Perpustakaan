<?php	
session_start();
$_SESSION["index"]="true";    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home-perpustakaan</title>
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
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home"> BERANDA</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#koleksi">KOLEKSI</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#panduan">PANDUAN</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#kontak">KONTAK</a></li>
                
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
                            <a href="login.php"><b>LOG IN</b></a>
                            
                    </div>
                    <div class="create">
                            <a href="register.php"><b>CREATE  ACCOUNT</b></a>
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

        <!-- KOLEKSI-->
        <section class="resume-section" id="koleksi">
            <div class="resume-section-content">
                <h2 class="mb-5">KOLEKSI</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">GO READING</h3>
                        <div class="subheading mb-3">Intelitec Solutions</div>
                            <p>Membaca membuat kita kaya akan ilmu dan imajinasi ,bagi siswa seklian <br> yang suka dengan buku-buku fiksi atau non fiksi. berikut koleksi unggulan yang<br> sedang digemari pembaca lainnya.</p>
                            <p>Ayo  Membaca, Membaca Itu  Menyenangkan Lho!! <br>
                                Membaca buku menurut Dr. Aidh Al-Qarni dalam bukunya adalah hiburan <br>     bagi orang yang menyendiri, munajat bagi jiwa, dialog bagi orang yang suka mengobrol, kenikmatan  bagi orang yang merenung dan pelita bagi yang berjalan ditengah malam. <br> Kenapa kita diharuskan untuk membaca ?. <br> Karena buku itu selalu mengandung faedah, tamsil kebijaksanaan,<br> cerita dan hikayat yang sangat unik. </p>
                        </div>
                        <div class="koleksi">
                            <table  border="1" cellpadding="50%">
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA BUKU TERFAVORIT</th>
                                </tr>
                                <?php	
                                    include("config.php");
                                    $nomor=1;
                                    $query_mysql=mysqli_query($conn,"SELECT * FROM buku where status_buku ='FAVORIT' LIMIT 1,5 ");
                                    while($data=mysqli_fetch_array($query_mysql)){
                                ?>
                                    <tr>
                                        <td><?= 	$nomor++?></td>
                                        <td><?= 	$data['nama_buku']?></td>
                                    </tr>
                                <?php	}?>
                            </table>
                            
                        </div>
                    
                </div>
                
            </div>
        </section>
        <hr class="m-0" />
        <!-- PANDUAN-->
        <section class="resume-section" id="panduan">
            <div class="resume-section-content">
                <h2 class="mb-5">PANDUAN</h2>
                <div class="subheading mb-3">Perpustakaan Smk Negeri 2 Banyumas</div>
                
                        <p>
                            <br>Silahkan gunakan website secara bijak .Pantau notifikasi untuk <br>melihat info pengembian buku semester dan yang lainnya . Website ini memudahkan usser mengecek dan memantau perbukuan perpustakaan <br>SMK Negeri 2 Banyumas
                        </p><br></ul>
                <div class="subheading mb-3">PENDAFFTARAN</div>
                <ul class="fa-ul mb-0">
                    <p>Silahkan registrasi terlebih dahulu untuk mendapatkan pelayanan perpustakaan.Registrasi akun sesuai  panduan untuk memudahkan petugas perpus.</p>
                    <h4>panduan ussername</h4>
                    <ul>
                        <li>harus_diawali huruf</li>
                        <li>ussername dilarang menggunakan simbol khusus kecuali simbol undescore "_"</li>
                        <li>dilarang menggunakan angka atau "_" atau diawal ussername</li>

                    </ul>
                </ul>
            </div>
        </section>   
        <hr class="m-0" />
        <!-- KONTAK-->
        <section class="resume-section" id="kontak">
            <div class="resume-section-content">
                <h2 class="mb-5">KONTAK</h2>
                <div class="subheading mb-3">Perpustakaan Smk Negeri 2 Banyumas</div>
                
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
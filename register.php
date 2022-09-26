<?php   

session_start();
if(!isset($_SESSION["index"])){
header("location:index.php");
}

include("function.php");



if(isset($_POST["register"])){
    
    if(registrasi($_POST)>0){
        echo "<script>
                alert('sukses registrasi /silahkan log in');
                window.location='index.php';
            </script>";

    }else{
        echo mysqli_error($conn);
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
    <title>Register-perpustakaan</title>
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
            <span class="d-block d-lg-none">REGISTER</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="assets/img/logo.png" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php #home"> BERANDA</a></li>
            </ul>
        </div>
    </nav>
        <div class="kotak">
          <h1 class="mb-0" >             
                School
                <span class="text-primary">library</span>
            </h1>
         
            <div class="register">
               
                    <h3>Create ACCOUNT</h3>
                        <div class="subheading mb-5">
                    <br>
                    <marquee>" Our lives are changed by two things: through the people we love and the books we read      -  <a
                            href="mailto:name@email.com">smkn2banyumas@Gmail.com "</a>
                         - " Our lives are changed by two things: through the people we love and the books we read "     -</marquee>
                </div>
                <section>
                    option
                </section>
                    <form action="" method="post">
                        <table width ="80%">
                            <h5>PERPUSTAKAAN SMK N 2 BANYUMAS</h5>
                            <tr>
                                <td><label for="ussername">Ussername</label></td>
                                <td><input style="width:110% ; margin-top :3px" type="text" name="ussername" id="ussername" required></td><br>
                            </tr>
                            <tr>
                                <td><label for="password">Password</label></td>
                                <td><input style="width:110% ;" type="password" name="password" id="password" required></td>
                            </tr>
                            <tr>
                                <td><label for="password2">Konfirmasi Password</label></td>
                                <td><input style="width:110% ; margin-top :3px"  type="password" name="password2" id="password2" required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button style="width:40% ; margin-top :3px" type="submit" name="register">kirim</button></td> 
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="social-icons">
                    <p id="info">MAKER INFO<br>by.bayu wijiana</p>
                    <a class="social-icon" href="https://twitter.com/BayuEzzio" target="blank"><i
                            class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="https://www.facebook.com/bayu.wijiana" target="blank"><i
                            class="fab fa-facebook-f"></i></a>
                </div>
            </div>

        <hr class="m-0" />
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
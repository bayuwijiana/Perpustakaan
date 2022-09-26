<?php	
include("config.php");

 if(!isset($_SESSION["ussername"])){
        echo "<script>
                     alert('silahkan log in dahulu');
                     window.location ='login.php';
             </script>";
    }
    $ussername="false";
    $isi_komentar="false";
    
    $ussername=$_POST['ussername'];
    $isi_komentar=$_POST['isi_komentar'];

    if($isi_komentar==""){
        echo "<script>
                alert('isi komentar dulu')
                // window.location='menu-usser.php #komentar';
            </script>";
          
    }else{
         
        
    mysqli_query($conn,"INSERT INTO komentar VALUES ('','$ussername','$isi_komentar')");

    header("location:menu-usser.php#komentar");
    }

?>
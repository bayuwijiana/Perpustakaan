<?php	
include ("config.php");

function query($query){ 
    global $conn;

    $result=mysqli_query($conn,$query);
    $rows=[];
    while($row = mysqli_fetch_assoc($result)){
        $rows = $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;

    $ussername=strtolower( $data["ussername"]);
    $password= mysqli_real_escape_string($conn,$data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);
    
    
    // cek ussername sudah ada atau belum

    $result=mysqli_query($conn,"SELECT ussername FROM usser WHERE ussername='$ussername'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Ussername sudah terdaftar')
            </script>";
            return false;
    }

    // konfirmasi password 1 dan 2
    if($password!=$password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai')
            </script>";
            return false;
    }else{
        if($ussername[0]=='1' ||$ussername[0]=='2' ||$ussername[0]=='3'||$ussername[0]=='4' ||$ussername[0]=='5' ||$ussername[0]=='6' ||$ussername[0]=='7' ||$ussername[0]=='8' ||$ussername[0]=='9' ||$ussername[0]=='0'||$ussername[0]=='.'||$ussername[0]=='_' ){
            echo "<script>
                        alert('buat ussename sesuai PANDUAN PENDAFTARAN ,CARAKTER AWAL TIDAK BOLEH ANGKA , _ , !! ');
                            window.location='register.php';
                        </script>";
                    return false;
        }else{
                    $j=strlen($ussername);
                    for($i=0;$i<$j;$i++){
                        if(!preg_match("/^[a-zA-Z0-9_]+/", $ussername[$i])){
                                echo "<script>
                                alert('buat ussename sesuai PANDUAN PENDAFTARAN untuk memudahkan petugas perpus !!! ');
                                     window.location='register.php';
                                </script>";
                            return false;
                        }
                    }
                    // enskripsi password
                    $password=password_hash($password,PASSWORD_DEFAULT);

                    // tambahkan user baru ke data base
                    
                    
                    
                    $status_perpus="tidak meminjam";
                    mysqli_query($conn,"INSERT INTO usser VALUES ('','$ussername','$password','$status_perpus')") or die("Error".mysqli_error($conn));

                    return 1;
                    
        }

    }
}


function registrasiadmin($data){
    global $conn;

    $ussername=strtolower( $data["ussername"]);
    $password= mysqli_real_escape_string($conn,$data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);
    

    // cek ussername sudah ada atau belum

    $result=mysqli_query($conn,"SELECT ussername FROM usser WHERE ussername='$ussername'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Ussername sudah terdaftar')
            </script>";
            return false;
    }

    // konfirmasi password 1 dan 2
    if($password!=$password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai')
            </script>";
            return false;
    }else{
    if($ussername[0]=='1' ||$ussername[0]=='2' ||$ussername[0]=='3'||$ussername[0]=='4' ||$ussername[0]=='5' ||$ussername[0]=='6' ||$ussername[0]=='7' ||$ussername[0]=='8' ||$ussername[0]=='9' ||$ussername[0]=='0'||$ussername[0]=='.'||$ussername[0]=='_' ){
            echo "<script>
                        alert('buat ussename sesuai PANDUAN PENDAFTARAN ,CARAKTER AWAL TIDAK BOLEH ANGKA , _ , .!! ');
                            window.location='registrasi-admin.php';
                        </script>";
                    return false;
        }else{
             $j=strlen($ussername);
                    for($i=0;$i<$j;$i++){
                        if(!preg_match("/^[a-zA-Z0-9_]+/", $ussername[$i])){
                                echo "<script>
                                alert('buat ussename sesuai PANDUAN PENDAFTARAN untuk memudahkan petugas perpus !! ');
                                    window.location='registrasi-admin.php';
                                </script>";
                            return false;
                        }
                    }
                // enskripsi password
                $password=password_hash($password,PASSWORD_DEFAULT);

                // tambahkan user baru ke data base
                
                
                mysqli_query($conn,"INSERT INTO tb_admin VALUES ('','$ussername','$password')") or die("Error".mysqli_error($conn));

                return 1;
                }
    }
}   
    function ubahpasswordadmin($data){
    global $conn;

    $ussername="admin";
    $password= mysqli_real_escape_string($conn,$data["password"]);
    $password2= mysqli_real_escape_string($conn,$data["password2"]);
    

    // konfirmasi password 1 dan 2
    if($password!=$password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai')
            </script>";
            return false;
    }else{

    // enskripsi password
    $password=password_hash($password,PASSWORD_DEFAULT);

    // tambahkan user baru ke data base
    
    mysqli_query($conn,"DELETE FROM tb_admin WHERE ussername='$ussername' ") or die("Error".mysqli_error($conn));

    mysqli_query($conn,"INSERT INTO tb_admin VALUES ('','$ussername','$password')") or die("Error".mysqli_error($conn));

    return 1;
    }


} 


    function tambahbuku($data){
    global $conn;

    $nama_buku=strtoupper(  $data["nama_buku"]);
    $jenis_buku=strtoupper(  $data["jenis_buku"]);
    $stok_buku=$data["stok_buku"];
    $status_buku=strtoupper(  $data["status_buku"]);


     
     $z="false";        
         $j=strlen($nama_buku);
         $x=$j-1;
         for($i=0;$i<$j;$i++){
                $m=$i+1;
                if($m<$j){
                    if($nama_buku[$i]==" " && $nama_buku[$m]==" "){
                        $z="true";        
                    }
                    
                    if($nama_buku[0]==" " || $nama_buku[$x]==" "){
                        $z="true";        
                    }
                }
            }
            
    
    $d=$nama_buku;
    $j=strlen($d);
        for($i=0;$i<$j;$i++){
            if(preg_match("/^[A-Z 0-9]+/",$d[$i])){
                
            }else{
                $z="true";
            }
        }


    if(!preg_match("/^[0-9]*$/",$stok_buku)||$z=="true"){
                    echo "<script>
                    alert('masukan input nama /stok dengan benar ');
                    window.location='menu-admin.php#buku';
                </script>";

    }else{

            if($stok_buku<1){
                        echo "<script>
                            alert('masukan stok minimal 1');
                            window.location='menu-admin.php#buku';
                        </script>";
            }else{


                $y=1;    
                $d=$jenis_buku;
                $j=strlen($d);
                    for($i=0;$i<$j;$i++){
                        if(preg_match("/^[A-Z ]+/",$d[$i])){
                            
                        }else{
                            $y=$y+1;
                        }
                    }
                
                $d=$status_buku;
                $j=strlen($d);
                    for($i=0;$i<$j;$i++){
                        if(preg_match("/^[A-Z ]+/",$d[$i])){
                            
                        }else{
                            $y=$y+1;
                        }
                    }
             
         $j=strlen($jenis_buku);
         $x=$j-1;
         for($i=0;$i<$j;$i++){
                $m=$i+1;
                if($m<$j){
                    if($jenis_buku[$i]==" " && $jenis_buku[$m]==" "){
                        $y=$y+1;     
                    }
                    
                    if($jenis_buku[0]==" " || $jenis_buku[$x]==" "){
                        $y=$y+1;     
                    }
                }
            }
     $j=strlen($status_buku);
         $x=$j-1;
         for($i=0;$i<$j;$i++){
                $m=$i+1;
                if($m<$j){
                    if($status_buku[$i]==" " && $status_buku[$m]==" "){
                        $y=$y+1;     
                    }
                    
                    if($status_buku[0]==" " || $status_buku[$x]==" "){
                        $y=$y+1;     
                    }
                }
            }
     
            
            if($y>1){
                echo "<script>
                        alert(' input jenis /status dengan benar');
                        window.location='menu-admin.php#buku';
                    </script>";
               
            }else{
                   
                
                    mysqli_query($conn,"INSERT INTO buku VALUES ('','$nama_buku','$jenis_buku','$stok_buku','$status_buku')") or die("Error".mysqli_error($conn));

                   
            }
        }
        return 1;
    }
    }
    functIon pinjam($data){
     global $conn;   
        $ussername=$_SESSION["ussername"];
        $jumlah= $data["jumlah"];
        $id_buku=$data["id_buku"];
         $tanggal_peminjaman= $data["tanggal_peminjaman"];
        $status_peminjaman="belum dikonfirmasi";
        
        if(!preg_match("/^[0-9]*$/",$jumlah)){
                    echo "<script>
                    alert('masukan stok dengan benar berupa angka');
                    // window.location='menu-usser.php#buku';
                </script>";

        }else{
                if($jumlah<1){
                            echo "<script>
                                alert('masukan stok minimal 1');
                                window.location='menu-usser.php#buku';
                            </script>";
                }else{
                
                    mysqli_query($conn,"INSERT INTO peminjaman VALUES ('','$ussername','$id_buku','$jumlah','$tanggal_peminjaman','','$status_peminjaman' )") or die("Error".mysqli_error($conn));
                    $zx="MENUNGGU KONFIRMASI";
                    mysqli_query($conn,"UPDATE usser SET status_perpus='$zx' WHERE ussername='$ussername'");
                    return 1;
                }
            }


    }


 function editbuku($data){
     
     
    global $conn;

    $id=$data["id"];
    $nama_buku=strtoupper(  $data["nama_buku"]);
    $jenis_buku=strtoupper(  $data["jenis_buku"]);
    $stok_buku=$data["stok_buku"];
    $status_buku=strtoupper(  $data["status_buku"]);


     
     $z="false";        
         $j=strlen($nama_buku);
         $x=$j-1;
         for($i=0;$i<$j;$i++){
                $m=$i+1;
                if($m<$j){
                    if($nama_buku[$i]==" " && $nama_buku[$m]==" "){
                        $z="true";        
                    }
                    
                    if($nama_buku[0]==" " || $nama_buku[$x]==" "){
                        $z="true";        
                    }
                }
            }
            
    
    $d=$nama_buku;
    $j=strlen($d);
        for($i=0;$i<$j;$i++){
            if(preg_match("/^[A-Z 0-9]+/",$d[$i])){
                
            }else{
                $z="true";
            }
        }


    if(!preg_match("/^[0-9]*$/",$stok_buku)||$z=="true"){
                    echo "<script>
                    alert('masukan input nama /stok dengan benar ');
                    window.location='menu-admin.php#buku';
                </script>";

    }else{

            if($stok_buku<1){
                        echo "<script>
                            alert('masukan stok minimal 1');
                            window.location='menu-admin.php#buku';
                        </script>";
            }else{


                $y=1;    
                $d=$jenis_buku;
                $j=strlen($d);
                    for($i=0;$i<$j;$i++){
                        if(preg_match("/^[A-Z ]+/",$d[$i])){
                            
                        }else{
                            $y=$y+1;
                        }
                    }
                
                $d=$status_buku;
                $j=strlen($d);
                    for($i=0;$i<$j;$i++){
                        if(preg_match("/^[A-Z ]+/",$d[$i])){
                            
                        }else{
                            $y=$y+1;
                        }
                    }
             
         $j=strlen($jenis_buku);
         $x=$j-1;
         for($i=0;$i<$j;$i++){
                $m=$i+1;
                if($m<$j){
                    if($jenis_buku[$i]==" " && $jenis_buku[$m]==" "){
                        $y=$y+1;     
                    }
                    
                    if($jenis_buku[0]==" " || $jenis_buku[$x]==" "){
                        $y=$y+1;     
                    }
                }
            }
     $j=strlen($status_buku);
         $x=$j-1;
         for($i=0;$i<$j;$i++){
                $m=$i+1;
                if($m<$j){
                    if($status_buku[$i]==" " && $status_buku[$m]==" "){
                        $y=$y+1;     
                    }
                    
                    if($status_buku[0]==" " || $status_buku[$x]==" "){
                        $y=$y+1;     
                    }
                }
            }
     
            
            if($y>1){
                echo "<script>
                        alert(' input jenis /status dengan benar');
                        window.location='menu-admin.php#buku';
                    </script>";
               
            }else{
                   
                     mysqli_query($conn,"UPDATE buku SET nama_buku='$nama_buku',jenis_buku='$jenis_buku',stok_buku='$stok_buku',status_buku='$status_buku' WHERE id_buku='$id' ");
                 
                   
            }
        }
        return 1;
    }
    }



?>
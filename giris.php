<html>
<head>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="umega.css">



        </head>
    <body>
<?php
session_start();
session_destroy();
$host="localhost";
$user="root";
$psw="";
$db="randevu";

$conn=mysqli_connect($host,$user,$psw) or die("connect not working");
mysqli_select_db($conn,$db);
mysqli_set_charset($conn,'utf8');

if(isset($_POST['email']) && isset($_POST['pwd'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['pwd']);
    if(!empty($email) && !empty($password)){
        $query="SELECT password,id FROM user WHERE mail = '$email'";
        if($result = mysqli_query($conn,$query)){
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $pwd = $row["password"];
            if($pwd==$password){
                session_start();
                $_SESSION['id']=$row['id'];
                header('Location: anamenu.php');
            }
            else{
                echo "Şifre yanlis";
            }
        } else {
            echo "Kullanici adı yanlıs";
        }
    } else{
        echo 'Boş bırakılmamalı';

    }
}

?>
<a href="giris.php" style="margin: 0 auto; display: block; width: 340px; text-align: center; margin-top: 10px"><img src="logo.png" alt="YTU CE Randevu" style="height: 75px"></a>
<div class="user-page">



    <h1 class="fw-600 mt-0 mb-20">Giriş Yap</h1>
    <form method="post" action="" class="form-horizontal">
        <div class="form-group has-feedback">
            <div class="col-xs-12">
                <input type="text" name="email" value="" aria-describedby="exampleInputEmail" placeholder="EMAİL"  class="form-control rounded"><span aria-hidden="true" class="ti-user form-control-feedback"></span><span id="exampleInputEmail" class="sr-only">(default)</span>
            </div>
        </div>
        <div class="form-group has-feedback">
            <div class="col-xs-12">
                <input type="password" name="pwd" aria-describedby="exampleInputPassword" placeholder="ŞİFRE" class="form-control rounded"><span aria-hidden="true" class="ti-key form-control-feedback"></span><span id="exampleInputPassword" class="sr-only">(default)</span>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-success btn-raised btn-block">GİRİŞ YAP</button>
    </form>
    <hr>
    <div class="form-horizontal">
        <div class="clearfix">
            <div class="pull-left">
                <p class="form-control-static">YENİ HESAP İSTİYORUM?</p>
            </div>
            <div class="pull-right"><a href="kayit.php" class="btn btn-outline btn-default">KAYIT OL</a></div>
        </div>
    </div>
    </body>
</html>
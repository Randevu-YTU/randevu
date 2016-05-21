<html>
<head>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="umega.css">
</head>
<body>
<?php

$host="localhost";
$user="root";
$psw="";
$db="randevu";

$conn=mysqli_connect($host,$user,$psw) or die("connect not working");
mysqli_select_db($conn,$db);
mysqli_set_charset($conn,'utf8');

if(isset($_POST['name']) && isset($_POST['sname'])&& isset($_POST['email'])&& isset($_POST['pwd'])&& isset($_POST['pwd2'])){
    $name=$_POST['name'];
    $sname=$_POST['sname'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $pwd2=$_POST['pwd2'];

    if($pwd==$pwd2) {
        $query = "SELECT id FROM user WHERE mail = '$email'";
        $result=mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==0) {
            $dizi = explode(".", explode("@", $email)[1]);
            if (($dizi[1] == "yildiz") && ($dizi[0] != "std")) {
                $yetki = 2;
            } else {
                $yetki = 1;
            }
            $query = "INSERT INTO user(id,mail,password,fname,lname,yetki) VALUES ('','$email','$pwd','$name','$sname','$yetki')";
            if (mysqli_query($conn, $query)) {
                header('Location: giris.php');
                echo 'Kayit oldunuz';
            } else {
                echo 'olmadi';
            }
        } else {
            echo "Bu mail ile kaydolunmus";
        }
    }
    else{
        echo 'parolalar ayni olmali';
    }
}
mysqli_close($conn);

?>
<a href="kayit.php" style="margin: 0 auto; display: block; width: 340px; text-align: center; margin-top: 10px"><img src="logo.png" alt="YTU CE Randevu" style="height: 75px"></a>
            <div class="user-page">

                <h1 class="fw-600 mt-0 mb-20">Kayıt Ol</h1>
    <form method="post" action="kayit.php" class="form-horizontal">
        <div class="form-group">
            <div class="col-xs-12">
                <input type="text" value="" required placeholder="AD" name="name"  class="form-control rounded">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="text" value="" required placeholder="SOYAD" name="sname"  class="form-control rounded">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="text" value="" required placeholder="EMAİL" name="email" class="form-control rounded">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="password" required placeholder="ŞİFRE" name="pwd" class="form-control rounded">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="password" required placeholder="ŞİFRE TEKRAR" name="pwd2" class="form-control rounded">
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-success btn-raised btn-block">KAYIT OL</button>
    </form>
    <hr>
    <div class="form-horizontal">
        <div class="clearfix">
            <div class="pull-left">
                <p class="form-control-static">BİR HESABINIZ VAR MI?</p>
            </div>
            <div class="pull-right"><a href="giris.php" class="btn btn-outline btn-default">GİRİŞ YAP</a></div>
        </div>
    </div>
</body>
</html>
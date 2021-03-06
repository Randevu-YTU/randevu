<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hesap Bilgilerim</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="bilgiduzenle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: hata.php');
}else {
    $sessionid=$_SESSION['id'];
    $host = "localhost";
    $user = "root";
    $psw = "";
    $db = "randevu";

    $conn = mysqli_connect($host, $user, $psw) or die("connect not working");
    mysqli_select_db($conn, $db);
    mysqli_set_charset($conn, 'utf8');

    $query = "SELECT yetki,password,mail,fname,lname FROM user WHERE id = '$sessionid'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $ad=$row['fname'];
    $soyad=$row['lname'];
    $mail=$row['mail'];
    $psw=$row['password'];
    $yetki=$row['yetki'];

    if(isset($_POST['name']) && isset($_POST['sname']) && isset($_POST['mail'])) {
        $fname = $_POST['name'];
        $lname = $_POST['sname'];
        $email = $_POST['mail'];
        $pwd=$_POST['pwd'];
        $pwd2=$_POST['pwd2'];
        if ($fname != $ad) {
            $query = "UPDATE user SET fname = '$fname' WHERE id = '$sessionid'";
            if (mysqli_query($conn, $query)) {
                header('Location: hesap_bilgileri.php');
                echo "isim degistirildi </br>";
            }
        }
        if ($lname != $soyad) {
            $query = "UPDATE user SET lname='$lname' WHERE id = '$sessionid'";
            if (mysqli_query($conn, $query)) {
                header('Location: hesap_bilgileri.php');
                echo "soyisim degistirildi</br>";
            }
        }
        if ($email != $mail) {

            $query = "UPDATE user SET mail='$email' WHERE id = '$sessionid'";
            if (mysqli_query($conn, $query)) {
                header('Location: hesap_bilgileri.php');
                echo "mail degistirildi</br>";
            }
        }
        if ($pwd == $pwd2){
            if( $pwd!=$psw) {
                $query = "UPDATE user SET password='$pwd' WHERE id = '$sessionid'";
                if (mysqli_query($conn, $query)) {
                    header('Location: hesap_bilgileri.php');
                    echo "sifre degistirildi</br>";
                }
            }
        } else{
            echo "şifreler uyusmuyor";
        }
    }
}
?>
<ul><?php
    echo "<img src='user.png' alt='user' > <p align='center'><br/>".$ad." ".$soyad."</p><br/>";?>
    <ul class="list-unstyled navigation mb-0">
        <li><a href="anamenu.php"><i class="ti-home"></i> Anasayfa</a></li>
        <li><a href="hesap_bilgileri.php" class="active bubble"><i class="ti-home"></i> Hesap Bilgileri</a></li>
        <li class="panel">
            <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3"
               aria-expanded="false" aria-controls="collapse3"
               class="collapsed">
                <i class="ti-ruler-pencil"></i> Randevu Al</a>
            <ul id="collapse3" class="list-unstyled collapse ">
                <li><a href="adim1.php" class="">Adım 1</a></li>
                <li><a href="adim2.php" class="">Adım 2</a></li>
                <li><a href="adim3.php" class="">Adım 3</a></li>
            </ul>
        </li>
        <?php
        if($yetki>1)
            echo"<li><a href='randevuayarla.php'><i class='ti-home'></i> Randevu Ayarla</a></li>";
        ?>
        <li><a href="randevu_gecmisi.php" ><i class="ti-home"></i> Randevu Gecmisi</a></li>
        <li><a href="cikis.php"><i class="ti-home"></i> Cikis</a></li>
    </ul>

</ul>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">
    <form action="hesap_bilgileri.php" style="margin-top:3%;margin-left:20%;margin-right:20%;" method="post">
        <label for="name">Ad</label>
        <input type="text" id="name" name="name" value="<?php echo $ad;?>">

        <label for="sname">Soyad</label>
        <input type="text" id="sname" name="sname" value="<?php echo $soyad;?>">

        <label for="mail">Mail</label>
        <input type="text" id="mail" name="mail" value="<?php echo $mail;?>">

        <label for="pwd">Şifre</label>
        <input type="password" id="pwd" name="pwd" value="<?php echo $psw;?>">
        <label for="pwd2">Şifre Tekrar</label>
        <input type="password" id="pwd2" name="pwd2" value="<?php echo $psw;?>">


        <input type="submit" value="Değiştir">
    </form>
</div>


</body>
</html>
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

    $query = "SELECT password,mail,fname,lname,tc,bdate FROM user WHERE id = '$sessionid'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $ad=$row['fname'];
    $soyad=$row['lname'];
    $mail=$row['mail'];
    $tc=$row['tc'];
    $bdate=$row['bdate'];
    $psw=$row['password'];

    if(isset($_POST['name']) && isset($_POST['sname']) && isset($_POST['mail']) && isset($_POST['tck']) && isset($_POST['birthday'])) {
        $fname = $_POST['name'];
        $lname = $_POST['sname'];
        $email = $_POST['mail'];
        $tck = $_POST['tck'];
        $bday = $_POST['birthday'];
        $pwd=$_POST['pwd'];
        $pwd2=$_POST['pwd2'];
        if ($fname != $ad) {
            $query = "UPDATE user SET fname = '$fname' WHERE id = '$sessionid'";
            if (mysqli_query($conn, $query)) {
                echo "isim degistirildi </br>";
            }
        }
        if ($lname != $soyad) {
            $query = "UPDATE user SET lname='$lname' WHERE id = '$sessionid'";
            if (mysqli_query($conn, $query)) {
                echo "soyisim degistirildi</br>";
            }
        }
        if ($email != $mail) {

            $query = "UPDATE user SET mail='$email' WHERE id = '$sessionid'";
            if (mysqli_query($conn, $query)) {
                echo "mail degistirildi</br>";
            }
        }
        if ($tck != $tc) {

            $query = "UPDATE user SET tc='$tck' WHERE id = '$sessionid'";
            if (mysqli_query($conn, $query)) {
                echo "tck degistirildi</br>";
            }
        }
        if ($bday != $bdate) {

            $query = "UPDATE user SET bdate='$bday' WHERE id = '$sessionid'";
            if (mysqli_query($conn, $query)) {
                echo "dogum tarihi degistirildi</br>";
            }
        }
        if ($pwd == $pwd2){
            if( $pwd!=$psw) {
                $query = "UPDATE user SET password='$pwd' WHERE id = '$sessionid'";
                if (mysqli_query($conn, $query)) {
                    echo "sifre degistirildi</br>";
                }
            }
        } else{
            echo "şifreler uyusmuyor";
        }
    }
}
?>
<ul>

    <li><a href="anamenu.php">Ana Menu</a></li>
    <li><a class="active" href="hesap_bilgileri.php">Bilgilerim</a></li>
    <li><a href="randevualan.php">Randevu Zamanı Seç</a></li>
    <li><a href="ayarlar.php">Ayarlar</a></li>
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

        <label for="tck">TCKimlikNo</label>
        <input type="text" id="tck" name="tck" value="<?php echo $tc;?>">

        <label for="birthday">Doğum Günü  </label>
        <input type="date" id="birthday" name="birthday" value="<?php echo $bdate;?>">



        <input type="submit" value="Değiştir">
    </form>
</div>


</body>
</html>
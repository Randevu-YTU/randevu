<html>
<head>
    <title>Randevu Al</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
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
    $sessionid = $_SESSION['id'];
    $host = "localhost";
    $user = "root";
    $psw = "";
    $db = "randevu";

    $conn = mysqli_connect($host, $user, $psw) or die("connect not working");
    mysqli_select_db($conn, $db);
    mysqli_set_charset($conn, 'utf8');

    $query = "SELECT  yetki,password,mail,fname,lname FROM user WHERE id = '$sessionid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $ad = $row['fname'];
    $soyad = $row['lname'];
    $mail = $row['mail'];
    $psw = $row['password'];
    $yetki = $row['yetki'];
}
?>
<ul><?php
    echo "<img src='user.png' alt='user' > <p align='center'><br/>".$ad." ".$soyad."</p><br/>";?>
    <ul class="list-unstyled navigation mb-0">
        <li><a href="anamenu.php"><i class="ti-home"></i> Anasayfa</a></li>
        <li><a href="hesap_bilgileri.php"><i class="ti-home"></i> Hesap Bilgileri</a></li>
        <li class="panel">
            <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse3"
               aria-expanded="false" aria-controls="collapse3"
               class="collapsed">
                <i class="ti-ruler-pencil"></i> Randevu Al</a>
            <ul id="collapse3" class="list-unstyled collapse ">
                <li><a href="adim1.php" class="">Adım 1</a></li>
                <li><a href="adim2.php" class="">Adım 2</a></li>
                <li><a href="adim3.php" class='active bubble'>Adım 3</a></li>
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

</body>
</html>
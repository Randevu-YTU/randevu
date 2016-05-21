<<<<<<< HEAD
<html lang = "en">

<head>

</head>
<style>
    h2 {
        text-align: center;
        font-size: 40px;
        letter-spacing: 2px;
        font-family: "Arial Black", Gadget, sans-serif;
        color:black;
    }
    ul {
        list-style-type: none;
        margin: auto;
        padding: 0;
        width: 1000px;
        background-color: #d0d7b0;
        line-height: 100px;
        padding: 20px 20px 20px 20px;
    }
    li a {
        display: block;
        color: #000;
        text-decoration: none;
        border: 10px solid #d0d7b0;
        text-align: center;
        letter-spacing: 3px;
        font-size: 40px;
        font-family:"Comic Sans MS", cursive, sans-serif;
    }
</style>
<body style="background-color:#0e7267">
<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: hata.php');
}
?>
<h2>CE RANDEVU SİSTEMİ</h2>
<div >
    <ul>
        <li><a href="randevual.php" style="background-color:green">Randevu Al</a></li>
        <li><a href="randevu_gecmisi.php" style="background-color:blue">Randevu Geçmişi</a></li>
        <li><a href="hesap_bilgileri.php" style="background-color:yellow">Hesap Bilgileri</a></li>
        <li><a href="index.php" style="background-color:red">Çıkış</a></li>
    </ul>
</div>

</body>
=======
<html>
<head>
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: center;
        }

        table {
            width: 10%;
        }

        th, td {
            padding: 30px;
           }
    </style>
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
    $sessionid = $_SESSION['id'];
    $host = "localhost";
    $user = "root";
    $psw = "";
    $db = "randevu";

    $conn = mysqli_connect($host, $user, $psw) or die("connect not working");
    mysqli_select_db($conn, $db);
    mysqli_set_charset($conn, 'utf8');

    $query = "SELECT yetki,password,mail,fname,lname FROM user WHERE id = '$sessionid'";
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
    $gunler = array("Pazartesi", "Sali", "Carsamba", "Persembe","Cuma","Cumartesi","Pazar");
    echo "<img src='user.png' alt='user' > <p align='center'><br/>".$ad." ".$soyad."</p><br/>";?>
            <ul class="list-unstyled navigation mb-0">
                <li><a href="anamenu.php" class="active bubble"><i class="ti-home"></i> Anasayfa</a></li>
                <li><a href="hesap_bilgileri.php"><i class="ti-home"></i> Hesap Bilgileri</a></li>
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
<?php

echo'<table border="2" style="width:75%;margin: 0% 0% 0% 22%;">';
echo"<br><br>";
for($i=-1;$i<19;$i++){
    echo"<tr>";
    for($j=-1;$j<7;$j++){
        if(($i==-1) and ($j!=-1)){
            echo'<td>'.$gunler[$j].'</td>';}
        else if(($j==-1) and ($i!=-1)){
            if($i%2==0){
                $saat=8+$i/2;}
            else{
                $saat=8+$i/2-0.5;
            }
            $dakika=$i*30%60;
            echo"<td>$saat:$dakika</td>";}
        else{
            echo"<td> </td>";
        }
    }
    echo"</tr>";
}
echo"</table>";
?>
</body>
>>>>>>> origin/master
</html>
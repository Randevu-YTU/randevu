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
    if(!isset($_POST['hocaadi'])){
        header('Location: adim1.php');
    }
    else {
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
                <li><a href="adim2.php" class='active bubble'>Adım 2</a></li>
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
$hocaadi=$_POST["hocaadi"];
$dizi = explode(" ",$hocaadi);
$i=0;
$adi=$dizi[$i];
$i++;
while($i<count($dizi)-1){
    $adi=$adi." ".$dizi[$i];
    $i++;
}
$query="SELECT id  FROM user WHERE fname='$adi'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$hocaid = $row["id"];
echo"<p style='margin-left: 20%'> $hocaadi</p>";
$sorgu="SELECT date,duration FROM randevu WHERE hoca_id='$hocaid'";
$sonuc = mysqli_query($conn,$sorgu);
echo'<table border="1" style="width:75%;margin: 0% 0% 0% 22%;padding:10px; text-align:center"><tr><td>Date</td><td>Duration</td></tr>';
while ($row = mysqli_fetch_assoc($sonuc)) {
    echo"<tr>";
    $date=$row["date"];
    $duration=$row["duration"];
    echo "<td>$date</td><td>$duration</td></tr>";
}
echo"</table>";

?>

</body>
</html>
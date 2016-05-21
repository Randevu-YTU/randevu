<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: hata.php');
    exit();
}

$sessionid=$_SESSION['id'];
$host = "localhost";
$user = "root";
$psw = "";
$db = "randevu";

$conn = mysqli_connect($host, $user, $psw) or die("connect not working");
mysqli_select_db($conn, $db);
mysqli_set_charset($conn, 'utf8');

if(isset($_POST['submit'])){
    $startDate=$_POST['startDate'];
    $endDate=$_POST['endDate'];
    $startHour = $_POST['startHour'];
    $endHour = $_POST['endHour'];
    $duration = $_POST['duration'];
    
    if(strtotime($endHour) - strtotime($startHour) > 0){
        $endDate = strtotime($endDate);
        if(isset($_POST['days'])){
            
            $insertRandevuPackage = mysqli_query($conn, "INSERT INTO randevu_package (hoca_id) VALUES ('$sessionid')");
            $packageId = $conn->insert_id;
            if($insertRandevuPackage){
                for($i = strtotime($startDate); $i <= $endDate; $i = strtotime('+1 day', $i)){
                    foreach ($_POST['days'] as $key => $value) {
                        if(stripos(date('l',$i),$value) !== false ){
                            for($j = strtotime($startHour); $j < strtotime($endHour); $j = strtotime('+30 minutes', $j)){
                                $insertDate = date('Y-m-d',$i).' '.date('H:i',$j);
                                $insertHourbyHour = mysqli_query($conn, "INSERT INTO randevu (date,duration,hoca_id,ogr_id,konu,kisi_sayisi,status,ek,p_id) 
                                VALUES ('$insertDate','$duration','$sessionid',0,' ',0,3,' ','$packageId')");
                            }
                        }
                    }
                }
                $_SESSION['message'] = "<p style='margin-left: 22%'> EKLENDİ</p>";
            }
        }
        else
            $_SESSION['message'] = "<p style='margin-left: 22%'> GUN SECMEDİNİZ</p>";
    }
    else
        $_SESSION['message'] = "<p style='margin-left: 22%'> BASLANGIC SAATİ BİTİŞ SAATİNDEN SONRA OLAMAZ</p>";
    
    exit(header('Location: '.$_SERVER["PHP_SELF"]));
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>Randevu Ayarla</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="bilgiduzenle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
    .pattern{
        margin-top:10px;
    }
    .bb{
        padding-bottom: 5px;
        border-bottom: 1px solid grey;
        margin-bottom:5px;
    }
    .clr{
        clear: both;
    }
</style>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
    $(document).ready(function(){
	
        $('#startDate, #num, #weekly, #monthly, #yearly').change(function() {
            if((document.getElementById("weekly").checked || document.getElementById("monthly").checked || document.getElementById("yearly").checked) && ($('#num').val() || $('#startDate').val()))
            calculateEndDate();
        });
        
        function calculateEndDate(){
            var startDate = new Date($('#startDate').val());
            var endDate = new Date(startDate);
            var num = $('#num').val();
            if(document.getElementById("weekly").checked)
                endDate.setTime(endDate.getTime()+num*7*24*60*60*1000);
                
            if(document.getElementById("monthly").checked)
                endDate.setTime(endDate.getTime()+num*30*24*60*60*1000);
                
            if(document.getElementById("yearly").checked)
                endDate.setTime(endDate.getTime()+num*365*24*60*60*1000);

            day = ("0" + endDate.getDate()).slice(-2);
            month = ("0" + (endDate.getMonth() + 1)).slice(-2);
            var end = endDate.getFullYear()+"-"+(month)+"-"+(day);
            $('#endDate').val(end);
        }
        
    });
</script>
</head>
<body>
<?php

    $query = "SELECT yetki,password,mail,fname,lname FROM user WHERE id = '$sessionid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $ad = $row['fname'];
    $soyad = $row['lname'];
    $mail = $row['mail'];
    $psw = $row['password'];
    $yetki = $row['yetki'];

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
                <li><a href="adim3.php" class="">Adım 3</a></li>
            </ul>
        </li>
        <?php
        if($yetki>1)
            echo"<li><a href='randevuayarla.php'  class='active bubble'><i class='ti-home'></i> Randevu Ayarla</a></li>";
        ?>
        <li><a href="randevu_gecmisi.php"><i class="ti-home"></i> Randevu Gecmisi</a></li>
        <li><a href="cikis.php"><i class="ti-home"></i> Cikis</a></li>
    </ul>
</ul>

    <form action="" method="POST" style="margin-left: 22%; margin-right: 20%;">
    <div class="appointment bb">
        <p style="margin:0 0 5px 0">Zaman seçimi</p>
        Start: <select name="startHour">
            <option value="08:00">08:00</option>
            <option value="08:30">08:30</option>
            <option value="09:00">09:00</option>
            <option value="09:30">09:30</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
            <option value="12:00">12:00</option>
            <option value="12:30">12:30</option>
            <option value="13:00">13:00</option>
            <option value="13:30">13:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>
            <option value="16:00">16:00</option>
            <option value="16:30">16:30</option>
        </select>
        
        End: <select name="endHour"> 
            <option value="08:30">08:30</option>
            <option value="09:00">09:00</option>
            <option value="09:30">09:30</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
            <option value="12:00">12:00</option>
            <option value="12:30">12:30</option>
            <option value="13:00">13:00</option>
            <option value="13:30">13:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>
            <option value="16:00">16:00</option>
            <option value="16:30">16:30</option>
            <option value="17:00">17:00</option>
        </select>
        
        Duration: <select name="duration"> 
            <option value="30">30 dakika</option>
        </select>
    </div>

    <div class="pattern bb">
        <p style="margin:0 0 5px 0">Zaman Dilimi</p>
        <div style="float:left">
            <div><input type="radio" id="weekly" name="pattern" required> Haftalık</div>
            <div><input type="radio" id="monthly" name="pattern" required> Aylık</div>
            <div><input type="radio" id="yearly" name="pattern" required> Yıllık</div>
        </div>
        <div style="margin-left:20px;float:left">
            <div>Tekrar sayisi <input type="number" id="num" style="width:35px" required></div>
            <div>
                <div style="float:left;margin-right:10px"><input type="checkbox" name="days[]" value="Monday"> Pazartesi</div>
                <div style="float:left;margin-right:10px"><input type="checkbox" name="days[]" value="Tuesday"> Salı</div>
                <div style="float:left;margin-right:10px"><input type="checkbox" name="days[]" value="Wednesday"> Çarşamba</div>
                <div style="float:left;margin-right:10px"><input type="checkbox" name="days[]" value="Thursday"> Perşembe</div>
                <div style="float:left;margin-right:10px"><input type="checkbox" name="days[]" value="Friday"> Cuma</div>
                <div style="float:left;margin-right:10px"><input type="checkbox" name="days[]" value="Saturday"> Cumartesi</div>
                <div style="float:left;margin-right:10px"><input type="checkbox" name="days[]" value="Sunday"> Pazar</div>
            </div>
        </div>
        <div class="clr"></div>
        </div>
        
        <div class="range bb">
        <p style="margin:0 0 5px 0">Süre uzunluğu</p>
        <div style="float:left">
            Baslangıc: <input type="date" id="startDate" name="startDate" required>
        </div>
        <div style="margin-left:20px;float:left">
            Bitis: <input id="endDate" type="date" name="endDate" readonly>
        </div>
        <div class="clr"></div>
        </div>
        <input type="submit" value="Kaydet" name="submit">
    </form>
    <?php
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
</body>
</html>

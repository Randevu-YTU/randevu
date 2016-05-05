<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ayarlar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="menu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: hata.php');
}
?>
<ul>
    <li><a href="anamenu.php">Ana Menu</a></li>
    <li><a href="hesap_bilgileri.php">Bilgilerim</a></li>
    <li><a href="randevualan.php">Randevu Zamanı Seç</a></li>
    <li><a class="active" href="ayarlar.php">Ayarlar</a></li>
</ul>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">
    <p>Ayarlar</p>
</div>


</body>
</html>
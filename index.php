
<html lang = "en">
<head>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: giris.php');
} else{
    header('Location: anamenu.php');
}
?>
</body>
</html>
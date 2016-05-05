<html>
<head>
 <title>Ana Sayfa</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link rel="stylesheet" href="main.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style="background-color: lightcyan">

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
 echo "Bos bırakilmamalı";
 }
}

?>

<div class="container">
 <div class="login">
  <h1>Giriş</h1>
  <form role="form" method="post">
  <div class="form-group">
   <label for="email">Email:</label>
   <input type="email" class="form-control" id="email" name="email" placeholder="Mail" value="<?php if(isset($_POST['email'])) {$email=$_POST['email'];} else{$email="";}echo $email;?>">
  </div>
  <div class="form-group">
   <label for="pwd">Şifre:</label>
   <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Şifre">
  </div>
  <button type="submit" class="btn btn-default" formaction="index.php">Giriş</button>
  </form>
 </div>
 <div class="login-help">
  <p>Kayıtlı Değil Misin? <a href="kayit.php">Kayıt olmak için tıkla</a>.</p>
 </div>
</div>
</body>
</html>

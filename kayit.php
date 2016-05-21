<html>
<head>
 <title>Kayıt</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style="background-color: lightcyan">
<?php

$host="localhost";
$user="root";
$psw="";
$db="randevu";

$conn=mysqli_connect($host,$user,$psw) or die("connect not working");
mysqli_select_db($conn,$db);
mysqli_set_charset($conn,'utf8');

if(isset($_POST['name']) && isset($_POST['sname']) && isset($_POST['birthday'])&& isset($_POST['gender'])&& isset($_POST['tck'])&& isset($_POST['email'])&& isset($_POST['pwd'])&& isset($_POST['pwd2'])){
 $name=$_POST['name'];
 $sname=$_POST['sname'];
 $birthday=$_POST['birthday'];
 $gender=$_POST['gender'];
 $tck=$_POST['tck'];
 $email=$_POST['email'];
 $pwd=$_POST['pwd'];
 $pwd2=$_POST['pwd2'];
 if(!empty($name) && !empty($sname) && !empty($birthday) && !empty($gender) && !empty($tck) && !empty($email) && !empty($pwd) && !empty($pwd2)){
  if($pwd==$pwd2) {
   $query="INSERT INTO user(id,mail,password,fname,lname,tc,bdate,sex,image,yetki) VALUES ('','".mysqli_real_escape_string($conn,$email)."','".mysqli_real_escape_string($conn,$pwd)."','".mysqli_real_escape_string($conn,$name)."','".mysqli_real_escape_string($conn,$sname)."','".mysqli_real_escape_string($conn,$tck)."','".mysqli_real_escape_string($conn,$birthday)."','".mysqli_real_escape_string($conn,$gender)."','','')";
   if(mysqli_query($conn,$query)){
    header('Location: index.php');
    echo "Kayit oldunuz";
   }
   else{
    "olmadi";
   }
  }
  else{
   echo "parolalar ayni olmali";
  }
 }
 else{
  echo "Doldurmalisin";
 }
}
mysqli_close($conn);

?>


<div class="container">
 <div class="panel panel-default" style="margin-top: 40px;background-color:  rgba(0, 0, 0, 0.08)">
  <div class="panel-heading" style="text-align: center;background-color:  rgba(0, 0, 0, 0.08) ">Kayıt Formu</div>
  <div class="panel-body">
 <form class="form-horizontal" role="form" method="post">
  <div class="form-group">
   <label class="control-label col-sm-2" for="name">Ad</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="name" name="name" placeholder="Ad" value="<?php if(isset($_POST['name'])) {$name=$_POST['name'];} else{$name="";}echo $name;?>">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="sname">Soyad</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="sname" name="sname" placeholder="Soyad" value="<?php if(isset($_POST['sname'])) {$sname=$_POST['sname'];} else{$sname="";}echo $sname;?>">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="birthday">Dogum Tarihi</label>
   <div class="col-sm-10">
    <input type="date" name="birthday" id="birthday">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="gender">Cinsiyet</label>
   <div class="col-sm-10">
    <label><input type="radio" name="gender" value="E">Erkek</label>
    <label><input type="radio" name="gender" value="K">Kadın</label>
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="tck">TcKimlikNo</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="tck" name="tck" placeholder="Tc Kimlik No" value="<?php if(isset($_POST['tck'])) {$tck=$_POST['tck'];} else{$tck="";}echo $tck;?>">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="email">Email:</label>
   <div class="col-sm-10">
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php if(isset($_POST['email'])) {$email=$_POST['email'];} else{$email="";}echo $email;?>">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="pwd">Şifre:</label>
   <div class="col-sm-10">
    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Şifre">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="pwd2">Şifre Yeniden:</label>
   <div class="col-sm-10">
    <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Şifre Yeniden">
   </div>
  </div>
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default" formaction="kayit.php">Kayıt Ol</button>
   </div>
  </div>
 </form>
  </div>
  </div>
</div>
</body>
</html>



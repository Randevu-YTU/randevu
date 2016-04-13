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
<div class="container">
 <div class="panel panel-default" style="margin-top: 40px;background-color:  rgba(0, 0, 0, 0.08)">
  <div class="panel-heading" style="text-align: center;background-color:  rgba(0, 0, 0, 0.08) ">Kayıt Formu</div>
  <div class="panel-body">
 <form class="form-horizontal" role="form">
  <div class="form-group">
   <label class="control-label col-sm-2" for="ad">Ad</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="ad" placeholder="Ad">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="soyad">Soyad</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="soyad" placeholder="Soyad">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="birthday">Dogum Tarihi</label>
   <div class="col-sm-10">
    <input type="date" name="birthday">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="optradio">Cinsiyet</label>
   <div class="col-sm-10">
    <label><input type="radio" name="optradio">Erkek</label>
    <label><input type="radio" name="optradio">Kadın</label>
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="tck">TcKimlikNo</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="tck" placeholder="Tc Kimlik No">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="email">Email:</label>
   <div class="col-sm-10">
    <input type="email" class="form-control" id="email" placeholder="Email">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="pwd">Şifre:</label>
   <div class="col-sm-10">
    <input type="password" class="form-control" id="pwd" placeholder="Şifre">
   </div>
  </div>
  <div class="form-group">
   <label class="control-label col-sm-2" for="pwd2">Şifre Yeniden:</label>
   <div class="col-sm-10">
    <input type="password" class="form-control" id="pwd2" placeholder="Şifre Yeniden">
   </div>
  </div>
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default" formaction="index.php">Kayıt Ol</button>
   </div>
  </div>
 </form>
  </div>
  </div>
</div>
</body>
</html>



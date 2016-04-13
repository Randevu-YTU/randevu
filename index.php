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
<div class="container">
 <div class="login">
  <h1>Giriş</h1>
  <form role="form">
  <div class="form-group">
   <label for="email">Email:</label>
   <input type="email" class="form-control" id="email" placeholder="Mail">
  </div>
  <div class="form-group">
   <label for="pwd">Şifre:</label>
   <input type="password" class="form-control" id="pwd" placeholder="Şifre">
  </div>
  <button type="submit" class="btn btn-default" formaction="anamenu.php">Giriş</button>
  </form>
 </div>
 <div class="login-help">
  <p>Kayıtlı Değil Misin? <a href="kayit.php">Kayıt olmak için tıkla</a>.</p>
 </div>
</div>
</body>
</html>

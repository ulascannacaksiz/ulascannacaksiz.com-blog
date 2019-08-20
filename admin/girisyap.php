<style>
body {
overflow-x: hidden;
overflow-y: hidden;
	height: 500px;
	background-image: url(dist/arkaplan.jpg);
}
.girisyap{
	display: block;
  	width: 50%;
	margin-left: 40%;
	margin-top: 20%;
	}
</style>

<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
</head>
<body>
<div class="girisyap">
<form action="kayit.php?islem=girisyap" method="post">
<div class="form-group col-lg-4">
	<p>
	  <label>Kullanıcı Adı</label>
	  <input type="text" class="form-control" name="email">
	</p>
	<p>
	  <label>Şifre</label>
	  <input type="password" class="form-control" name="sifre"><br>
	  <input type="submit" class="btn btn-info" value="Giriş yap">
    </p>
	</div>
</form>
	</div>

</body>
</html>
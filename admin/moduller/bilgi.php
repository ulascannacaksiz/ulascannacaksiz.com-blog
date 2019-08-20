<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>
<body>

<?php 
	
include 'ayar/baglan.php';
 if(isset($_SESSION["girisyap"]))  
 { 
	echo $uye_adi .'<br>';
	echo $kullanici_tur .'<br>';
	//$id=$uyeid;
	$id=$uye_id;
	echo $id;
	 
	} 
	else{  
      header("location:index.php");  
 }  
	$query=$db->query("SELECT * From uyeler where id=$id",PDO::FETCH_ASSOC);
		foreach($query as $row){
			$isim=$row['isim'];
			$soyisim=$row['soyisim'];
			$eposta=$row['eposta'];
			$kullanici_tur=$row['kullanici_tur'];
		}
	?>
	
	<form action="?sayfa=kayit&islem=guncelle" method="post">
	<div class="form-group col-md-5">
<label>İsim</label>
<input type="text" class="form-control" name="isim" value="<?php echo $isim;?>">
<label>Soyisim</label>
<input type="text" class="form-control" name="soyisim" value="<?php echo $soyisim;?>">
<label>Eposta</label>
<input type="text" class="form-control" name="eposta" value="<?php echo $eposta;?>">
<label>Şifre</label>
<input type="password" class="form-control" name="sifre" value="">
<label>Kullanıcı Türü</label>
<input type="text" class="form-control" name="kullanici_tur" value="<?php echo $kullanici_tur;?>" disabled><br>
<input type="hidden" name="id" value="<?php echo $id?>">
	<input type="submit" class="btn btn-microsoft" value="Bilgileri Güncelle">
</div>
	</form>


</body>
</html>
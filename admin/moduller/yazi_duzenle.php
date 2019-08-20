  <link rel="stylesheet" href="../../style/style.css">
    <section class="content container-fluid">
<div class="col-md-8">
<div class="jumbotron">
<?php
	//$query=$db->query("Select *from yazilar",PDO::FETCH_ASSOC);
	$query=$db->query("SELECT yazi,yid,baslik,kategori_id,resimler.yazi_id,resimler.kapak,resimler.url from resimler INNER JOIN yazilar on resimler.yazi_id=yazilar.yid WHERE kapak = 1",PDO::FETCH_ASSOC);
	
	//$query=$db->query("SELECT yazi,yazilar.id,yazilar.baslik,yazilar.kategori_id,resimler.yazi_id,resimler.kapak,resimler.url from yazilar INNER JOIN resimler on yazilar.id=resimler.yazi_id where id=$id",PDO::FETCH_ASSOC);

	$sorgu=$db->query("Select *from kategori",PDO::FETCH_ASSOC);
	foreach($query as $row){
		$resim=$row['url'];
		$baslik=$row['baslik'];
		$yazi=$row['yazi'];
		$id=$row['yid'];
		$konum="/file/";
	
?>

<div class="card col-md-8">
<br>
<img src="<?php echo $konum.$resim;?>" width="630px" height="300px">
  <h3 class="baslik"><?php echo $baslik;?></h3>
	<p class="tanitim"> <?php echo substr($yazi,0,300);//ilk üçyüz karekteri getirir?></p>
 <a class="btn btn-primary btn-md" style="float: right;" href="?sayfa=duzenle&id=<?php echo $id;?>" role="button">DÜZENLE</a>
 <a class="btn btn-danger btn-md" style="float: right;" href="?sayfa=resimup&islem=sil&id=<?php echo $id?>" role="button">SİL</a>

</div>
  <?php }?>
  
  </div>
  </div>
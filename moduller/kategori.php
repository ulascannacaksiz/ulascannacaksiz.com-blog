<?php
$asd=$db->prepare("SELECT * From ayar");
$asd->execute();
$r=$asd->fetch(PDO::FETCH_ASSOC);
	$fa=$r['facebook'];
	$in=$r['instagram'];
	$tw=$r['twitter'];
	$yo=$r['youtube'];
	$li=$r['linkedin'];
	$ha=$r['hakkinda_text'];
	$fo=$r['footer_text'];
	$hk=$r['hakkinda_resim'];
	$du=$r['duyuru_durum'];
	$dt=$r['duyuru_tip'];
	$dm=$r['duyuru_text'];



?>
<div class="row">
<div class="col-md-8">
<div class="jumbotron">
<?php
	//$gelen_deger=$_POST['ara'];
	//$query=$db->query("SELECT * FROM yazilar where yazi or baslik like '%$gelen_deger%'",PDO::FETCH_ASSOC);
	//$query=$db->query("SELECT * FROM yazilar where baslik  like '%$gelen_deger%' ||  yazi like '%$gelen_deger%' ",PDO::FETCH_ASSOC);
$kate=$db->prepare("Select *from kategori ");
$kate->execute();


	$query=$db->prepare("SELECT yazi,yid,sef,baslik,kategori_id,resimler.yazi_id,resimler.kapak,resimler.url,tag from yazilar  INNER JOIN resimler on resimler.yazi_id=yazilar.yid INNER JOIN kategori on kategori.id=yazilar.kategori_id WHERE tag=? and kapak = 1 ");
	$query->execute([$_GET['tag']]);
	


	while($row=$query->fetch(PDO::FETCH_ASSOC)){
		$resim=$row['url'];
		$baslik=$row['baslik'];
		$yazi=$row['yazi'];
		$id=$row['yid'];
		$sef=$row['sef'];
		$konum="/file/";

?>

	<div class="card">
	<img src="<?php echo $konum.$resim;?>">
  <h3 class="baslik"><?php echo $baslik;?></h3>
  <p class="tanitim"> <?php echo substr($yazi,0,300);//ilk üçyüz karekteri getirir?></p>
  <hr class="my-4">

  <p class="lead">
<a class="btn btn-primary btn-md" style="float: right;" href="?page=yazi&sef=<?php echo $sef;?>" role="button">Devamını Oku</a>  </p> 

  </div>

  <?php }//foreachın parantezi döngü ile çektik?>

  </div>
</div>

<div class="col-md-4">
<div class="sagpanel">
<h3 class="widget-title">Hakkımda</h3>
<p class="widget_about_avatar">
<img src="<?php echo $hk;?>" height="200" width="200">
</p>
<p class="widget-yazi">
<?php echo $ha;?>
 </p>
  <hr class="my-4">
  <h3 class="widget-title">Popüler Gönderiler</h3>
  <h3 class="widget-title">Kategoriler</h3>
  <ul class="kategori">
  <?php while($gel=$kate->fetch(PDO::FETCH_ASSOC)) {
	  echo  '<a href="?page=kategori&tag='.$gel['tag'].'"><li class="cat-item cat-item-1">'.$gel['aciklama'] .'</li></a>'; //;
}
	  ?>

	</ul>
  
</div>


</div>

</div>





<div class="footer">


<div class="mail col-md-4">
Mail Bültenine Abone olarak son yazılardan haberdar ol<br>
	<div id="mailbulten"></div>
<form id="mailEkle" method="post">
<input type="mail" id="mail" class="form-control" name="mail"><br>
<input type="submit" class="btn btn-success" id="Gonder" value="Gönder">
	</div></form>

<div class="sosyal">
Sosyal medya hesaplarım <br>
	<a href="<?php echo $fa?>"><i class="fab fa-facebook fa-2x"></i></a>
	<a href="<?php echo $tw?>"><i class="fab fa-twitter fa-2x"></i></a>
	<a href="<?php echo $in?>"><i class="fab fa-instagram fa-2x"></i></a>
	<a href="<?php echo $li?>"><i class="fab fa-linkedin fa-2x"></i></a>
	<a href="<?php echo $yo?>"><i class="fab fa-youtube fa-2x"></i></a>
</div>
<div class="link">
Test Linkleri:<br>
	<a href="">Hakkımda</a><br>
	<a href="">İletişim</a><br>
	<a href="">TEST</a><br>

</div>
<div class="foot-text">
	<center>"Filozoflar dünyayı yalnızca değişik biçimlerde yorumladılar, oysa asıl sorun onu değiştirmektir.” Karl Marx <br></center>
	<center>“Şimdiki zaman onlara ait olabilir, ama gelecek, ki ben hep bunun için çalıştım, bana ait.” Nikola Tesla<br></center>
	<center>© 2019 Copyright Tüm hakları saklıdır. Ulaş Can Nacaksız </center>
</div>
	</div>
	</div>
	</div>
	<script type="text/javascript">
		$("#Gonder").on("click",function(event){
			event.preventDefault();
			var data = $('input[name="mail"]').val();
		$.ajax({
			url:"bos.php?page=mail_bulten",
		type:"POST",
			data:"deger="+data,
			success:function(cevap){
				$("#mailbulten").html(cevap).hide.fadeIn(700);
				$("#mailEkleAlert").html(cevap).hide().fadeIn(700);
				$("#Gonder").addClass("btn btn-danger");
				$("#mail").hide(1000).fadeIn(1000);
				$("#Gonder").hide(1000).fadeIn(1000);
			}
		});
		
		
		});
		
</script>
<?php

$asd=$db->prepare("SELECT * From ayar");
$asd->execute();
$rt=$asd->fetch(PDO::FETCH_ASSOC);
	$fa=$rt['facebook'];
	$in=$rt['instagram'];
	$tw=$rt['twitter'];
	$yo=$rt['youtube'];
	$li=$rt['linkedin'];
	$ha=$rt['hakkinda_text'];
	$fo=$rt['footer_text'];
	$hk=$rt['hakkinda_resim'];
	$du=$rt['duyuru_durum'];
	$dt=$rt['duyuru_tip'];
	$dm=$rt['duyuru_text'];




$sorgu=$db->prepare("SELECT yazi,yid,yazar_id,tarih,baslik,kategori_id,resimler.yazi_id,resimler.kapak,resimler.url from resimler INNER JOIN yazilar on resimler.yazi_id=yazilar.yid WHERE sef=? and kapak = 1");
$sorgu->execute([$_GET['sef']]);

$kate=$db->prepare("Select *from kategori ");
$kate->execute();

$veri=$sorgu->fetch(PDO::FETCH_ASSOC);
if(!$veri){
	header("location:?page=index");
}
	$yazi= $veri['yazi'];
	$baslik = $veri['baslik'];
	$resim=$veri['url'];
	$yazar=$veri['yazar_id'];
	$konum="/file/";
	$tarih=$veri['tarih'];

		$srg=$db->prepare("Select * From uyeler where id=?");
		$srg->execute([$yazar]);
		$r=$srg->fetch(PDO::FETCH_ASSOC);
		$isim=$r['isim'];
		$soyisim=$r['soyisim'];
	
		?>
<div class="row">
	<div class="col-md-12"><br>
	  <div class="row">
<div class="col-md-8">
		  <h3 class="baslik"><?php echo $baslik;?></h3>
		  <h6 class="yazarbilgi"><?php echo $isim." ".$soyisim.'<br>'.$tarih;?></h6>
		<img src="<?php echo $konum.$resim;?>" width="760px">
	<div class="yazi">
<?php echo $yazi;?>
</div>
</div>
<!-- kategori divi --->
<div class="col-md-4">
<div class="sagpanel">
<h3 class="widget-title">SON GÖNDERİLER</h3>
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
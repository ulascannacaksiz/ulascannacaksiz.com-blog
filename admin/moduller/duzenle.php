<!DOCTYPE html>
<?php 	include 'ayar/baglan.php'; 
	if(!isset($_GET['id'])||empty($_GET['id'])){
			header("location:?sayfa=yazi_duzenle");
		//id boş gönderirse indexe yönlendiriyor!
		}

			$sorgu=$db->prepare("SELECT yid,yazi,baslik,kategori_id,resimler.id, resimler.kapak, resimler.url, resimler.yazi_id FROM yazilar INNER JOIN resimler on yazilar.yid=resimler.yazi_id where yid=?");
			$sorgu->execute([$id]);
			$gl=$sorgu->fetch(PDO::FETCH_ASSOC);
		if(!$gl){
		header("location:?sayfa=yazi_duzenle");
			}

				$yazi = $gl['yazi'];
				$baslik = $gl['baslik'];
				$kt= $gl['kategori_id'];
				$rsm=$gl['url'];
				
	

$konum="/file/";
?>
    <section class="content container-fluid">




<form action="?sayfa=resimup&islem=guncelle&id=<?php echo $id?>" method="post">
<div class="alan" style="align-items: center">
	<div class="form-group">
		<input type="text" class="form-control col-md-4" name="baslik" value="<?php echo  $baslik;?>">
	</div>	
	<div class="form-group">
		<input type="text" class="form-control col-md-4" name="kapak_rs" value="<?php echo  $rsm;?>">
	</div>
	<div class="form-group">
		<select class="form-control col-md-4" name="kategori">
			<?php 
			$query=$db->query("Select * from kategori",PDO::FETCH_ASSOC);
			//echo '<option selected value="">'.$kt.'</option>';
			foreach($query as $row){
				
				$Kate_id=$row['id'];
				$aciklama=$row['aciklama'];
				echo '<option value="'.$row['id'].'">'.$row['aciklama'].'</option>';
			}


			
			?>
			
		</select>
		
	</div>
	
	<div class="form-group col-8">
	<textarea name="content" class="ckeditor" rows="50" id="editor">
		<?php echo  $yazi;?>
	  </textarea>
	</div>


	<p><input type="submit" class="btn btn-info" value="YAZIYI GÖNDER">
	</p>
	</div>

		<input type="file" id="resim" /> <br />

		<div class="resim"></div>


	<script type="text/javascript">
		$(function(){
		
				$("#resim").change(function(){//her hangi bir şey seçilirse
					var resim=document.getElementById ("resim");//resime eriş
					
					if (resim.files && resim.files[0]){//veri var mı kontrol ediyoruz.
						var veri=new FileReader();//apiyi başlatıyoruz.
						veri.onload=function() {//aşağıda dosya verisini okuyoruz.Eğer veri okunmuşsa
							var resimveri=veri.result;//veriyi al
							
								$.post("moduller/yukle.php",{"veri":resimveri},function(resim){//kayit.php yolluyoruz.
									$(".resim").html(resim);//kayit php den dönen veri ile resimi çizdiriyoruz.Geri dönen veri resim urlsi.
								})
						}
						veri.readAsDataURL(resim.files[0]);//veriyi okuyoruz.
					}
				});
				
		})
	</script>
	</body>

</html>
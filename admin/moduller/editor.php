<!DOCTYPE html>
<?php 	include 'ayar/baglan.php'; ?>
    <section class="content container-fluid">




<form action="?sayfa=resimup&islem=ekle&" method="post">
<div class="alan" style="align-items: center">
	<div class="form-group">
		<input type="text" class="form-control col-md-4" name="baslik" value="BAŞLIK">
	</div>	
	<div class="form-group">
		<input type="text" class="form-control col-md-4" name="kapak_rs" value="Resim.jpg">
	</div>
	<div class="form-group">
		<select class="form-control col-md-4" name="kategori">
			<?php 
			$query=$db->query("Select * from kategori",PDO::FETCH_ASSOC);
			foreach($query as $row)
				
				echo '<option value="'.$row['id'].'">'.$row['aciklama'].'</option>';
			
			?>

		</select>
		
	</div>
	<div class="form-group col-8">
	<textarea name="content" class="ckeditor" id="editor"> </textarea>
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
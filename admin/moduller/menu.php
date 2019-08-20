<section class="content container-fluid">
<div class="form-group col-md-4">
	<h4><center><span>MENÜ EKLE</span></center></h4>
<form action="?sayfa=menu_ayar&islem=ekle" method="post">
	<label>Menü İsim</label>
	<input type="text" class="form-control" name="aciklama">	<br>

	<label>Menü Link</label>
	<input type="text" class="form-control" name="url">	<br>
	<label>Menü Siralama</label>
	<input type="text" class="form-control" name="siralama"><br>
<input type="submit" class="btn btn-success" value="Gönder">
	</form>
	</div>
	
	
	
		
	<table class="table">
  <thead>
   
    <tr>
      <th scope="col">id</th>
      <th scope="col">Menu isim</th>
      <th scope="col">Link</th>
      <th scope="col">Sıralama</th>
    </tr>
  </thead>
    <tbody>
    <?php 
		$query=$db->query("Select * from menu",PDO::FETCH_ASSOC);
		foreach($query as $r){
			$id=$r['menu_id'];
	echo'<tr>';
    echo'<th scope="row">'.$r['menu_id'].'</th>';
     echo '<td>'.$r['menu_aciklama'].'</td>';
     echo '<td>'.$r['menu_url'].'</td>';
     echo '<td>'.$r['siralama'].'</td>';
	echo '<td><a href="" class="duzenle1" data-toggle="modal" rel="'.$id.'" data-target="#exampleModalCenter">DÜZENLE</a> || 
	<a href="" class="sil"  rel="'.$id.'" >SİL</a></td>';		
   echo '</tr>';
		}
			
		?>
</tbody>

<div class="modal fade" id="duzenle" tabindex="-1" role="dialog" aria-labelledby="düzenle" aria-hidden="true">
<div id="modal_sonuc"></div>
		</div>
<div class="modal fade" id="sil" tabindex="-1" role="dialog" aria-labelledby="sil" aria-hidden="true">
<div id="modal_sonuc1"></div>
</div>
<script>	
$(".duzenle1").click(function(){
	var id = $(this).attr("rel");
	$.get("bos.php?sayfa=menu_duzenle&id="+id,function(data){
		$("#modal_sonuc").html(data);
		$("#duzenle").modal("show");
	});
	return false;
});	
	</script>
	


   <script>

$(".sil").click(function(){
	var id = $(this).attr("rel");
	$.get("bos.php?sayfa=menu_sil_modal&id="+id,function(data){
		$("#modal_sonuc1").html(data);
		$("#sil").modal("show");
	});
	return false;
});	
	</script>


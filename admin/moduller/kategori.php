<section class="content container-fluid">
<div class="form-group col-md-4">
	<h4><center><span>KAREGORİ EKLE</span></center></h4>
<form action="?sayfa=kategori_ayar&islem=ekle" method="post">
	<label>Kategori Açıklama</label>
	<input type="text" class="form-control" name="aciklama">	<br>
<input type="submit" class="btn btn-success" value="Gönder">
	</form>
	</div>
	


	<table class="table">
  <thead>
   
    <tr>
      <th scope="col">id</th>
      <th scope="col">KATEGORİ</th>
    </tr>
  </thead>
    <tbody>
    <?php 
		$query=$db->query("Select * from kategori",PDO::FETCH_ASSOC);
		foreach($query as $r){
			$id=$r['id'];
	echo'<tr>';
    echo'<th scope="row">'.$r['id'].'</th>';
     echo '<td>'.$r['aciklama'].'</td>';
	echo '<td><a href="" class="duzenle1" data-toggle="modal" rel="'.$id.'" data-target="#exampleModalCenter">DÜZENLE</a>';		
   echo '</tr>';
		}
			
		?>
</tbody>

<div class="modal fade" id="duzenle" tabindex="-1" role="dialog" aria-labelledby="düzenle" aria-hidden="true">
<div id="modal_sonuc"></div>
		</div>
<script>
$(".duzenle1").click(function(){
	var id = $(this).attr("rel");
	$.get("bos.php?sayfa=kategori_modal&id="+id,function(data){
		$("#modal_sonuc").html(data);
		$("#duzenle").modal("show");
	});
	return false;
});	
	</script>
 <?php
$id = $_GET["id"];
 //echo $uid;

		$query=$db->query("Select * from kategori where id=$id",PDO::FETCH_ASSOC);
		foreach($query as $r){
			$id=$r["id"];
			$aciklama=$r["aciklama"];
		}
?>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="düzenleaciklama">KATEGORİ SİL YADA GÜNCELLE  ONAYLA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               <form action="bos.php?sayfa=kategori_ayar&islem=guncelle" method="post">
			
				
					<div class="form-group col-md-9">
					<label for="baslik">SİL YADA GÜNCELLE </label>
					<input type="text" name="aciklama" id="aciklama" class="form-control" value="<?php echo $aciklama;?>">

					<input type="hidden" name="id" value="<?php echo $id?>">
				</div>

	<div class="input-group mb-3 col-md-5">
			<input type="submit" name="guncelle" id="guncelle" class="btn btn-success" value="GÜNCELLE">
		<a href="bos.php?sayfa=kategori_ayar&islem=sil&id=<?php echo $id?>" name="sil" id="sil" class="btn btn-danger" >SİL</a>
			
		</div>
		</form>
			  
      </div>
    </div>
  </div>
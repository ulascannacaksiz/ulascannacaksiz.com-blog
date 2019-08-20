 <?php
$id = $_GET["id"];
 //echo $uid;

		$query=$db->query("Select * from menu where menu_id=$id",PDO::FETCH_ASSOC);
		foreach($query as $r){
			$id=$r["menu_id"];
			$menu_aciklama=$r["menu_aciklama"];
			$url=$r["menu_url"];
			$siralama=$r["siralama"];
		}
?>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="düzenleaciklama">Menüyü SİLMEYİ ONAYLA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               <form action="bos.php?sayfa=menu_ayar&islem=sil" method="post">
			
				
					<div class="form-group col-md-9">
					<label for="baslik">BAŞLIK </label>
					<input type="text" name="aciklama" id="aciklama" class="form-control" value="<?php echo $menu_aciklama;?>">
					<input type="text" name="url" id="url" class="form-control" value="<?php echo $url;?>">
					<input type="text" name="siralama" id="siralama" class="form-control" value="<?php echo $siralama;?>">
					<input type="hidden" name="id" value="<?php echo $id?>">
				</div>

	<div class="input-group mb-3 col-md-5">
			<input type="submit" name="sil" id="sil" class="btn btn-danger" value="SİL">
		</div>
		</form>
			  
      </div>
    </div>
  </div>
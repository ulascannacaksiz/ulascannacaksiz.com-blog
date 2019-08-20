<?php
$query=$db->query("SELECT * From ayar",PDO::FETCH_ASSOC);
foreach($query as $r){
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
}


?>
<section class="content container-fluid">
<div class="form-group col-md-5">
<form action="?sayfa=ayarkayit" method="post">
	<label>Facebook</label>
	<input type="text" name="face" class="form-control" value="<?php echo $fa ?>"><br>
	<label>İnstagram</label>
	<input type="text" name="insta" class="form-control" value="<?php echo $in ?>"><br>
	<label>Linkedin</label>
	<input type="text" name="linked" class="form-control" value="<?php echo $li ?>"><br>
	<label>Twitter</label>
	<input type="text" name="twit" class="form-control" value="<?php echo $tw ?>tw"><br>
	<label>Youtube</label>
	<input type="text" name="you" class="form-control" value="<?php echo $yo ?>"><br>
	<label>Footer Text</label>
	<input type="text" name="foot_text" class="form-control" value="<?php echo $fo ?>"><br>
	<label>Hakkinda Açıklama</label>
	<input type="text" name="hakkinda" class="form-control" value="<?php echo $ha ?>"><br>
	<label>Hakkinda resim url</label>
	<input type="text" name="hk_url" class="form-control" value="<?php echo $hk ?>"><br>
	<label>Duyuru Durum</label>
	<input type="radio" name="drm"  value="" <?php if ($du==0){echo'checked';} ?>>PASİF||
	<input type="radio" name="drm"  value="1"<?php if ($du==1){echo'checked';} ?> >AKTİF<br>
	<label>Duyuru Tip</label>
	<select class="form-control" name="duy_tip">
		<option selected><?php echo $dt ?></option>
		<option>primary</option>
		<option>secondary</option>
		<option>success</option>
		<option>danger</option>
		<option>warning</option>
		<option>info</option>
		<option>light</option>
		<option>dark</option>

	</select>
	<label>Duyuru Text</label>
	<input type="text" name="duyuru_text" class="form-control" value="<?php echo $dm ?>">
	<input type="submit" class="btn btn-info" value="Gönder">
	</form>
	</div>
	
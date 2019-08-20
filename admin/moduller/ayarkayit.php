<?php
//if ( !empty( $_POST ) ) {
		$fa = $_POST[ "face" ];
		$in = $_POST[ "insta" ];
		$li = $_POST[ "linked" ];
		$yo = $_POST[ "you" ];
		$tw = $_POST[ "twit" ];
		$fo = $_POST[ "foot_text" ];
		$ha = $_POST[ "hakkinda" ];
		$hk = $_POST[ "hk_url" ];
		$du = $_POST[ "drm" ];
		$dt = $_POST[ "duy_tip" ];
		$dm = $_POST[ "duyuru_text" ];
	
		//$id = $_POST[ 'id' ];
		$query = $db->prepare( "UPDATE ayar SET 
		facebook=?,instagram=?,linkedin=?,twitter=?,youtube=?,footer_text=?,hakkinda_text=?,
		hakkinda_resim=?,duyuru_durum=?,duyuru_tip=?,duyuru_text=? " );
		$update = $query->execute( array( "$fa", "$in", "$li", "$tw", "$yo", "$fo", "$ha", "$hk", "$du", "$dt", "$dm" ) );
		if ( $update ) {
			print "güncelleme başarılı!";
			
			header( "location:?sayfa=ayar" );
		} else {
			echo "HATAAAAAAAA";
			header( "location:?sayfa=ayar" );
		}
//}








?>
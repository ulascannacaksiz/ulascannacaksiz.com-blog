<?php
include 'ayar/baglan.php';
function sef_link($string)
    {
        $turkce=array("ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ğ", "Ğ", "İ");
        $duzgun=array("s", "s", "i", "u", "u", "o", "o", "c", "c", "g", "g", "i");
        $string = str_replace($turkce, $duzgun, $string);
        $string = trim($string);
        $string = html_entity_decode($string);
        $string = strip_tags($string);
        $string = strtolower($string);
        $string = preg_replace('~[^ a-z0-9_.]~', ' ', $string);
        $string = preg_replace('~ ~', '-', $string);
        $string = preg_replace('~-+~', '-', $string);
    
        return $string;
}


$islem=$_GET['islem'];
switch($islem){
	case "ekle";
$uye_id;
$editor_data = $_POST['content'];
$baslik=$_POST['baslik'];
$tarih= date("d/m/Y");
$kategori_id=$_POST['kategori'];
$kapak_rs=$_POST["kapak_rs"];
$sef=sef_link($baslik);		
$query=$db->prepare("INSERT into yazilar SET yazar_id=?,baslik=?,yazi=?,tarih=?,kategori_id=?,sef=?");
	$insert=$query->execute(array("$uye_id","$baslik","$editor_data","$tarih","$kategori_id","$sef"));

	if($insert){
		$last_id = $db->lastInsertId();
		print"YAZI BAŞARIYLA Kayıt edildi".$editor_data;
		$url="/admin/?sayfa=yazi_duzenle";
		header("Refresh: 3; url=$url"); 
	}
$yol='file/';
$query=$db->prepare("INSERT into resimler SET yazi_id=?,yol=?,url=?,kapak=?");
$insert=$query->execute(array("$last_id","$yol","$kapak_rs","1"));
	break;
	
	case "guncelle":
		$id=$_GET['id'];
		$uye_id;
$editor_data = $_POST['content'];
$baslik=$_POST['baslik'];
$tarih= date("d/m/Y");
$kategori_id=$_POST['kategori'];
$kapak_rs=$_POST["kapak_rs"];
$query = $db->prepare("UPDATE yazilar SET yazar_id=?,baslik=?,yazi=?,tarih=?,kategori_id=? where yid=$id");
$update = $query->execute(array("$uye_id","$baslik","$editor_data","$tarih","$kategori_id"));
if ( $update ){
     print "güncelleme başarılı!";
	$url="/admin/?sayfa=yazi_duzenle";
	header("Refresh: 3; url=$url"); 
}
$yol='file/';
$query=$db->prepare("UPDATE  resimler SET url=? where yazi_id = $id");
$insert=$query->execute(array("$kapak_rs"));	
	break;
		
	case"sil":
$query = $db->prepare("DELETE FROM yazilar WHERE yid = :id");
$delete = $query->execute(array(
   'id' => $_GET['id']
));
if ( $delete ){
     print "silme işlemi başarılı!";
			$url="/admin/?sayfa=yazi_duzenle";
			header("Refresh: 3; url=$url"); 
	break;
}
}





?>
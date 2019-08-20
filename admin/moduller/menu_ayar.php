<?php
$islem=$_GET["islem"];
$url1 = "/admin/?sayfa=menu";
switch($islem){
		
	case "ekle":		
		$ac = $_POST["aciklama"];
		$url = $_POST["url"];
		$sira = $_POST["siralama"];
	$query=$db->prepare("INSERT into menu SET menu_aciklama=?,
	menu_url=?,
	siralama=?");
	$insert=$query->execute(array("$ac","$url","$sira"));
	if($insert){
		$last_id = $db->lastInsertId();
		print"Menü başarıyla kayıt edildi";
		header( "Refresh: 3; url=$url1" );
	}else{
		echo("hata");
		header( "Refresh: 3; url=$url1" );
	}
	break;
	case"guncelle":
		$id=$_POST["id"];
		$aciklama=$_POST["aciklama"];
		$url=$_POST["url"];
		$siralama=$_POST["siralama"];
		$query = $db->prepare( "UPDATE menu SET menu_aciklama=?,menu_url=?,siralama=? where menu_id=$id");
		$update = $query->execute(array("$aciklama","$url","$siralama"));
		if($update){
			echo"başarılı";
			
			header( "Refresh: 3; url=$url1" );
		}else{
			echo "hataaa";
			header( "Refresh: 3; url=$url1" );
		}
		break;
	case"sil":
$query = $db->prepare("DELETE FROM menu WHERE menu_id = :id");
$delete = $query->execute(array(
   'id' => $_POST['id']
));
if ( $delete ){
     print "silme işlemi başarılı!";
			
			header("Refresh: 3; url=$url1"); 
	break;
}
		
		
}

?>
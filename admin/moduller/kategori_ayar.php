<?php
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


$islem=$_GET["islem"];
$url1 = "/admin/?sayfa=kategori";
switch($islem){
		
	case "ekle":		
		$ac = $_POST["aciklama"];
		$sef=sef_link($ac);		
	$query=$db->prepare("INSERT into kategori SET aciklama=?,tag=?");
	$insert=$query->execute(array("$ac","$sef"));
	if($insert){
		$last_id = $db->lastInsertId();
		print"Kategori başarıyla kayıt edildi";
		header( "Refresh: 3; url=$url1" );
	}else{
		echo("hata");
		header( "Refresh: 3; url=$url1" );
	}
	break;
	case "guncelle":
		$aciklama = $_POST["aciklama"];
		$sef=sef_link($aciklama);	
		$id=$_POST["id"];
		$query = $db->prepare( "UPDATE kategori SET aciklama=?,tag=? where id=$id");
		$update = $query->execute(array("$aciklama","$sef"));
		if($update){
			echo"başarılı";
			
			header( "Refresh: 3; url=$url1" );
		}else{
			echo "hataaa";
			header( "Refresh: 3; url=$url1" );
		}
		break;
		
		case"sil":
$query = $db->prepare("DELETE FROM kategori WHERE id = :id");
$delete = $query->execute(array(
   'id' => $_GET['id']
));
if ( $delete ){
     print "silme işlemi başarılı!";
			
			header("Refresh: 3; url=$url1"); 
	break;
}	
		
		
		
		
		
		
}
?>
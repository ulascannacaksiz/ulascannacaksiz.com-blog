
<?php
	include 'ayar/baglan.php';
	$islem = $_GET["islem"];
	switch($islem){
		case "kayit" :
if (!empty($_POST)) {
	$isim=$_POST["isim"];
	$soyisim=$_POST["soyisim"];
	$eposta=$_POST["eposta"];
	$sifre=$_POST["sifre"];
	$ulas=hash('sha256',$sifre);
	$query=$db->prepare("INSERT into uyeler SET isim=?,soyisim=?,
	eposta=?,
	sifre=?");
	$insert=$query->execute(array("$isim","$soyisim","$eposta","$ulas"));
	if($insert){
		$last_id = $db->lastInsertId();
		print"Kullanıcı başarıyla kayıt edildi";
	}else{
		echo("hata");
	}
	break;
}
	case"girisyap":
			$eposta = $_POST["email"];
			$sifre = $_POST["sifre"];
			$ulas=hash('sha256',$sifre);
		$query=$db->query("Select *from uyeler where eposta='$eposta' and sifre='$ulas' ",PDO::FETCH_ASSOC);
			
			
			$sayi = $query->rowCount();
	if($sayi>0){
		     foreach( $query as $row ){
         	 $uye_adi= $row['isim'].$row['soyisim'];
			 $kullnici_tur=$row['kullanici_tur'];
			 $id=$row['id'];
     		}
			$_SESSION['girisyap']=$eposta;
			$_SESSION["login_oldum"] = true;
			$_SESSION["uye_id"] = $id;
			$_SESSION["uye_sifre"] = $sifre;
			$_SESSION["kullanici_tur"] = $row["kullanici_tur"];
			$_SESSION["uye_adi"] = $row["isim"]. " ". $row["soyisim"];
		header("location:?sayfa=index");
		}else{
			echo"HATALI ŞİFRE GİRDİNİZ";	
	}	
	case "guncelle":
		if ( !empty( $_POST ) ) {
		$isim = $_POST[ "isim" ];
		$soyisim = $_POST[ "soyisim" ];
		$eposta = $_POST[ "eposta" ];
		$sifre = $_POST[ "sifre" ];
		$ulas = hash( 'sha256', $sifre );
		$id = $_POST[ 'id' ];
		$query = $db->prepare( "UPDATE uyeler SET isim=?,soyisim=?,eposta=?,sifre=? where id = $id" );
		$update = $query->execute( array( "$isim", "$soyisim", "$eposta", "$ulas" ) );
		if ( $update ) {
			print "güncelleme başarılı!";
			$url = "/admin/?sayfa=kayit";
			header( "Refresh: 3; url=$url" );
		} else {
			echo "HATAAAAAAAA";
			header( "Refresh: 3; url=$url" );
		}
		break;
			}
	}
			
	?>

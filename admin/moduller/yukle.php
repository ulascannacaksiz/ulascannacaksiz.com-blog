<?php 
$site= $_SERVER['SERVER_NAME'];
include 'ayar/baglan.php';
	if(isset($_POST["veri"])){//veri gelmişse
		$veri=$_POST["veri"];//veriyi al
		//$id=$_POST["yazi_id"];
		//$kapak=$_POST["kapak"];
		$yol='../../file/';
		$isim=rand().".png";//rasgele isim oluşturuyoruz.
		touch('../../file/'.$isim);//dosyayı oluşturuyoruz.
		$oku=file_get_contents($veri);//gelen verinin konumuna gidiyoruz ve veriyi alıyoruz.
		
		file_put_contents('../../file/'.$isim,$oku);//veriyi oluşturduğumuz resmin içine yazıyoruz.
		echo  "$site/file/".$isim;//yeni resim konumunu yazdırıyoruz.
		$query=$db->prepare("INSERT into resimler SET yol=?,url=?");
	$insert=$query->execute(array("$yol","$isim"));

	}
	
?>
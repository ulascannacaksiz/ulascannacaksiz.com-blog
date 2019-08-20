<?php
include 'moduller/ayar/baglan.php';
if ( isset( $_SESSION[ "login_oldum" ] ) ) {
	$login_oldum = true;
	$uye_adi = $_SESSION[ "uye_adi" ];
	$uye_id = $_SESSION[ "uye_id" ];
	$kullanici_tur = $_SESSION["kullanici_tur"];
} else {
	$login_oldum = false;
	header("location:girisyap.php");
}

	$sayfa = "index";
if(isset($_GET["sayfa"])){
	$sayfa = $_GET["sayfa"];
}

$id = 0;
if(isset($_GET["id"])){
	$id = $_GET["id"];
}

$site= $_SERVER['SERVER_NAME'];
?>
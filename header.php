<?php
include 'moduller/ayar/baglan.php';
if ( isset( $_SESSION[ "login_oldum" ] ) ) {
	$login_oldum = true;
	$uye_adi = $_SESSION[ "uye_adi" ];
	$uye_id = $_SESSION[ "uye_id" ];
	$kullanici_tur = $_SESSION["kullanici_tur"];
} else {
	$login_oldum = false;
}

$page = "index";
if(isset($_GET["page"])){
	$page = $_GET["page"];
}

$id = 0;
if(isset($_GET["id"])){
	$id = $_GET["id"];
}


?>
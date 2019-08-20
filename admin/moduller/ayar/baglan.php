<?php
ob_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

try{
$db= new PDO('mysql:host=localhost;dbname=ulascann_blog;charset=utf8','ulascann_admin','*FGPs@u8_JU7');
	//$db->query("SET CHARACTER SET utf8");
}
catch(PDOException $e){
print "Bağlantı hatası" .$e->getMessage();
	die();
}



?>
<?php include('header.php');


 if(!file_exists("moduller/$sayfa.php")){
	include "moduller/index.php";
}else{
	include "moduller/$sayfa.php";
}
	

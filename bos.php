<?php include('header.php');


 if(!file_exists("moduller/$page.php")){
	include "moduller/index.php";
}else{
	include "moduller/$page.php";
}
	

<!doctype html>
<?php include('header.php'); ?>
<html><head>
<meta charset="utf-8">

    <link rel="stylesheet" href="style/lux/custom.min.css" media="screen">
    <link rel="stylesheet" href="style/lux/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="style/lux/slider.css">
	<link rel="stylesheet" href="style/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<title>Ulaş Can Nacaksız BLOG</title>
</head>
<body>
<?php
$asd=$db->prepare("SELECT * From ayar");
$asd->execute();
$r=$asd->fetch(PDO::FETCH_ASSOC);
	$fa=$r['facebook'];
	$in=$r['instagram'];
	$tw=$r['twitter'];
	$yo=$r['youtube'];
	$li=$r['linkedin'];
	$ha=$r['hakkinda_text'];
	$fo=$r['footer_text'];
	$hk=$r['hakkinda_resim'];
	$du=$r['duyuru_durum'];
	$dt=$r['duyuru_tip'];
	$dm=$r['duyuru_text'];



?>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light mt-0">
  <a class="navbar-brand" href="?page=index">ULAS CAN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
     <?php 
		$sorgu=$db->prepare("select * from menu");
		$sorgu->execute();
		
		while($veri=$sorgu->fetch(PDO::FETCH_ASSOC)){
		echo'<li class="nav-item active">';
        echo '<a class="nav-link" href="'.$veri['menu_url'].'">'.$veri['menu_aciklama'].' <span class="sr-only">(current)</span></a>';
      	echo'</li>';
		}
		?>


	  
  <li class="nav-item dropdown">
  	 <?php  if($login_oldum==true){ 

    echo'<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hesabım</a>';
    echo'<div class="dropdown-menu">';
      echo'<a class="dropdown-item" href="#">'.$uye_adi.'</a>';
     echo' <a class="dropdown-item" href="#">Another action</a>';
     echo' <a class="dropdown-item" href="#">Something else here</a>';
     echo' <div class="dropdown-divider"></div>';
     echo' <a class="dropdown-item" href="#">Separated link</a>';
	 
    echo'</div>';
	 }?>
  </li>


    </ul>
    <form class="form-inline my-2 my-lg-0" action="?page=search" method="post">
      <input class="form-control mr-sm-2" type="text" name="ara" placeholder="Arama Kurtarma">
      <input class="btn btn-secondary my-2 my-sm-0" type="submit" value="Arama yap">
    </form>
  </div>
</nav>
<?php if($du==1){
echo '<div class="alert alert-dismissible alert-'.$dt.' mt-3">';
  echo'<button type="button" class="close" data-dismiss="alert">&times;</button>';
  echo'<h4 class="alert-heading">Duyuru!</h4>';
  echo'<p class="mb-0">'.$dm.'</p>';
echo '</div>';
}?>

<?php if(!file_exists("moduller/$page.php")){
	include "moduller/index.php";
}else{
	include "moduller/$page.php";
}
	
	?>



	</div>


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="style/js/index.js"></script>
	
</body>
</html>

<?php include 'header.php'; ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
 
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<script src="moduller/ayar/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="moduller/ayar/css/samples.css">
	<link rel="stylesheet" href="moduller/ayar/toolbarconfigurator/lib/codemirror/neo.css">
	<script type="text/javascript" src="moduller/ayar/jquery-1.11.1.min.js"> </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

       
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="?sayfa=anadizin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>LOG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BLOG YÖNETİM SİS.</b></span>
    </a>
    
    
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
             
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $uye_adi;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">

                <p>
                  <?php echo $uye_adi.'<br>'."Kullanıcı Türü: ".$kullanici_tur;?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?sayfa=bilgi" class="btn btn-default btn-flat">Profilim</a>
                </div>
                <div class="pull-right">
                  <a href="?sayfa=cikisyap" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>

          </li>
         
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">




      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="?sayfa=editor"><i class="fa fa-link"></i> <span>Yazi Ekle</span></a></li>
        <li class="active"><a href="?sayfa=yazi_duzenle"><i class="fa fa-link"></i> <span>Yazi Düzenle</span></a></li>
        <li class="active"><a href="?sayfa=kullanici_ekle"><i class="fa fa-link"></i> <span>Kullanıcı Ekle</span></a></li>
        <li class="active"><a href="?sayfa=kullanici_ekle"><i class="fa fa-link"></i> <span>Kullanıcı Düzenle</span></a></li>
		<li class="active"><a href="?sayfa=kategori"><i class="fa fa-link"></i> <span>Kategori Ekle/Düzenle</span></a></li>
		<li class="active"><a href="?sayfa=ayar"><i class="fa fa-link"></i> <span>AYARLAR</span></a></li>
		<li class="active"><a href="?sayfa=menu"><i class="fa fa-link"></i> <span>MENÜ AYAR</span></a></li>

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


<?php 

	if(!file_exists("moduller/$sayfa.php")){
	include "moduller/index.php";
}else{
	include "moduller/$sayfa.php";
}
	
	?>

  
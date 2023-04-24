<?
include("verifica.php");
include("maquetado/cabecera1.inc.php");

?>
<meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/styleest.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  <?php
  include("maquetado/cuerpoArribaE.inc.php");
  ?>
      <a>
                        <h1>Bienvenid@, <?php
                                          include("verifica.php");
                                          echo $nombre_completo; ?>!</h1>
                     </a>

                  </div>
               </div>
               <div class="col-md-8 col-sm-8">
                  <div class="right_bottun">
                     <ul class="conat_info d_none ">
                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                     </ul>
                     <button class="openbtn" onclick="openNav()"><img src="images/menu_icon.png" alt="#" /> </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->
   <section class="banner_main">
      <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#banner1" data-slide-to="0" class="active"></li>
            <li data-target="#banner1" data-slide-to="1"></li>
            <li data-target="#banner1" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container-fluid">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-7 col-lg-5">
                           <div class="text-bg">
                              <h1>CARRERA DE INFORMATICA</h1>
                              <a class="info" href="informatica.php">IR A LA PAGINA</a>
                           </div>
                        </div>
                        <div class="col-md-12 col-lg-7">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="ban_track">

                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container-fluid">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-7 col-lg-5">
                           <div class="text-bg">
                              <h1>CARRERA DE QUÍMICA</h1>
                              <a class="info" href="quimica.php">IR A LA PÁGINA</a>
                           </div>
                        </div>
                        <div class="col-md-12 col-lg-7">
                           <div class="row">
                              <div class="col-md-6">

                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="carousel-item">
               <div class="container-fluid">

                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-7 col-lg-5">
                           <div class="text-bg">

                              <h1>CARRERA DE FÍSICA</h1>
                              <a class="info" href="fisica.php">IR A LA PAGINA</a>
         
       
<?php
 include("maquetado/cuerpof.inc.php");
 ?>
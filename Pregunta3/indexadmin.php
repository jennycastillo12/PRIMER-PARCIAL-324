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
<link rel="stylesheet" href="css/stylemenu.css">
<link rel="stylesheet" href="css/stylebodyA.css">
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
include("maquetado/centroArriba.inc.php");
?>
<a>
   <br>
   <h1>Administrador:<?php echo $nombre_completo; ?>!</h1>
</a>
<br>

<div class="contenedor">
  <div class="boton">
    <button class="button" onclick="window.location.href='registrar.php'">
      <img  src="images/registro.png" alt="Imagen 1"><span>REGISTRO NUEVO</span>
    </button>
    <button class="button" onclick="window.location.href='tablausuario.php'">
      <img src="images/me2.png" alt="Imagen 2"><span>MODIFICAR O ELIMINAR</span>
    </button>
    <button class="button" onclick="window.location.href='tablapersona.php'">
      <img src="images/ver2.png" alt="Imagen 3"><span>MOSTRAR TABLA USUARIO</span>
    </button>
  </div>
</div>
<?php
include("maquetado/cuerpofA.inc.php");
?>
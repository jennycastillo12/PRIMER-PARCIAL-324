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
<link rel="stylesheet" href="css/styleadmin.css">
<link rel="stylesheet" href="css/stylebody.css">
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
      <br>
      <h2>TABLA USUARIOS</h2>
      <?php
      include("db.php");
   //Obtenemos el ci
$ci = $_POST['modifica'];

//Realizamos la consulta para obtener los datos de la persona con ese CI
$consulta = mysqli_query($conexion, "SELECT p.*, u.usuario, u.password, u.id_rol
                                     FROM persona p
                                     JOIN usuario u ON p.ci = u.ciu
                                     WHERE p.ci = '$ci'") or die("Problemas en el select:" . mysqli_error($conexion));


if ($fila = mysqli_fetch_array($consulta)) {
    //Mostramos los datos de la persona en un formulario para que puedan ser modificados
    echo " <div class='container-add'>
            <form method='POST' action='modificaG.php'  class='container__form'>
            <label for='ci'>CI:</label>
            <input type='text' id='ci' name='ci_nuevo' 
            value='" . $fila['ci'] . "' autocomplete='off'/><br>
            <label for='nombre'>Nombre Completo:</label>
            <input type='text' id='nombre' name='nombre' 
            value='" . $fila['NombreCompleto'] . "' autocomplete='off'/><br>
            <label for='fecha'>Fecha de Nacimiento:</label>
            <input  id='fecha' name='fecha' 
            value='" . $fila['FechaNacimiento'] . "' autocomplete='off'/><br>
            <label for='telefono'>Telefono:</label>
            <input type='text' id='telefono' name='telefono' value='" . $fila['Telefono'] . "' autocomplete='off'/><br>
            <label for='codigo_deptos'>Código Deptos:</label>
            <input type='text' id='codigo' name='codigo' value='" . $fila['codigo_deptos'] . "' autocomplete='off'/><br>
            <label for='usuario'>Usuario:</label>
            <input  id='usuario' name='usuario' 
            value='" . $fila['usuario'] . "' autocomplete='off'/><br>
            <label for='password'>Password:</label>
            <input type='text' id='password' name='password' value='" . $fila['password'] . "' autocomplete='off'/><br>
            <label for='rol'>Id rol:</label>
            <input type='text' id='rol' name='rol' value='" . $fila['id_rol'] . "' autocomplete='off'/><br>
            <input type='hidden' name='ci_actual' value='" . $fila['ci'] . "'>
            <input type='submit' value='Guardar' onclick='return confirm(\"¿Estás seguro de que deseas realizar los cambios?\")'/>
          </form>
          </div>";
        }
        mysqli_close($conexion);?>
     

 <?php
include("maquetado/cuerpofA.inc.php");
?>
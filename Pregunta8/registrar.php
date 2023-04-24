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
      <?php if (isset($mensaje)) : ?>
         <p><?php echo $mensaje ?></p>
      <?php endif; ?>
      <div class="container-add">
         <h2 class="container__title">Registrar Usuario</h2>
         <form action="insertar.php" method="post" class="container__form">
            <label for="ci" class="container__label">CI</label>
            <input type="text" id="ci" name="ci" class="container__input" autocomplete="off" required>

            <label for="nombre" class="container__label">Nombre Completo</label>
            <input type="text" id="nombre" name="nombre" class="container__input" autocomplete="off" required>

            <label for="fecha" class="container__label">Fecha de Nacimiento(AA/MM/DD)</label>
            <input type="text" id="fecha" name="fecha" class="container__input" autocomplete="off" required>

            <label for="telefono" class="container__label">Telefono</label>
            <div class="container__input-group">
               <input type="tex" id="telefono" name="telefono" class="container__input container__input--phone" value="(591)">
               <input type="text" id="telefonoNumero" name="telefonoNumero" class="container__input container__input--phone" maxlength="8" autocomplete="off" required>
            </div>
            <label for="departamento" class="container__label">Departamento</label>
            <select id="departamento" class="container__input" onchange="agregarCodigo()">
               <option value="">Seleccione un departamento</option>
               <option value="Chuquisaca">Chuquisaca</option>
               <option value="La Paz">La Paz</option>
               <option value="Cochabamba">Cochabamba</option>
               <option value="Oruro">Oruro</option>
               <option value="Potosí">Potosí</option>
               <option value="Tarija">Tarija</option>
               <option value="Santa Cruz">Santa Cruz</option>
               <option value="Beni">Beni</option>
               <option value="Pando">Pando</option>
            </select>
            <input type="text" id="codigo_departamento" name="codigo" class="container__input" autocomplete="off" required>
            <script src="js/departamentos.js"></script>
            <label for='usuario'>Usuario:</label>
            <input type='text' id='usuario' name='usuario' autocomplete='off' /><br>
            <label for='password'>Password:</label>
            <input type='password' id='password' name='password' autocomplete='off' /><br>
            <label for='roles'>Roles:</label>
            <select id='roles' name='roles' onchange="updateRoles()">
               <option value='1'>Administrador</option>
               <option value='2'>Director</option>
               <option value='3'>Estudiante</option>
            </select>
            <input type="text" id="rol" name="rol" class="container__input" autocomplete="off" required>
            <script src="js/roles.js"></script>

            <button type="submit" class="container__button">Registrar</button>
         </form>
      </div>
<?php
include("maquetado/cuerpofA.inc.php");
?>
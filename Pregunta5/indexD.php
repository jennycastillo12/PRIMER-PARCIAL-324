<?php
include("verifica.php");
include("maquetado/cabecera1.inc.php");
// Conexión a la base de datos
include("db.php");
// consulta con avg y case when

$sql = "select
case codigo_deptos 
 when '01' then 'Chuquisaca'
 when '02' then 'La Paz'
 when '03' then 'Cochabamba'
 when '04' then 'Oruro'
 when '05' then 'Potosi'
 when '06' then 'Tarija'
 when '07' then 'Santa Cruz'
 when '08' then 'Beni'
 when '09' then 'Pando'
 else 'OTRO' end Departamentos,AVG (i.notafinal) as nota_media FROM persona p,inscripcion i
 WHERE i.ciest=p.ci
GROUP BY case codigo_deptos 
 when '01' then 'Chuquisaca'
 when '02' then 'La Paz'
 when '03' then 'Cochabamba'
 when '04' then 'Oruro'
 when '05' then 'Potosi'
 when '06' then 'Tarija'
 when '07' then 'Santa Cruz'
 when '08' then 'Beni'
 when '09' then 'Pando'
 else 'OTRO' end ";
$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
   echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
   exit();
}
?>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" href="css/stylemenu.css">
<link rel="stylesheet" href="css/stylebodyD.css">

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
<h2>Tabla Media de Notas</h2>
<div class="tabla-centrada">
   <table>
      <tr>
         <th>Departamento</th>
         <th>Nota</th>
      </tr>
      <?php
      // Recorrer los resultados y mostrarlos en la tabla
      while ($fila = mysqli_fetch_assoc($resultado)) {
         $nombre = $fila['Departamentos'];
         $nota_media_con_formato = number_format($fila['nota_media'], 2);
         echo "<tr>";
         echo "<td>$nombre</td>";
         echo "<td>$nota_media_con_formato</td>";
         echo "</tr>";
      }
      ?>
   </table>
<?php
include("maquetado/cuerpofA.inc.php");
?>
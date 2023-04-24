<?php
include("db.php");

//recibo los datos
//ci actual
$ci_actual = $_POST["ci_actual"];
//ci nuevo por si se cambia
$ci_nuevo = $_POST["ci_nuevo"];
$nombre = $_POST["nombre"];
$fecha = $_POST["fecha"];
$telefono = $_POST["telefono"];
$codigo = $_POST["codigo"];
//usario
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$rol = $_POST["rol"];

//validar que el nuevo ci no esté siendo utilizado por otro usuario
$consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE ci = '$ci_nuevo' AND ci != '$ci_actual'") or die("Problemas en el select:" . mysqli_error($conexion));
if(mysqli_num_rows($consulta) > 0) {
    echo"<script>alert('El CI ingresado ya está siendo utilizado por otro usuario');
    window.history.go(-1);</script>";
    exit;
}
// Verificar si el usuario ya existe en la tabla de usuarios
$consulta_u = "SELECT * FROM usuario WHERE usuario = '$usuario' AND ciu != '$ci_actual'";
$resultado_u = mysqli_query($conexion, $consulta_u);
if (mysqli_num_rows($resultado_u) > 0) {
  // Si ya existe un registro con ese usuario, mostrar mensaje de error y salir del script
  echo "<script>alert('El usuario ya existe, elija otro');
        window.history.go(-1);</script>";
  exit();
}

//actualizamos datos en la tabla persona
$actualizar_persona = "UPDATE persona SET ci='$ci_nuevo', NombreCompleto='$nombre', FechaNacimiento='$fecha', Telefono='$telefono', codigo_deptos='$codigo' WHERE ci='$ci_actual'";
$resultado_persona = mysqli_query($conexion, $actualizar_persona);

//actualizamos datos en la tabla usuario
$actualizar_usuario = "UPDATE usuario SET ciu='$ci_nuevo', usuario='$usuario', password='$password',id_rol='$rol' WHERE ciu='$ci_actual'";
$resultado_usuario = mysqli_query($conexion, $actualizar_usuario);

if($resultado_persona && $resultado_usuario) {
    echo"<script>alert('se modificó con éxito');
    window.location='tablausuario.php'</script>";
} else {
    echo"<script>alert('No se pudo modificar');
    window.history.go(-1);</script>";
}
?>

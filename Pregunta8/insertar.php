<?php
include("db.php");

//recibo los datos
$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$fecha = $_POST["fecha"];
$telefono = $_POST['telefono'] . $_POST['telefonoNumero'];
$codigo = $_POST["codigo"];

//usario
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$rol = $_POST["rol"];

// Verificar si el CI ya existe en la tabla de personas
$consulta_ci = "SELECT * FROM persona WHERE ci = '$ci'";
$resultado_ci = mysqli_query($conexion, $consulta_ci);
if (mysqli_num_rows($resultado_ci) > 0) {
  // Si ya existe un registro con ese CI, mostrar mensaje de error y salir del script
  echo "<script>alert('El CI ya está registrado');
        window.history.go(-1);</script>";
  exit();
}
// Verificar si el usuario ya existe en la tabla de usuarios
$consulta_u = "SELECT * FROM usuario WHERE usuario = '$usuario'";
$resultado_u = mysqli_query($conexion, $consulta_u);
if (mysqli_num_rows($resultado_u) > 0) {
  // Si ya existe un registro con ese usuario, mostrar mensaje de error y salir del script
  echo "<script>alert('El usuario ya existe, elija otro');
        window.history.go(-1);</script>";
  exit();
}
// Preparamos la consulta para insertar en la tabla "persona"
$insertar_persona = "INSERT INTO persona (ci, NombreCompleto, FechaNacimiento, Telefono, codigo_deptos) 
                      VALUES ('$ci', '$nombre', '$fecha', '$telefono', '$codigo')";

// Ejecutamos la consulta para insertar en la tabla "persona"
$resultado_insertar_persona = mysqli_query($conexion, $insertar_persona);

if($resultado_insertar_persona) {
    // Si la consulta para insertar en la tabla "persona" se ejecuta correctamente,
    // preparamos la consulta para insertar en la tabla "usuario"
    $insertar_usuario = "INSERT INTO usuario (ciu, usuario, password, id_rol) 
                          VALUES ('$ci', '$usuario', '$password', '$rol')";
    
    // Ejecutamos la consulta para insertar en la tabla "usuario"
    $resultado_insertar_usuario = mysqli_query($conexion, $insertar_usuario);
    
    if($resultado_insertar_usuario) {
        // Si la consulta para insertar en la tabla "usuario" se ejecuta correctamente,
        // redirigimos al usuario a la página "indexadmintabla.php"
        echo "<script>alert('Se registró con éxito.');
              window.location='tablausuario.php';</script>";
    } else {
        // Si la consulta para insertar en la tabla "usuario" no se ejecuta correctamente,
        // eliminamos la información insertada en la tabla "persona"
        $eliminar_persona = "DELETE FROM persona WHERE ci = '$ci'";
        mysqli_query($conexion, $eliminar_persona);
        
        echo "<script>alert('No se pudo registrar.');
              window.history.go(-1);</script>";
    }
} else {
    // Si la consulta para insertar en la tabla "persona" no se ejecuta correctamente,
    // mostramos un mensaje de error
    echo "<script>alert('No se pudo registrar.');
          window.history.go(-1);</script>";
}

// Cerramos la conexión a la base de datos
mysqli_close($conexion);
?>


<?php

//recopilamos los datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Validar que los campos no estén vacíos
if (empty($usuario) || empty($contraseña)) {
    include("index.php");
    die();
}

// Iniciar sesión
session_start();
//establece una variable de sesión llamada 'usuario' con el valor
// de la variable $usuario, lo que permite almacenar el nombre de
//usuario en la sesión y acceder a él en diferentes partes del sitio web mientras la sesión está activa.
$_SESSION['usuario'] = $usuario;

// Conexión a la base de datos
//$conexion = mysqli_connect("localhost", "root", "", "bdjenny2");
include("db.php");

// Utilizar sentencias preparadas para evitar inyección SQL
//La inyección SQL es una de las vulnerabilidades más comunes
// en las aplicaciones web, por lo que es importante asegurarse 
//de que los datos ingresados por los usuarios se validen y se 
//filtren adecuadamente antes de enviarlos a la base de datos.
$consulta = "SELECT id_rol FROM usuario WHERE usuario = ? AND password = ?";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña);
mysqli_stmt_execute($stmt);
//$resultado contiene el resultado de la consulta a la base de datos,
$resultado = mysqli_stmt_get_result($stmt);
//$id almacena la fila recuperada como un array asociativo.
$id=mysqli_fetch_array($resultado);
 //si los datos no estan en la base de datos obtengo el nombre del usuario
if ($id != null) {
   
  // Obtener el ciu del usuario actual
  $usuario = $_SESSION['usuario'];
  $query = "SELECT ciu FROM usuario WHERE usuario = '$usuario'";
  $resultado = mysqli_query($conexion, $query);
  $datos_usuario = mysqli_fetch_assoc($resultado);
  $ciu = $datos_usuario['ciu'];
  //aqui tenemos el ci del usuario
  $_SESSION['ciu'] = $ciu;
  //solo modifique esto para verificar
 // var_dump($datos_usuario);

  // Consultar el nombre completo correspondiente al CIU
  $consulta = "SELECT NombreCompleto FROM persona WHERE ci = $ciu";
  $resultado = mysqli_query($conexion, $consulta);
  $datos_persona = mysqli_fetch_assoc($resultado);
  $nombre_completo = $datos_persona['NombreCompleto'];
  //variable donde contiene el nombre de la persona
  $_SESSION['NombreCompleto'] = $nombre_completo;
  //solo modifique esto para verificar
  //var_dump($datos_persona);
    if($id['id_rol']==1){ //administrador
       header("location:indexadmin.php");
    } else if($id['id_rol']==2){ //Director/a
       header("location:indexD.php");
    } else if($id['id_rol']==3){ //estuadiante
        header("location:indexest.php");
     } else {
        include("index.php");
        ?>
        <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
        <?php
    }
} else {
    
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
    include("index.php");
    
}
mysqli_free_result($resultado);
mysqli_close($conexion);

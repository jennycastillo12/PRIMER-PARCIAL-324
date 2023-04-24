<?php
include("db.php");

// Recibimos el CI del formulario
$ci = $_POST["ci"];

// Eliminamos el registro correspondiente en la tabla "usuario"
$eli_u = "DELETE FROM usuario WHERE ciu='$ci'";
$resultado_u = mysqli_query($conexion, $eli_u);

// Verificamos si se eliminó al menos un registro en la tabla "usuario"
if(mysqli_affected_rows($conexion) > 0) {
    // Si se eliminó al menos un registro, procedemos a eliminar el registro en la tabla "persona"
    $eli_p = "DELETE FROM persona WHERE ci='$ci'";
    $resultado_p = mysqli_query($conexion, $eli_p);

    // Verificamos si se eliminó al menos un registro en la tabla "persona"
    if(mysqli_affected_rows($conexion) > 0) {
        // Si se eliminó al menos un registro, mostramos un mensaje de éxito y
        // redirigimos al usuario a la página principal
        echo "<script>alert('Se eliminó con éxito');
        window.location='tablausuario.php'</script>";
    } else {
        // Si no se eliminó ningún registro en la tabla "persona", mostramos un mensaje de error y
        // redirigimos al usuario a la página anterior
        echo "<script>alert('No se pudo eliminar');
        window.history.go(-1);</script>";
    }
} else {
    // Si no se eliminó ningún registro en la tabla "usuario", mostramos un mensaje de error y
    // redirigimos al usuario a la página anterior
    echo "<script>alert('No se pudo eliminar');
    window.history.go(-1);</script>";
}
?>


<?php
include "Conexiones/Conexion.php";

$conexion=conectar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['contacto_id']);
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $query = "UPDATE contactos SET nombre = '$nombre', telefono = '$telefono', correo = '$correo' WHERE id = $id";

    if (mysqli_query($conexion, $query)) {
        echo "Contacto actualizado con éxito.";
        header("Location: index.php");
    } else {
        echo "Error al actualizar el contacto: " . mysqli_error($conexion);
    }
}
?>

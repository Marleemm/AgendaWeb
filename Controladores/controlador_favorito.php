<?php
include __DIR__ . '/../Conexiones/Conexion.php';

$conexion = conectar();

if (isset($_POST['id']) && isset($_POST['favorito'])) {
    $id = intval($_POST['id']);
    $favorito = intval($_POST['favorito']); // 1 o 0

    // Consulta para actualizar el estado de favorito
    $consulta = "UPDATE contactos SET favorito = $favorito WHERE id = $id";

    // Ejecutar la consulta y verificar si se actualizó correctamente
    if (mysqli_query($conexion, $consulta)) {


        header("Location: ../index.php");
    } else {
        echo "Error al actualizar el contacto: " . mysqli_error($conexion);
    }
}


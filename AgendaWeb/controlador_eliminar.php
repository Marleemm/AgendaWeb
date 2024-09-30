<?php
include("Conexion.php"); // Asegúrate de incluir tu archivo de conexión a la base de datos

// Conexión a la base de datos
$conexion = conectar();

if (isset($_POST['eliminar'])) {
    if (!empty($_POST['contactos'])) {
        $contactos = $_POST['contactos'];
        $ids = implode(',', array_map('intval', $contactos)); // Asegúrate de que los IDs son enteros
        $consulta = "DELETE FROM contactos WHERE id IN ($ids)";

        if (mysqli_query($conexion, $consulta)) {
            // Redirigir con éxito
            header("Location: index.php");

            echo "Contactos eliminados correctamente.";
            exit();
        } else {
            // Redirigir con error
            header("Location: index.php");

            echo "Error al eliminar los contactos: " . mysqli_error($conexion);
        }
    } else {
        header("Location: index.php");

        // Redirigir si no se seleccionaron contactos
        exit();
    }
}

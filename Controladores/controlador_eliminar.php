<?php

include __DIR__ . '/../Conexiones/Conexion.php';
$conexion = conectar();

if (isset($_POST['eliminar'])) {
    if (!empty($_POST['contactos'])) {
        $contactos = $_POST['contactos'];
        $ids = implode(',', array_map('intval', $contactos)); // Asegúrate de que los IDs son enteros
        $consulta = "DELETE FROM contactos WHERE id IN ($ids)";

        if (mysqli_query($conexion, $consulta)) {
            
            // Redirigir con éxito
           // header("Location: ../index.php");
           echo __DIR__;

            echo "Contactos eliminados correctamente.";
            exit();
        } else {
            
            echo "Error al eliminar los contactos: " . mysqli_error($conexion);
        }
    } else {

        // Redirigir si no se seleccionaron contactos
        exit();
    }
}

<?php
// formulario.php
include "Conexiones/Conexion.php";
$conexion = conectar();

if (isset($_GET['id'])) {
    $contacto_id = $_GET['id'];
    // Obtener los datos del contacto de la base de datos
    $consulta = "SELECT * FROM contactos WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("i", $contacto_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $contacto = $resultado->fetch_assoc();

    if ($contacto) {
        echo '
        <form method="POST" action="pagina_editar.php">
            <input type="hidden" name="contacto_id" value="'.$contacto['id'].'">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="'.$contacto['nombre'].'" required><br>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="'.$contacto['correo'].'" required><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="'.$contacto['telefono'].'" required><br>

            <button type="submit">Guardar Cambios</button>
            <button type="button" id="cerrar">Cerrar</button>
        </form>';
    } else {
        echo 'Contacto no encontrado.';
    }
}
?>

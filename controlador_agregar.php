<?php

include("Conexion.php");

// Conexión a la base de datos
$conexion = conectar();

if (isset($_POST['agregar'])) {
    // Verificar si todos los campos están completos
    if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['telefono'])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $favorito = isset($_POST['favorito']) ? 1 : 0; // Si se selecciona el checkbox "favorito", será 1, de lo contrario 0

        // Consulta para insertar los datos
        $consulta = "INSERT INTO `contactos` (`id`, `nombre`, `correo`, `telefono`, `favorito`) 
                     VALUES (NULL, '$nombre', '$correo', '$telefono', '$favorito');";
        
        // Ejecutar la consulta y verificar si se insertó correctamente
        if (mysqli_query($conexion, $consulta)) {


            header("Location: index.php");
            echo "<div class='alert alert-success'>Contacto registrado con éxito</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al registrar el contacto: " . mysqli_error($conexion) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    }
}



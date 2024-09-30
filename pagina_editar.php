<?php
include 'Conexion.php'; // Conexión a la base de datos
$conn=conectar();
// Verificar si se ha enviado un ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM contactos WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $contacto = mysqli_fetch_assoc($result);
    
    if (!$contacto) {
        echo "Contacto no encontrado.";
        exit;
    }
} else {
    echo "ID no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2 class="roboto-mono">Editar Contacto</h2>
    <form method="POST" action="controlador.php">
        <input type="hidden" name="contacto_id" value="<?php echo $contacto['id']; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $contacto['nombre']; ?>" required>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $contacto['telefono']; ?>" required>
        
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="<?php echo $contacto['correo']; ?>" required>
        
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>

<?php
include __DIR__ . '/../Conexiones/Conexion.php';
$conexion = conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {




            case 'eliminar':

                if (!empty($_POST['contactos'])) {
                    $contactos = $_POST['contactos'];
                    $ids = implode(',', array_map('intval', $contactos)); // Asegúrate de que los IDs son enteros
                    $consulta = "DELETE FROM contactos WHERE id IN ($ids)";

                    if (mysqli_query($conexion, $consulta)) {
                        // Redirigir con éxito
                        header("Location: ../index.php");

                        echo "Contactos eliminados correctamente.";
                        exit();
                    } else {

                        echo "Error al eliminar los contactos: " . mysqli_error($conexion);
                    }
                } else {
                    header("Location: ../index.php");
                }

                break;

            case 'editar':
                if (isset($_POST['contacto_radio'])) { // Asegúrate de que estás usando POST para editar
                    $id = intval($_POST['contacto_radio']);
                    $query = "SELECT * FROM contactos WHERE id = $id";
                    $result = mysqli_query($conexion, $query);
                    $contacto = mysqli_fetch_assoc($result);

                    if (!$contacto) {
                        echo "Contacto no encontrado.";
                        exit;
                    }
                } else {
                    echo "ID no proporcionado.";
                    exit;
                }

                // Mostrar el formulario de edición
?>
                <!DOCTYPE html>
                <html lang="es">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Contacto</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                    <style>
                        body {
                            background-color: rgb(240, 240, 240);
                            /* Color de fondo general */
                        }

                        .form-container {
                            background-color: rgb(158, 136, 177);
                            /* Color morado de fondo */
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                            color: white;
                            /* Texto blanco para contraste */
                        }

                        .form-label {
                            color: white;
                            /* Color de texto de las etiquetas */
                        }

                        .btn-primary {
                            background-color: white;
                            /* Botón de guardar en blanco */
                            color: rgb(158, 136, 177);
                            /* Texto del botón en morado */
                        }

                        .btn-primary:hover {
                            background-color: rgb(140, 120, 155);
                            /* Hover en el botón */
                        }

                        .btn-secondary {
                            background-color: rgba(255, 255, 255, 0.5);
                            /* Botón de cancelar en blanco con opacidad */
                            color: rgb(158, 136, 177);
                            /* Texto del botón en morado */
                        }

                        .btn-secondary:hover {
                            background-color: rgba(255, 255, 255, 0.8);
                            /* Hover en el botón */
                        }
                    </style>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                </head>

                <body>
                    <div class="container mt-5">
                        <h2 class="text-center">Editar Contacto</h2>
                        <form method="POST" action="controlador_editar.php" class="form-container">
                            <input type="hidden" name="contacto_id" value="<?php echo $contacto['id']; ?>">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $contacto['nombre']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $contacto['telefono']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo:</label>
                                <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $contacto['correo']; ?>" required>
                            </div>

                            <button type="submit" name="action" value="guardar" class="btn btn-primary">Guardar Cambios</button>
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </body>

                </html>


                </html>
<?php
        }
    }
}

<?php
include 'conexion.php';
header('Content-Type: application/json');

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $query = "SELECT * FROM contactos WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $contacto = mysqli_fetch_assoc($result);
        echo json_encode($contacto);
    } else {
        echo json_encode(['error' => 'No se pudo obtener el contacto.']);
    }
} else {
    echo json_encode(['error' => 'ID no proporcionado.']);
}
?>

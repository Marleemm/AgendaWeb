<?php
include __DIR__ . '/../Conexiones/Conexion.php';
$conexion=conectar();

// Obtener el criterio de ordenamiento y la dirección (asc o desc)
$criterio = isset($_GET['criterio']) ? $_GET['criterio'] : 'nombre'; // Predeterminado: ordenar por nombre
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'asc'; // Predeterminado: ascendente

// Consultar contactos ordenados
$consulta = "SELECT * FROM contactos ORDER BY $criterio $orden";
$resultado = $conexion->query($consulta);

// Mostrar los contactos ordenados
while ($contacto = $resultado->fetch_assoc()) {


    $favIcon = $contacto['favorito'] ? "imagenes/fav.png" : "imagenes/nfav.png";


    if($favIcon=="imagenes/fav.png"){
        

    echo '
        <div class="feature col">
            <div class="feature-icon custom-icon">
                <button class="favoritos" data-id="' . $contacto['id'] . '"><img class="fav" src="' . $favIcon . '" alt="foto"></button>
                <img class="me" src="imagenes/contacto.jpg" alt="foto">
            </div>
            <h3 class="fs-2 text-body-emphasis lato-light">' . $contacto['nombre'] . '</h3>
            <p id="numero"> <i class="bi bi-telephone"></i> ' . $contacto['telefono'] . '</p>
            <i class="bi bi-envelope"></i>
            <a href="mailto:' . $contacto['correo'] . '">' . $contacto['correo'] . '</a>
            
            <form method="POST" action="pagina_editar.php" style="display:inline;">
                <input type="hidden" name="contacto_id" value="' . $contacto['id'] . '">
                <button type="submit" class="btn btn-secondary editar-btn" data-id="' . $contacto['id'] . '">Editar</button>
            </form>
        </div>';
    }
}


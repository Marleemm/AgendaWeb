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

    echo '
            <div class="feature col">
                <div class="feature-icon custom-icon">
                    <button type="button" class="favoritos" data-id="' . $contacto['id'] . '">
                        <img class="fav" src="' . $favIcon . '" alt="foto">
                    </button>
                    <img class="me" src="imagenes/contacto.jpg" alt="foto">
                    <input type="checkbox" name="contactos[]" value="' . $contacto['id'] . '" id="contacto_' . $contacto['id'] . '" style="display: none;"> <!-- Checkbox oculto -->
               
            <input type="radio" name="contacto_radio" value="' . $contacto['id'] . '" id="contacto_radio' . $contacto['id'] . '" style="display: none;">

                    </div>
        
                <h3 class="fs-2 text-body-emphasis lato-light">' . $contacto['nombre'] . '</h3>
                <p id="numero"><i class="bi bi-telephone"></i>' . $contacto['telefono'] . '</p>
                <i class="bi bi-envelope"></i>
                <a href="mailto:' . $contacto['correo'] . '">' . $contacto['correo'] . '</a>
        
               
            </div>';
}

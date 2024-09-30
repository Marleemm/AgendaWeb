<?php

include "Conexiones/Conexion.php";

// Conectar a la base de datos


// Verificar si hay contactos en la base de datos
function mostrarGeneral()
{

    $conexion = conectar();

    $consulta = "SELECT * FROM contactos";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Iterar sobre los resultados y generar el HTML dinámicamente
        while ($contacto = mysqli_fetch_assoc($resultado)) {
            // Determinar la imagen del icono de favorito (favorito o no favorito)
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
    } else {
        echo "<p>No hay contactos registrados en la agenda.</p>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}




function mostrarFavoritos()
{

    $conexion = conectar();

    $consulta = "SELECT * FROM contactos";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Iterar sobre los resultados y generar el HTML dinámicamente
        while ($contacto = mysqli_fetch_assoc($resultado)) {
            // Determinar la imagen del icono de favorito (favorito o no favorito)
            $favIcon = $contacto['favorito'] ? "imagenes/fav.png" : "imagenes/nfav.png";

            if ($favIcon == "imagenes/fav.png") {

                echo '
                <div class="feature col">
                    <div class="feature-icon custom-icon">
                    
                        <button type="button" class="favoritos" data-id="' . $contacto['id'] . '"><img class="fav" src="' . $favIcon . '" alt="foto"></button>
                        <img class="me" src="imagenes/contacto.jpg" alt="foto">
    
                    </div>
    
    
                    <h3 class="fs-2 text-body-emphasis lato-light">'.$contacto['nombre'].'</h3>
                    <p id="numero"> <i class="bi bi-telephone"></i> '.$contacto['telefono'].'</p>
                    <i class="bi bi-envelope"></i>
                    <a href="mailto:'.$contacto['correo'].'">'.$contacto['correo'].'</a>
                </div>';
            }
        }
    } else {
        echo "<p>No hay contactos registrados en la agenda.</p>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}

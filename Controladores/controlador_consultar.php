<?php

include __DIR__ . '/../Conexiones/Conexion.php';

function obtenerContactos($soloFavoritos = false)
{
    $conexion = conectar();
    $consulta = "SELECT * FROM contactos";

    if ($soloFavoritos) {
        $consulta .= " WHERE favorito = 1";
    }

    $resultado = mysqli_query($conexion, $consulta);
    $contactos = [];

    if ($resultado) {
        while ($contacto = mysqli_fetch_assoc($resultado)) {
            $contactos[] = $contacto;
        }
    }

    mysqli_close($conexion);
    return $contactos;
}

function generarHtmlContacto($contacto)
{
    $favIcon = $contacto['favorito'] ? "imagenes/fav.png" : "imagenes/nfav.png";

    return '
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
            <p id="numero"><i class="bi bi-telephone"></i> ' . $contacto['telefono'] . '</p>
            <i class="bi bi-envelope"></i>
            <a href="mailto:' . $contacto['correo'] . '">' . $contacto['correo'] . '</a>
        </div>';
}

function mostrarGeneral()
{
    $contactos = obtenerContactos();

    if (!empty($contactos)) {
        foreach ($contactos as $contacto) {
            echo generarHtmlContacto($contacto);
        }
    } else {
        echo "<p>No hay contactos .</p>";
    }
}

function mostrarFavoritos()
{
    $contactos = obtenerContactos(true);

    if (!empty($contactos)) {
        foreach ($contactos as $contacto) {
            echo generarHtmlContacto($contacto);
        }
    } else {
        echo "<p>No hay contactos favoritos :c</p>";
    }
}
?>

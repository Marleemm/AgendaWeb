<?php include "Controladores/controlador_consultar.php"; ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="titulo">Chipotles.exe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="shortcut icon" href="rosa.webp" type="image/x-icon">

    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Karla:ital,wght@0,200..800;1,200..800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Overpass:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- FINAL DE FUENTES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="Styles/style.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark bg-negro">
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Logo a la izquierda -->
                <div class="d-flex align-items-center">
                    <span class="navbar-brand ms-2 bree-serif-regular">Chipotles.exe</span>
                </div>

                <!-- Barra de búsqueda centrada -->
               
                <!-- Íconos a la derecha -->
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="btn-filtrar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="imagenes/filtro.png" alt="filtro" height="40px" width="50px">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="btn-filtrar">
                            <li><a class="dropdown-item" href="#" id="orden-az">Ordenar de A-Z</a></li>
                            <li><a class="dropdown-item" href="#" id="orden-za">Ordenar de Z-A</a></li>
                        </ul>
                    </div>
                    <div></div>
                    <a class="nav-link dropdown-toggle" id="btn-editar"><img src="imagenes/editar.png" alt="editar" height="40px" width="50px"></a>
                   
                    <a class="nav-link dropdown-toggle" id="btn-eliminar"><img src="imagenes/borrar.png" alt="borrar" height="40px" width="50px"></a>
                </div>
            </div>
        </nav>

    </header>

    <main>
        
        <div id="mensaje-bienvenida">
            <h2>¡Bienvenid@!</h2>
            <p>Nos alegra tenerte en nuestra agenda. Aquí podrás organizar y gestionar todos tus contactos de manera sencilla.</p>
        </div>
        
        <section class="container d-flex px-4 py-5 text-center mt-5 mb-5" id="contactos">
    <div class="row">
        <!-- Sección de la lista de contactos (Izquierda) -->
        <div class="col-12 col-md-8"> <!-- Toma el 100% en pantallas pequeñas y el 66.67% en pantallas medianas o mayores -->
            <div class="principal">
                <div class="titulo d-flex justify-content-between align-items-center position-relative">
                    <p class="lato-bold mx-auto mb-0">Lista de contactos</p>
                    <button id="boton">
                        <img id="agregar" src="imagenes/agregar.png" alt="Agregar contacto">
                    </button>
                </div>

                <div id="formulario-container"></div>

                <form id="eliminar-contactos-form" method="POST" action="./Controladores/controlador.php">
                    <div class="row g-4 py-5 row-cols-1 row-cols-md-3" id="lista">
                        <?php mostrarGeneral(); ?>
                    </div>

                    <button type="submit" id="eliminar" style="display:none;" name="action" value="eliminar" class="btn btn-danger">Eliminar Seleccionados</button>
                    <button type="submit" id="editar" style="display:none;" name="action" value="editar" class="btn btn-secondary">Editar Seleccionado</button>
                </form>
            </div>
        </div>

        <!-- Sección de favoritos (Derecha) -->
        <div class="col-12 col-md-4"> <!-- Toma el 100% en pantallas pequeñas y el 33.33% en pantallas medianas o mayores -->
            <div>
                <p class="roboto-mono">Favoritos</p>
                <div class="favCuadro">
                    <div class="row g-4 py-5 row-cols-1 row-cols-md-1" id="listano">
                        <?php mostrarFavoritos(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</main>



    <!-- PARA PONERLO DARK data-bs-ride="dark" -->
    <footer id="contacto" class="container-fluid  bg-dark" data-bs-theme="dark">
        <div class="py-3">
            <div class="text-center text-body-secondary fs-3">
                <i class="bi bi-code-slash"></i>
            </div>

            <!-- mt margin top arriba -->

            <p class="text-center text-body-secondary" _msttexthash="356304" _msthash="19">© 2024 Chipotles.exe
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <script src="Scripts/agregar.js"> </script>

    <script>
        document.getElementById('btn-eliminar').addEventListener('click', function(event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado solo si estamos alternando la visibilidad

            const eliminar = document.getElementById('eliminar');
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            // Alternar la visibilidad del botón de eliminar y los checkboxes
            eliminar.style.display = eliminar.style.display === 'none' ? 'inline' : 'none';

            checkboxes.forEach(checkbox => {
                checkbox.style.display = checkbox.style.display === 'none' ? 'inline' : 'none';
            });
        });
    </script>

    <script>
        document.getElementById('btn-editar').addEventListener('click', function(event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado solo si estamos alternando la visibilidad
            const editar = document.getElementById('editar');
            editar.style.display = editar.style.display === 'none' ? 'inline' : 'none';


            const radio = document.querySelectorAll('input[type="radio"]'); // Selecciona todos los radio buttons


            radio.forEach(radio => {
                radio.style.display = radio.style.display === 'none' ? 'inline' : 'none';
            });
        });
    </script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Scripts/favoritos.js">
       
    </script>
    <script src="Scripts/filtrar.js"></script>
    <script src="Scripts/filtrar_nofav.js"></script>
</body>

</html>
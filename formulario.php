<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <style>
        
        /* Estilos para ocultar inicialmente el formulario */
        #formulario-contacto {
            border-radius: 5%;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            z-index: 1000; /* Para mostrar por encima del contenido */
        }

        /* Fondo oscuro para cuando el formulario esté visible */
        #fondo-oscuro {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 500; /* Debe estar debajo del formulario */
        }

        /* Estilos para el botón e imagen */
        .titulo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        #agregar {
            border-radius: 5%;
            background-color:rgb(158, 136, 177);
            cursor: pointer;
            justify-content: space-between;
            border-radius: 0%;
        }

        /* Botón para cerrar el formulario */
        .cerrar-formulario {
            position: absolute;
            top: 8px;
            right: 8px;
            cursor: pointer;
            background-color:rgb(158, 136, 177) ;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 0%;
        }

       

       
    </style>
</head>
<body>

 

<div id="fondo-oscuro"></div>

<div id="formulario-contacto">


    <button class="cerrar-formulario" id="cerrar">X</button>
    <br><br>
    <h3>Agregar contacto</h3>
    <br> <br>
    
    

    <form id="contacto-form"  method="POST" action="controlador_agregar.php" >
    <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="correo">Correo:  </label>
        <input type="email" id="correo" name="correo" required><br>
        <br>

        <label for="telefono">Teléfono: </label>
        <input type="text" id="telefono" name="telefono" required><br>
        <br>

        <label for="favorito">Favorito: </label>
        <input type="checkbox" id="favorito" name="favorito" value="1"><br>
        <br>

        <button id="agregar" type="submit" name="agregar">Agregar Contacto</button>

        
    </form>
</div>



</body>
</html>

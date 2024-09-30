<?php

function conectar(){


$usuario = "root";
$pass = "";
$host = "localhost";
$nombreBase = "agenda";
$conexion = mysqli_connect($host, $usuario, $pass,$nombreBase); // Verificar la conexión




return $conexion;

}

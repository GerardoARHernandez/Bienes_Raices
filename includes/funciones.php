<<<<<<< HEAD
<?php


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ){
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado() {
    session_start();

    $auth = $_SESSION['login'];

    if (!$auth) {
        header('Location: /');
    }

}

function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa /sanitizar el HTML
function s($html) : string{
    $s = htmlspecialchars($html);

    return $s;
}

//Validad tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['vendedor','propiedad'];

    return in_array($tipo, $tipos);
}

//Muestra los mensajes de alerta
function mostrarNotificacion($codigo){
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
=======
<?php

require 'app.php';

function incluirTemplate( string $nombre, bool $inicio = false ){
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];

    if ($auth) {
        return true;
    }

    return false;
>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681
}
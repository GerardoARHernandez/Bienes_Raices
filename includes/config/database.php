<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');

    if (!$db) {
        echo "Error no se puedo conectar";
        exit;
    }

    return $db;
}
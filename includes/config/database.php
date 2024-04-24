<<<<<<< HEAD
<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');

    if (!$db) {
        echo "Error no se puedo conectar";
        exit;
    }

    return $db;
=======
<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if (!$db) {
        echo "Error no se puedo conectar";
        exit;
    }

    return $db;
>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681
}
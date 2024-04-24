<<<<<<< HEAD
<?php

//Importar conexión
require 'includes/app.php';
$db = conectarDB();

//Crear email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

// echo $query;

mysqli_query($db, $query);
=======
<?php

//Importar conexión
require 'includes/config/database.php';
$db = conectarDB();

//Crear email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

// echo $query;

mysqli_query($db, $query);
>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681
//Agregarlo a la base de datos
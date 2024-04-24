<<<<<<< HEAD
<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarnos a DB
$db = conectarDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);
=======
<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681

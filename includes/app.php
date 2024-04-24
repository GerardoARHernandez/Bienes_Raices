<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarnos a DB
$db = conectarDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);
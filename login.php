<?php

    require 'includes/config/database.php';
    $db = conectarDB();
    //Autenticar el usuario
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string($db, $_POST['password'] );

        if (!$email) {
            $errores[] = "El correo es obligatorio o no es valido";
        }
        if (!$password) {
            $errores[] = "La contraseña es obligatoria";
        }
        if (empty($errores)) {
            //Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email' ";
            $resultado = mysqli_query($db, $query);

            if ( $resultado ->num_rows ) {
                //Revisar si el password existe
                $usuario = mysqli_fetch_assoc($resultado);
                //Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);
                
                if ($auth) {
                    //El usuario está autenticado
                    session_start();

                    //Llenar el arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                    var_dump($_SESSION);

                }else{
                    $errores[] = "La contraseña es incorrecta";
                }
            } else {
                $errores[] = "El Usuario no Existe";
            }
            
        }
    }


    //Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario">
        <fieldset>
                <legend>Correo Y Contraseña</legend>

                <label for="email">Correo:</label>
                <input type="email" name="email" placeholder="Tu Correo" id="email">

                <label for="password">Contraseña:</label>
                <input type="password" name="password" placeholder="Tu Password" id="password">
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>
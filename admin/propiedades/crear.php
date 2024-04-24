<<<<<<< HEAD
<?php

    require '../../includes/app.php';
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    $propiedad = new Propiedad;

    //Consulta para obtener todos los vendedores
    $vendedores = Vendedor::all();

    //Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    //Ejecutar el codigo despues de que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        /** Crea una nueva instancia */
        $propiedad = new Propiedad($_POST['propiedad']);

        /** Subida de archivos*/
        //Generar nombre único
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg"; 

        //Setear la imagen
        //Realiza un resize a la imagen con intervetion
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']) -> fit(800,600);
            $propiedad->setImagen($nombreImagen);//Se guarda el nombre de la imagen
        }
        
        //Validar
        $errores = $propiedad -> validar();
            

        //Revisar que el arreglo de errores esté vacio
        if (empty($errores)) {

            //Crear carperta
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            
            //Guarda en la base de datos
            $propiedad -> guardar();

            
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">
            Volver
        </a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>    
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
=======
<?php

    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /');
    }


    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultadoVendedores = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errores = [];
    
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedores_Id = '';

    //Ejecutar el codigo despues de que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedores_Id = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if (!$precio) {
            $errores[] = "Debes añadir un precio";
        }

        if (strlen($descripcion < 50)) {
            $errores[] = "Debes añadir una descripcion con al menos 50 caracteres";
        }

        if (!$habitaciones) {
            $errores[] = "Debes añadir al menos una habitación";
        }

        if (!$wc) {
            $errores[] = "Debes añadir al menos un baño";
        }

        if (!$estacionamiento) {
            $errores[] = "El numero de lugares de estacionamiento es obligatorio";
        }

        if (!$vendedores_Id) {
            $errores[] = "Debes elegir un vendedor";
        }

        if (!$imagen['name'] || $imagen['error']) {
            $errores[] = "La imagen es obligatoria";
        }

        //Validar por tamaño(2000kb)
        $medida = 2000 * 1000;
        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        //Revisar que el arreglo de errores esté vacio
        if (empty($errores)) {
            /* Subida de archivos*/
            //Crear carperta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            //Generar nombre único
            $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";
            var_dump($nombreImagen);
            //Subir Imagenes
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


            //insertar en la DB
            $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_Id) VALUES ( '$titulo', '$precio', '$nombreImagen','$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_Id' )";

            // echo $query;
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                //Redireccionar al usuario
                header("Location: /admin?resultado=1");
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">
            Volver
        </a>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>    
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo;?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio;?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png image/webp" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion;?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" 
                name="habitaciones" placeholder="Ej: 3" 
                min="1" max="10" 
                value="<?php echo $habitaciones;?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" 
                name="wc" placeholder="Ej: 3" 
                min="1" max="10" 
                value="<?php echo $wc;?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" 
                name="estacionamiento" placeholder="Ej: 3" 
                min="1" max="10" 
                value="<?php echo $estacionamiento;?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="vendedor">
                    <option value="">--Seleccione--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultadoVendedores) ): ?>
                        <option <?php echo $vendedores_Id == $vendedor['id'] ? 'selected' : '' ?>  value="<?php echo $vendedor['id'];?>"> 
                            <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681
?>
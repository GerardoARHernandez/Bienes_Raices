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
?>
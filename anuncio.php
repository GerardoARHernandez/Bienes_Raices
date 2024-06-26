<<<<<<< HEAD

    <?php
        require 'includes/app.php';
        use App\Propiedad;

        //Validar ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /');
        }

        $propiedad = Propiedad::find($id);
        
        incluirTemplate('header');
    ?>

    <main class="contenedor seccion contenido-centrado">
    
        <h1><?php echo $propiedad->titulo; ?></h1>
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de casa frente al bosque">
        

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad->precio; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad->descripcion; ?></p>
            
        </div>
        
    </main>

<?php

    incluirTemplate('footer');
=======

    <?php

        //Validar ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /');
        }

        //Importar conexion
        require 'includes/config/database.php';
        $db = conectarDB();

        //Consultar
        $query = "SELECT * FROM propiedades WHERE id = '$id' ";

        //Obtener resultado
        $resultado = mysqli_query($db, $query);

        if (!$resultado->num_rows) {
            header('Location: /');
        }

        $propiedad = mysqli_fetch_assoc($resultado);

        require 'includes/funciones.php';
        incluirTemplate('header');
    ?>

    <main class="contenedor seccion contenido-centrado">
    
        <h1><?php echo $propiedad['titulo']; ?></h1>
            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de casa frente al bosque">
        

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion']; ?></p>
            
        </div>
        
    </main>

<?php

    //Cerrar conexion
    mysqli_close($db);

    incluirTemplate('footer');
>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681
?>
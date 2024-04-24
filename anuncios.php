<<<<<<< HEAD

    <?php
        require 'includes/app.php';
        incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
        <h1>Casas y Departamentos en Venta</h1>
        <?php
            $limite = 10; 
            include 'includes/templates/anuncios.php';
        ?>
    </main>

<?php
    incluirTemplate('footer');
=======

    <?php
        require 'includes/funciones.php';
        incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
        <h1>Casas y Departamentos en Venta</h1>
        <?php
            $limite = 10; 
            include 'includes/templates/anuncios.php';
        ?>
    </main>

<?php
    incluirTemplate('footer');
>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681
?>
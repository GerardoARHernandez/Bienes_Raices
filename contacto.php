<<<<<<< HEAD

    <?php
        require 'includes/app.php';
        incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="build/img/destacada3.jpg" alt="Imagen de Contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">Correo:</label>
                <input type="email" placeholder="Tu Correo" id="email">

                <label for="telefono">Teléfono:</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la Propiedad</legend>
                <label for="opciones">Vende o Compra:</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto:</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" min="0">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser Contactado:</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">Correo</label>
                    <input type="radio" name="contacto" id="contactar-email" value="email">
                </div>

                <p>Si eligió teléfono, elija la fecha y hora:</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="9:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
=======

    <?php
        require 'includes/funciones.php';
        incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="build/img/destacada3.jpg" alt="Imagen de Contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">Correo:</label>
                <input type="email" placeholder="Tu Correo" id="email">

                <label for="telefono">Teléfono:</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la Propiedad</legend>
                <label for="opciones">Vende o Compra:</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto:</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" min="0">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser Contactado:</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">Correo</label>
                    <input type="radio" name="contacto" id="contactar-email" value="email">
                </div>

                <p>Si eligió teléfono, elija la fecha y hora:</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="9:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
>>>>>>> 31fc66ffcfe07264b50180846c6550de36401681
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicio social</title>

    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= $urlConstant ?>public/css/style.css">
    <link rel="stylesheet" href="<?= $urlConstant ?>public/css/animate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">

    <!-- <link rel="shortcut icon" type="image/ico" href="img/favicon.ico" /> -->
    <link rel="manifest" href="manifest.json">

    <!-- Android -->
    <meta name="theme-color" content="#3498db">

    <!-- iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Apple Touch Icons -->
    <?php include 'views/apple_touch_icons.php'; ?>

    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Twittor!">
</head>

<body>
    <!-- Greeting -->
    <h2 class="text-center">Hola <?= $data['dato'] ?></h2>
    <!-- Include Header -->
    <?php include "views/header.php"; ?>

    <!-- Student Profile -->
    <div class="student-profile container">
        <div class="controls-left">
            <!-- Add your controls here -->
            <button id="programasButton" class="control-button">Mis programas</button><br>
            <button id="alumnosButton" class="control-button">Mis alumnos</button><br>
            <button id="pendientesButton" class="control-button">Pendientes</button>
        </div>
        <div class="profile-info text-center">
            <a onclick="toggleWindow()">
                <img data-user="spiderman" src="https://cdn-icons-png.flaticon.com/512/3891/3891710.png" alt="spiderman" class="profile-avatar" title="Consultar mi información" style="cursor:pointer">
            </a>
            <p>Actualmente cuentas con 6 alumnos en tu empresa, puedes visualizarlos desde 'Mis alumnos':</p>

            <div class="report-icons">
            </div>

            <p>Has completado 336 horas, recuerda que al completar las 480 debes realizar el siguiente reporte</p>
            <p>Recuerda que puedes completar el reporte desde la sección "Crear reporte"</p>
        </div>
    </div>

    <div id="popup" class="floating-window" style="display:none">
        <button class="close-button" onclick="toggleWindow()">X</button>
        <div id="popupContent"></div>
    </div>

    <script>
        function toggleWindow() {
            var popup = document.getElementById("popup");
            var popupContent = document.getElementById("popupContent");

            if (popup.style.display === "none" || popup.style.display === "") {
                // Verifica si se seleccionó el botón "programas"
                var selectedButton = event.target.id;
                var url;

                if (selectedButton === "programasButton") {
                    // Establece la URL para cargar el archivo "inscripcion.php"
                    url = "<?= $urlConstant ?>programasEmpresa";
                } else if (selectedButton === "alumnosButton") {
                    // Establece la URL para cargar el archivo "inscripcion.php"
                    url = "<?= $urlConstant ?>alumnosEmpresa";
                } else if (selectedButton === "pendientesButton") {
                    // Establece la URL para cargar el archivo "inscripcion.php"
                    url = "<?= $urlConstant ?>pendientesAlumnosEmp";
                } else {
                    // Establece la URL para cargar la vista "perfil"
                    url = "<?= $urlConstant ?>perfilempresa";
                }

                // Realiza la solicitud GET utilizando Fetch
                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        // Carga el contenido de la vista en la ventana emergente
                        popupContent.innerHTML = data;
                        // Muestra la ventana emergente
                        popup.style.display = "grid";

                        // Verifica si se seleccionó el botón "programas" o "alumnos"
                        if (selectedButton === "programasButton" || selectedButton === "alumnosButton") {

                            // Inicializa Slick Carousel para la vista "inscripcion.php"
                            $(".carousel").slick({
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                infinite: true,
                                prevArrow: '<button type="button" class="slick-prev">Prev</button>',
                                nextArrow: '<button type="button" class="slick-next">Next</button>',
                            });
                            // Ajusta la altura de los elementos del carrusel para que sean iguales
                            equalizeCarouselItemHeights();
                        }
                    })
                    .catch(error => {
                        console.error("Error al cargar la vista:", error);
                    });

            } else {
                // Oculta la ventana emergente
                popup.style.display = "none";
                // Limpia el contenido de la ventana emergente
                popupContent.innerHTML = "";
            }
        }

        // Obtiene los botones
        var programasButton = document.getElementById("programasButton");
        var alumnosButton = document.getElementById("alumnosButton");
        var pendientesButton = document.getElementById("pendientesButton");
        var eliminarPrograma =document.getElementById("eliminarPrograma");
        // Agrega un evento click a los botones utilizando addEventListener
        programasButton.addEventListener("click", toggleWindow);
        alumnosButton.addEventListener("click", toggleWindow);
        pendientesButton.addEventListener("click", toggleWindow);
            function confirmarEliminacion(programaId) {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar este programa?");

        if (confirmacion) {
            // Ejecutar el código de eliminación aquí
            var url = "<?php echo constant('URL') . 'programasEmpresa/deletePrograma/'; ?>" + programaId;
            window.location.href = url;
        }
    }
        
        // Obtiene la imagen de perfil
        var profileImage = document.querySelector(".profile-avatar");

        // Agrega un evento click a la imagen utilizando addEventListener
        profileImage.addEventListener("click", toggleWindow);

        function equalizeCarouselItemHeights() {
            const carouselItems = document.querySelectorAll('.item2');
            let maxHeight = 0;

            // Obtener la altura máxima entre los elementos
            carouselItems.forEach(item => {
                item.style.height = '580px'; // Restablecer la altura para obtener la altura real
                const itemHeight = item.offsetHeight;
                if (itemHeight > maxHeight) {
                    maxHeight = itemHeight;
                }
            });

            // Establecer la altura máxima en todos los elementos
            carouselItems.forEach(item => {
                item.style.height = maxHeight + 'px';
            });
        }

        

        var crearProgramaButton = document.getElementById("crearProgramaButton");
        var verAlumno =document.getElementById("verAlumno");
        
        verAlumno.addEventListener("click", toggleWindow);

        crearProgramaButton.addEventListener("click", toggleWindow);
        // Llamar a la función cuando el contenido esté cargado y al cambiar el tamaño de la ventana
        window.addEventListener('DOMContentLoaded', equalizeCarouselItemHeights);
        window.addEventListener('resize', equalizeCarouselItemHeights);
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        function mostrarFormulario() {
            document.getElementById("formularioPrograma").style.display = "block";
            document.getElementById("programas").style.display = "none";
        }

        function mensajeEnvio() {
            alert("Se ha enviado tu programa para revisión");
        }
    </script>

</body>

</html>

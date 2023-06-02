<?php
$etapa = $this->d['etapa'];
?>

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

    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
    <link rel="manifest" href="manifest.json">

    <!-- Android -->
    <meta name="theme-color" content="#3498db">

    <!-- iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Apple Touch Icons -->
    <?php include 'views/apple_touch_icons.php'; ?>

    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Twittor!">

    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Quicksand', sans-serif;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            text-align: center;
        }

        .file-input-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
            width: 300px;
            /* Ancho fijo para todos los campos de archivo */
        }

        .file-input-label {
            display: inline-block;
            background-color: #c1d8e6;
            color: #333;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            /* Ocupar todo el ancho disponible en el contenedor */
        }

        input[type="file"] {
            display: none;
        }

        #submitButton {
            display: block;
            margin: 20px auto;
            background-color: #c1d8e6;
            color: #333;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #mensaje {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        

        .file-input-container.uploaded .file-input-label {
            background-color: #37de2f
        }
    </style>
</head>

<body>
    <!-- Greeting -->
    <h2 class="text-center">Hola <?= $data['dato'] ?></h2>
    <!-- Include Header -->
    <?php include "views/header.php"; ?>
    <?php include "views/alumno/progreso.php"; ?>

    <!-- Student Profile -->
    <div class="student-profile container">
        <div class="controls-left">
            <!-- Add your controls here -->
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <button id="programasButton" class="control-button">Programas</button><br>
            <button id="reportesButton" class="control-button">Reportes</button>
        </div>
        <div class="profile-info text-center">
            <a onclick="toggleWindow()">
                <img data-user="spiderman" src="data:image/jpeg;base64, <?= $data['imagen'] ?>" alt="spiderman" class="profile-avatar" title="Consultar mi información" style="cursor:pointer">
            </a>
            <?php
            if ($etapa[0]['etapa1'] === 1 && $etapa[0]['etapa2'] === 0 && $etapa[0]['etapa3'] === 0 && $etapa[0]['etapa4'] === 0 && $etapa[0]['etapa5'] === 0 && $etapa[0]['etapa6'] === 0 && $etapa[0]['etapa7'] === 0 && $etapa[0]['etapa8'] === 0 && $etapa[0]['etapa9'] === 0) {
            ?>
            <p class = "textPerfil">Sube tus documentos para poder postularte a un programa del servicio social</p>
            
            <form id="uploadForm" action="alumno/actualizarEtapa" method="post">
                <div class="file-input-container">
                    <label for="constanciaEstudios" class="file-input-label">Constancia de estudios</label>
                    <input type="file" id="constanciaEstudios" accept=".pdf">
                </div>
                <div class="file-input-container">
                    <label for="cartaCumplimiento" class="file-input-label">Carta de cumplimiento de créditos escolares</label>
                    <input type="file" id="cartaCumplimiento" accept=".pdf">
                </div>
                <div class="file-input-container">
                    <label for="curp" class="file-input-label">CURP</label>
                    <input type="file" id="curp" accept=".pdf">
                </div>
                <div class="file-input-container">
                    <label for="actaNacimiento" class="file-input-label">Acta de nacimiento</label>
                    <input type="file" id="actaNacimiento" accept=".pdf">
                </div>
                <input type="submit" value="Subir archivos" id="submitButton" class = "textPerfil">
                <p id="mensaje"></p>
                
            </form>
            <?php } 
            else if ($etapa[0]['etapa1'] === 1 && $etapa[0]['etapa2'] === 1 && $etapa[0]['etapa3'] === 0 && $etapa[0]['etapa4'] === 0 && $etapa[0]['etapa5'] === 0 && $etapa[0]['etapa6'] === 0 && $etapa[0]['etapa7'] === 0 && $etapa[0]['etapa8'] === 0 && $etapa[0]['etapa9'] === 0) {
                ?>
                <p>Tus documentos estan siendo revisados por tu asesor, espera su <br>respuesta en un plazo de entre 24 y 48 horas</p>
                <?php
                }
                ?>
        </div>
    </div>
    <!-- <p>Actualmente has entregado 2 reportes:</p>
    <div class="report-icons">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1667px-PDF_file_icon.svg.png" class="report-icon">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1667px-PDF_file_icon.svg.png" class="report-icon">
    </div>

    <p>Has completado 336 horas, recuerda que al completar las 480 debes realizar el siguiente reporte</p>
    <p>Recuerda que puedes completar el reporte desde la sección "Crear reporte"</p> -->

    <div id="popup" class="floating-window">
        <button class="close-button" onclick="toggleWindow()">X</button>
        <div id="popupContent"></div>
    </div>

    <script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var formData = new FormData(this);
        
        // Mostrar mensaje de carga
        document.getElementById('mensaje').textContent = 'Subiendo archivos...';
        
        fetch(this.action, {
            method: this.method,
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Mostrar mensaje de confirmación
            document.getElementById('mensaje').textContent = data;
            
            // Esperar 2 segundos y recargar la página
            setTimeout(function() {
                location.reload();
            }, 2000);
        })
        .catch(error => {
            console.error("Error al enviar el formulario:", error);
        });
    });
</script>

    <script>
        function changeInputFileColor(inputId) {
            var inputElement = document.getElementById(inputId);
            var parentElement = inputElement.parentNode;

            // Agregar la clase 'uploaded' al contenedor del campo de entrada de archivos
            parentElement.classList.add('uploaded');
        }

        document.getElementById('constanciaEstudios').addEventListener('change', function() {
            changeInputFileColor('constanciaEstudios');
        });

        document.getElementById('cartaCumplimiento').addEventListener('change', function() {
            changeInputFileColor('cartaCumplimiento');
        });

        document.getElementById('curp').addEventListener('change', function() {
            changeInputFileColor('curp');
        });

        document.getElementById('actaNacimiento').addEventListener('change', function() {
            changeInputFileColor('actaNacimiento');
        });
    </script>
    <script>
        // Capturar el evento submit del formulario
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar que el formulario se envíe de forma convencional

            // Obtener los archivos seleccionados
            var constanciaEstudios = document.getElementById('constanciaEstudios').files[0];
            var cartaCumplimiento = document.getElementById('cartaCumplimiento').files[0];
            var curp = document.getElementById('curp').files[0];
            var actaNacimiento = document.getElementById('actaNacimiento').files[0];

            // Verificar si se ha seleccionado al menos un archivo
            if (constanciaEstudios && cartaCumplimiento && curp && actaNacimiento) {
                // Deshabilitar el botón de enviar
                document.getElementById('submitButton').disabled = true;

                // Mostrar mensaje de carga
                document.getElementById('mensaje').textContent = 'Subiendo archivos...';

                // Simular carga durante 2 segundos
                setTimeout(function() {
                    // Mostrar mensaje de confirmación
                    document.getElementById('mensaje').innerHTML = 'Tus documentos se han enviado para revisión a tu coordinador.<br>Espera un plazo de entre 24 y 48 horas para determinar <br>si tus documentos son correctos.Se te hará saber por este medio.';

                    // Habilitar nuevamente el botón de enviar
                    document.getElementById('submitButton').disabled = false;
                }, 2000);
            } else {
                // Mostrar mensaje de error si no se ha seleccionado ningún archivo
                document.getElementById('mensaje').textContent = 'Por favor, selecciona al menos un archivo.';
            }
        });
    </script>

    <script>
        function toggleWindow() {
            var popup = document.getElementById("popup");
            var popupContent = document.getElementById("popupContent");

            if (popup.style.display === "none" || popup.style.display === "") {
                // Verifica si se seleccionó el botón "programas" o la imagen de perfil
                var selectedButton = event.target.id;
                var url;

                if (selectedButton === "programasButton") {
                    // Establece la URL para cargar el archivo "inscripcion.php"
                    url = "<?= $urlConstant ?>programasalumno";
                } else if (selectedButton === "reportesButton") {
                    url = "<?= $urlConstant ?>reporte";
                } else {
                    // Establece la URL para cargar la vista "primerInicio"
                    url = "<?= $urlConstant ?>perfil";
                }

                // Realiza la solicitud GET utilizando Fetch
                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        // Carga el contenido de la vista en la ventana emergente
                        popupContent.innerHTML = data;
                        // Muestra la ventana emergente
                        popup.style.display = "grid";

                        // Verifica si se seleccionó el botón "programas"
                        if (selectedButton === "programasButton") {
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

        // Llama a la función toggleWindow() al cargar la página para mostrar la ventana "primerInicio"
        // window.addEventListener('DOMContentLoaded', function() {
        //     toggleWindow();

        //     // Verifica si es la ventana "primerInicio" y muestra automáticamente
        //     var popupContent = document.getElementById("popupContent");
        //     if (popupContent.innerHTML === "") {
        //         // Establece el ID del botón "primerInicio" para que la función toggleWindow() cargue la URL correspondiente
        //         event = { target: { id: "primerInicioButton" } };
        //         toggleWindow();
        //     }
        // });

        // Obtiene el botón "programas"
        var programasButton = document.getElementById("programasButton");

        // Agrega un evento click al botón utilizando addEventListener
        programasButton.addEventListener("click", toggleWindow);
        var reportesButton = document.getElementById("reportesButton");
        reportesButton.addEventListener("click", toggleWindow);

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

        // Llamar a la función cuando el contenido esté cargado y al cambiar el tamaño de la ventana
        window.addEventListener('DOMContentLoaded', equalizeCarouselItemHeights);
        window.addEventListener('resize', equalizeCarouselItemHeights);
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>

</html>
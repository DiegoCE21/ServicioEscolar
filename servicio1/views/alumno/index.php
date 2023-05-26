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
            <button id="programasButton" class="control-button">Programas</button><br>
            <button id = "reportesButton" class="control-button">Reportes</button>
        </div>
        <div class="profile-info text-center">
            <a onclick="toggleWindow()">
                <img data-user="spiderman" src="https://media.istockphoto.com/id/1288634246/es/foto/joven-estudiante-latina-sonriendo-feliz-carpeta-en-la-ciudad.jpg?b=1&s=612x612&w=0&k=20&c=In-7V0lbhjNip4gV29vJY7HfL-BgADc8dEp8LEkBUEY=" alt="spiderman" class="profile-avatar" title="Consultar mi información" style="cursor:pointer">
            </a>
            <p>Actualmente has entregado 2 reportes:</p>

            <div class="report-icons">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1667px-PDF_file_icon.svg.png" class="report-icon">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1667px-PDF_file_icon.svg.png" class="report-icon">
            </div>

            <p>Has completado 336 horas, recuerda que al completar las 480 debes realizar el siguiente reporte</p>
            <p>Recuerda que puedes completar el reporte desde la sección "Crear reporte"</p>
        </div>
    </div>

    <div id="popup" class="floating-window" >
        <button class="close-button" onclick="toggleWindow()">X</button>
        <div id="popupContent"></div>
    </div>

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
                url = "<?= $urlConstant ?>inscripcion";
            } else if(selectedButton === "reportesButton"){
                url = "<?= $urlConstant ?>reporte";
            } 
            else {
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
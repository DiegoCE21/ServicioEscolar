<?php
$data = $this->d['dato'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Resto del código del encabezado... -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <!-- Resto del código del encabezado... -->
    <style>
        .item2 {
            position: relative;
        }

        .button-container {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
        }

        .botonEmpresa {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .carousel {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 50px;
            align-items: stretch;
            position: relative;
        }

        .item2 {
            width: 100%;
            border: 5px solid #ccc;
            border-radius: 30px;
            padding: 2px;
            margin-left: 10px;
            margin-right: 10px;
            text-align: center;
            background-color: white;
        }

        .carousel-btn-container {
            position: relative;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 24px;
            color: #000;
            cursor: pointer;
        }

        #prevBtn {
            left: 0;
        }

        #nextBtn {
            right: 0;
        }
    </style>
</head>

<body>
    <!-- Resto del código del cuerpo... -->

    <h3>Se encuentran registradas las siguientes dependencias:</h3>
    <div class="carousel-btn-container">
        <button class="carousel-btn" id="prevBtn"></button>
        <div class="carousel">
            <?php $iteration = 1; ?>
            <?php foreach ($data as $key => $dependencia) : ?>
                <div class="item2">
                    <h2 class="texto">Dependencia <?php echo $iteration; ?></h2>
                    <h2 class="texto">Nombre: <?php echo $dependencia['nombre_empresa']; ?></h2>
                    <p class="textconvocatoria">Calle: <?php echo $dependencia['calle_empresa']; ?></p>
                    <p class="textconvocatoria">Ciudad: <?php echo $dependencia['ciudad_empresa']; ?></p>
                    <p class="textconvocatoria">Teléfono: <?php echo $dependencia['telefono_empresa']; ?></p>
                    <div class="button-container">
                        <button class="botonEmpresa">Ver detalles</button>
                    </div>
                </div>
                <?php $iteration++; ?>
            <?php endforeach; ?>

        </div>

        <button class="carousel-btn" id="nextBtn"></button>
    </div>

    <!-- Resto del código del cuerpo... -->

    <div id="popup" class="floating-window" style="display:none">
        <button class="close-button" onclick="toggleWindow()">X</button>
        <div id="popupContent"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                prevArrow: '<button type="button" class="slick-prev">Prev</button>',
                nextArrow: '<button type="button" class="slick-next">Next</button>',
            });
        });

        function equalizeCarouselItemHeights() {
            var carouselItems = document.querySelectorAll('.item2');
            var maxHeight = 0;
            carouselItems.forEach(function(item) {
                item.style.height = 'auto';
                var itemHeight = item.offsetHeight;
                if (itemHeight > maxHeight) {
                    maxHeight = itemHeight;
                }
            });
            carouselItems.forEach(function(item) {
                item.style.height = maxHeight + 'px';
            });
        }
        
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
                    url = "<?= $urlConstant ?>estudiantePerfil";
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
        
        var verAlumno = document.getElementById("verAlumno");
        verAlumno.addEventListener("click", toggleWindow);

        window.addEventListener('DOMContentLoaded', equalizeCarouselItemHeights);
        window.addEventListener('resize', equalizeCarouselItemHeights);
    </script>
</body>
</html>

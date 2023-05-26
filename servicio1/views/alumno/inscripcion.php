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
        .carousel {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 50px;
            align-items: stretch;
            position: relative; /* Añade esta propiedad para posicionar los botones */
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

    <h3>Te puedes postular en los siguientes programas:</h3>
    <div class="carousel-btn-container">
        <button class="carousel-btn" id="prevBtn"></button>
        <div class="carousel">
        <?php $iteration = 1; ?>
        <?php foreach ($data as $key => $programa): ?>
            <div class="item2">
                <h2 class="texto">Programa <?php echo $iteration; ?></h2>
                <img src="https://hospitalyolombo.gov.co/wp-content/uploads/2021/02/logo-convocatoria-900x506.png" width="200px">
                <h2 class="texto"><?php echo $programa['nombre_programa']; ?></h2>
                <p class="convo">Alumnos requeridos: <?php echo $programa['num_alumnos']; ?></p>
                <p class="textconvocatoria">Actividades: <?php echo $programa['actividades']; ?></p>
                <p class="textconvocatoria">Fecha de publicación: <?php echo $programa['fecha_inicio_programa']; ?></p>
                <p class="textconvocatoria">Fecha de cierre: <?php echo $programa['fecha_fin_programa']; ?></p>
                <button class="button">Ver detalles</button>
            </div>
            <?php $iteration++; ?>
        <?php endforeach; ?>
        </div>

        <button class="carousel-btn" id="nextBtn"></button>
    </div>

    <!-- Resto del código del cuerpo... -->

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
    </script>
</body>
</html>

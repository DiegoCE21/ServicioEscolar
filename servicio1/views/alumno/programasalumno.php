<?php
$dato = $this->d['programasAlumnos'];
$estudiante = $this->d['programasEnfermeria'];

// Verificar si hay un mensaje
if (isset($_SESSION['mensaje'])) {
    echo '<script>alert("'.$_SESSION['mensaje'].'");</script>';
    unset($_SESSION['mensaje']);
}
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
            position: relative; /* Añadido esto */
        }

        .button-container {
            position: absolute; /* Cambiado de inline-block a absolute */
            bottom: 10px; /* Añadido esto */
            width: 100%; /* Asegura que el contenedor ocupa todo el ancho */
            text-align: center; /* Centra los botones horizontalmente */
        }

        .botonEmpresa {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 2px 2px;
            cursor: pointer;
        }

        .botonEmpresa2 {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin-right: 60px;
            cursor: pointer;
            float: right;
        }

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

    <div id = "programas">
    <h3>Tu puedes inscribir en los siguientes programas:</h3>
    <!-- <button class="botonEmpresa2" id="crearProgramaButton" onclick="mostrarFormulario()">Crear un nuevo programa</button><br><br> -->

    <div class="carousel-btn-container">
        <button class="carousel-btn" id="prevBtn"></button>
        <div class="carousel">
            <?php $iteration = 1; ?>
            <?php foreach ($dato as $key => $programa): ?>
            <div class="item2">
                <h2 class="texto">Programa <?php echo $iteration; ?></h2>
                <img src="https://hospitalyolombo.gov.co/wp-content/uploads/2021/02/logo-convocatoria-900x506.png" width="200px">
                <h2 class="texto"><?php echo $programa['nombre_programa']; ?></h2>
                <p class="convo">Alumnos requeridos: <?php echo $programa['num_alumnos']; ?></p>
                <p class="textconvocatoria">Actividades: <?php echo $programa['actividades']; ?></p>
                <p class="textconvocatoria">Fecha de publicación: <?php echo $programa['fecha_inicio_programa']; ?></p>
                <p class="textconvocatoria">Fecha de cierre: <?php echo $programa['fecha_fin_programa']; ?></p>
                <div class="button-container">
        <form action="/servicio1/programasalumno/postularme" method="POST">
            <input type="text"  style = "display:none;" name="id_programa" value="<?php echo $programa['id_programa']; ?>">
            <input type="text"  style = "display:none;" name="id_estudiante" value="<?php echo $estudiante['id_estudiante'] ?>">
            <input type="text"  style = "display:none;" name="id_escuela" value="<?php echo $estudiante['id_escuela'] ?>">
            <button class="botonEmpresa" type="submit" action = "programasalumno/postularme">Postularme</button> 
        </form>
    </div>
                <div class="button-container">
                <!-- <button class="botonEmpresa" type="submit">Postularme</button> -->
                </div>
            </div>
            <?php $iteration++; ?>
            <?php endforeach; ?>
        </div>

        <button class="carousel-btn" id="nextBtn"></button>
    </div>
    </div>
    

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

        function mostrarFormulario() {
            document.getElementById("formularioPrograma").style.display = "block";
            document.getElementById("programas").style.display = "none";
        }

        function postularme(id_programa, id_estudiante, id_escuela) {
            document.getElementById("id_programa_input").value = id_programa;
            document.getElementsByName("id_estudiante")[0].value = id_estudiante;
            document.getElementsByName("id_escuela")[0].value = id_escuela;
            document.getElementById("formularioPrograma").submit();
        }
    </script>
    <script>
        function confirmarEliminacion(programaId) {
            var confirmar = confirm("¿Está seguro de que desea eliminar este programa?");

            if (confirmar) {
                // Aquí puedes agregar la lógica para eliminar el programa
                alert("Programa eliminado exitosamente");
            }
        }
    </script>
</body>
</html>

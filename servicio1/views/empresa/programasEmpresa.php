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
    <!-- Resto del código del cuerpo... -->
    <form id = "formularioPrograma" style = "display:none">
    <label for="nombre_programa">Nombre del programa:</label>
  <input type="text" id="nombre_programa" name="nombre_programa" required>

  <label for="descripcion_programa">Descripción del programa:</label>
  <textarea id="descripcion_programa" name="descripcion_programa" required></textarea>

  <label for="fecha_inicio_programa">Fecha de inicio del programa:</label>
  <input type="date" id="fecha_inicio_programa" name="fecha_inicio_programa" required>

  <label for="fecha_fin_programa">Fecha de fin del programa:</label>
  <input type="date" id="fecha_fin_programa" name="fecha_fin_programa" required>

  <label for="hora_inicio">Hora de inicio:</label>
  <input type="time" id="hora_inicio" name="hora_inicio" required>

  <label for="hora_fin">Hora de fin:</label>
  <input type="time" id="hora_fin" name="hora_fin" required>

  <label for="actividades">Actividades:</label>
  <textarea id="actividades" name="actividades" required></textarea>

  <label for="carrera_solicitada">Carrera solicitada:</label>
<select id="carrera_solicitada" name="carrera_solicitada" required>
  <option value="ISC">ISC</option>
  <option value="II">II</option>
  <option value="CP">CP</option>
  <option value="IGE">IGE</option>
  <option value="IC">IC</option>
</select>

  <label for="num_alumnos">Número de alumnos:</label>
  <input type="number" id="num_alumnos" name="num_alumnos" required>
  
  <!-- Aquí puedes agregar más campos si es necesario -->
<br>
  <input type="submit" value="Enviar" class = "botonEmpresa" onclick = "mensajeEnvio()">
    </form>
    <div id = "programas">
    <h3>Tu empresa cuenta con los siguientes programas:</h3><button class="botonEmpresa2" id="crearProgramaButton" onclick="mostrarFormulario()">Crear un nuevo programa</button><br><br>

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
                <div class="button-container">
                    <button class="botonEmpresa">Modificar</button>
                    <button id = "eliminarPrograma" class="botonEmpresa" onclick="confirmarEliminacion('<?php echo $programa['id_programa']; ?>')">Eliminar</button>

                </div>
            </div>
            <?php $iteration++; ?>
            <?php endforeach; ?>
        </div>

        <button class="carousel-btn" id="nextBtn"></button>
    </div>
    </div>
    <!-- Resto del código del cuerpo... -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <script>
    $(document).ready(function() {
        $('.eliminarPrograma').click(function() {
            var programaId = $(this).data('program-id');
            alert(programaId);
            $.ajax({
                url: 'controllers/programasEmpresa/eliminar/' + programaId,
                method: 'GET',
                dataType: 'json',
                contentType: 'application/json',
                success: function(response) {
                    alert(programaId);
                    if (response.success) {
                        alert('Programa eliminado exitosamente.');
                        location.reload();
                    } else {
                        alert(programaId);
                        alert('No se pudo eliminar el programa.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                    var errorResponse = JSON.parse(jqXHR.responseText);
                    alert(errorResponse);
                    var errorMsg = 'Ocurrió un error al eliminar el programa. Detalles: ' + errorResponse.details;
                    alert(errorMsg);
                }
            });
        });
    });
</script> -->
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
        function mostrarformulario(){
    document.getElementById("formularioPrograma").style.display = "block";
    document.getElementById("programas").style.display = "none";
}
    </script>
    <script>
    function confirmarEliminacion(programaId) {
        var confirmacion = confirm("¿Estás seguro de que deseas eliminar este programa?");

        if (confirmacion) {
            // Ejecutar el código de eliminación aquí
            var url = "<?php echo constant('URL') . 'programasEmpresa/deletePrograma/'; ?>" + programaId;
            window.location.href = url;
        }
    }

    // Resto del código...
</script>
</body>
</html>

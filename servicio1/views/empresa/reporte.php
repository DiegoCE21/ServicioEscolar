
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicio social</title>

    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/animate.css">

    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />

    <link rel="manifest" href="manifest.json">

    <!-- Android -->
    <meta name="theme-color" content="#3498db">

    <!-- IOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">


    <link rel="apple-touch-icon" href="img/icons/icon-192x192.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-192x192.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-152x152.png">

    <!-- iPhone X (1125px x 2436px) -->
    <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" href="img/icons-ios/apple-launch-1125x2436.png">
    <!-- iPhone 8, 7, 6s, 6 (750px x 1334px) -->
    <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" href="img/icons-ios/apple-launch-750x1334.png">
    <!-- iPhone 8 Plus, 7 Plus, 6s Plus, 6 Plus (1242px x 2208px) -->
    <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3)" href="img/icons-ios/apple-launch-1242x2208.png">
    <!-- iPhone 5 (640px x 1136px) -->
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="img/icons-ios/apple-launch-640x1136.png">

    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="apple-mobile-web-app-title" content="Twittor!">

</head>

<body>
<?php
    include "views/header.php"; 
?>

<br><br><br><br><br>
<a href="<?php echo constant('URL'); ?>alumno"><span id="btn-volver" class="fa fa-elevator animated fadeIn fast" style="cursor:pointer;" title="Inscribirme a un programa">Volver</span></a>
        <a href="<?php echo constant('URL'); ?>inscripcion"><span id="btn-registrarse" class="fa fa-marker animated fadeIn fast" style="cursor:pointer;" title="Inscribirme a un programa">Inscribirme</span></a>
        <span id="btn-registrarse" class="fa fa-marker animated fadeIn fast" style="cursor:pointer;" title="Inscribirme a un programa">Crear reporte</span>
<h1>En el siguiente formulario ingresa los datos de tu reporte</h1>
<div style="display: flex; justify-content: center; align-items: center;">
    <div id="crearReporte" style="margin-left: 50px; text-align: center; border-radius: 100px; flex-direction: column; justify-content: center; align-items: center; width: 60%;">
        <h2>Llena correctamente cada campo</h2>
        <form style="display: grid; grid-template-columns: 1fr 1fr 1fr; grid-gap: 10px;">
            <div class="form-group">
                <label for="nombreEstudiante">Nombre del estudiante:</label>
                <input type="text" id="nombreEstudiante" name="nombreEstudiante">
            </div>
            <div class="form-group">
                <label for="institucion">Institución educativa:</label>
                <input type="text" id="institucion" name="institucion">
            </div>
            <div class="form-group">
                <label for="periodo">Período de realización:</label>
                <input type="text" id="periodo" name="periodo">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción del proyecto o actividades realizadas:</label>
                <input type="text" id="descripcion" name="descripcion">
            </div>
            <div class="form-group">
                <label for="horas">Horas totales dedicadas al servicio social:</label>
                <input type="text" id="horas" name="horas">
            </div>
            <div class="form-group">
                <label for="fechaInicio">Fecha de inicio del proyecto:</label>
                <input type="date" id="fechaInicio" name="fechaInicio">
            </div>
            <div class="form-group">
                <label for="fechaFin">Fecha de finalización del proyecto:</label>
                <input type="date" id="fechaFin" name="fechaFin">
            </div>
            <div class="form-group">
                <label for="objetivos">Objetivos del servicio social:</label>
                <input type="text" id="objetivos" name="objetivos">
            </div>
            <div class="form-group">
                <label for="resultados">Resultados y logros obtenidos:</label>
                <input type="text" id="resultados" name="resultados">
            </div>
            <div class="form-group">
                <label for="evaluacion">Evaluación del supervisor:</label>
                <input type="text" id="evaluacion" name="evaluacion">
            </div>
            <!-- Resto de los campos de entrada... -->
            <div class="form-group">
                <label for="firmaEstudiante">Firma del estudiante:</label>
                <input type="text" id="firmaEstudiante" name="firmaEstudiante">
            </div>
            <div class="form-group">
                <label for="firmaSupervisor">Firma del supervisor:</label>
                <input type="text" id="firmaSupervisor" name="firmaSupervisor">
            </div>
            <div>
                <button type="button" id="continuar-btn" class="botoncito" onclick="mensaje()">Enviar reporte</button>
            </div>    
        </div>
</div>


<script src="views/user/js/libs/jquery.js"></script>
    <script src="views/user/js/app.js"></script>
    <script>
        function mensaje(){
            alert("Se ha enviado tu reporte para revision");
        }
        </script>

</body>

</html>
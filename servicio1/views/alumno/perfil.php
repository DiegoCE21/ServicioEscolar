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

    <style>
        body {
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;

            background-color: #ecf0f1;
        }

        .timeline {
            background-color: #ecf0f1;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 800px;
            margin: 0 auto; /* Añadido para centrar el contenedor */
        }

        .column {
            flex-basis: 100%;

        }

        .avatar2 {
            width: 100%;
            text-align: center;
        }

        .bubble-container {
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        .bubble-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-column-gap: 20px;
            width: 100%;
        }

        .arrow {
            position: relative;
            width: 0;
            height: 0;

            border-bottom: 10px solid transparent;
            border-right: 10px solid #f1f1f1;
            margin-left: 10px;
        }

        .progress-container {
            margin-top: 0;
            width: 100%;
        }

        h2,
        .avatar2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="column">
            <h2 class = "textPerfil">Tu información es:</h2>
            <div class="avatar2">
            <img class="profile-avatar" src="data:image/png;base64,<?php echo $imagen ?>" style="display: inline-block; width: 100%; max-width: 150px;">
            </div>
        </div>
        <div class="column">
            <ul id="timeline" class="timeline">
                <li class="animated fadeIn fast">
                    <div class="bubble-columns">
                        <div>
                            <strong>
                                <p>Nombre:
                            </strong> <?php echo $nombre; ?></p>
                            <strong>
                                <p>Teléfono:
                            </strong> <?php echo $telefono; ?></p>
                            <strong>
                                <p>Correo electrónico:
                            </strong> <?php echo $correo; ?></p>
                            <strong>
                                <p>Escuela:
                            </strong> <?php echo $escuela; ?></p>
                            <strong>
                                <p>Reportes entregados:
                            </strong> 2 reportes</p>
                        </div>
                        <div>
                            <strong>
                                <p>Carrera:
                            </strong> <?php echo $carrera; ?></p>
                            <strong>
                                <p>Contraseña:
                            </strong> <?php echo $contrasena; ?></p>
                            <strong>
                                <p>Haciendo servicio en:
                            </strong> <?php echo $empresa; ?></p>
                            <strong>
                                <p>Horas actuales de servicio:
                            </strong> 336 horas</p>
                        </div>
                    </div>
                  
                    <div class="progress-container">
                        <strong>
                            <p>Tu progreso actual es:
                        </strong></p>
                        <div class="progress-bar">
                            <div class="progress">
                                <div class="progress-text">70%</div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>

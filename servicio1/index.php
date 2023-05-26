<?php
// El siguiente bloque de codigo sirve para hacer test en el proyecto

// phpinfo();
# El directorio o carpeta en donde se van a crear los logs
define("RUTA_LOGS", __DIR__ . "/logs");
# Crear carpeta si no existe
if (!file_exists(RUTA_LOGS)) {
    mkdir(RUTA_LOGS);
}
# Poner fecha y hora de México, esto es por si el servidor tiene
# otra zona horaria
date_default_timezone_set("America/Mexico_City");
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
# Configuramos el ini para que No muestre errores
// ini_set('display_errors', 0);
ini_set('display_errors', FALSE);
# Los ponga en un archivo
// ini_set("log_errors", 1);
ini_set('log_errors', TRUE);
# Y le indicamos en dónde los va a poner, sería en algo como:
# RUTA_LOGS/2022-02-07.log
# Así cada día tenemos un archivo de log distinto
ini_set("error_log", RUTA_LOGS . "/" . date("Y-m-d") . ".log");

//tail -f /tmp/php-error.log
require_once 'libs/database.php';
require_once 'libs/messages.php';

require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/model.php';
require_once 'libs/app.php';


require_once 'classes/session.php';
require_once 'classes/sessionController.php';
require_once 'classes/errors.php';
require_once 'classes/success.php';


require_once 'config/config.php';

// include_once 'models/usermodel.php';
// include_once 'models/expensesmodel.php';
// include_once "models/categoriesmodel.php";
// include_once "models/joinexpensescategoriesmodel.php";

$app = new App();

?>
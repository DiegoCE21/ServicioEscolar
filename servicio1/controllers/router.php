<?php
// Archivo: router.php

// Obtener la URL solicitada
$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

// Verificar la URL y llamar al controlador y acción correspondiente
if ($url === '/') {
    // Ruta para la página de inicio
    
    $controller = new IndexController();
    $controller->indexAction();
} else {
    // Otras rutas y controladores...
}

?>
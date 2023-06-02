<?php
require_once 'controllers/errores.php';

class App{

    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        //var_dump($url);
        /*
            controlador->[0]
            metodo->[1]
            parameter->[2]
        */
        $url = explode('/', $url);

        // cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $archivoController = 'controllers/usuario.php';
            require_once $archivoController;
            $controller = new Usuario();
            $controller->loadModel('UsuarioModel');
            $controller->render();
            return false;
        }
        $archivoController = 'controllers/' . $url[0] . '.php';

        if(file_exists($archivoController)){
            require_once $archivoController;
        
            // Inicializar controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);
        
            // Si hay un método que se requiere cargar
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        // El método tiene parámetros
                        // Sacamos el número de parámetros
                        $nparam = sizeof($url) - 2;
                        // Crear un arreglo con los parámetros
                        $params = [];
                        // Iterar
                        for($i = 0; $i < $nparam; $i++){
                            array_push($params, $url[$i + 2]);
                        }
                        // Pasarlos al método
                        $controller->{$url[1]}($params);
                    }else{
                        // Si el método es "eliminar" y la clase es "ProgramasEmpresa"
                        if($url[1] === "eliminar" && $url[0] === "ProgramasEmpresa"){
                            // Verificar si se proporcionó el parámetro de ID del programa
                            if(isset($url[2])){
                                // Llamar al método "eliminar" con el ID del programa
                                $controller->{$url[1]}($url[2]);
                            }else{
                                // Mostrar error: ID del programa faltante
                                $controller = new Errores();
                            }
                        }else{
                            // Llamar al método sin parámetros
                            $controller->{$url[1]}();    
                        }
                    }
                }else{
                    $controller = new Errores(); 
                }
            }else{
                $controller->render();
            }
        }
        else{
            $controller = new Errores();
        }
    }
}

?>
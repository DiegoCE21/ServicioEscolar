<?php
require_once '../models/User.php';

class LoginController extends Controller{
    private $userModel;

    function __construct() {
        parent::__construct();
    }
    public function login() {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->getUser($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                switch ($user['rol']) {
                    case 'Estudiante':
                        header('Location: alumno.php');
                        break;
                    case 'Empresa':
                        header('Location: empresa.php');
                        break;
                    case 'Administrador':
                        header('Location: asesor.php');
                        break;
                }
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        }
    }
// }
?>

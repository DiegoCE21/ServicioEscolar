<?php
class Login extends SessionController{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('login/index');
    }

    function authenticate(){
        if (isset($_POST['submit'])) {
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            if ($username == '' || empty($username) || $password == '' || empty($password)) {
                // $this->redirect('login', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
                return;
            }

            $user = $this->model->login($username, $password);

            if ($user != NULL) {
                $this->initialize($user);
                $this->redirect('empresa');
                return;
            } else {
                error_log('Login::authenticate() Nombre de usuario y/o password incorrecto');
                // $this->redirect('login', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA]);
                return;
            }
        } else {
            error_log('Login::authenticate() Error al procesar solicitud');
            // $this->redirect('login', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATE]);
        }
    }
}
?>

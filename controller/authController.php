<?php

require_once './helper/authHelper.php';
require_once './model/userModel.php';
require_once './view/view.php';

class authController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new userModel();
        $this->view = new view();
    }

    public function showLogin()
    {
        $this->view->showLogin();
    }

    public function auth()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $this->view->renderHome('Faltan completar datos');
            return;
        }

        // Buscar el usuario por nombre de usuario
        $user = $this->model->getByUsername($username);
        if ($user) {
            // Verificar la contraseña utilizando password_verify
            if (password_verify($password, $user->password)) {
                // La contraseña es válida, usuario autenticado
                AuthHelper::login($user);
                header('Location: ' . BASE_URL);
            } else {
                // La contraseña no es válida
                $this->view->renderHome('Contraseña incorrecta');
            }
        } else {
            // El usuario no existe
            $this->view->renderHome('Usuario no encontrado');
        }
    }

    public function signUp(){

        if(empty($_POST['fullname']) || empty($_POST['username']) || empty($_POST['password'])){   
            $this->view->renderHome('Faltan completar datos.');
            return;
        }
        
        $nombre = $_POST['fullname'];
        $username= $_POST['username'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user = $this->model->getByUsername($username);

        if($user){
            $this->view->renderHome('Usuario repetido.');
            return;
        }

        $this->model->newUser($nombre, $username, $hashedPassword);
        $user = $this->model->getByUsername($username);
        if($user){
            AuthHelper::login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->renderHome('Error desconocido.');
        }
        
    }

    public function logout()
    {
        AuthHelper::init();

        if (isset($_SESSION['USER_ID'])) {
            // El usuario está autenticado, procede con la desconexión
            AuthHelper::logout();
        }

        header('Location: ' . BASE_URL);
    }
}
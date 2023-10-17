<?php

require_once './app/models/auth.model.php';
require_once './app/views/auth.view.php';
require_once './app/helpers/auth.helper.php';


class AuthController {
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new AuthModel();
        $this->view = new AuthView();
    }


    function showLogin() {
        $this->view->showLogin();
    }

    function auth() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)){
            $this->view->showLogin("Falta completar campos");
            return;
        }

        $user = $this->model->getByUsername($username);
        if ($user && password_verify($password, $user->password)) {
            AuthHelper::login($user);

            header('Location: ' . BASE_URL);


        } else {
            $this->view->showLogin('Usuario y/o contraseña inválido');
        }
    }


    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}
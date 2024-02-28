<?php

class Usuarios extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }

    public function validate()
    {
        if (empty($_POST['user']) || empty($_POST['password'])) {
            $msg = "Los campos estan vacios";
        } else {
            $user = $_POST['user'];
            $password = $_POST['password'];
            $data = $this->model->getUsuario($user, $password);
            if ($data) {
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['user'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $msg = "ok";
            } else {
                $msg = "Usuario o contraseña incorrectos";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}

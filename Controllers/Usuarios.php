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
        $data['cajas'] = $this->model->getCajas();
        $this->views->getView($this, "index", $data);
    }

    public function list()
    {
        $data = ($this->model->getUsuarios());
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            $data[$i]['acciones'] = '<div class="d-flex justify-content-center">
            <button class="btn btn-primary mr-1" type="button">Editar</button>
            <button class="btn btn-danger ml-2" type="button">Eliminar</button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
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

    public function registrar()
    {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $confirmar = $_POST['confirmar'];
        $caja = $_POST['caja'];

        if (empty($usuario) || empty($nombre) || empty($password) || empty($caja)) {
            $msg = "Todos los campos son obligatorios";
        } elseif ($password != $confirmar) {
            $msg = "Las contraseñas no coinciden";
        } else {
            $data = $this->model->registrarUsuario($usuario, $nombre, $password, $caja);
            if ($data == "ok") {
                $msg = "si";
            } else {
                $msg = "Error al registrar el usuario";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}

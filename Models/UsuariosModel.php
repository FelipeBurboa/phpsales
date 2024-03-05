<?php

class UsuariosModel extends Query
{
    private $usuario, $nombre, $password, $id_caja;
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario(string $user, string $password)
    {
        $sql = "SELECT * FROM usuario WHERE usuario = '$user' AND password = '$password'";
        $data = $this->select($sql);
        return $data;
    }

    public function getUsuarios()
    {
        $sql = "SELECT u.id, u.usuario,u.nombre, u.estado, c.caja FROM usuario u INNER JOIN caja c WHERE u.id_caja = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getCajas()
    {
        $sql = "SELECT * FROM caja WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarUsuario(string $usuario, string $nombre, string $password, int $id_caja)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->id_caja = $id_caja;
        $sql = "INSERT INTO usuario (usuario, nombre, password, id_caja) VALUES (?, ?, ?, ?)";
        $datos = array($this->usuario, $this->nombre, $this->password, $this->id_caja);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
};

<?php

class UsuariosModel extends Query
{
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
};

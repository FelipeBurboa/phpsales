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
};

<?php

class Connection
{
    private $connect;
    public function __construct()
    {
        $pdo = "mysql:host=" . host . ";dbname=" . db . ";charset=" . charset;
        try {
            $this->connect = new PDO($pdo, user, pass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    public function connect()
    {
        return $this->connect;
    }
}

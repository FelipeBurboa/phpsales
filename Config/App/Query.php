<?php

class Query extends Connection
{
    private $pdo, $connection, $sql;
    public function __construct()
    {
        $this->pdo = new Connection();
        $this->connection = $this->pdo->connect();
    }

    public function select(string $sql)
    {
        $this->sql = $sql;
        $result = $this->connection->prepare($this->sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectAll(string $sql)
    {
        $this->sql = $sql;
        $result = $this->connection->prepare($this->sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

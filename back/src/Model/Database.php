<?php

namespace App\Model;

class Database
{
    private $connection;
    protected string $table;

    public function getConnection()
    {
        if (!$this->connection) {
            //$this->connection = json_decode(file_get_contents($this->table), true);
            $this->connection = new \PDO("mysql:host=db;port=3306;dbname=desafioteste","root","1234", [\PDO::ATTR_PERSISTENT => true]);
        }

        return $this->connection;
    }
}

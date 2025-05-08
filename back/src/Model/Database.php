<?php

namespace App\Model;

class Database
{
    private $connection;
    protected string $table;

    public function getConnection()
    {
        if (!$this->connection) {
            $this->connection = json_decode(file_get_contents($this->table), true);
        }

        return $this->connection;
    }
}

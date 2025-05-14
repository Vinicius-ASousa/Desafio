<?php

namespace App\Model;

use App\Model\Database;

class Genres extends Database
{
    //protected string $table = __DIR__ . DIRECTORY_SEPARATOR. "/../../../movies.json";

    public function all(): array
    {
        $conn = $this->getConnection();

        $sth = $conn->prepare('SELECT name FROM genres');
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_COLUMN);
    }
}

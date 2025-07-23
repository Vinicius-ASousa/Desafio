<?php

namespace App\Model;

use App\Model\Model;

class Genres extends Model
{
    //protected string $table = __DIR__ . DIRECTORY_SEPARATOR. "/../../../movies.json";

    public function all(): array
    {
        $conn = $this->getConnection();

        $sth = $conn->prepare('SELECT * FROM genres ORDER BY name');
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function byname($name): array
    {
        $conn = $this->getConnection();
        $this->where("genres.name","where","%$name%");

        $sqlGenres = <<<EOF
        SELECT * FROM genres $this->wheres;
        EOF;

        $sth = $conn->prepare($sqlGenres);
        $sth->execute($this->bindValues);

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}

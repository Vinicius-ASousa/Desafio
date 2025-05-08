<?php

namespace App\Model;

use App\Model\Database;

//require_once __DIR__ . DIRECTORY_SEPARATOR . "/Database.php";

class Movie extends Database
{
    protected string $table = __DIR__ . DIRECTORY_SEPARATOR . "/../../../movies.json";

    public function list($criteria): array
    {
        $data = $this->getConnection();
        $genres = $criteria['genres'] ?? [];
        $name = $criteria['name'] ?? "";

        $result = [];

        foreach ($data as $movie) {
            // validar se tem os parâmetros para fazer os filtros
            $hasName = stripos($movie["name"], $name) !== false;
            $hasGenre = array_intersect($movie["genres"], $genres);
            if ($hasName && count($hasGenre) > 0) {
                $result[] = $movie;
            }
        }

        return $result;
    }
}

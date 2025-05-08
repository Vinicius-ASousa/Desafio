<?php

namespace App\Model;

use App\Model\Database;

class Genres extends Database
{
    protected string $table = __DIR__ . DIRECTORY_SEPARATOR. "/../../../movies.json";

    public function listGenres(): array
    {

        $data = $this->getConnection();

        $result = [];

        foreach($data as $genre){
            for($i=0;$i<count($genre["genres"]);$i++){
                $hasInArray = in_array($genre["genres"][$i], $result) == true;
                if(!$hasInArray){
                    $result[] = $genre["genres"][$i];
                }
            }
        }

        return $result;

    }
}

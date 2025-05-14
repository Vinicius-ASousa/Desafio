<?php

namespace App\Model;

use App\Model\Database;

//require_once __DIR__ . DIRECTORY_SEPARATOR . "/Database.php";

class Movie extends Database
{
    //protected string $table = __DIR__ . DIRECTORY_SEPARATOR . "/../../../movies.json";

    public function list($criteria): array
    {
        $conn = $this->getConnection();

        $genres = $criteria['genres'] ?? [];
        $name = $criteria['name'] ?? '';
        $result = [];

        $sql = 'SELECT BIN_TO_UUID(id) as id, name, description, image, year_publication, featured, genero FROM view_name where name LIKE :name ';

        // foreach ($data as $movie) {
        //     // validar se tem os parâmetros para fazer os filtros
        //     $hasName = stripos($movie["name"], $name) !== false;
        //     $hasGenre = array_intersect($movie["genres"], $genres);
        //     if ($hasName && count($hasGenre) > 0) {
        //         $result[] = $movie;
        //     }
        // }



        $sth = $conn->prepare($sql);
        $sth->bindValue(':name', "%$name%", \PDO::PARAM_STR);
        $sth->execute();
        $resultado = $sth->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($resultado as $linha) {
            if(array_key_exists($linha['id'],$result)){
                array_push($result[$linha['id']]['genres'], $linha["genero"]);

            }else{
                $result[$linha["id"]] = [
                    'id' => $linha["id"],
                    'name' => $linha["name"],
                    'description' => $linha["description"],
                    'image' => $linha["image"],
                    'year_publication' => $linha["year_publication"],
                    'featured' => $linha["featured"],
                    'genres' => [$linha["genero"]]
                ];
            }
            if(empty(array_intersect($genres, $result[$linha["id"]]['genres']))){
                unset($result[$linha['id']]);
        
            }
        }


        return $result;
    }
}

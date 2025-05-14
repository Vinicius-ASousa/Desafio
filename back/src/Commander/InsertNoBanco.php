<?php

use Dba\Connection;

$arquivo =__DIR__ . DIRECTORY_SEPARATOR. "/../../../movies.json";
$dados = json_decode(file_get_contents($arquivo),true);

$conn = new \PDO("mysql:host=127.0.0.1;port=3306;dbname=desafioteste","root","1234", [\PDO::ATTR_PERSISTENT => true]);


$sth = $conn->prepare("SELECT id, name FROM genres");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados as $key) {
    try{
        $sql = 'INSERT INTO movies VALUES (UUID_TO_BIN(:id), :name, :description, :image, :year_publication, :featured)';
        $statement = $conn->prepare($sql);
        $statement->bindValue('id', $key['id'], PDO::PARAM_STR);
        $statement->bindValue('name', $key['name'], PDO::PARAM_STR);
        $statement->bindValue('description', $key['description'], PDO::PARAM_STR);
        $statement->bindValue('image', $key['image'], PDO::PARAM_STR);
        $statement->bindValue('year_publication', $key['year_publication'], PDO::PARAM_INT);
        $statement->bindValue('featured', $key['featured'], PDO::PARAM_BOOL);
        $resultado = $statement->execute();

        var_dump($resultado ? "certo" : "falhou");

        foreach ($key["genres"] as $genero) {
            foreach ($result as $linha) {
                if($genero == $linha["name"]){
                    $relacional = "INSERT INTO filmes_generos VALUES (UUID_TO_BIN(:id_film), :id_genr)";
                    $sta = $conn->prepare($relacional);
                    $sta->bindValue('id_film', $key['id'],PDO::PARAM_STR);
                    $sta->bindValue('id_genr', $linha['id'],PDO::PARAM_STR);
                    $re = $sta->execute();

                     var_dump($re ? "certo relacional" : "falhou relacional");
                }
            }
        }
    }
    catch(\PDOException $e){
        echo $e;
    }
}

$conn=null;
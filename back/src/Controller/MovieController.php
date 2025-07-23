<?php

namespace App\Controller;

use App\Model\Movie;
use App\Validator\MovieSearchValidator;

// require_once __DIR__ . DIRECTORY_SEPARATOR . "../Model/Movie.php";
// require_once __DIR__ . DIRECTORY_SEPARATOR . "../Validator/MovieSearchValidator.php";

class MovieController
{
    private Movie $model;

    public function __construct()
    {
        $this->model = new Movie();
    }

    public function listar()
    {
        $nome = $_GET["nome"] ?? '';
        $genres = $_GET["generos"] ?? [];
        $data = [
            'name' => $nome,
            'genres' => $genres
        ];

        $validator = new MovieSearchValidator($data);

        if (!$validator->validate()) {
            return $validator->getErrors();
        }

        return $this->model->list2($data);
    }

    public function insert(){
        $data = [
            'name' => $_GET["name"],
            'description' => $_GET["description"],
            'image' => $_GET["image"],
            'year_publication' => $_GET["year_publication"],
            'featured' => $_GET["featured"],
            'genres' => $_GET["generos"]
        ];
        return $this->model->insert($data);
    }
}

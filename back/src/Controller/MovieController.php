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
        $nome = $_GET["nome"];
        $genres = $_GET["generos"];
        $data = [
            'name' => $nome,
            'genres' => $genres
        ];

        $validator = new MovieSearchValidator($data);

        if (!$validator->validate()) {
            return $validator->getErrors();
        }

        return $this->model->list($data);
    }
}

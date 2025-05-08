<?php

namespace App\Controller;

use App\Model\Genres;

class GenresController
{
    private Genres $model;

    public function __construct()
    {
        $this->model = new Genres();
    }

    public function list(){
        return $this->model->listGenres();
    }

}

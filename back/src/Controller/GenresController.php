<?php

namespace App\Controller;

use App\Model\Genres;

class GenresController
{
    
    private Genres $genresModel;

    public function __construct()
    {
        $this->genresModel = new Genres();
    }

    public function all(){
    
        return $this->genresModel->all();
    }

}

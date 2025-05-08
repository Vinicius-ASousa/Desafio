<?php

namespace App\Controller;

use App\Controller\MovieController;
use App\Controller\GenresController;

class Controller
{
    protected string $action;
    protected string $controller;

    public function __construct()
    {
        $controllers = [
            'MovieController' => MovieController::class,
            'GenresController' => GenresController::class
        ];
        if (!isset($_GET['acao']) || !isset($_GET['controller'])) {
            die(json_encode(['message' => 'ação inválida']));
        }

        $this->action = $_GET['acao'];
        $this->controller = $controllers[$_GET['controller']];

        $this->index();
    }

    public function index()
    {
        $controller = new $this->controller();

        if (method_exists($controller, $this->action)) {
            $data = $controller->{$this->action}();
            die(json_encode(['data' => $data]));
        }
    }
}

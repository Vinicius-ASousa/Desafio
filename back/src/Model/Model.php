<?php

namespace App\Model;

use App\Model\Database;
use Closure;

class Model extends Database {

    protected $wheres = [];
    protected $bindValues = [];

    protected $innerJoin = [];
    protected $where = [];
    protected $values = [];

    function where(string $column = '', string $operator = '=', $value = '') {
        $replace = str_replace('.', '', $column);
        $this->wheres[] = "$column $operator :$replace";
        $this->bindValues[":$replace"] = $value;
    }

    function with(array $relationship) {
        $class = get_called_class();
        $self = new $class();
        foreach ($relationship as $idx => $relationship) {
            if ($relationship instanceof Closure) {
                if (method_exists($self, $idx)) {
                    $this->innerJoin[] = $self->{$idx}();
                }
                $relationship($self);
            } elseif (method_exists($self, $relationship)) {
                $this->innerJoin[] = $self->{$relationship}();
            }
        }
    }

    function whereIn(string $column = '', array $value = []) {
        
        $bindGenreIds = [];
        foreach ($value as $idx => $genre) {
            $bindGenreIds[] = ":$column$idx";
            $this->bindValues[":$column$idx"] = $genre;
        }

        $bindGenreIds = implode(',', $bindGenreIds);
        // $this->innerJoin = 'INNER JOIN filmes_generos on filmes_generos.id_filme = movies.id';
        $this->where[] = "$column in ($bindGenreIds)";
    }
}
<?php

namespace Model;

class Categoria {

    private $categoriaId;
    private $nome; 

    public function __construct(){
    }

    // gets

    public function __get($property) {
        return $this->$property;
    }

    // sets

    public function __set($property, $value) {
        if ((property_exists($this, $property))) {
            $this->$property = $value;
        }
    }
}

?>
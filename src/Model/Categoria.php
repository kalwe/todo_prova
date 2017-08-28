<?php

namespace Model;

class Categoria {

    private $_id;
    private $_nome; 

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
<?php

// namespace Model;

class Categoria {

    private $categoriaId;
    private $nome; 

    public function __construct($nome){
        $this->nome = $nome;
    }

    // gets
    
    public function getCategoriaId() {
        return $categoriaId;
    }

    public function getNome($nome) {
        return $nome;
    }

    // sets

    public function setNome($nome) {
        $this->nome = $nome;
    }
}

?>
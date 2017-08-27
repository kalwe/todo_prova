<?php

namespace Model;

class Tarefa {

    private $tarefaId;
    private $usuarioId;
    private $categoriaId;
    private $titulo;
    private $dataInicio;
    private $dataFim;
    private $descricao;
    private $completa;

    public function __construct() {
    }

    // gets

    public function __get($property) {
        return $this->$property;
    }

    // sets

    public function __set($property, $value) {
        if ((property_exists($this, $property)))
            $this->$property = $value;
    }

}

?>
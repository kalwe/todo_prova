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

    public function __constructor($usuarioId, $categoriaId, $dataInicio, $dataFim, $titulo, $descricao, $completa){
        $this->categoriaId = $categoriaId;
        $this->usuarioId = $usuarioId;
        $this->titulo = $titulo;
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->descricao = $descricao;
        $this->completa = $completa;
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
<?php

namespace Model;

class Tarefa  {

    private $_tarefaId;
    private $_usuarioId;
    private $_categoriaId;
    private $_titulo;
    private $_dataInicio;
    private $_dataFim;
    private $_descricao;
    private $_completa;

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
<?php

namespace Model;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'GerenciarTarefa.php';

use Model\GerenciarTarefa as GerencairTarefa;

class Tarefa extends GerenciarTarefa {

    private $_id;
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
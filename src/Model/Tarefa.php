<?php

// namespace Model;

class Tarefa {

    private $tarefaId;
    private $usuarioId;
    private $categoriaId;
    private $titulo;
    private $dataInicio;
    private $dataFim;
    private $descricao;
    private $completa;

    public function __constructor($usuarioId, $categoriaId, $dataInicio, $dataFim, $titulo, $descricao, $completa) {
        $this->categoriaId = $categoriaId;
        $this->usuarioId = $usuarioId;
        $this->titulo = $titulo;
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->descricao = $descricao;
        $this->completa = $completa;
    }

    // gets

    public function getTarefaId() {
        return $this->tarefaId;
    }

    public functin getUsuarioId() {
        return $usuarioId;
    }

    public functin getCategoriaId() {
        return $categoriaId;
    }

    public function getTitulo() {
        return $titulo;
    }

    public functin getDataInicio() {
        return $dataInicio;
    }

    public functin getDataFim() {
        return $dataFim;
    }

    public function getDescricao() {
        return $descricao;
    }

    public function getCompleta() {
        return $completa;
    }

    // sets

    public functin setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public functin setCategoriaId($categoriaId) {
        $this->categoriaId = $categoriaId;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public functin setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    public functin setDataFim($dataFim) {
        $this->dataFim = $dataFim;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setCompleta($completa) {
        $this->completa = $completa;
    }

}

?>
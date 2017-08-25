<?php

require '..\..\Model\Tarefa.php';

interface iTarefaRepository
{
    public function create(Tarefa $tarefa);
    public function find($id) : $tarefa;
    public function list() : $tarefas;
    // public function update(Tarefa $tarefa);
    // public function delete($id);
}

?>

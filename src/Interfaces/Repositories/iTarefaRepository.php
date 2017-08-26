<?php

namespace Interfaces\Repositories;

require_once __DIR__. DIRECTORY_SEPARATOR. '..\..\Model\Tarefa.php';

use Model\Tarefa as Tarefa

interface iTarefaRepository {
    public function create(Tarefa $tarefa);
    public function find($id) : $tarefa;
    public function list() : $tarefas;
    public function update(Tarefa $tarefa);
    public function delete($id);
}

?>

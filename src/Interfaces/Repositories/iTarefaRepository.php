<?php

namespace Interfaces\Repositories;

require_once __DIR__. DIRECTORY_SEPARATOR. '..\..\Model\Tarefa.php';

use Model\Tarefa as Tarefa

interface iTarefaRepository {
    public function create(Tarefa $tarefa);
    public function find($id);
    public function list();
    public function update(Tarefa $tarefa);
    public function atualizaCompleta(Tarefa $tarefa);
    //public function atualizaCompleta($tarefaId, $completa);
    public function delete($id);
}

?>

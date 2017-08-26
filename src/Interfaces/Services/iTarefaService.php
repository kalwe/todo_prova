<?php

namespace Interfaces\Services;

include_once __DIR__. DIRECTORY_SEPARATOR. '../../Model/Tarefa.php';

use Model\Tarefa as Tarefa;

interface iTarefaService {
    public function addTarefa(Tarefa $tarefa);
    public function listarTarefas();
    public function marcarComoCompletada(Tarefa $tarefa);
    public function modificarTarefa(Tarefa $tarefa);
}

?>
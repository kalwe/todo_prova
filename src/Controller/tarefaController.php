<?php

require_once __DIR__. DIRECTORY_SEPARATOR. '../../public/app/init.php';
require __DIR__. DIRECTORY_SEPARATOR. '../Services/tarefaService.php';
require_once __DIR__. '../Model/Tarefa.php';

use Services\TarefaService as TarefaService;
use Model\Tarefa as Tarefa;

$tarefaService = new TarefaService($db); // instance new service with database connection

$tarefa = new Tarefa();

$tarefas = $tarefaService->listaTarefas();

?>
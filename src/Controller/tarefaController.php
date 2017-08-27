<?php

require_once __DIR__. DIRECTORY_SEPARATOR. '../../public/app/init.php';
require __DIR__. DIRECTORY_SEPARATOR. '../Services/tarefaService.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '../Model/Tarefa.php';

use Services\TarefaService as TarefaService;
use Model\Tarefa as Tarefa;

$tarefaService = new TarefaService($db); // instance new service with database connection

$tarefa = new Tarefa();

$tarefas = $tarefaService->listarTarefas();

// adiciona tarefa no db
if (isset($_POST['submit-tarefa'])) {
    if (isset($_POST['titulo']) ) {
        $tarefa->usuarioId = $_SESSION['usuario_id'];
        $tarefa->categoriaId = $_POST['categorias'];
        $tarefa->titulo = trim($_POST['titulo']);
        $tarefa->dataInicio = $_POST['dataInicio'];
        $tarefa->dataFim = $_POST['dataFim'];
        $tarefa->descricao = $_POST['descricao'];
        $tarefa->completa = '0';
    }
    $tarefaService->addTarefa($tarefa);
    header('Location: index.php');
}

?>
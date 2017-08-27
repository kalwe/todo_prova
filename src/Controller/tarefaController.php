<?php

require_once __DIR__. DIRECTORY_SEPARATOR. '../../public/app/init.php';
require __DIR__. DIRECTORY_SEPARATOR. '../Services/tarefaService.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '../Model/Tarefa.php';

use Services\TarefaService as TarefaService;
use Model\Tarefa as Tarefa;

$tarefaService = new TarefaService($db); // instance new service with database connection

$tarefa = new Tarefa;

$tarefas = $tarefaService->listarTarefas();

// adiciona tarefa no db
if (isset($_POST['submit-tarefa'])) {
    if (isset($_POST['titulo']) ) {
        $tarefa->_usuarioId = $_SESSION['usuario_id'];
        $tarefa->_categoriaId = $_POST['categorias'];
        $tarefa->_titulo = trim($_POST['titulo']);
        $tarefa->_dataInicio = date('Y-m-d', strtotime($_POST['dataInicio']));
        $tarefa->_dataFim = date('Y-m-d', strtotime($_POST['dataFim']));
        $tarefa->_descricao = $_POST['descricao'];
        $tarefa->_completa = '0';
    }
    $tarefaService->addTarefa($tarefa);
    header('Location: index.php');
}

// se a tarefa estiver em aberta marca como completa
// se ja estiver completa deleta do db
if (isset($_GET['tarefaId'])) {
    $tarefa->_usuarioId = $_SESSION['usuario_id'];
    $tarefa->_tarefaId = $_GET['tarefaId'];

    $tarefaResult = $tarefaService->buscarTarefa($tarefa);

    if (!$tarefaResult['completa']) {
        $tarefa->_completa = 1;
        $tarefaService->marcarComoCompleta($tarefa);
        header('Location: index.php');
    }
    else {
        $tarefaService->deletarTarefa($tarefaResult['tarefa_id']);
        header('Location: index.php');
    }
}

?>
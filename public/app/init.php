<?php

    include_once __DIR__. DIRECTORY_SEPARATOR. '../../src/Data/DbConnection.php';

    use Data\DbConnection as DbConnection;

    session_start();

    $_SESSION['usuarioId'] = 1;

    $dbCon = new DbConnection;

    $db = $dbCon->getConnection();

    // if (!isset($_SESSION['usuario_id'])) {
    //     die('Nenhuma tarefa disponível para você.');
    // }
    
?>
<?php

    include 'DbConnection.php';

    session_start();

    $_SESSION['usuario_id'] = 1;

    $dbCon = new DbConnection();

    $db = $dbCon->getConnection();

    // if (!isset($_SESSION['usuario_id'])) {
    //     die('Nenhuma tarefa disponível para você.');
    // }
    
?>
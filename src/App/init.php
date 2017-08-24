<?php

    session_start();

    $_SESSION['user_id'] = 1;

    $db = new PDO('mysql:dbname=tarefas_db;host=localhost', 'root', '');

    

?>
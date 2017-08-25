<?php

// namespace Data;

class DbConnection {

    protected $db_host = 'localhost';
    protected $db_user = 'root';
    protected $db_passwd = '';
    protected $db_name = 'tarefas_db';

    // return new connection 
    public function getConnection() {
        return new PDO('mysql:dbname=tarefas_db;host=localhost', 'root', '');
    }
}

?>
<?php

namespace Data;

use PDO;

class DbConnection {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_passwd = '';
    private $db_name = 'tarefas_db';

    // return new connection 
    public function getConnection() {
        return new PDO('mysql:dbname=tarefas_db;host=localhost', 'root', '');
    }
}

?>
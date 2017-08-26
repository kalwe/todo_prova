<?php

namespace Repository;

// require_once '../init.php';
// include_once(__DIR__. DIRECTORY_SEPARATOR. '..\Data\DbConnection.php');
include_once(__DIR__. DIRECTORY_SEPARATOR. '..\Model\Categoria.php');
// include(__DIR__. DIRECTORY_SEPARATOR. '..\Interfaces\Repositories\iCategoriaRepository.php');

// use Model\Categoria as Categoria;
// use Data\DbConnection as DbConnection;
// use Interfaces\Repositories as iCategoriaRepository;

// $dbCon = new DbConnection;
// $db = $dbCon->getConnection();

class CategoriaRepository
{
    // private $dbConn = DbConnection;
    private $dbC;

    public function __construct($db) {
        $this->dbC = $db;
    }

    // public $categoria;

    // insere um obj no database
    public function create($categoria) {
        // $dbC = $dbConn->getConnection();
        $categoriaAdd = $this->dbC->prepare("
            INSERT INTO categoria (nome)
            VALUES (:nome)
        ");

        $categoriaAdd->execute([
            'nome' => $categoria
        ]);
    }

    // lista todas as categorias do database
    public function listAll() {
        // $dbC = $dbConn->getConnection();
        $categoriasList = $this->dbC->prepare("
            SELECT categoria_id, nome
            FROM categoria
        ");

        $categoriasList->execute();
        $categorias = $categoriasList->rowCount() ? $categoriasList : [];

        return $categorias;
    }
}
?>
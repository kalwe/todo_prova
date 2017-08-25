<?php

// require_once '../init.php';
include('..\Data\DbConnection.php');
include('..\Model\Categoria.php');

use Model\Categoria as Categoria;

namespace Repository;

class CategoriaRepository implements iTarefaRepository
{
    $dbCon = new DbConnection();
    $db = $dbCon->getConnection();

    $categoria = new Categoria;

    // insere um obj no database
    public function create(Categoria $categoria) {
        $db->prepare("
            INSERT INTO categoria (nome)
            VALUES (:nome)
        ");

        $db->execute([
            'nome' => $categoria['nome']
        ]);
    }

    // lista todas as categorias do database
    public function list() {
        $categoriasQuery = $db->prepare("
            SELECT categoria_id, nome
            FROM categoria
        ");

        $categoriasQuery->execute();
        $categorias = $categoriasQuery->rowCount() ? $categoriasQuery : [];

        return $categorias;
    }

}

?>
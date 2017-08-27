<?php

namespace Repository;

require_once(__DIR__. DIRECTORY_SEPARATOR. '..\Model\Categoria.php');
require_once(__DIR__. DIRECTORY_SEPARATOR. '..\Interfaces\Repositories\iCategoriaRepository.php');

use Model\Categoria as Categoria;
use Interfaces\Repositories\iCategoriaRepository as iCategoriaRepository;

class CategoriaRepository implements iCategoriaRepository
{
    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }

    // insere uma categoria no database
    public function create(Categoria $categoria) {
        $categoriaAdd = $this->_db->prepare("
            INSERT INTO categoria (nome)
            VALUES (:nome)
        ");

        $categoriaAdd->execute([
            'nome' => $categoria->_nome
        ]);
    }

    // lista todas as categorias do database
    public function listAll() {
        $categoriasList = $this->_db->prepare("
            SELECT categoria_id, nome
            FROM categoria
        ");

        $categoriasList->execute();
        $categorias = $categoriasList->rowCount() ? $categoriasList : [];

        return $categorias;
    }

    // deleta uma cateogria
    public function delete($id) {
        $categoriaDelete = $this->_db->prepare("
            DELETE FROM categoria
            WHERE categoria_id = :categoriaId
        ");

        $categoriaDelete->execute([
            'categoriaId' => $id
        ]);
    }
}
?>
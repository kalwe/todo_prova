<?php

namespace Repository;

require_once(__DIR__. DIRECTORY_SEPARATOR. '..\Model\Categoria.php');
require_once(__DIR__. DIRECTORY_SEPARATOR. '..\Interfaces\Repositories\iCategoriaRepository.php');

use Model\Categoria as Categoria;
use Interfaces\Repositories\iCategoriaRepository as iCategoriaRepository;

class CategoriaRepository implements iCategoriaRepository
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // insere um obj no database
    public function create(Categoria $categoria) {

        $categoriaAdd = $this->db->prepare("
            INSERT INTO categoria (nome)
            VALUES (:nome)
        ");

        $categoriaAdd->execute([
            'nome' => $categoria->nome
        ]);
    }

    // lista todas as categorias do database
    public function listAll() {
        $categoriasList = $this->db->prepare("
            SELECT categoria_id, nome
            FROM categoria
        ");

        $categoriasList->execute();
        $categorias = $categoriasList->rowCount() ? $categoriasList : [];

        return $categorias;
    }

    // deleta uma cateogria
    public function deletar($categoriaId) {
        $categoriaDelete = $this->db->prepare("
            DELETE 
        ");

        $categoriaDelete->execute();
    }
}
?>
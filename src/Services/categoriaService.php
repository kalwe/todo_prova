<?php

namespace Services;

include(__DIR__. DIRECTORY_SEPARATOR. '../Repository/CategoriaRepository.php');
require_once(__DIR__. DIRECTORY_SEPARATOR. '../Interfaces/Services/iCategoryService.php');
require_once(__DIR__. DIRECTORY_SEPARATOR. '../Model/Categoria.php');

use Repository\CategoriaRepository as CategoriaRepository;
use Interfaces\Services\iCategoriaService as iCategoriaService;
use Model\Categoria as Categoria;

class CategoriaService implements iCategoriaService {

    public $categoriaRepository;
    // public $categoria = Categoria;

    public function __construct($db) {
        $this->categoriaRepository = new CategoriaRepository($db);
    }

    public function addCategoria(Categoria $categoria) {
        $this->categoriaRepository->create($categoria);
    }

    public function listCategorias() {
        return $this->categoriaRepository->listAll();
    }

    public function deletarCategoria($categoriaId) {
        $this->categoriaRepository->delete($categoriaId);
    }

}

?>
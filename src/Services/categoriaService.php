<?php

namespace Services;

include(__DIR__. DIRECTORY_SEPARATOR.'../Repository/CategoriaRepository.php');
require_once(__DIR__. DIRECTORY_SEPARATOR.'../Model/Categoria.php');

use Repository\CategoriaRepository as CategoriaRepository;
use Model\Categoria as Categoria;

class CategoriaService {

    public $categoriaRepository;
    // public $categoria = Categoria;

    public function __construct($db) {
        $this->categoriaRepository = new CategoriaRepository($db);
    }

    public function addCategoria(Categoria $categoria) {
        $this->categoriaRepository->create($categoria);
        header('Location: cadastroCategoria.php'); // redirecina para index page
    }

    public function listCategorias() {
        return $this->categoriaRepository->listAll();
    }

}

?>
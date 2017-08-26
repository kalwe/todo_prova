<?php

namespace Services;

include(__DIR__. DIRECTORY_SEPARATOR.'../Repository/CategoriaRepository.php');
// include(__DIR__. DIRECTORY_SEPARATOR.'../Model/Categoria.php');

use Repository\CategoriaRepository as CategoriaRepository;
// use Model\Categoria as Categoria;

class CategoriaService {

    public $categoriaRepository;
    public $categoria ;

    public function __construct($db) {
        $this->categoriaRepository = new CategoriaRepository($db);
    }

    public function add() {
        if (isset($_POST['nome'])) {
            $nome = trim($_POST['nome']); // 
            $this->categoriaRepository->create($nome); // chama o metodo 'create' do repositorio
        }

        header('Location: cadastro_categoria.php'); // redirecina para index page
    }

    public function listCategorias() {
        return $this->categoriaRepository->listAll();
    }

}

?>
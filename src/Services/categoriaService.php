<?php

include('..\Repository\CategoriaRepository.php');
include('..\Model\Categoria.php');

use Repository\CategoriaRepository as CategoriaRepository;
use Model\Categoria as Categoria;

$categoriaRepository = new CategoriaRepository;
$categoria = new Categoria;


public function add() {
    if (isset($_POST['nome'])) {
        $categoria->nome = trim($_POST['nome']); // 
        $categoriaRepository->create($categoria); // chama o metodo 'create' do repositorio
    }
}

header('Location: index.php'); // redirecina para index page

?>
<?php

include_once(__DIR__. DIRECTORY_SEPARATOR. '../../public/app/init.php');
include(__DIR__. DIRECTORY_SEPARATOR. '../Services/categoriaService.php');
require_once(__DIR__. DIRECTORY_SEPARATOR. '../Model/Categoria.php');

use Model\Categoria as Categoria;
use Services\CategoriaService as CategoriaService;

$categoriaService = new CategoriaService($db);

$categorias = $categoriaService->listCategorias(); // lista as categorias para preencher a lista

$categoria = new Categoria();

// grava no database quando o usuario submeter o formulario
if (isset($_POST['submit'])) {
    if (isset($_POST['nome'])) {
        $categoria->nome = trim($_POST['nome']);
        // echo $categoria->nome;
    }
    $categoriaService->addCategoria($categoria);
}

?>
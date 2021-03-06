<?php

include_once __DIR__. DIRECTORY_SEPARATOR. '../../public/app/init.php';
include __DIR__. DIRECTORY_SEPARATOR. '../Services/categoriaService.php';
require_once __DIR__. DIRECTORY_SEPARATOR. '../Model/Categoria.php';

use Model\Categoria as Categoria;
use Services\CategoriaService as CategoriaService;

$categoria = new Categoria;
$categoriaService = new CategoriaService($db);

$categorias = $categoriaService->listCategorias(); // lista as categorias para preencher a lista

// grava no database quando o usuario submeter o formulario
if (isset($_POST['submit-categoria'])) {
    if (isset($_POST['nome'])) {
        $categoria->_nome = trim($_POST['nome']);
    }
    $categoriaService->addCategoria($categoria);
    header('Location: cadastroCategoria.php'); // redireciona para index page
}

// deleta categoria por id
if (isset($_GET['categoriaId'])) {
    $id = $_GET['categoriaId'];
    $categoriaService->deletarCategoria($id);
    header('Location: cadastroCategoria.php'); // redirecina para index page
}

?>

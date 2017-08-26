<?php

namespace Interfaces\Services;

include_once(__DIR__. DIRECTORY_SEPARATOR. '../../Model/Categoria.php');

use Model\Categoria as Categoria;

interface iCategoriaService {
    public function addCategoria(Categoria $categoria);
    public function listCategorias();
}

?>
<?php

namespace Interfaces\Repositories;

require_once(__DIR__. DIRECTORY_SEPARATOR. '..\..\Model\Categoria.php');

use Model\Categoria as Categoria;

interface iCategoriaRepository {
    public function create(Categoria $categoria);
    public function listAll();
    public function delete($id);
}

?>
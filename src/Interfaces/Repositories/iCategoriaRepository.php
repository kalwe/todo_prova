<?php

// namespace Interfaces\Repositories
// include(__DIR__. DIRECTORY_SEPARATOR. '..\..\Model\Categoria.php');

// use Model\Categoria as Categoria;

public interface iCategoriaRepository
{
    public function create($categoria);
    public function listAll();
}

?>
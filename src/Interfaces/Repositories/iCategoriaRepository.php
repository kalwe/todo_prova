<?php

require '..\..\Model\Categoria.php';

interface iCategoriaRepository
{
    public function create(Categoria $categoria);
    public function $categoria find($id);
    public function update(Categoria $categoria);
    public function delete($id);
}

?>

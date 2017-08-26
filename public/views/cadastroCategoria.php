<?php

require_once '../../src/Controller/categoriaController.php';

?>

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two">

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/cadastro_categoria.css">

<div class="conteudo">

    <h1 class="header">Categorias de tarefa</h1>

    <div class="lista-categorias">
        <?php if(!empty($categorias)): ?>
            <ul class="lista-items">
                <?php foreach($categorias as $categoria): ?>
                    <li>
                        <span class="item"><?php echo $categoria['nome'] ?></span>
                        <?php echo '<a href="?categoriaId='.$categoria['categoria_id'].'" class="btnDeletar">Deletar</a>' ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-california">Nenhuma Categoria cadastrada.</p>
        <?php endif; ?>
    </div>

    <div class="cadastro-form">
        <h2 class="header-cadastro-form">Cadastro de Categoria</h2>
        <form class="cadastro-categoria" method="post">
            <input type="text" name="nome" class="input" maxlength="40" placeholder="Categoria"><br />
            <input type="submit" name="submit" value="Adicionar" class="submit">
        </form>
    </div>

    <a href="../index.php"> Voltar </a>

</div>
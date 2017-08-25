<?php

require_once 'app/init.php';

$tarefasQuery = $db->prepare("
    SELECT tarefa_id, categoria_id, titulo, descricao, completa
    FROM tarefa
    WHERE usuario_id = :usuario_id
");

$tarefasQuery->execute([
    'usuario_id' => $_SESSION['usuario_id']
]);

$tarefas = $tarefasQuery->rowCount() ? $tarefasQuery : [];

// categoria 
$categoriasQuery = $db->prepare("
SELECT categoria_id, nome
FROM categoria
WHERE usuario_id = :usuario_id
");

$categoriasQuery->execute([
'usuario_id' => $_SESSION['usuario_id']
]);

$categorias = $categoriasQuery->rowCount() ? $categoriasQuery : [];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gerenciador de Tarefas</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two">

    <link rel="stylesheet" href="css/main.css">
    <!-- <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/tether/dist/css/tether.min.css">

    <script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="lib/jquery/dist/jquery.min.js"></script>
    <script src="lib/tether/dist/js/tether.min.js"></script> -->

</head>
<body>

        <!-- nav header -->
        <!-- <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <a class="navbar-brand" href="#">Gerenciador de Tarefas</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Tarefas <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias</a>
                    </li>
                </ul>
            </div>
        </nav> -->

        <!-- content -->
        <div class="conteudo">

            <h1 class="header">Gerenciador de Tarefas</h1>

            <div class="lista-tarefas">
                <?php if(!empty($tarefas)): ?>
                    <ul class="tarefas">
                        <?php foreach($tarefas as $tarefa): ?>
                            <li>
                                <span class="tarefa <?php echo $tarefa['completa'] ? ' completa' : '' ?> "><a href="#tarefa"><?php echo $tarefa['titulo']; ?>Tarefa</a></span>
                                <?php if(!$tarefa['completa']): ?>
                                    <a href="#completada" class="button-completa">Marcar como Completada</a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Nenhuma tarefa cadastrada.</p>
                    <p>Use o formulário abaxio para cadastrar uma terefa!</p>
                <?php endif; ?>
            </div>

            <div class="cadastro-tarefa">
                <h2 class="header-cadastro-tarefa">Cadastro de Tarefa</h2>

                <form action="adicionar_tarefa.php" method="post">
                    <input type="text" name="nome" placeholder="Título" class="input" autocomplete="off"><br />

                    <!-- <input type="text" name="categoria", placeholder="Categoria" class="input"> -->
                    <select name="categorias" class="input select-categorias">
                        <option value="0" > -- Selecione uma Categoria -- </option>
                        <?php
                            foreach ($categorias as $categoria) {
                                echo '<option value="'.$categoria['categoria_id'].'">'.$categoria['nome'].'</option>';
                            };
                        ?>
                    </select>

                    <!-- <a href="views/cadastro_categoria.html" class="link-categoria"><span class="text-decoration">Adicionar Categoria</span></a><br /> -->

                    <textarea name="descricao" cols="47" rows="10" class="descricao-area" placeholder="Descrição"></textarea><br />

                    <input type="submit" value="Adicionar" class="submit">
                </form>
            </div>
        </div>

</body>
</html>
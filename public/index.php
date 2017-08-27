<?php

require_once '../src/Controller/tarefaController.php';
require_once '../src/Controller/categoriaController.php';

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
    <link rel="stylesheet" href="lib/tether/dist/css/tether.min.css"> -->

    <script src="lib/jquery/dist/jquery.min.js"></script>
    <script src="lib/inputmask/dist/min/inputmask/inputmask.min.js"></script>
    <script src="lib/inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="lib/inputmask/dist/min/inputmask/inputmask.numeric.extensions.min.js"></script>
    <script src="js/inputmask.js"></script>

    <!-- <script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="lib/tether/dist/js/tether.min.js"></script> -->

</head>
<body>
        <!-- content -->
        <div class="conteudo">

            <h1 class="header">Gerenciador de Tarefas</h1>

            <div class="lista-tarefas">
                <?php if(!empty($tarefas)): ?>
                    <ul class="lista-items">
                        <?php foreach($tarefas as $tarefa): ?>
                            <li>
                                <span class="item <?php echo $tarefa['completa'] ? ' completa' : '' ?> ">
                                    <a href="#tarefa"><?php echo $tarefa['titulo']; ?></a>
                                </span>
                                <?php if(!$tarefa['completa']): ?>
                                    <a href="?tarefaId=<?php echo $tarefa['tarefa_id'] ?>" class="button-completa">Marcar como Completa</a>
                                <?php else: ?>
                                <a href="?tarefaId=<?php echo $tarefa['tarefa_id'] ?>" class="button-deletar">Deletar</a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-california">Nenhuma tarefa cadastrada.</p>
                    <p class="text-california">Use o formulário abaxio para cadastrar uma terefa!</p>
                <?php endif; ?>
            </div>

            <div class="cadastro-form">
                <h2 class="header-cadastro-form">Cadastro de Tarefa</h2>

                <form method="post">
                    <input type="text" name="titulo" class="input" autocomplete="off" maxlength="40" placeholder="Título"><br />

                    <input id="dataInicio" type='text' name="dataInicio" class="input" placeholder="Data de Início" maxlength="11" onkeypress=""><br />

                    <input id="dataFim" type="text" name="dataFim" class="input" placeholder="Data Fim" maxlength="11" onkeypress=""><br />

                    <select name="categorias" class="input select-categorias">
                        <option value="0" > -- Selecione uma Categoria -- </option>
                        <?php
                            foreach ($categoriaService->listCategorias() as $categoria) {
                                echo '<option value="'.$categoria['categoria_id'].'">'.$categoria['nome'].'</option>';
                            };
                        ?>
                    </select>

                     <a href="views/cadastroCategoria.php" class="link-categoria"><span class="text-decoration">Cadastrar Categoria</span></a><br />

                    <textarea name="descricao" cols="47" rows="10" class="descricao-area" placeholder="Descrição"></textarea><br />

                    <input type="submit" name="submit-tarefa" value="Adicionar" class="submit">
                </form>
            </div>
        </div>

</body>
</html>
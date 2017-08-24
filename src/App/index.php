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

            <h1 class="header">Tarefas</h1>

            <ul class="tarefas">
                <li>
                    <span class="tarefa"><a href="#">Tarefa</a></span>
                    <a href="#" class="button-completa">Completada</a>
                </li>
                <li><span class="tarefa completa"><a href="#">Tarefa Completa</a></span></li>
            </ul>

            <form class="tarefa-adicionar" action="adicionar_tarefa.php" method="post">
                <input type="text" name="nome" placeholder="Título" class="input" autocomplete="off"><br />
                <input type="text" name="categoria", placeholder="Categoria" class="input"><br />
                <textarea name="descricao" cols="47" rows="10" class="descricao-area" placeholder="Descrição"></textarea><br />
                <input type="submit" value="Adicionar" class="submit">
            </form>
        </div>

</body>
</html>
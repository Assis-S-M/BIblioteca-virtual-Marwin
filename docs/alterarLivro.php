<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar informações</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script defer src="js/biblioteca.js"></script>
</head>
<body>

    <header>
        <a href="index.php">Biblioteca virtual Marwin</a>
        <nav id="navBar">
            <div id="menuWindow">
                <div id="menuIcon">
                    <div id="divBar"></div>
                    <div id="divBar"></div>
                    <div id="divBar"></div>
                    <ul class="menu disabled">
                        <li><a href="visualizarLivros.php">Visualizar livros adicionados</a></li>
                        <li><a href="adicionarLivro.php">Adicionar novo livro</a></li>
                    </ul>
                </div>
            </div>
        </nav>    
    </header>

    <form method="post" action="dataBase.php" id="alterarLivro">

    <input name="paginaMae" value="alterarLivro" hidden>
    
    <?php

        if (isset($_GET['editDataDevolução'])) {
            
            $id = $_GET['editDataDevolução'];
        } else if (isset($_GET['editSituaçãoAtual'])) {
            
            $id = $_GET['editSituaçãoAtual'];
        } else if (isset($_GET['editAlunoPos'])) {
            
            $id = $_GET['editAlunoPos'];
        }else if (isset($_GET['apagarRegistro'])) {

            $id = $_GET['apagarRegistro'];
        }

        if (isset($_GET['editDataDevolução'])) { 
            
            echo "<input type='text' value='data' name='tipoAlteração' hidden>";
            echo "<label>Codigo do livro selecionado: <br><input type='text' name='id' value='$id' readonly></label><br>";
            echo "<label>Nova data de devolução <br><input type='date' name='dataDevolução'></label><br>";
            echo "<button type='submit'>Salvar alterações</button>";
        } else if (isset($_GET['editSituaçãoAtual'])) {
            
            echo "<input type='text' value='situaçãoAtual' name='tipoAlteração' hidden>";
            echo "<label>Codigo do livro selecionado: <br><input type='text' name='id' value='$id' readonly></label><br>";
            echo "<label>Situação <br><select id='alterarLivro' name='situaçãoAtual'><option value='pendente'>Pendente</option><option value='devolvido'>Devolvido</option></select></label><br>";
            echo "<button type='submit'>Salvar alterações</button>";
        } else if (isset($_GET['editAlunoPos'])) {
            
            echo "<input type='text' value='alunoPos' name='tipoAlteração' hidden>";
            echo "<label>Codigo do livro selecionado: <br><input type='text' name='id' value='$id' readonly></label><br>";
            echo "<label>Novo aluno possuinte: <br><input type='text' name='novoNome'></label><br>";
            echo "<button type='submit'>Salvar alterações</button>";
        } else if (isset($_GET['apagarRegistro'])) {

            echo "<input type='text' value='apagarRegistro' name='tipoAlteração' hidden>";
            echo "<label>Codigo do livro selecionado: <br><input type='text' name='id' value='$id' readonly></label><br>";
            echo "<button type='submit'>Confirmar escolha</button>";
        }

    ?>
    </form>
</body>
</html>

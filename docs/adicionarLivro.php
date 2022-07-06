<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar livro</title>
    <link rel="stylesheet" href="css/estiloAdcLivro.css">
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

    <form method="post" action="dataBase.php" id="opcoes">
        <fieldset>
            
            <input name="paginaMae" value="adicionarLivro" hidden>

            <label>Nome do livro: <br><input type="text" name="nomeLivro"></label><br>
            <label>Nome do autor: <br><input type="text" name="nomeAutor"></label><br>
            <label>Editora: <br><input type="text" name="editora"></label><br>
            <label>Data de devolução <br><input type="date" name="dataDevolução"></label><br>
            <label>Situação atual <br>
                <select id="opcoes" name="situação">
                    <option value="pendente">Pendente</option>
                    <option value="devolvido">Devolvido</option>
                </select></label><br>
            <label>Aluno possuinte <br> <input type="text" name="alunoPos"></label><br>
            <input type="submit" value="adicionar livro">
        </fieldset>
    <form>
</body>
</html>
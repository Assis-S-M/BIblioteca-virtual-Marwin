
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de registros</title>
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

    <?php

        $paginaMae = $_POST['paginaMae'];
        $conexao = mysqli_connect("localhost", "root", "", "biblioteca");
        $tipoAlteração = isset($_POST['tipoAlteração']) ? $_POST['tipoAlteração']: "";
        $novoNome = isset($_POST['novoNome']) ? $_POST['novoNome']: "";

        if ($paginaMae == "adicionarLivro") {

        $nomeLivro = $_POST['nomeLivro'];
        $nomeAutor = $_POST['nomeAutor'];
        $editora = $_POST['editora'];
        $dataDevolução = $_POST['dataDevolução'];
        $situação = $_POST['situação'];
        $alunoPos = $_POST['alunoPos'];

        $query = "INSERT INTO `livros` (`nome do livro`, `nome do autor`, `editora`, `data de devolucao`, `situacao atual`, `aluno possuinte`, `id`) VALUES ('$nomeLivro', '$nomeAutor', '$editora', '$dataDevolução', '$situação', '$alunoPos', NULL)";
            
        mysqli_query($conexao, $query);

        echo "<div id='mostrarInfo'>Livro adicionado com sucesso <br> <button><a href='index.php'>Voltar a pagina inicial</a></button></div>";
        } else if ($paginaMae == "alterarLivro" && $tipoAlteração == "data") {
            $id = $_POST['id'];
            $dataDevolução = $_POST['dataDevolução'];

            $query = "UPDATE `livros` SET `data de devolucao` = '$dataDevolução' WHERE `livros`.`id` = $id;";

            mysqli_query($conexao, $query);

            echo "<div id='mostrarInfo'>Informações alteradas com sucesso <br> <button><a href='visualizarLivros.php'>Voltar a pagina anterior</a></button></div>";
        } else if ($paginaMae == "alterarLivro" && $tipoAlteração == "situaçãoAtual") {

            $id = $_POST['id'];
            $situaçãoAtual = $_POST['situaçãoAtual'];

            $query = "UPDATE `livros` SET `situacao atual` = '$situaçãoAtual' WHERE `livros`.`id` = $id;";

            mysqli_query($conexao, $query);

            echo "<div id='mostrarInfo'>Informações alteradas com sucesso <br> <button><a href='visualizarLivros.php'>Voltar a pagina anterior</a></button></div>";
        } else if ($paginaMae == "alterarLivro" && $tipoAlteração == "alunoPos") {
            
            $id = $_POST['id'];
            $situaçãoAtual = $_POST['novoNome'];

            $query = "UPDATE `livros` SET `aluno possuinte` = '$situaçãoAtual' WHERE `livros`.`id` = $id;";

            mysqli_query($conexao, $query);

            echo "<div id='mostrarInfo'>Informações alteradas com sucesso <br> <button><a href='visualizarLivros.php'>Voltar a pagina anterior</a></button></div>";
        } else if ($paginaMae == "alterarLivro" && $tipoAlteração == "apagarRegistro") {

            $id = $_POST['id'];

            $query = "DELETE FROM `livros` WHERE `livros`.`id` = $id;";
            mysqli_query($conexao, $query);
            mysqli_query($conexao, "ALTER TABLE `livros` DROP id");
            mysqli_query($conexao, "ALTER TABLE `livros` ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY");

            echo "<div id='mostrarInfo'>Registro excluido com sucesso <br> <button><a href='visualizarLivros.php'>Voltar a pagina anterior</a></button></div>";
        }
    ?>
</body>
</html>
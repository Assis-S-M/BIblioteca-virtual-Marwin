<?php
    $conexaoDataTable = mysqli_connect("localhost", "root", "", "biblioteca");

    $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa']: "";
    $filtro = isset($_GET['filtro']) ? $_GET['filtro']: "nome do livro";
    $pagina = 10 * (isset($_GET['pagina']) ? $_GET['pagina']: "1");
    $regisrosMostrados = ($pagina - 9);
    $opcoesPesquisa = isset($_GET['opcoesPesquisa']) ? $_GET['opcoesPesquisa']: "contem";
    $VerRegistros = isset($_GET['VerTotalRegistros']) ? $_GET['VerTotalRegistros']: "não";

    if ($VerRegistros == "não" && $pesquisa == "") {

        $query = "SELECT * FROM `livros` WHERE id BETWEEN '$regisrosMostrados' AND '$pagina'";
    } else if ($VerRegistros == "sim" && $pesquisa == "") {

        $query = "SELECT * FROM `livros`";
    } else if ($pesquisa != "" && $opcoesPesquisa == "pesquisaPrecisa") {
        
        $query = "SELECT * FROM `livros` WHERE `$filtro` LIKE '$pesquisa'";
    } else if ($pesquisa != "" && $opcoesPesquisa == "comecaCom") {
        
        $query = "SELECT * FROM `livros` WHERE `$filtro` LIKE '$pesquisa%'";
    } else if ($pesquisa != "" && $opcoesPesquisa == "terminaCom") {
        
        $query = "SELECT * FROM `livros` WHERE `$filtro` LIKE '%$pesquisa'";
    } else if ($pesquisa != "" && $opcoesPesquisa == "contem") {
        
        $query = "SELECT * FROM `livros` WHERE `$filtro` LIKE '%$pesquisa%'";
    }

    $registro = mysqli_query($conexaoDataTable, $query);
    $table = "";

    while ($row = mysqli_fetch_array($registro)) {

        $id = $row["id"];
        $nomeDoLivro = $row["nome do livro"];
        $nomeDoAutor = $row["nome do autor"];
        $editora = $row["editora"];
        $dataDeDevolução = $row["data de devolucao"];
        $situaçãoAtual = $row["situacao atual"];
        $alunoPos = $row["aluno possuinte"];

        $table.= "<tr><td><p>$id</p></td><td><p>$nomeDoLivro</p></td><td><p>$nomeDoAutor</p></td><td><p>$editora</p></td><td><p>$dataDeDevolução</p></td><td><p>$situaçãoAtual</p></td><td><p>$alunoPos</p></td><td><button type='submit' value='$id' name='editDataDevolução'>Editar data <br> de devolução</button></td><td><button type='submit' value='$id' name='editSituaçãoAtual'>Editar situação <br> atual</button></td><td><button type='submit' value='$id' name='editAlunoPos'>Editar aluno <br> possuinte</button></td><td><button type='submit' value='$id' name='apagarRegistro'>Excluir registro <br>selecionado</button></td></tr>";
        // echo $table;
    };

    if ($table != "") {
    
        echo "<form method='get' action='alterarLivro.php' id='view'><input name='paginaMae' value='alterarLivro' hidden><table><thead><th>id</th><th>nome do livro</th><th>nome do autor</th><th>editora</th><th>data de devolução</th><th>situação atual</th><th>aluno possuinte</th>$table</thead></table></form>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar livros</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script defer src="js/biblioteca.js"></script>
    <script defer>
        document.addEventListener("keypress", function(e) {
            if(e.key === 'Enter') {
            
                var btn = document.querySelector("#submit");
                
                btn.click();
            }
        });
    </script>
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

    <form method="get" action="visualizarLivros.php" id="pesquisa">
    
        <label>Pesquisar por 
                <select name="filtro" id="pesquisa">
                    <option value="id">Id</option>
                    <option value="nome do livro" selected>Nome do livro</option>
                    <option value="nome do autor">Nome do autor</option>
                    <option value="editora">Editora</option>
                    <option value="data de devolução">Data de devolução</option>
                    <option value="pendencia">Pendência</option>
                    <option value="aluno possuinte">Aluno</option>
                </select>
                onde registros  
                <select name="opcoesPesquisa" id="pesquisa">
                    <option value="pesquisaPrecisa">Pesquisa precisa</option>
                    <option value="comecaCom">Começam com "pesquisa" letra/palavra</option>
                    <option value="contem" selected>Possuem "pesquisa" letra/palavra</option>
                    <option value="terminaCom">Terminam com "pesquisa" letra/palavra</option>
                </select>

                <input type="text" name="pesquisa" id="pesquisa" placeholder="...">

                <input type="submit" id="submit" hidden>
                <br>

                <?php
                    $verRegistros = isset($_GET['VerTotalRegistros']) ? $_GET['VerTotalRegistros']: "não";

                    if ($verRegistros == "sim") {

                    } else {
                        echo "<div id='verRegistrosButton'><button type='submit' value='sim' name='VerTotalRegistros' style='width: 180px; height: 30px; position: relative; margin-left: 10px;'>Visualizar todos os registros</button></div>";
                    }

                ?>

                <div id="paginas">
                <?php
                    $conexaoDataTable = mysqli_connect("localhost", "root", "", "biblioteca");
                    $teste = mysqli_query($conexaoDataTable, "SELECT id FROM `livros`");
                    $verRegistros = isset($_GET['VerTotalRegistros']) ? $_GET['VerTotalRegistros']: "não";

                    while ($row = mysqli_fetch_array($teste)) {

                        $id = $row["id"];
                    };

                    $numRegistros = ceil($id / 10);

                    if ((isset($_GET['pagina']) ? $_GET['pagina']: "1") > 1) {
                        
                        $paginaPast = (isset($_GET['pagina']) ? $_GET['pagina']: "1") - 1;
                    } else {
                        $paginaPast = 1;
                    }

                    if ($verRegistros == "não") {
                        echo "<button type='submit' value='$paginaPast' name='pagina' id='paginaPast' style='width: 30px; height: 30px; margin: 10px;'><<</button>";

                        for ($i = 1; $i <= $numRegistros; $i++) {
                            echo "<input type='submit' value='$i' name='pagina' style='width: 30px; height: 30px; margin: 10px;'>";
                        };

                        if ((isset($_GET['pagina']) ? $_GET['pagina']: "1") < ($i - 1)) {
                            $paginaNext = (isset($_GET['pagina']) ? $_GET['pagina']: "1") + 1;
                        } else {
                            $paginaNext = $i - 1;
                        }

                        echo "<button type='submit' value='$paginaNext' name='pagina' id='paginaNext' style='width: 30px; height: 30px; margin: 10px;'>>></button>";
                    }
                ?>
                </div>
        </label>
    </form>

        <?php
            include("dataTable.php");
        ?>
</body>
</html>
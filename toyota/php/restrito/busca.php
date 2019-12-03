<?php
require '../conexao.php';
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
$filtro = (isset($_GET['filtro'])) ? $_GET['filtro'] : '';
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)) :
    $conexao = conexao::getInstance();
    $sql = 'SELECT cod_cli, nome_cli, email, telefone, marca, carro, ano, modelo FROM cadastro';
    if ($filtro == 'sem-carro') :
        $sql = 'SELECT cod_cli, nome_cli, email, telefone, marca, carro, ano, modelo FROM cadastro WHERE carro = "Não"';
    elseif ($filtro == 'sem-toyota') :
        $sql = 'SELECT cod_cli, nome_cli, email, telefone, marca, carro, ano, modelo FROM cadastro WHERE carro = 1 AND marca NOT LIKE "Toyota"';
    endif;
    $stm = $conexao->prepare($sql);
    $stm->execute();
    $usuarios = $stm->fetchAll(PDO::FETCH_OBJ);
else :
    // Executa uma consulta baseada no termo de pesquisa passado como parâmetro
    $conexao = conexao::getInstance();
    $sql = 'SELECT cod_cli, nome_cli, email, telefone, marca, carro, ano, modelo FROM cadastro WHERE telefone LIKE :telefone';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':telefone', '%' . $termo . '%');
    $stm->execute();
    $usuarios = $stm->fetchAll(PDO::FETCH_OBJ);
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="../styles/styles.css">
    <title>BUSCAR</title>
</head>

<body>
    <header>
        <?php require_once('../navbar.php'); ?>
    </header>

    <main>
        <div id="container">
            <div class="sidebar">
                <h4>Buscar usuários</h4>
                <form method="GET" action="busca.php">
                    <div class="row filter-container">

                        <div class="input-field col s5">
                            <input id="telefone" type="text" name="termo">
                            <label for="telefone">Buscar por telefone</label>
                        </div>
                        <div class="input-field col s1">
                            <label class="radio-label">
                                <input class="with-gap" name="filtro" type="radio" value="todos" />
                                <span>Todos</span>
                            </label>
                        </div>
                        <div class="input-field col s2">
                            <label class="radio-label">
                                <input class="with-gap" name="filtro" type="radio" value="sem-toyota" />
                                <span>Sem carros Toyota</span>
                            </label>
                        </div>
                        <div class="input-field col s2">
                            <label class="radio-label">
                                <input class="with-gap" name="filtro" type="radio" value="sem-carro" />
                                <span>Sem carros</span>
                            </label>
                        </div>
                        <div class="input-field buttons-section col s4">
                            <button type="submit" class="waves-effect waves-light btn">Pesquisar</button>
                            <a href="busca.php" class="waves-effect waves-teal btn-flat">Limpar</a>
                        </div>

                    </div>
                </form>
            </div>

            <?php require('tabela-clientes.php'); ?>
        </div>
    </main>

    <footer></footer>

    <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>

</body>

</html>
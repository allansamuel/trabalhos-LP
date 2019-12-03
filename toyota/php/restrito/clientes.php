<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/clientes.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    
    <style>
        body{
            font-family: Lato;
        }
        
        .fa { color: #fff; }
    </style>
    <title>Admin</title>
</head>
<body>
    <?php
    require '../conexao.php';

        session_start(); 
        $admin  = (isset($_SESSION['admin'])) ? $_SESSION['admin']  : false;
        $senha  =  (isset($_SESSION['senha'])) ? $_SESSION['senha']  : '';
        $email  = (isset($_SESSION['email'])) ? $_SESSION['email']  : '';;
        $user = (isset($_SESSION['user'])) ? $_SESSION['user']  : '';

        if($admin === false){
            header("Location: ../index.php");
        }else{
            $termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
            $filtro = (isset($_GET['filtro'])) ? $_GET['filtro'] : '';
            // Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
            if (empty($termo)) :
                $conexao = conexao::getInstance();
                $sql = 'SELECT cod_cli, nome_cli, email, telefone, marca, carro, ano, modelo FROM cadastro';
                if ($filtro == 'sem-carro') :
                    $sql = 'SELECT cod_cli, nome_cli, email, telefone, marca, carro, ano, modelo FROM cadastro WHERE carro = "nao"';
                elseif ($filtro == 'sem-toyota') :
                    $sql = 'SELECT cod_cli, nome_cli, email, telefone, marca, carro, ano, modelo FROM cadastro WHERE carro = 1 AND lower(marca) NOT LIKE "toyota"';
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
    <!-- navbar -->
    <nav class="nav-extended">
        <div class="nav-wrapper white">
            <div class="container">
                <a href="../index.php" class="brand-logo"> <img src="../../img/logo.png" alt=""> </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="tab red-text text-darken-2" href="../index.php#sobre"> Sobre</a></li>
                <li><a class="red-text text-darken-2" href="../index.php#ofertas">Ofertas</a></li>
                <?php
                if(!empty($user)){
                    
                    if($admin === true){
                        echo '<ul id="dropdown1" class="dropdown-content">
                        <li><a href="./admin.php">Admin</a></li>
                        <li><a href="./clientes.php">Clientes</a></li>
                        </ul>';
                        echo '<li><a class="dropdown-trigger red-text text-darken-2" href="#!" data-target="dropdown1">Logado como Admin</a></li>';
                    }
                    echo '<li><a class="red-text text-darken-2" href="../logout.php">Sair</a></li>';
                }
                
                if(empty($user)){
                    echo '<li><a class="red-text text-darken-2" href="../login.php">Entrar</a></li>';
                    if($admin === false){
                        echo '<li><a class="red-text text-darken-2" href="../cadastro.php">Cadastrar</a></li>';
                    }
                }
                ?>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <!-- navbar -->

    <div class="clientes">
    <h4>Clientes da Promoção Hilux</h4>
    <a href="./relatorio.php"><button class="btn waves-effect">Exportar relatório PDF</button></a> 
    <h4>Buscar usuários</h4>
                <form method="GET" action="clientes.php">
                    <div class="row filter-container">

                        <div class="input-field col s4">
                            <input id="telefone" type="text" name="termo">
                            <label for="telefone">Buscar por telefone</label>
                        </div>
                        <div class="input-field col s1">
                            <label class="radio-label">
                                <input class="with-gap" name="filtro" type="radio" value="todos" checked />
                                <span>Todos</span>
                            </label>
                        </div>
                        <div class="input-field col s1">
                            <label class="radio-label">
                                <input class="with-gap" name="filtro" type="radio" value="sem-toyota" />
                                <span>Sem carros Toyota</span>
                            </label>
                        </div>
                        <div class="input-field col s1">
                            <label class="radio-label">
                                <input class="with-gap" name="filtro" type="radio" value="sem-carro" />
                                <span>Sem carros</span>
                            </label>
                        </div>
                        <div class="input-field buttons-section col s4">
                            <button type="submit" class="waves-effect waves-light btn">Pesquisar</button>
                        </div>

                    </div>
                </form>
    <table class="tabela-clientes table">
        <thead class="tabela-clientes">
            <tr>
                <th class="coluna" scope="col">#</th>
                <th class="coluna" scope="col">Nome</th>
                <th class="coluna" scope="col">Email</th>
                <th class="coluna" scope="col">Telefone</th>
                <th class="coluna" scope="col">Carro</th>
                <th class="coluna" scope="col">Marca</th>
                <th class="coluna" scope="col">Modelo</th>
                <th class="coluna" scope="col">Ano</th>
                <th class="coluna" scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($usuarios)){
                $aux = 0;
                foreach($usuarios as $usuario){
                    $aux = $aux + 1;
                  ?>  
             
            <tr>
                <td> <?php echo $aux; ?> </td>
                <td> <?php echo $usuario->nome_cli; ?> </td>
                <td> <?php echo  $usuario->email; ?> </td>
                <td> <?php echo  $usuario->telefone; ?> </td>
                <td> <?php echo  $usuario->carro; ?> </td>
                <td> <?php echo  $usuario->marca; ?> </td>
                <td> <?php echo  $usuario->modelo; ?> </td>
                <td> <?php echo  $usuario->ano; ?> </td>
                <td>
                    <a href='./editarCliente.php?id=<?=$usuario->cod_cli?>' class="btn waves-effect" >Editar</a>
                    <a onClick="confirmaExclusao(<?php echo "'".$usuario->cod_cli."'" ?>)" class="btn waves-effect red">Excluir</a>
                </td>
            </tr>

            <?php
                   }
                }
            ?>
            
        </tbody>
    </table>
    </div>
    <?php
    }
    ?>
    <script src="../../js/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script type="text/javascript" >
        
        $('.dropdown-trigger').dropdown();
    </script>
    <script type="text/javascript" >

    function confirmaExclusao(id){
        retorno = confirm("Deseja excluir esse Registro?")
        if (retorno){

            //Cria um formulário
            var formulario = document.createElement("form");
            formulario.action = "../actionCliente.php";
            formulario.method = "post";

            // Cria os inputs e adiciona ao formulário
            var inputAcao = document.createElement("input");
            inputAcao.type = "hidden";
            inputAcao.value = "excluir";
            inputAcao.name = "acao";
            formulario.appendChild(inputAcao); 

            var inputId = document.createElement("input");
            inputId.type = "hidden";
            inputId.value = id;
            inputId.name = "id";
            formulario.appendChild(inputId);

            //Adiciona o formulário ao corpo do documento
            document.body.appendChild(formulario);

            //Envia o formulário
            formulario.submit();
        }
    }

    </script>
</body>

</html>
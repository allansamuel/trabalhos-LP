<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/rodape.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    
    <script type="text/javascript">
    window.onload=function(){
    $(document).ready(function() {
        $('select').material_select();
    });
    }

    </script>

    <style>
        body{
            font-family: Lato;
        }
        .fa { color: #fff; }
    </style>
    <title>Ofertas Toyota</title>
</head>
<body>
<?php
    

    session_start(); 
    $admin  = (isset($_SESSION['admin'])) ? $_SESSION['admin']  : false;
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']  : '';
    if(empty($user) or $admin === false){
        header("Location: ../index.php");
    }else{
        require '../conexao.php';
        $conexao = conexao::getInstance();
        $id = $_GET['id'];
        $sql = 'SELECT * FROM toyota.cadastro where cod_cli=:usuario';
        
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':usuario', $id);
        $stm->execute();
        $cliente = $stm->fetchAll(PDO::FETCH_OBJ);
    ?>
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
                ?>
                </ul>
            </div>
        </div>
        </div>
    </nav>

    <div class="row container">
        <div class="container">
            <h3>Editar cliente</h3>
            <form class="col s12" action="../actionCliente.php" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input value="<?php  echo $cliente[0]->nome_cli ?>" id="nome" name="nome" type="text" class="validate" required>
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <input value="<?php  echo $cliente[0]->telefone ?>"  placeholder="DDD+Telefone" id="telefone" name="telefone" type="number" class="validate" required>
                        <label for="telefone">Telefone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input value="<?php  echo $cliente[0]->email ?>" id="email" name="email" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input value="<?php  echo $cliente[0]->senha ?>" id="password" name="password" type="text" class="validate" required>
                        <label for="password">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input value="<?php  echo $cliente[0]->carro ?>" id="carro" name="carro" type="text" class="validate" required>
                        
                        <label >Possui Carro?</label>
                    </div>
                    <div class="input-field col s6">
                            <input value="<?php  echo $cliente[0]->marca ?>"  id="marca" name="marca" type="text" class="validate">
                            <label for="marca">Marca</label>
                        </div>
                </div>
            
                
                <div class="row">
                    <div class="input-field col s6">
                        <input value="<?php  echo $cliente[0]->modelo ?>" id="modelo" name="modelo" type="text" class="validate">
                        <label for="modelo">Modelo</label>
                    </div>
                
                    <div class="input-field col s6">
                        <input value="<?php  echo $cliente[0]->ano ?>" id="ano" value="<?php echo date("Y"); ?>" name="ano" type="number" min="1900" max="9999" class="validate">
                        <label for="ano">Ano</label>
                    </div>
                </div>
                
                
                <input type="hidden" name="id" value="<?php  echo $cliente[0]->cod_cli ?>">
                <input type="hidden" name="acao" value="editar">
                <div class="row">
                    
                    <button id="login-button" type="submit" class="waves-effect btn col s12">CADASTRAR</button>
                    
                </div>
        </form>
        </div>
    
    </div>
   <?php
    }
   ?>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    
   <script type="text/javascript">
    window.onload=function(){
    $(document).ready(function() {
        $('select').material_select();

        document.getElementById('carro').onchange = function(){
            if(document.getElementById('carro').value == 'sim'){
                document.getElementById('marca').disabled = false;
                document.getElementById('modelo').disabled = false;
                document.getElementById('ano').disabled = false;
                document.getElementById('carro-inputs').classList.toggle('active');
            }else{
                document.getElementById('marca').disabled = true;
                document.getElementById('modelo').disabled = true;
                document.getElementById('ano').disabled = true;
                document.getElementById('carro-inputs').classList.remove('active');
            }
        }
            
        
        
    });
    }

    </script>
    <script type="text/javascript" >
        $('.dropdown-trigger').dropdown();
    </script>
</body>

</html>
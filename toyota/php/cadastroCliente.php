<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/cadastro.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
        
    
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
    require './conexao.php';

    session_start(); 
    $admin  = (isset($_SESSION['admin'])) ? $_SESSION['admin']  : false;
    $senha  =  (isset($_SESSION['senha'])) ? $_SESSION['senha']  : '';
    $email  = (isset($_SESSION['email'])) ? $_SESSION['email']  : '';;
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']  : '';
    if(!empty($user)){
        header("Location: ./index.php");   
    }else{
    ?>
    <!-- navbar -->
    <nav>
        <div class="nav-wrapper white">
            <div class="container">
                <a href="./index.php" class="brand-logo grey-text"> <img src="../img/logo.png" alt=""> </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="grey-text" href="./index.php#sobre"> Sobre</a></li>
                <li><a class="grey-text" href="./index.php#ofertas">Ofertas</a></li>
                <li><a class="grey-text" href="./cadastroCliente.php">Cadastrar</a></li>
                <li><a class="grey-text" href="./login.php">Entrar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->

    <div class="row container">
        <div class="container">
            <h3>Inscreva-se e garanta sua participação na nossa oferta Hilux</h3>
            <form class="col s12" action="./actionCliente.php" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="nome" name="nome" type="text" class="validate" required>
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="DDD+Telefone" id="telefone" name="telefone" type="number" class="validate" required>
                        <label for="telefone">Telefone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" name="email" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" name="password" type="password" class="validate" required>
                        <label for="password">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        
                        <select id="carro" name="carro" required>
                        <option value="nao">Não</option>
                        <option value="sim">Sim</option>
                        </select>
                        <label >Possui Carro?</label>
                    </div>
                </div>
                <div id="carro-inputs">
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="marca" name="marca" type="text" class="validate">
                            <label for="marca">Marca</label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="modelo" name="modelo" type="text" class="validate">
                            <label for="modelo">Modelo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input  id="ano" value="<?php echo date("Y"); ?>" name="ano" type="number" min="1900" max="9999" class="validate">
                            <label for="ano">Ano</label>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="acao" value="incluir">
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
</body>

</html>
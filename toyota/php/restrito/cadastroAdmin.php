<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/rodape.css">
    <link rel="stylesheet" href="../../css/image-slider.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        
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
    require '../conexao.php';

    session_start(); 
    $admin  = (isset($_SESSION['admin'])) ? $_SESSION['admin']  : false;
    $senha  =  (isset($_SESSION['senha'])) ? $_SESSION['senha']  : '';
    $email  = (isset($_SESSION['email'])) ? $_SESSION['email']  : '';;
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']  : '';
    if(empty($user) or $admin === false){
        header("Location: ../index.php");
    }else{
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
    <!-- navbar -->

    <div class="row container">
        <div class="container">
            <h3>Cadastro de Administrador</h3>
            <form class="col s12" action="./actionAdmin.php" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="emailAdmin" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="passwordAdmin" type="password" class="validate" required>
                        <label for="password">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="passwordConfAdmin" type="password" class="validate" required>
                        <label for="password">Confirma senha</label>
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
    <script src="../../js/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script type="text/javascript" >
        
        $('.dropdown-trigger').dropdown();
    </script>
</body>

</html>
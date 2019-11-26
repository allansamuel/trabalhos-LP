<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/rodape.css">
    <link rel="stylesheet" href="../css/login.css">
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
                
                <?php
                if(!empty($user)){
                    
                    
                    echo '<li><a class="grey-text" href="./logout.php">Sair</a></li>';
                }else if($admin === false){
                    echo '<li><a class="grey-text" href="./cadastroCliente.php">Cadastrar</a></li>';
                }
                
                if(empty($user)){
                    echo '<li><a class="grey-text" href="./login.php">Entrar</a></li>';
                }
                ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->

    <div class="row container">
        <div class="container">
            <h3>Acesse sua conta</h3>
            <form class="col s12" action="./actionLogin.php" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button id="login-button" type="submit" class="waves-effect waves-light btn">ENTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    
  </div>
    
</body>
            <?php } ?>
</html>
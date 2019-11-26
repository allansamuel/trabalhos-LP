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
    <link rel="stylesheet" href="../css/image-slider.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    
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
    $admin  = $_SESSION['admin'];
    $senha  =  $_SESSION['senha'];
    $email  = $_SESSION['email'];
    $user = $_SESSION['user'];
    ?>
    <!-- navbar -->
    <nav>
        <div class="nav-wrapper white">
            <div class="container">
                <a href="./index.php" class="brand-logo grey-text"> <img src="../img/logo.png" alt=""> </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="grey-text" href="./index.php#sobre"> <h6>Sobre</h6></a></li>
                <li><a class="grey-text" href="./index.php#ofertas"><h6>Ofertas</h6></a></li>
                <?php
                if(!empty($user)){
                    
                    if($admin === true){
                        echo '<li><a class="grey-text" href="./restrito.php"><h6>Restrito</h6></a></li>';
                    }
                    echo '<li><a class="grey-text" href="./logout.php"><h6>Sair</h6></a></li>';
                }
                
                if(empty($user)){
                    echo '<li><a class="grey-text" href="./login.php"><h6>Entrar</h6></a></li>';
                    if($admin === false){
                        echo '<li><a class="grey-text" href="./cadastro.php"><h6>Cadastrar</h6></a></li>';
                    }
                }
                ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->
    
    
</body>

</html>
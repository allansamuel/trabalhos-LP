<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
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
    ?>
    <!-- navbar -->
    <nav class="nav-extended">
        <div class="nav-wrapper white">
            <div class="container">
                <a href="../index.php" class="brand-logo grey-text"> <img src="../../img/logo.png" alt=""> </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="tab grey-text " href="../index.php#sobre">Sobre</a></li>
                <li><a class="grey-text" href="../index.php#ofertas">Ofertas</a></li>
                <?php
                if(!empty($user)){
                    
                    if($admin === true){
                        echo '<ul id="dropdown1" class="dropdown-content">
                        <li><a href="./admin.php">Admin</a></li>
                        <li><a href="./clientes.php">Clientes</a></li>
                      </ul>';
                        echo '<li><a class="dropdown-trigger grey-text" href="#!" data-target="dropdown1">Logado como Admin</a></li>';
                    }
                    echo '<li><a class="grey-text" href="../logout.php">Sair</a></li>';
                }
                
                if(empty($user)){
                    echo '<li><a class="grey-text" href="../login.php">Entrar</a></li>';
                    if($admin === false){
                        echo '<li><a class="grey-text" href="../cadastro.php">Cadastrar</a></li>';
                    }
                }
                ?>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <!-- navbar -->

    <div class="container">
    <h4>Administradores</h4>
    <form action="">

    </form>
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
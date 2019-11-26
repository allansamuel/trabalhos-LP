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
        $sql = 'SELECT * FROM toyota.login where usuario=:id';
        
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $id);
        $stm->execute();
        $administrador = $stm->fetchAll(PDO::FETCH_OBJ);
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
            <h3>Editar Administrador</h3>
            <form class="col s12" action="./actionAdmin.php" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input value="<?php echo $administrador[0]->usuario ?>" id="email" name="emailAdmin" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input value="<?php echo $administrador[0]->senha ?>" id="password" name="passwordAdmin" type="text" class="validate" required>
                        <label for="password">Senha</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label >Data de cadastro</label>
                        <input value="<?php echo date("d/m/Y", strtotime($administrador[0]->data_cad)); ?>" id="datacad" name="datacad" type="text" class="validate" required>
                        
                    </div>
                   
                </div>
                <input type="hidden" name="acao" value="editar">
                <div class="row">
                    
                    <button id="login-button" type="submit" class="waves-effect btn col s12">EDITAR</button>
                    
                </div>
        </form>
        </div>
    
    </div>
    <?php
        }
    ?>
    <script src="../../js/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script  type="text/javascript">
    $( function() {
        $( "#datacad" ).datepicker({
            dateFormat: 'dd/mm/yy',
        });
        
    } );
    </script>
    <script type="text/javascript" >
        $('.dropdown-trigger').dropdown();
    </script>
</body>

</html>
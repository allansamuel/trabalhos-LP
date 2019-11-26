<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/admin.css">
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
            $conexao = conexao::getInstance();
            $sql = 'SELECT * FROM toyota.login';
            $stm = $conexao->prepare($sql);
            $stm->execute();
            $usuarios = $stm->fetchAll(PDO::FETCH_OBJ);
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

    <div class="container admin">
    <h4>Administradores</h4>
    <a href="./cadastroAdmin.php"><button class="btn waves-effect">Cadastrar novo Administrador</button></a> 
    <table class="tabela-admin table">
        <thead class="tabela-admin">
            <tr>
                <th class="coluna" scope="col">#</th>
                <th class="coluna" scope="col">Email</th>
                <th class="coluna" scope="col">Data de Cadastro</th>
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
                <td> <?php echo $usuario->usuario; ?> </td>
                <td> <?php echo  $usuario->data_cad; ?> </td>
                <td>
                    <a href='./editarAdmin.php?id=<?=$usuario->usuario?>' class="btn waves-effect" >Editar</a>
                    <a href='javascript:void(0)' class="btn waves-effect link_exclusao red" rel="<?= $produto->codigo;?>">Excluir</a>
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
</body>

</html>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
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
    <!-- navbar -->
    <nav>
        <div class="nav-wrapper white">
            <div class="container">
                <a href="./index.php" class="brand-logo grey-text"> <img src="../img/logo.png" alt=""> </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="grey-text" href="./index.php#sobre"> <h6>Sobre</h6></a></li>
                <li><a class="grey-text" href="./index.php#ofertas"><h6>Ofertas</h6></a></li>
                <li><a class="grey-text" href="./login.php"><h6>Entrar</h6></a></li>
                <li><a class="grey-text" href="./cadastro.php"><h6>Cadastrar</h6></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->

    <div class="row container">
        <div class="container">
            <h3>Inscreva-se e garanta sua participação na nossa oferta Hilux</h3>
            <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="email" type="email" class="validate">
                    <label for="email">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate">
                    <label for="password">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate">
                    <label for="password">Email</label>
                </div>
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate">
                    <label for="password">Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate">
                    <label for="password">Endereço</label>
                </div>
                <div class="input-field col s6">
                    <select>
                    <option value="" disabled selected>Possui carro?</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                    </select>
                </div>
            </div>
            <div class="row">
                    <button id="login-button" type="button" class="waves-effect waves-light btn col s12">CADASTRAR</button>
                
            </div>
        </form>
        </div>
    
    </div>
   
</body>

</html>
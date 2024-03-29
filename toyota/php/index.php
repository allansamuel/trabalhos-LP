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
    $admin  = (isset($_SESSION['admin'])) ? $_SESSION['admin']  : false;
    $senha  =  (isset($_SESSION['senha'])) ? $_SESSION['senha']  : '';
    $email  = (isset($_SESSION['email'])) ? $_SESSION['email']  : '';;
    $user = (isset($_SESSION['user'])) ? $_SESSION['user']  : '';
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
                    
                    if($admin === true){
                        echo '<ul id="dropdown1" class="dropdown-content">
                        <li><a href="./restrito/admin.php">Admin</a></li>
                        <li><a href="./restrito/clientes.php">Clientes</a></li>
                      </ul>';
                        echo '<li><a class="dropdown-trigger grey-text" data-target="dropdown1">Logado como Admin</a></li>';
                    }else{
                        echo '<li class="grey-text"> <b>Status: Inscrito</b> </li>';
                    }
                    echo '<li><a class="grey-text" href="./logout.php">Sair</a></li>';
                }
                
                if(empty($user)){
                    
                    if($admin === false){
                        echo '<li><a class="grey-text" href="./cadastroCliente.php">Cadastrar</a></li>';
                    }
                    echo '<li><a class="grey-text" href="./login.php">Entrar</a></li>';
                }
                ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->
    
    <div style="min-height: 50px;">
                <!-- Jssor Slider Begin -->

                <style>
                    /* jssor slider loading skin spin css */
                    
                    .jssorl-009-spin img {
                        animation-name: jssorl-009-spin;
                        animation-duration: 1.6s;
                        animation-iteration-count: infinite;
                        animation-timing-function: linear;
                    }
                    
                    @keyframes jssorl-009-spin {
                        from {
                            transform: rotate(0deg);
                        }
                        to {
                            transform: rotate(360deg);
                        }
                    }
        </style>
        <div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 250px; overflow: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">

                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../img/loading.png" />
            </div>

            <!-- Slides Container Begin-->
            <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1300px; height: 250px; overflow: hidden; display: flex; align-items: center">

                <div>
                    <img data-u="image" src="https://www.toyota.com.br/wp-content/uploads/2019/05/tiny-RAV4-2019_banner-home-desktop-bg.png" />
                </div>
                <div>
                    <img data-u="image" src="https://www.toyota.com.br/wp-content/uploads/2019/01/yaris_HB_banner_home_desk-3.jpg"/>
                </div>
                <div>
                    <img data-u="image" src="https://www.toyota.com.br/wp-content/uploads/2019/09/Corolla-2020_banner_home_desk_bg.png" />
                </div>
            </div>
            <!-- Slides Container End-->

            <!--Logo Begin-->
            <div data-u="navigator" class="jssorb031 titulo-sobreposto"  data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                    <img class="logo-titulo" src="../img/titulo-toyota.png" alt="">
                
            </div>
            <!--Logo End-->

            <!--Bullet Navigator Begin -->
            <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
            </svg>
                </div>
            </div>
            <!--Bullet Navigator End -->

        </div>
    </div>

    <div id="conteudo">
        
        <div class="container row" id="sobre">
            <div class="col s6">
                <h3>SEGURANÇA, CONFORTO E DESEMPENHO.</h3>
                <h6>Encontre o Toyota que combina com você.</h6>
                <br>
                
                <img src="../img/carros-toyota.png" alt="">
            </div>
            <div class="sobre-2 col s6">
                <div class="promocoes">
                    <h3>CONFIRA NOSSOS LANÇAMENTOS</h3>
                    <hr>
                    <h6>Conheça toda a linha Toyota e escolha o seu próximo carro. Acesse o nosso site oficial.</h6>
                    <h6>Assistência 24H</h6>
                    <a href="https://toyota.com.br"> <button id="login-button" type="button" class="waves-effect btn col s12">Ir para o site</button></a>
                </div>
                <img class="corolla-alpha" src="../img/corolla.png" alt="">
            </div>
            
        </div>
        
        <div id="ofertas">
            <div id="showcase-hilux">
                    <div class="showcase container">
                        <div class="hilux-container col s6">
                            <a href="./cadastroCliente.php"><img src="../img/hilux.png" class="animated-hilux"></a>
                            
                        </div>
                        <div class="col s6">
                            <h4 id="oferta-titulo">INSCREVA-SE E CONCORRA A UMA HILUX CABINE DUPLA</h4>
                            <h6>
                                A nova Hilux é a única picape média avaliada pelo Latin NCAP com nota máxima de cinco estrelas em
                                segurança para passageiro adulto e passageiro infantil. Com sete airbags 3, freios ABS com EBD e
                                BAS, e uma nova estrutura mais robusta, a Nova Hilux une conforto, dirigibilidade e segurança em uma
                                única picape.
                            </h6>
                        </div>
                    </div>
            </div>
            <div id="hilux-apresentacao">
                <div class="titulo-sobreposto-oferta">
                <h4>Não perca a oportunidade</h4>
                <iframe width="480" height="260" src="https://www.youtube.com/embed/SOYVJjrW79c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p>O sorteio será realizado dia 25 de Dezembro. <a href="./cadastroCliente.php">Saiba mais</a> </p> 
                </div>
            <img id="hilux-bg" src="https://www.toyota.com.br/wp-content/uploads/2015/11/tyt-hilux-simples-2016-banner-top.jpg" >
            </div>
            
            <div id="hilux-conheca">
                <a href="https://www.toyota.com.br/modelos/hilux-cabine-dupla/"><h4>Conheça a nova Hilux Cabine Dupla</h4></a>
                
                <img id="hilux-info" src="../img/hilux-info.png" >
            </div>
        </div>
    </div>
    
    
    <div id="rodape">
        <div class="container" style="display:flex;justify-content:space-around">
            <div class="rodape-box">
                    <div class="arrow_title">
                        
                        <h3>Atendimento</h3>
                    </div>
                    
                    <ul>
                        <li class="link-icon">
                            <div style="display: flex; flex-direction: row; align-items: center">
                                <img class="rodape-icon" src="../img/gallery/icons/phone.png">
                                <p style="color:white; "> (51) 0000-0000 / (51) 0000-0000</p>
                            </div>
                        </li>
                        <li>
                            <div class="link-icon">
                                <a target="_blank " href="vinhosdaserra@gmail.com "><img class="rodape-icon " src="../img/gallery/icons/mail.png "></a>
                                <a href="mailto:vinhosdaserra@gmail.com ">toyota.sac@toyota.com</a>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="rodape-box ">
                    <div class="arrow_title">
                        
                        <h3>Acompanhe-nos</h3>
                    </div>

                    <ul>
                        <li class="link-icon">
                            <a target="_blank " href="http://www.facebook.com "><img class="rodape-icon " src="../img/gallery/icons/facebook.png "></a>
                            <a target="_blank " href="http://www.facebook.com " >Facebook</a>
                        </li>
                        <li class="link-icon">
                            <a target="_blank " href="http://www.instagram.com "><img class="rodape-icon " src="../img/gallery/icons/instagram.png "></a>
                            <a target="_blank " href="http://www.facebook.com ">Instagram</a>
                        </li>
                        <li class="link-icon">
                            <a target="_blank " href="http://www.youtube.com "><img class="rodape-icon " src="../img/gallery/icons/youtube.png "></a>
                            <a target="_blank " href="http://www.youtube.com ">Youtube</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
            
        <div id="rodape-creditos">
            <p style="margin-left: 2%; margin-block-end: 0;">Site desenvolvido por <a href="https://www.github.com/allansamuel">Allan Rodrigues</a> & <a href="https://www.github.com/BetaTeixeira">Roberta Teixeira</a> </p>
        </div>

    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script>
    <script src="ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" >
        $('.dropdown-trigger').dropdown();
    </script>
    <script type="text/javascript" src="../js/jssor.slider.min.js"></script>
    <script>
        jQuery(document).ready(function($) {

            var options = {
                $FillMode: 2, 
                $AutoPlay: 1, //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 4000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: 1, //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                $SlideEasing: $Jease$.$OutQuint, //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
                $SlideDuration: 800, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide, default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
                $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: { //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
                    $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $SpacingX: 8, //[Optional] Horizontal space between each item in pixel, default value is 0
                    $Orientation: 1 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: { //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2 //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
    
</body>

</html>
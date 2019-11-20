<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vinhos Da Serra</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/style_geral.css" rel="stylesheet" type="text/css" />
    <link href="../css/style_contato.css" rel="stylesheet" type="text/css" />

    <link href='https://fonts.googleapis.com/css?family=Amatic SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Wire One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Khand' rel='stylesheet'>
    <link rel="shortcut icon" type="image/png" href="../img/gallery/icons/favicon.png">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="container_principal">
        <div id="header" style="z-index: -1; display: flex;align-items: center;align-content: center;flex-wrap: wrap;margin: 0; table-layout: fixed;
    border-collapse: collapse;">

            <!-- NAVBAR
    ================================================== -->


            <div class="navbar-wrapper">
                <div class="container">

                    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0px;">
                        <div class="container" style="font-family: Khand; font-size: 115%">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                                <a class="navbar-brand" href="../html/index.html">Novidades</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="../html/vinhos.html">Vinhos</a></li>
                                    <li><a href="../html/acessorios.html">Acessórios</a></li>
                                    <li><a onclick="alert('Em breve')" href="">Promoções</a></li>
                                    <li><a href="../html/fotos.html">Fotos</a></li>
                                    <li><a href="../html/videos.html">Vídeos</a></li>
                                    <li><a href="../html/contato.php">Contato</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>

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
                <div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 250px; overflow: hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">

                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
                    </div>

                    <!-- Slides Container Begin-->
                    <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1300px; height: 250px; overflow: hidden; display: flex; align-items: center">

                        <div>
                            <img data-u="image" src="../img/gallery/banner/005.png" />
                        </div>
                        <div>
                            <img data-u="image" src="../img/gallery/banner/002.jpg" />
                        </div>
                        <div>
                            <img data-u="image" src="../img/gallery/banner/001.jpg" />
                        </div>
                    </div>
                    <!-- Slides Container End-->

                    <!--Logo Begin-->
                    <div data-u="navigator" class="jssorb031" style="display: flex; flex-direction: row; align-items: center; position: absolute;left: 8%;top: 42%;;color: white;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <img src="../img/gallery/icons/logo.png" style="width: 2.5em; ">
                        <h1 id="title">Vinhos da Serra</h1>
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
            <!-- Jssor Slider End -->
        </div>

        <!-- Conteudo -->
        <div id="conteudo" style="display: flex; flex-wrap: wrap; justify-content: center">
            <div id="form-contato">

                <div class="arrow_title" style="background-color: #0a090a; margin-bottom: 0;">
                    <img src="../img/gallery/icons/white_arrow.png">
                    <h2 class="conteudo_titulo">Contate-nos</h2>

                </div>
                <form action="contato.php" method="POST">


                    <p>
                        <label for="nome" id="nome" style="width: 100%">
                        Nome:<br />
                        <input type="text" style="width: 60%" name="nome" id="nome" placeholder="Insira seu nome">
                        </label>
                    </p>

                    <p>
                        <label for="email" id="email" style="width: 100%" >
                        E-mail:<br />
                        <input type="text" style="width: 60%" name="email" id="email" placeholder="seuemail@dominio.com">
                    </label>
                    </p>
                    <p>
                        <label for="assunto" id="assunto"  style="width: 100%">
                        Assunto:<br />
                        <input type="text" style="width: 60%" name="assunto" id="assunto"  placeholder="Insira o assunto">
                    </label>
                    </p>
                    <p>
                        <label for="comentario" id="comentario"style="width: 100%;height: 130px ">
                        Comentários:<br />
                        <textarea rows="2" style="width: 70%; height: 140px; resize: none; padding: 5px; font-weight: normal" id="comentario"  name="comentario" placeholder="Insira sua dúvida ou sugestão aqui"></textarea>
                    </label>
                    </p>

                    <p>
                        <input class="btn btn-info" type="submit" name="BTEnvia" value="Enviar">
                        <input class="btn btn-dark" type="reset" name="BTApaga" value="Apagar"></p>
                </form>



            </div>
            <div id="mapa" style="display: flex">
                <h2 style="font-family: Khand; margin: 0; font-size: 35px; padding: 5px 5px 5px 30px;">Como chegar:</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55626.84494593309!2d-50.90148782160537!3d-29.379721624878663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951932427804321f%3A0xa71c25f081e5aea6!2sGramado%2C+RS!5e0!3m2!1spt-BR!2sbr!4v1560095467573!5m2!1spt-BR!2sbr"
                    width="100%" height="100%" frameborder="0" allowfullscreen></iframe>

            </div>

          
        <?php
    #pegando os dados que vem do formulário ... no vetor $_POST
    #$nome_cliente='nome';
    #$email='email';
    #$assunto='assunto';
    #$mensagem='comentario';
    #enviando os dados do formulario de contato por email
    
    #$de="$nome_cliente $email";
    #$corpo="Cliente: $nome_cliente <br> Mensagem: $mensagem";
    #mail("allan.samuelg@gmail.com", utf8_decode($assunto), utf8_decode($corpo),"From:($de)\nContent-Type: text/html");


    ?> 
        </div>
        <!-- Conteudo End-->

        <div id="rodape">
            <div class="rodape-box" style="width: 25%;">
                <div class="arrow_title">
                    <img class="rodape-icon" src="../img/gallery/icons/white_arrow.png">
                    <h3>Pagamento</h3>
                </div>
                <img src="../img/gallery/stickers/cartao_credito.png" style="width: 100%">
                <p style="padding-top: 10px;">Parcelas em até 6x no cartão sem juros.</p>
            </div>
            <div class="rodape-box" style="width: 30%; ">
                <div class="arrow_title">
                    <img class="rodape-icon" src="../img/gallery/icons/white_arrow.png">
                    <h3>Atendimento</h3>
                </div>
                <p>Vinhos da Serra - CNPJ: 00.000.000/0000-00<br>R. Lorem ipsum dolor, 123 - Bairro Lorem ipsum - Gramado - RS - Brasil</p>
                <ul>
                    <li style="display: flex; flex-direction: row; flex-wrap: wrap">
                        <div style="display: flex; flex-direction: row; margin-right: 4.2%;">
                            <img class="rodape-icon" src="../img/gallery/icons/phone.png">
                            <p style="color:white; "> (51) 0000-0000 / (51) 0000-0000</p>
                        </div>
                        <div style="display: flex; flex-direction: row;">
                            <img class=" rodape-icon " src="../img/gallery/icons/whatsapp.png ">
                            <p style="color:white; "> (51) 90000-0000</p>
                        </div>


                    </li>
                    <li>
                        <a target="_blank " href="vinhosdaserra@gmail.com "><img class="rodape-icon " src="../img/gallery/icons/mail.png "></a>
                        <a href="mailto:vinhosdaserra@gmail.com ">vinhosdaserra@gmail.com</a>
                    </li>

                </ul>
            </div>
            <div class="rodape-box " style="width: 18%; ">
                <div class="arrow_title">
                    <img class="rodape-icon " src="../img/gallery/icons/white_arrow.png ">
                    <h3>Acompanhe-nos</h3>
                </div>

                <ul>
                    <li style="display: flex; flex-direction: row ">
                        <a target="_blank " href="http://www.facebook.com "><img class="rodape-icon " src="../img/gallery/icons/facebook.png "></a>
                        <a target="_blank " href="http://www.facebook.com " style="margin-left:4px ">Facebook</a>
                    </li>
                    <li>
                        <a target="_blank " href="http://www.instagram.com "><img class="rodape-icon " src="../img/gallery/icons/instagram.png "></a>
                        <a target="_blank " href="http://www.facebook.com ">Instagram</a>
                    </li>
                    <li>
                        <a target="_blank " href="http://www.youtube.com "><img class="rodape-icon " src="../img/gallery/icons/youtube.png "></a>
                        <a target="_blank " href="http://www.youtube.com ">Youtube</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="rodape-creditos">
            <p style="margin-left: 2%; margin-block-end: 0;">Site desenvolvido por Allan Samuel Gomes Rodrigues (3i)</p>
        </div>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>

    <!-- jssor slider scripts-->
    <script type="text/javascript" src="../js/jssor.slider.min.js"></script>
    <script>
        jQuery(document).ready(function($) {

            var options = {
                $FillMode: 2, //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
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
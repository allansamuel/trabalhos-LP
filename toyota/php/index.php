<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/rodape.css">
    <link rel="stylesheet" href="../css/image-slider.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <style>
        body{
            font-family: Lato;
        }
        .fa { color: #fff; }
    </style>
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav>
        <div class="nav-wrapper white">
            <div class="container">
                <a href="#" class="brand-logo grey-text"> <img src="../img/logo.png" alt=""> </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="grey-text large-text" href="../index.html"> <h6>Sobre</h6></a></li>
                <li><a class="grey-text" href="portfolio.html"><h6>Promoções</h6></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->
    
    <!-- slider -->
    <div id="slider-main">

        <button id="prev"><i class="fa fa-angle-double-left"></i></button>
        <div id="slider"></div>
        <button id="next"><i class="fa fa-angle-double-right"></i></button>
        <div id="circles"></div>

    </div>
    <!-- slider -->

    <div id="rodape">
            <div class="rodape-box" style="width: 25%;">
                <div class="arrow_title">
                    
                    <h3>Pagamento</h3>
                </div>
                <img src="../img/gallery/stickers/cartao_credito.png" width="100%">
                <p style="padding-top: 10px;">Parcelas em até 24x no cartão sem juros.</p>
            </div>
            <div class="rodape-box" style="width: 30%; ">
                <div class="arrow_title">
                    
                    <h3>Atendimento</h3>
                </div>
                <p>Toyota - CNPJ: 00.000.000/0000-00<br>R. Lorem ipsum dolor, 123 - Bairro Lorem ipsum - Gramado - RS - Brasil</p>
                <ul>
                    <li style="display: flex; flex-direction: row; flex-wrap: wrap">
                        <div style="display: flex; flex-direction: row; margin-right: 4.2%;">
                            <img class="rodape-icon" src="../img/gallery/icons/phone.png">
                            <p style="color:white; "> (51) 0000-0000 / (51) 0000-0000</p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    
    <!-- image slider script -->
    <script src="../js/image-slider.js"></script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</body>

</html>
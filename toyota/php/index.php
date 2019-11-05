<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="css/image-slider.css">

    <title>Document</title>
</head>
<body>
<nav>
        <div class="nav-wrapper white">
            <div class="container">
                <a href="#" class="brand-logo grey-text"> <img src="../img/logo.png" alt=""> </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="grey-text large-text" href="../index.html"> <h5>Home</h5></a></li>
                <li><a class="grey-text" href="portfolio.html"><h5>Portfolio</h5></a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- main image slider container -->
    <div id="slider-main">

    <!-- previous button -->
    <button id="prev"><i class="fa fa-angle-double-left"></i></button>

    <!-- image container -->
    <div id="slider"></div>

    <!-- next button -->
    <button id="next"><i class="fa fa-angle-double-right"></i></button>

    <!-- pagination bullets -->
    <div id="circles"></div>

    </div>
    <!-- end of main image slider container -->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" 
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
        crossorigin="anonymous"></script>
<script src="js/image-slider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>
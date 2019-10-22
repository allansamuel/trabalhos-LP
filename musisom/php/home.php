<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>MusiSom</title>
</head>
<body>

    <nav class="shadow p-3 mb-5 navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/trabalhos-LP/musisom/php/"><img class="logotipo" src="../img/logo.png"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navlinks-content collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav row justify-content-end">
        
        <li class="nav-item ">
            <a class="nav-link" href="#">Cadastrar produto</a>
        </li>
        <li class="nav-item col order-last">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Busque produtos" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </li>
        
        </ul>
        
    </div>
    </nav>

    <table class="tabelaprodutos table">
        <thead class="tabelaprodutos-head thead-dark">
            <tr>
            <th id="col1" scope="col"><button class="btn btn-outline-success" type="submit">Selecionar Todos</button></th>
            <th scope="col">Tipo</th>
            <th scope="col">Marca</th>
            <th scope="col">Valor</th>
            <th scope="col">Quantia</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <input type="checkbox"> </td>
                <td> a </td>
                <td> b </td>
                <td> c </td>
                <td> d </td>
            </tr>
            
        </tbody>
    </table>
</body>
</html>
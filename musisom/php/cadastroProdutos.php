<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cadastro.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>MusiSom</title>
</head>
<body>
<div id="cadastro-conteudo">
<nav class="shadow p-3 mb-5 navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/trabalhos-LP/musisom/php/"><img class="logotipo" src="../img/logo.png"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <form class="form-inline ">
            <input class="form-control mr-sm-2" type="search" placeholder="Busque produtos" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    
    </nav>

    <div class="form container">
    <h3>Cadastre um novo Produto</h3>
        <form action="./actionCadastro.php" method="post">
            <div id="cadastro-produto">
                <label for="descricao">Descrição</label>
                    <input name="descricao" id="descricao" class="campo-cadastro form-control mr-sm-2" type="text" placeholder="Ex. Flauta Doce Yamaha Sopranino">
                <label for="foto">Tipo</label>
                    <input name="tipo" class="campo-cadastro form-control mr-sm-2" type="text" placeholder="Ex. Sopro" >
                <label for="foto">Marca</label>
                    <input name="marca" class="campo-cadastro form-control mr-sm-2" type="text" placeholder="Ex. Yamaha" >
                <label for="foto">Valor Unitário</label>
                    <input name="valor" class="campo-cadastro form-control mr-sm-2" type="number" step="0.01" min="0.0" placeholder="Ex. 50,00" >
                <label for="foto">Estoque</label>
                    <input name="qtd_estoque" class="campo-cadastro form-control mr-sm-2" type="number" min="0" placeholder="Ex. 49" >
                <label for="foto">Selecionar Foto</label>
                    <input name="foto" class="campo-cadastro" type="file" name="foto" id="foto" value="foto" >
                
            </div>
            <button class="btn btn-lg btn-block btn-success" type="submit">Cadastrar</button>
        </form>
    </div>
</div>
   
    
</body>
<?php
require 'conexao.php';

// Recebe o termo de pesquisa se existir
$query = (isset($_GET['sqlquery'])) ? $_GET['sqlquery'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($query)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM produtos';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$produtos = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM produtos WHERE tipo LIKE :tipo OR marca LIKE :marca';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':tipo', $query.'%');
	$stm->bindValue(':marca', $query.'%');
	$stm->execute();
	$produtos = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css" />
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
            <a class="nav-link" href="/trabalhos-LP/musisom/php/cadastroProdutos.php">Cadastrar produto</a>
        </li>
        <li class="nav-item col order-last">
            <form method="get" class="form-inline my-2 my-lg-0">
                <input name="sqlquery" class="form-control mr-sm-2" type="search" placeholder="Busque produtos" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </li>
        
        </ul>
        
    </div>
    </nav>

    <table class="tabelaprodutos table">
        <thead class="tabelaprodutos-head thead-dark">
            <tr>
            <th scope="col">Imagem</th>
            <th scope="col">Descrição</th>
            <th scope="col">Tipo</th>
            <th scope="col">Marca</th>
            <th scope="col">Valor Unitário</th>
            <th scope="col">Estoque</th>
            <th scope="col">Valor Total</th>
            <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($produtos)){
                $aux = 0;
                foreach($produtos as $produto){
                    $aux = $aux + 1;
                  ?>  
             
            <tr>
                <td> <img src="../fotos/<?php echo $produto->foto ?>" class="produto-foto" data-toggle="modal" data-target=".modal.open<?php echo $aux; ?>"> </td>
                <td> <?php echo $produto->descricao ?> </td>
                <td> <?php echo  $produto->tipo ?> </td>
                <td> <?php echo  $produto->marca ?> </td>
                <td> R$ <?php echo  $produto->valor ?> </td>
                <td> <?php echo  $produto->qtd_estoque ?> </td>
                <td> R$ <?php echo ($produto->valor_total) ?> </td>
                <td>
                    <a href='editar.php?id=<?=$produto->id?>' class="btn btn-danger" rel="<?= $produto->codigo;?>"><img class="icon" src="../img/pencil.png" /></a>
                    <a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?= $produto->codigo;?>"><img class="icon" src="../img/delete.png" /></a>
                    <!-- <img class="icon" data-toggle="modal" data-target=".modal.open<?php echo $aux; ?>" src="../img/eye-outline.png"   title="Clique para abrir detalhes"/> -->


                </td>
                    
            </tr>

            <div class="modal open<?php echo $aux; ?> fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $produto->descricao ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="../fotos/<?php echo $produto->foto ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                    </div>
                </div>
            </div>
            <?php
                   }
                }
            ?>
            
        </tbody>
    </table>
    <script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>
<?php
require 'conexao.php';
// Recebe o id do cliente do cliente via GET
$id = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM produtos WHERE codigo = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id);
	$stm->execute();
	$produto = $stm->fetch(PDO::FETCH_OBJ);


endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cadastro.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>MusiSom</title>
</head>
<body>

	
	<?php if(empty($produto)):?>
		<h3 class="text-center text-danger">Cliente não encontrado!</h3>
	<?php else: ?>
		
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
				<h3>Editar Produto</h3>
				
				
				
				
			
				<form action="./actionProduto.php" method="post" enctype='multipart/form-data'>
					<div id="cadastro-produto">
						<div id="form-foto">
							<div >
								<a href="#" class="thumbnail">
									<img src="../fotos/<?=$produto->foto?>" width="250" id="foto-cliente">
								</a>
							</div>

							<div id="foto-input">
								<input type="file" name="foto" id="foto" value="foto" >
							</div>
							
						</div>
						<label for="descricao">Descrição</label>
							<input value="<?php echo $produto->descricao; ?>" name="descricao" id="descricao" class="campo-cadastro form-control mr-sm-2" type="text" placeholder="Ex. Flauta Doce Yamaha Sopranino">
						<label for="tipo">Tipo</label>
							<input value="<?php echo $produto->tipo; ?>" name="tipo" class="campo-cadastro form-control mr-sm-2" type="text" placeholder="Ex. Sopro" >
						<label for="marca">Marca</label>
							<input value="<?php echo $produto->marca; ?>" name="marca" class="campo-cadastro form-control mr-sm-2" type="text" placeholder="Ex. Yamaha" >
						
						<div class="form subcontainer">
							<div class="form-col">
								<label for="valor">Valor Unitário</label>
								<input value="<?php echo (str_replace(",", "",$produto->valor)); ?>" name="valor" class="campo-cadastro form-control mr-sm-2" type="number"  min="0" step="0.01" placeholder="Ex. 50,00" >
							</div>

							<div class="form-col">
								<label for="qtd_estoque">Estoque</label>
								<input value="<?php echo $produto->qtd_estoque; ?>" name="qtd_estoque" class="campo-cadastro form-control mr-sm-2" type="number" min="0" placeholder="Ex. 49" >
							</div>
						
					
						</div>

							
							<input type="hidden" name="acao" value="editar">
						
					</div>
					<button class="btn btn-lg btn-block btn-success" type="submit">Editar</button>
				</form>
			</div>
		</div>
		

	<?php endif; ?>
		
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
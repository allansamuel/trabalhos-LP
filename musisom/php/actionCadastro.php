<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    
	<title>Sistema de Cadastro</title>
	
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require 'conexao.php';

		
		$conexao = conexao::getInstance();

        
        $mensagem = '';
		$id    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$descricao  = (isset($_POST['descricao'])) ? $_POST['descricao'] : '';
		$tipo  = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
		$valor  = (isset($_POST['valor'])) ? $_POST['valor'] : '';
		$marca  = (isset($_POST['marca'])) ? $_POST['marca'] : '';
		$qtd_estoque  = (isset($_POST['qtd_estoque'])) ? $_POST['qtd_estoque'] : '';
		$foto	= (isset($_POST['foto'])) ? $_POST['foto'] : '';


			if ($descricao == '' || strlen($descricao) < 3):
				$mensagem .= '<li>Favor preencher Descrição do Produto.</li>';
		    endif;
			if ($tipo == '' || strlen($tipo) < 3):
				$mensagem .= '<li>Favor preencher Tipo do Produto.</li>';
		    endif;
			if ($valor == '' || strlen($valor) < 3):
				$mensagem .= '<li>Favor preencher Valor do Produto.</li>';
		    endif;
			if ($marca == '' || strlen($marca) < 3):
				$mensagem .= '<li>Favor preencher Marca do Produto.</li>';
		    endif;
			if ($qtd_estoque == '' ):
				$mensagem .= '<li>Favor preencher Estoque do Produto.</li>';
		    endif;
			if ($foto == '' ):
				$mensagem .= '<li>Favor adicionar foto do Produto.</li>';
		    endif;


			if ($mensagem != ''){
                $mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
            }else{

                $nome_foto = 'padrao.jpg';
                if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):  

                    $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

                    
                    if (array_search($extensao, $extensoes_aceitas) === false):
                    echo "<h1>Extensão Inválida!</h1>";
                    exit;
                    endif;
    
                    
                    if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
                            
                        
                        if(!file_exists("../fotos")):  
                            mkdir("../fotos");  
                        endif;  
                
                        
                        $nome_foto = getdate() . '_' . $_FILES['foto']['name'];  
                            
                       
                        if (!move_uploaded_file($_FILES['foto']['tmp_name'], '../fotos/'.$nome_foto)):  
                            echo "Houve um erro ao gravar arquivo na pasta de destino!";  
                        endif;  
                    endif;  
                endif;

                $sql = 'INSERT INTO produtos 
                VALUES(null, :tipo, :marca, :descricao, :valor, :qtd_estoque, :foto)';

                $stm = $conexao->prepare($sql);
                $stm->bindValue(':tipo', $tipo);
                $stm->bindValue(':marca', $marca);
                $stm->bindValue(':descricao', $descricao);
                $stm->bindValue(':valor', $valor);
                $stm->bindValue(':qtd_estoque', $qtd_estoque);
                $stm->bindValue(':foto', $nome_foto);
                $retorno = $stm->execute();

                if ($retorno):
                    echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
                else:
                    echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
                endif;

                echo "<meta http-equiv=refresh content='3;URL=index.php'>";
            }


		?>
</body>
</html>
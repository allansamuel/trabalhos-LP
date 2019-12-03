<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        $acao  = (isset($_POST['acao'])) ? $_POST['acao']  : '';
        $id  = (isset($_POST['id'])) ? $_POST['id']  : '';
		$nome  =  (isset($_POST['nome'])) ? $_POST['nome']  : '';
		$email  = (isset($_POST['email'])) ? $_POST['email']  : '';
		$senha  = (isset($_POST['password'])) ? $_POST['password']  : '';
        $telefone  = (isset($_POST['telefone'])) ? $_POST['telefone']  : '';
        $carro  = (isset($_POST['carro'])) ? $_POST['carro']  : '';
        $marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
		$modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : '';
        $ano = (isset($_POST['ano']) and $carro === 'sim') ? $_POST['ano'] : '';

        
        if ($acao != 'excluir'):
            //verificando se existe usuario com o email, ja que existem 2 tabelas.
            $sql = 'SELECT * FROM toyota.login where usuario=:email';
            
            $stm = $conexao->prepare($sql);
            $stm->bindValue(':email', $email);
            $stm->execute();
            $confirmaUsuarioAdm = $stm->fetchAll(PDO::FETCH_OBJ);

            if(!empty($confirmaUsuarioAdm) and $acao != 'editar'){
                $mensagem .= "<li>Já existe um usuário com esse email.</li>";
            }else{
                $sql = 'SELECT * FROM toyota.cadastro where email=:email';
            
                $stm = $conexao->prepare($sql);
                $stm->bindValue(':email', $email);
                $stm->execute();
                $confirmaUsuarioCli = $stm->fetchAll(PDO::FETCH_OBJ);

                if(!empty($confirmaUsuarioCli) and $acao != 'editar'){
                    $mensagem .= "<li>Já existe um usuário com esse email.</li>";
                }else{
                    if ($nome == '' || strlen($nome) < 3):
                        $mensagem .= '<li>Favor preencher Nome</li>';
                    endif;
                    if ($telefone == '' || strlen($telefone) < 11):
                        $mensagem .= '<li>Favor preencher Telefone com DDD</li>';
                    endif;
                    if (($email == '' || strlen($email) < 3)):
                        $mensagem .= '<li>Email inválido</li>';
                    endif;
                    if ($senha == '' || strlen($senha) < 3):
                        $mensagem .= '<li>Senha inválida</li>';
                    endif;
                    if ($carro == 'sim' ){
                        if($marca == '' || strlen($marca) < 3){
                            $mensagem .= '<li>Favor preencher Marca do seu veículo</li>';
                        }
                        if($modelo == '' || strlen($modelo) < 3){
                            $mensagem .= '<li>Favor preencher Modelo do seu veículo</li>';
                        }
                        if($ano == '' || strlen($ano) < 4){
                            $mensagem .= '<li>Favor informar Ano do seu veículo</li>';
                        }
                    }else if($carro != 'sim' and $carro != 'nao'){
                        $mensagem .= '<li>Insira \'sim\' se possui carro e \'nao\' caso não possua no campo carro.</li>';
                    }
                }	
            }
            if ($mensagem != ''){
                $mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
            }
        


			
            if($mensagem == ''){
                if ($acao == 'incluir'):
    
                    $sql = 'INSERT INTO cadastro 
                    VALUES(null, :nome, :telefone, :email, :senha, :carro, :marca, :modelo, :ano)';
    
                    $stm = $conexao->prepare($sql);
                    $stm->bindValue(':nome', $nome);
                    $stm->bindValue(':telefone', $telefone);
                    $stm->bindValue(':email', $email);
                    $stm->bindValue(':senha', $senha);
                    $stm->bindValue(':carro', $carro);
                    $stm->bindValue(':marca', $marca);
                    $stm->bindValue(':modelo', $modelo);
                    $stm->bindValue(':ano', $ano);
                    $retorno = $stm->execute();
    
                    if ($retorno):
                        echo "<div class='alert alert-success' role='alert'>Inscrição concluída! Aguarde o resultado e boa sorte!</div> ";
                    else:
                        echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
                    endif;
    
                    echo "<meta http-equiv=refresh content='3;URL=index.php'>";
                endif;
            
        

                if ($acao == 'editar'):

                    
                    $sql = 'UPDATE toyota.cadastro SET 
                    nome_cli=:nome, 
                    telefone=:telefone, 
                    email=:email, 
                    senha= :senha, 
                    carro=:carro,
                    marca=:marca,
                    modelo=:modelo,
                    ano=:ano
                    WHERE cod_cli = :id';

                    $stm = $conexao->prepare($sql);
                    $stm->bindValue(':nome', $nome);
                    $stm->bindValue(':marca', $marca);
                    $stm->bindValue(':telefone', $telefone);
                    $stm->bindValue(':email', $email);
                    $stm->bindValue(':senha', $senha);
                    $stm->bindValue(':carro', $carro);
                    $stm->bindValue(':modelo', $modelo);
                    $stm->bindValue(':ano', $ano);
                    $stm->bindValue(':id', $id);
                    $retorno = $stm->execute();
                    
                    if ($retorno):
                        echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
                    else:
                        echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
                    endif;
        
                    echo "<meta http-equiv=refresh content='3;URL=./restrito/clientes.php'>";
                endif;
            }
        endif;
            if ($acao == 'excluir'):
    
                // Exclui o registro do banco de dados
                $sql = 'DELETE FROM toyota.cadastro WHERE cod_cli = :id';
                $stm = $conexao->prepare($sql);
                $stm->bindValue(':id', $id);
                $retorno = $stm->execute();
    
                if ($retorno):
                    echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
                else:
                    echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
                endif;
    
                echo "<meta http-equiv=refresh content='3;URL=./restrito/clientes.php'>";
            endif;
		?>
</body>
</html>
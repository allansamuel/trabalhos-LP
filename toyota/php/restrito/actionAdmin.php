<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    
	<title>Admin</title>
	
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
        require '../conexao.php';
        
        date_default_timezone_set('America/Sao_Paulo');
		
		$conexao = conexao::getInstance();

       
        $mensagem = '';
        $acao  = (isset($_POST['acao'])) ? $_POST['acao']  : '';
        $senhaConf = (isset($_POST['passwordConfAdmin'])) ? $_POST['passwordConfAdmin'] : '';
        $email  = (isset($_POST['emailAdmin'])) ? $_POST['emailAdmin']  : '';
        $emailAux  = (isset($_POST['emailAux'])) ? $_POST['emailAux']  : '';
        $senha = (isset($_POST['passwordAdmin'])) ? $_POST['passwordAdmin'] : '';
        $dataCad = (isset($_POST['datacad'])) ? date("Y-d-m", strtotime($_POST['datacad'])) : date("Y-m-d"); ;


        if ($acao != 'excluir'):
            //verificando se existe usuario com o email, ja que existem 2 tabelas.
            $sql = 'SELECT * FROM toyota.cadastro where email=:email';
            $stm = $conexao->prepare($sql);
            $stm->bindValue(':email', $email);
            $stm->execute();
            $confirmaUsuarioCli = $stm->fetchAll(PDO::FETCH_OBJ);

            if(!empty($confirmaUsuarioCli) and $acao != 'editar'){
                $mensagem .= "<li>Já existe um usuário com esse email.</li>";
            }else{
                $sql = 'SELECT * FROM toyota.login where usuario=:email';
            
                $stm = $conexao->prepare($sql);
                $stm->bindValue(':email', $email);
                $stm->execute();
                $confirmaUsuarioAdm = $stm->fetchAll(PDO::FETCH_OBJ);
                if(!empty($confirmaUsuarioAdm) and $acao != 'editar'){
                    $mensagem .= "<li>Já existe um usuário com esse email.</li>";
                }else{

                    if ($email == '' || strlen($email) < 3):
                        $mensagem .= '<li>Email inválido</li>';
                    endif;
                    if ($senha == '' || strlen($senha) < 3):
                        $mensagem .= '<li>Senha inválida</li>';
                    endif;
                    if ($acao == 'incluir' and ($senha !== $senhaConf)):
                        $mensagem .= '<li>As senhas não condizem</li>';
                    endif;
                    
                }
            }
            if ($mensagem != ''){
                $mensagem = '<ul>' . $mensagem . '</ul>';
                echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
            }
        endif;


			
            if($mensagem == ''){
                if ($acao == 'incluir'):
    
                    $sql = 'INSERT INTO login 
                    VALUES(:email, :senha, :data_cad)';
    
                    $stm = $conexao->prepare($sql);
                    $stm->bindValue(':email', $email);
                    $stm->bindValue(':senha', $senha);
                    $stm->bindValue(':data_cad', $dataCad);
                    $retorno = $stm->execute();
    
                    if ($retorno):
                        echo "<div class='alert alert-success' role='alert'>Administrador cadastrado com sucesso.</div> ";
                    else:
                        echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
                    endif;
    
                    echo "<meta http-equiv=refresh content='3;URL=./admin.php'>";
                endif;
            
        

                if ($acao == 'editar'):

                    
                    
                    $sql = 'UPDATE toyota.login SET usuario=:usuario, senha=:senha, data_cad=:datacad ';
                    $sql .= 'WHERE usuario = :aux';
        
                    $stm = $conexao->prepare($sql);
                    $stm->bindValue(':usuario', $email);
                    $stm->bindValue(':senha', $senha);
                    $stm->bindValue(':datacad', $dataCad);
                    $stm->bindValue(':aux', $emailAux);
                    $retorno = $stm->execute();
        
                    if ($retorno):
                        echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
                    else:
                        echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
                    endif;
        
                    echo "<meta http-equiv=refresh content='3;URL=admin.php'>";
                endif;
            }

            if ($acao == 'excluir'):

                $sql = 'DELETE FROM toyota.login WHERE usuario = :usuario';
                $stm = $conexao->prepare($sql);
                $stm->bindValue(':usuario', $email);
                $retorno = $stm->execute();
    
                if ($retorno):
                    echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
                else:
                    echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
                endif;
    
                echo "<meta http-equiv=refresh content='3;URL=admin.php'>";
            endif;
		?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        body{
            font-family: Lato;
        }
        .fa { color: #fff; }
    </style>
    <title>Ofertas Toyota</title>
</head>
<body>
<?php
require './conexao.php';
$conexao = conexao::getInstance();
$email = (isset($_POST['email'])) ? $_POST['email']  : '';
$senha = (isset($_POST['password'])) ? $_POST['password']  : '';
$admin = false;
$sql = 'SELECT * FROM toyota.login where usuario=:email and senha=:senha';
        
$stm = $conexao->prepare($sql);
$stm->bindValue(':email', $email);
$stm->bindValue(':senha', $senha);
$stm->execute();
$usuario = $stm->fetchAll(PDO::FETCH_OBJ);
if (!empty($usuario)){
    $admin = true;
    $user = $usuario;
    session_start(); 
    $_SESSION['admin'] = $admin;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['user'] = $user;
    header("Location: ./index.php");
}else{
    $sql = 'SELECT * FROM toyota.cadastro where email=:email and senha=:senha';
        
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':senha', $senha);
    $stm->execute();
    $usuario = $stm->fetchAll(PDO::FETCH_OBJ);
    if(!empty($usuario)){
        $admin = false;
        $user = $usuario;
        session_start(); 
        $_SESSION['admin'] = $admin;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['user'] = $user;
        header("Location: ./index.php"); 
    }else{
        echo "<div class='alert alert-danger' role='alert'>Email ou Senha inválidos</div> ";
    }
}
?>
</body>
</html>                
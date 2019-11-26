
<?php
    session_start(); 
    $admin  = $_SESSION['admin'];
    $senha  =  $_SESSION['senha'];
    $email  = $_SESSION['email'];
    $user = $_SESSION['user'];
    if(!empty($user)){
        session_start(); 
        $_SESSION['admin'] = false;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['user'] = null;
        header("Location: ./index.php");   
    }

    ?>

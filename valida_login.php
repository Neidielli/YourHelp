<?php

    session_start();

    // var para verificar se a autenticação foi realizada
    $usuario_autenticado = false;

    // Lista de usuários válidos
    $usuarios_app = array(
        array('email' => 'adm@teste.com', 'senha' => '123'),
        array('email' => 'user@teste.com', 'senha' => 'abc'),
    );
    // percorrer o array de usuarios para verificar se email passado é válido
    foreach($usuarios_app as $user) { // o uso dos as nos dá acesso a cada um dos array de forma individual
        
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
        }
        
    }

    if($usuario_autenticado) {
        echo 'Usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro'); // header espera um destino.
    }
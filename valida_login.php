<?php

    session_start();

    // var para verificar se a autenticação foi realizada
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfils = array(1 => 'Admnistrativo', 2 => 'Usuário');

    // Lista de usuários válidos
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com', 'senha' => '123', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com', 'senha' => '123', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'joao@teste.com', 'senha' => '123', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com', 'senha' => '123', 'perfil_id' => 2),
    );
    // percorrer o array de usuarios para verificar se email passado é válido
    foreach($usuarios_app as $user) { // o uso dos as nos dá acesso a cada um dos array de forma individual
        
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
        
    }

    if($usuario_autenticado) {
        echo 'Usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php'); // header espera um destino, direciona para a home
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro'); // header espera um destino, direciona para o login novamente
    }
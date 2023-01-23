<?php

    session_start();

    // trabalhando na montagem do texto
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

    // trabalhando na montagem do arquivo
    $arquivo = fopen('../../YourHelp/arquivo.txt', 'a'); // abre o arquivo

    fwrite($arquivo , $texto); // escreve no arquivo

    fclose($arquivo); // fecha o arquivo

    header('Location: abrir_chamado.php');
?>
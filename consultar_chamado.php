<?php require_once "validador_acesso.php" ?> <!-- require_once para que se haja qualquer problema na recuperação do script, ocorra um fatal error -->

<?php

  //array que vai conter os chamados
  $chamados = array();

  $arquivo = fopen('../../YourHelp/arquivo.txt', 'r');//abrir o arquivo.txt

  while(!feof($arquivo)) { // testa pelo fim de um arquivo

    $registro = fgets($arquivo); // ler o arquivo
    $chamados[] = $registro;
  } // enquanto houver registros a serem recuperados

  $registro = fclose($arquivo); // fechar o arquivo

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Your Help</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Your Help
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php foreach($chamados as $chamado) { ?>

                <?php
                    $chamado_dados = explode('#', $chamado);

                    // identificar se o perfil é administrativo ou usuario
                    if($_SESSION['perfil_id'] == 2) {
                      // filtro para exibir somente chamados criados pelo próprio usuario
                      if($_SESSION['id'] != $chamado_dados[0]) { // se a condição for satisfeita, significa que o chamado n foi aberto pelo usuario autenticado
                        continue;
                      }
                    }

                    if(count($chamado_dados) < 3) { // se estiver faltando qualquer informação, ele irá pular o array
                      continue;
                    }
                ?>

                <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                  <p class="card-text"><?=$chamado_dados[3]?></p>
                </div>
              </div>
              <?php } ?>
              
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php

  session_start();

  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') { // se não estiver autenticado
    header('Location: index.php?login=erro2'); // header espera um destino.
  }

?>

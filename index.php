<html>
  <head>
    <meta charset="utf-8" />
    <title>Your Help</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: calc(100vh - 90px);
      }
      .card-login {
        padding: 30px 0 0 0;
        width: 450px;
        /* margin: 0 auto; */
      }
      .card-header {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .textoInformativo {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 5px;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Your Help
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>

            <div class="card-body">
              <form action="valida_login.php" method="post"><!-- ao clicar no submmit, envia as informações do forms -->
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?> 
                    <div class="text-danger textoInformativo">
                      Usuário ou senha inválido(s)
                    </div>
                <?php } ?> 

                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?> 
                    <div class="text-danger textoInformativo">
                      Realize o login para continuar navegando
                    </div>
                <?php } ?> 
                

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>

          </div>
        </div>
    </div>
  </body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $titulo ?></title>


    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/loginPage.css') ?>" rel="stylesheet">
  </head>

  <body>
    <div id="login-page">
        <form class="form-login" action="<?= base_url('auth/register') ?>" method="post">
            <div id="logo-login">
              <img src="<?=base_url()?>/assets/img/brasao-ufal.png" alt="" style="width:40px">
            </div>
            <div class="input-text-form">
                <input type="text" placeholder="matricula" name="matricula">
            </div>

            <div class="input-text-form">
                <input type="text" placeholder="nome" name="nome">
            </div>

            <div class="input-text-form">
                <input type="text" placeholder="email" name="email" id="email">
            </div>

            <div class="input-text-form">
                <input type="password" placeholder="senha" name="senha">
            </div>

            <div class="btn-form">
                <button type="submit">Registrar</button>
            </div>
        </form>
    </div>
  </body>
</html>
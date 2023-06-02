<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $titulo ?></title>


    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/login.css') ?>" rel="stylesheet">
  </head>

  <body>
    <div id="login-page">
        <form class="form-login" action="<?= base_url('auth/logar') ?>" method="post">
            <div id="logo-login">
                <img src="<?= base_url('assets/img/login/logo-alagoas.png') ?>" alt="" width="20%">
            </div>
            <div class="input-text-form">
                <img src="<?= base_url('assets/img/login/person.svg') ?>" alt="">
                <input type="text" placeholder="email" name="email" id="email">
            </div>

            <div class="input-text-form">
                <img src="<?= base_url('assets/img/login/key.svg') ?>" alt="">
                <input type="password" placeholder="senha" name="password">
            </div>

            <div class="btn-form">
                <a href="">Esqueceu a senha?</a>
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>

    <script src="<?= base_url('assets/js/') ?>"></script>

  </body>
</html>
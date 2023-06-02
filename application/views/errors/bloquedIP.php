<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/forbidden.css') ?>">
    <title>Bloqued IP</title>
</head>
<body>
    <div class="text">
        <div class="text-title">
            IP bloqueado
        </div>
        
        <div class="info">
            Tente novamente após <?= $tempo ?> segundos.
        </div>

        <div class="obs">
            (MOTIVO: você errou a senha 3 vezes)
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
    <link rel="icon" href="{{asset("assets/image/C.png")}}" type="image/x-icon">

    <title>MANYMINDS - Registrar</title>
</head>
<body>
    <form action="{{route("create.user")}}" method="POST">
        @csrf
        @method('post')
        <div class="login-form">
            <div class="title-text">
                <p>manyminds</p>
                <p>formulário de registro</p>
            </div>
            <div class="inputs">
                <div class="input-field">
                    <input type="text" name="name" id="name" placeholder="Nome" required>
                </div>
                <div class="input-field">
                    <input type="text" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" placeholder="Senha" required>
                </div>
                <div class="input-field">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar senha" required>
                </div>
            </div>
            <div class="actions">
                <button type="submit">
                    Registrar
                </button>
                <a href="{{route("login")}}">
                    Voltar
                </a>
            </div>
        </div>
    </form>
</body>
</html>

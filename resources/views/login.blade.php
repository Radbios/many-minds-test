<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
    <link rel="icon" href="{{asset("assets/image/C.png")}}" type="image/x-icon">

    <title>MANYMINDS - Login</title>
</head>
<body>
    <form action="{{route("auth")}}" method="POST">
        @csrf
        @method("POST")
        <div class="login-form">
            <div class="title-text">
                <p>manyminds</p>
                <p>formulário de login</p>
            </div>
            <div class="inputs">
                <div class="input-field">
                    <input type="text" name="email" id="email" placeholder="Email">
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" placeholder="Senha">
                </div>
            </div>
            <div class="actions">
                <button type="submit">
                    Entrar
                </button>
                <a href="{{route("register")}}">
                    Registrar
                </a>
            </div>
        </div>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="div-form-register">
        <form class="form-register" action="verifyLogin" method="POST">
            <p>Iniciar sesión</p>
            <input type="text" name="user" placeholder="usuario" required>
            <input type="password" name="password" placeholder="contraseña" minlength="4" required>
            <button type="submit">Iniciar</button>
            <p class="register-message">Aun no tenes cuenta, <a href="register">registrate</a>.</p>
            <p class="register-alert">{if !$alert == ''}{$alert}{else}{/if}</p>
        </form>
    </div>
</body>
</html>
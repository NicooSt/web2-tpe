<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="div-form-register">
        <form class="form-register" action="login" method="POST">
            <p>Iniciar sesión</p>
            <input type="text" name="user" placeholder="usuario" required>
            <input type="password" name="password" placeholder="contraseña" required>
            <button type="submit">Iniciar</button>
            <p>Aun no tenes cuenta, <a href="register">registrate</a> o ingresa como <a href="cars">invitado</a>.</p>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>{if !$mark == ''}Lista de {$mark}{else}{$tab}{/if}</title>
</head>

<body>
    <nav>
        <div class="nav-div-logo">
            <img src="img/logo-auto.png" alt="logo">
        </div>
        <div class="nav-div-btn">
            <a href="cars">Lista de autos</a>
            <a href="marks">Lista de marcas</a>
        </div>
        <div class="nav-div-logout">
            <p id="usuario">{$userLogged}</p>
            <a href="logout">Cerrar sesion</a>
            {if $rol == 'admin'}<a href="admin">Admin</a>{else}{/if}
        </div>
    </nav>
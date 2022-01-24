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
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>{if $mark != ''}Lista de {$mark}{else}{$tab}{/if}</title>
</head>
<body>
    <nav class="nav">
        <div class="nav__elem1">
            <img class="nav__logo-img" src="img/logo/logo-auto.png" alt="logo">
        </div>
        <div class="nav__elem2">
            <a class="nav__btnLists-btnCars" href="cars">Lista de autos</a>
            <a class="nav__btnLists-btnMarks" href="marks">Lista de marcas</a>
        </div>
        <div class="nav__elem3">
            <p class="nav__userName" id="usuario">{$userLogged}</p>
            <a class="nav__logOut" href="logout">Cerrar sesión</a>
            {if $rol == 'admin'}<a class="nav__adminBtn" href="admin">Admin</a>{else}{/if}
        </div>
    </nav>
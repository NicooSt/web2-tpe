{include file='templates/header.tpl'}
<h1 class="desc-title">{$car->marca} {$car->modelo}</h2>
<div class="desc-list">
    <ul>
        <li>Modelo: <span>{$car->modelo}</span></li>
        <li>Marca: <span>{$car->marca}</span></li>
        <li>Lugar de origen: <span>{$car->origen}</span></li>
        <li>Año de origen: <span>{$car->anio}</span></li>
    </ul>
</div>
<div class="div-link">
    <a href="home">Volver</a>
</div>
{include file='templates/footer.tpl'}
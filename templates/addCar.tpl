{include file="templates/header.tpl"}
<section class="cont-admin">
    <p id="admin-title">Agregar nuevo auto</p>
    <form action="addCar" method="POST">
        <div>
            <input placeholder="Modelo" type="text" name="modelo" required>
            <select name="marca">
                {foreach from=$marks item=$mark}
                    <option>{$mark->marca}</option>
                {/foreach}
            </select>
            <input placeholder="Origen" type="text" name="origen" required>
            <input placeholder="Año" type="number" name="anio" min="1800" max="9999" required>
        </div>
        <div>
            <button type="submit">Agregar</button>
            <a href="cars">Cancelar</a>
        </div>
    </form>
</section>
{include file="templates/footer.tpl"}

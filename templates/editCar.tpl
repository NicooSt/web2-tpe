{include file="templates/header.tpl"}
<section class="cont-admin">
    <p class="cont-admin__title">Editar {$car->marca} {$car->modelo}</p>
    <form action="editCar/{$id}" method="POST">
        {* <input type="text" placeholder="{$car->marca} {$car->modelo}" readonly> *}
        <div>
            <input placeholder="Modelo nuevo" type="text" name="modeloNuevo" required>
            <select name="marca">
                {foreach from=$marks item=$mark}
                    <option>{$mark->marca}</option>
                {/foreach}
            </select>
            <input placeholder="Origen" type="text" name="origen" required>
            <input placeholder="Año" type="number" name="anio" min="1800" max="9999" required>
        </div>
        <div>
            <div class="div-admin-btn">
                <button type="submit">Confirmar</button>
                <a href="cars">Cancelar</a>
            </div>
        </div>
    </form>
</section>
{include file="templates/footer.tpl"}
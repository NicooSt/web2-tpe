<section class="cont-admin">
    <p id="admin-title">Agregar nuevo auto</p>
    <form action="addCar" method="POST">
        {* <h4>Agregar nuevo auto</h4> *}
        <input placeholder="Modelo" type="text" name="modelo" required>
        <select name="marca">
            {foreach from=$marksFilter item=$mark}
                <option>{$mark->marca}</option>
            {/foreach}
        </select>
        <input placeholder="Origen" type="text" name="origen" required>
        <input placeholder="Año" type="number" name="anio" min="1800" max="9999" required>
        <button type="submit">Agregar</button>
        {* <p>{if !$message == ''}{$message}{else}{/if}</p> *}
    </form>
</section>
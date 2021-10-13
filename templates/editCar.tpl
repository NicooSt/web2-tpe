<section class="cont-admin">
    <p id="admin-title">Editar auto</p>
    <form action="editCar" method="POST">
        {* <h4>Agregar nuevo auto</h4> *}
        <select name="modelo">
            {foreach from=$cars item=$car}
                <option>{$car->modelo}</option>
            {/foreach}
        </select>
        <input placeholder="Modelo nuevo" type="text" name="modeloNuevo" required>
        <select name="marca">
            {foreach from=$marksFilter item=$mark}
                <option>{$mark->marca}</option>
            {/foreach}
        </select>
        <input placeholder="Origen" type="text" name="origen" required>
        <input placeholder="Año" type="number" name="anio" min="1800" max="9999" required>
        <button type="submit">Confirmar</button>
        {* <p>{if !$message == ''}{$message}{else}{/if}</p> *}
    </form>
</section>
<section class="cont-admin">
    <p id="admin-title">Editar marca</p>
    <form action="editMark" method="POST">
        {* <h4>Agregar nuevo auto</h4> *}
        <select name="marca">
            {foreach from=$marks item=$mark}
                <option>{$mark->marca}</option>
            {/foreach}
        </select>
        <input placeholder="Marca nueva" type="text" name="marcaNueva" required>
        <input placeholder="Origen" type="text" name="origen" required>
        <input placeholder="Año" type="number" name="anio" min="1800" max="9999" required>
        <button type="submit">Confirmar</button>
        {* <p>{if !$message == ''}{$message}{else}{/if}</p> *}
    </form>
</section>
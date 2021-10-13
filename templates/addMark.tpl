<section class="cont-admin">
    <p id="admin-title">Agregar nueva marca</p>
    <form action="addMark" method="POST">
        {* <h4>Agregar nuevo auto</h4> *}
        <input placeholder="Marca" type="text" name="marca" required>
        <input placeholder="Origen" type="text" name="origen" required>
        <input placeholder="Año" type="number" name="anio" min="1800" max="9999" required>
        <button type="submit">Agregar</button>
        {* <p>{if !$message == ''}{$message}{else}{/if}</p> *}
    </form>
</section>
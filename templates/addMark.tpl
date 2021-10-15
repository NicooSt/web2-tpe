{include file="templates/header.tpl"}
<section class="cont-admin">
    <p id="admin-title">Agregar nueva marca</p>
    <form action="addMark" method="POST">
        <div>
            <input placeholder="Marca" type="text" name="marcaNueva" required>
            <input placeholder="Origen" type="text" name="origen" required>
            <input placeholder="Año" type="number" name="fundacion" min="1800" max="9999" required>
        </div>
        <div>
            <button type="submit">Agregar</button>
            <a href="marks">Cancelar</a>
        </div>        
    </form>
</section>
{include file="templates/footer.tpl"}
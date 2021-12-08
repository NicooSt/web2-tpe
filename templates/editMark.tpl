{include file="templates/header.tpl"}
<section class="cont-admin">
    <p class="cont-admin__title">Editar {$markTitle->marca}</p>
    <form action="editMark/{$id}" method="POST">
        <div>
            <input placeholder="{$markTitle->marca}" type="text" readonly>
            <input placeholder="Marca nueva" type="text" name="marcaNueva" required>
            <input placeholder="Origen" type="text" name="origen" required>
            <input placeholder="Año" type="number" name="fundacion" min="1800" max="9999" required>
        </div>
        <div>
            <div class="div-admin-btn">
                <button type="submit">Confirmar</button>
                <a href="marks">Cancelar</a>
            </div>
        </div>
    </form>
</section>
{include file="templates/footer.tpl"}

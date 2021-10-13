{include file="templates/header.tpl"}
<section>
    <h1 class="list-title">Lista de marcas</h1>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Origen</th>
                <th>Año de Fundación</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$marks item=$mark}
                <tr>
                    <td>{$mark->marca}</td>
                    <td>{$mark->origen}</td>
                    <td>{$mark->fundacion}</td>
                    <td><a href="deleteMark/{$mark->id_marca}">Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
{include file="templates/addMark.tpl"}
{include file="templates/editMark.tpl"}
{include file="templates/footer.tpl"}
{include file="templates/header.tpl"}
<article>
    <h1 class="list-title">Lista de marcas</h1>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Origen</th>
                <th>Año de Fundación</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$marks item=$mark}
                <tr>
                    <td>{$mark->nombre}</td>
                    <td>{$mark->origen}</td>
                    <td>{$mark->fundacion}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</article>
{include file="templates/footer.tpl"}
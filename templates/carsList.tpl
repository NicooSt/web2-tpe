{include file='templates/header.tpl'}
<article>
    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Origen</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$cars item=$car}
                <tr>
                    <td><a href="viewCar/{$car->id_auto}">{$car->modelo}</a></td>
                    <td>{$car->marca}</td>
                    <td>{$car->origen}</td>
                    <td>{$car->anio}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</article>
{include file='templates/footer.tpl'}

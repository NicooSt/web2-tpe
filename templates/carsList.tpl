{include file='templates/header.tpl'}
<article>
    <h1 class="list-title">Lista de {if !$mark == ''}{$mark}{else}{$title}{/if}</h1>
    <form id="form-filter" method="POST" action="filter">
        <label>Filtrar por categoría: 
            <select name="filter">
                <option>Todos</option>
                <option>Fiat</option>
                <option>Ford</option>
                <option>Chevrolet</option>
                <option>Mercedes-Benz</option>
                <option>Nissan</option>
                <option>Peugeot</option>
                <option>Citroën</option>
                <option>Renault</option>
                <option>Toyota</option>
                <option>Volkswagen</option>
            </select>
        </label>
        <button type="submit">Filtrar</button> 
    </form>
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

{include file='templates/header.tpl'}
<section>
    <h1 class="list-title">Lista de {if !$mark == ''}{$mark}{else}{$title}{/if}</h1>
    <form id="form-filter" action="filter" method="POST">
        <label>Filtrar por marca:
            <select name="filter">
                <option>Todos</option>
                {foreach from=$marksFilter item=$mark}
                    <option>{$mark->marca}</option>
                {/foreach}
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
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$cars item=$car}
                <tr>
                    <td><a href="viewCar/{$car->id_auto}">{$car->modelo}</a></td>
                    <td>{$car->marca}</td>
                    <td>{$car->origen}</td>
                    <td>{$car->anio}</td>
                    <td><a href="deleteCar/{$car->id_auto}">Eliminar</a></td>                   
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
{include file='templates/addCar.tpl'}
{include file='templates/editCar.tpl'}
{include file='templates/footer.tpl'}

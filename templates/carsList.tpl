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
        <button type="submit">FILTRAR</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Origen</th>
                <th>Año</th>
                {if $rol == 'admin'}<th>Eliminar / Editar</th>{/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$cars item=$car}
                <tr>
                    <td><a href="viewCar/{$car->id_auto}">{$car->modelo}</a></td>
                    <td>{$car->marca}</td>
                    <td>{$car->origen}</td>
                    <td>{$car->anio}</td>
                    {if $rol == 'admin'}<td><a href="deleteCar/{$car->id_auto}">Eliminar</a> <a href="showEditCar/{$car->id_auto}">Editar</a></td>{/if}                                 
                </tr>
            {/foreach}
        </tbody>
    </table>
    {if $rol == 'admin'}<a class="btn-new" href="showAddCar">AGREGAR NUEVO AUTO</a>{/if}
</section>
{include file='templates/footer.tpl'}
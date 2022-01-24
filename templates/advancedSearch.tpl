{include file="templates/header.tpl"}
<section class="cont-admin">
    <p class="cont-admin__title">Busqueda Avanzada</p>
    <form action="advancedSearch" method="POST">
        <div>
            <input type="text" name="modelo" placeholder="Modelo">
            <input type="text" name="marca" placeholder="Marca">
            <input type="text" name="origen" placeholder="Origen">
            <input type="number" name="anio" min="1800" max="9999" placeholder="Año">
        </div>
        <div>
            <div class="div-admin-btn">
                <button type="submit">Buscar</button>
                <a href="cars">Cancelar</a>
            </div>
        </div>
    </form>
    {if $message != ""}<p class="admin-message">{$message}</p>{/if}
</section>
<section class="cont-table">
    {if $cars != ""}
        <table class="table">
            <thead class="table__thead">
                <tr class="table__thead-row">
                    <th class="table__thead-cell">Modelo</th>
                    <th class="table__thead-cell">Marca</th>
                    <th class="table__thead-cell">Origen</th>
                    <th class="table__thead-cell">Año</th>
                    {if $rol == 'admin'}<th class="table__thead-cell">Eliminar / Editar</th>{/if}
                    {if $rol == 'admin'}<th class="table__thead-cell">Imágen</th>{/if}
                </tr>
            </thead>
            <tbody class="table__tbody">
                {foreach from=$cars item=$car}
                    <tr class="table__tbody-row">
                        <td class="table__tbody-cell table__tbody-cell--cont-link">
                            <a href="viewCar/{$car->id_auto}" class="table__tbody-link table__tbody-link--black">{$car->modelo}</a>
                        </td>
                        <td class="table__tbody-cell">{$car->marca}</td>
                        <td class="table__tbody-cell">{$car->origen}</td>
                        <td class="table__tbody-cell">{$car->anio}</td>
                        {if $rol == 'admin'}
                            <td class="table__tbody-cell table__tbody-cell--cont-link table__tbody-cell--cont-delete-edit">
                                <a href="deleteCar/{$car->id_auto}" class="table__tbody-link table__tbody-link--black table__tbody-link--size table__tbody-link--border-right">Eliminar</a>
                                <a href="showEditCar/{$car->id_auto}" class="table__tbody-link table__tbody-link--black table__tbody-link--size table__tbody-link--border-left">Editar</a>
                            </td>
                        {/if}                                
                        {if $rol == 'admin'}
                            <td class="table__tbody-cell table__tbody-cell--cont-link">
                                <a href="showAddCarImages/{$car->id_auto}" class="table__tbody-link table__tbody-link--black">Agregar o Eliminar</a>
                            </td>
                        {/if}                                
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {/if}
</section>
{include file="templates/footer.tpl"}
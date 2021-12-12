{include file='templates/header.tpl'}
<section class="cont-table">
    <h1 class="cont-table__title">Lista de {if $mark != ''}{$mark}{else}{$title}{/if}</h1>
    <form action="filter/1" method="POST" class="form-filter">
        <label class="form-filter__text">Filtrar por marca:
            <select name="filter" class="form-filter__select">
                <option>Todos</option>
                {foreach from=$marksFilter item=$mark}
                    <option>{$mark->marca}</option>
                {/foreach}
            </select>
        </label>
        <button type="submit" class="form-filter__btn-submit">Filtrar</button>
    </form>
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
        {* Si no hay autos no se ejecuta la iteracion *}
        {if $cars[0] != ""}
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
        {/if}
        </tbody>
    </table>
    {* Si no hay autos cargados no se muestra la paginacion *}
    {if $mark != "autos" and $cars[0] != ""}
        <div class="pagination">
            <a {if $actualPage > 1}href="{if $tab == "Lista de autos"}cars/1{else}filter/1/{$mark}{/if}"{/if} class="pagination__link"><<</a>
            <a {if $actualPage > 1}href="{if $tab == "Lista de autos"}cars/{if $actualPage == 1}1{else}{$actualPage - 1}{/if}{else}filter/{if $actualPage == 1}1{else}{$actualPage - 1}{/if}/{$mark}{/if}"{/if} class="pagination__link">Anterior</a>
            {for $page=1 to $totalPages}
                <a href="{if $tab == "Lista de autos"}cars/{$page}{else}filter/{$page}/{$mark}{/if}" class="pagination__link {if $page == $actualPage}pagination__link--active{/if}">{$page}</a>
            {/for}
            <a {if $actualPage < $totalPages}href="{if $tab == "Lista de autos"}cars/{if $actualPage < $totalPages}{$actualPage + 1}{else}{$totalPages}{/if}{else}filter/{if $actualPage < $totalPages}{$actualPage + 1}{else}{$totalPages}{/if}/{$mark}{/if}"{/if} class="pagination__link">Siguiente</a>
            <a {if $actualPage < $totalPages}href="{if $tab == "Lista de autos"}cars/{$totalPages}{else}filter/{$totalPages}/{$mark}{/if}"{/if} class="pagination__link">>></a>
        </div>
    {/if}
    {if $rol == 'admin'}<a class="cont-table__btn-add" href="showAddCar">AGREGAR NUEVO AUTO</a>{/if}
</section>
{include file='templates/footer.tpl'}
{include file="templates/header.tpl"}
<section class="cont-table">
    <h1 class="cont-table__title">Lista de marcas</h1>
    <table class="table">
        <thead class="table__thead">
            <tr class="table__thead-row">
                <th class="table__thead-cell">Marca</th>
                <th class="table__thead-cell">Origen</th>
                <th class="table__thead-cell">Año de Fundación</th>
                {if $rol == 'admin'}<th class="table__thead-cell">Eliminar / Editar</th>{/if}
            </tr>
        </thead>
        <tbody class="table__tbody">
            {foreach from=$marks item=$mark}
                <tr class="table__tbody-row">
                    <td class="table__tbody-cell">{$mark->marca}</td>
                    <td class="table__tbody-cell">{$mark->origen_marca}</td>
                    <td class="table__tbody-cell">{$mark->fundacion}</td>                
                    {if $rol == 'admin'}
                        <td class="table__tbody-cell table__tbody-cell--cont-link table__tbody-cell--cont-delete-edit">
                            <a href="deleteMark/{$mark->id_marca}" class="table__tbody-link table__tbody-link--black table__tbody-link--size table__tbody-link--border-right">Eliminar</a>
                            <a href="showEditMark/{$mark->id_marca}" class="table__tbody-link table__tbody-link--black table__tbody-link--size table__tbody-link--border-left">Editar</a>
                        </td>
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
    {if $message != ""}<p class="deleteMark-alert">{$message}</p>{/if}
    {if $rol == 'admin'}<a class="cont-table__btn-add" href="showAddMark">AGREGAR NUEVA MARCA</a>{/if}
</section>
{include file="templates/footer.tpl"}
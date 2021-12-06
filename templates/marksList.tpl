{include file="templates/header.tpl"}
<section>
    <h1 class="list-title">Lista de marcas</h1>
    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Origen</th>
                <th>Año de Fundación</th>
                {if $rol == 'admin'}<th>Eliminar / Editar</th>{/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$marks item=$mark}
                <tr>
                    <td>{$mark->marca}</td>
                    <td>{$mark->origen}</td>
                    <td>{$mark->fundacion}</td>                
                    {if $rol == 'admin'}<td><a href="deleteMark/{$mark->id_marca}">Eliminar</a> <a href="showEditMark/{$mark->id_marca}">Editar</a></td>{/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
    {if $message != ""}<p class="deleteMark-alert">{$message}</p>{/if}
    {if $rol == 'admin'}<a class="btn-new" href="showAddMark">AGREGAR NUEVA MARCA</a>{/if}
</section>
{include file="templates/footer.tpl"}
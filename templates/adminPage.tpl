{include file="templates/header.tpl"}
<section class="cont-admin">
    <p class="cont-admin__title">Administración</p>
    <form action="assignRol" method="POST">
        <div>  
            <p class="p-admin">Usuario:
                <select name="user">
                    <option>Seleccione</option>
                    {foreach from=$users item=$user}
                        {if $user->user != $userLogged}
                            <option>{$user->user}</option>                       
                        {/if}
                    {/foreach}
                </select>
            </p>      
            <p class="p-admin">Rol de Usuario:
                <select name="userRol">
                    <option>Seleccione</option>
                    <option>Administrador</option>
                    <option>Usuario</option>
                </select>
            </p>  
        </div>
        <div>
            <div class="div-admin-btn">
                <button type="submit">Confirmar</button>
            </div>
            <p class="admin-message">{if $messageRol != ''}{$messageRol}{else}{/if}</p>
        </div>
    </form>
    <form action="deleteUser" method="POST">
        <div>  
            <p class="p-admin">Borrar usuario:
                <select name="user">
                    <option>Seleccione</option>
                    {foreach from=$users item=$user}
                        {if $user->user != $userLogged}
                            <option>{$user->user}</option>                       
                        {/if}
                    {/foreach}
                </select>
            </p>  
        </div>
        <div>
            <div class="div-admin-btn">
                <button type="submit">Borrar</button>
            </div>
            <p class="admin-message">{if $messageDelete != ''}{$messageDelete}{else}{/if}</p>
        </div>
    </form>
</section>
{include file="templates/footer.tpl"}
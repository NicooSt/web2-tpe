{include file="templates/header.tpl"}
<article class="cont-admin">
    <section>
        <div>
            <h1>Modificar lista de autos</h1>
        </div>
        <div>
            <form action="addCar" method="POST">
                <h4>Agregar nuevo auto</h4>
                <input placeholder="Modelo" type="text" name="modelo" required>
                <select name="marca">
                    {foreach from=$marks item=$mark}
                        <option>{$mark->marca}</option>
                    {/foreach}
                </select>
                <input placeholder="Origen" type="text" name="origen" required>
                <input placeholder="Año" type="number" name="anio" min="1800" max="9999" required>
                <button type="submit">Agregar</button>
                <p>{if !$message == ''}{$message}{else}{/if}</p>
            </form>
            <form action="editCar" method="POST">
                <h4>Editar auto</h4>
                <select name="modelo">
                    {foreach from=$cars item=$car}
                        <option>{$car->modelo}</option>
                    {/foreach}
                </select>
                <input placeholder="Modelo nuevo" type="text" name="modeloNuevo" required>
                <select name="marca">
                    {foreach from=$marks item=$mark}
                        <option>{$mark->marca}</option>
                    {/foreach}
                </select>
                <input placeholder="Origen" type="text" name="origen" required>
                <input placeholder="Año" type="number" name="anio" required>
                <button type="submit">Confirmar</button>
                {* <p>Prueba</p> *}
            </form>
            <form action="deleteCar" method="POST">
                <h4>Eliminar auto</h4>
                <select name="modelo">
                    {foreach from=$cars item=$car}
                        <option>{$car->modelo}</option>
                    {/foreach}
                </select>
                <button type="submit">Confirmar</button>
                <p>Prueba</p>
            </form>
        </div>
    </section>
    <section>
        <div>
            <h1>Modificar lista de marcas</h1>
        </div>
        <div>
            <form action="addMark" method="POST">
                <h4>Agregar nueva marca</h4>
                <input placeholder="Nombre" type="text">
                <input placeholder="Origen" type="text">
                <input placeholder="Año de fundación" type="number">
                <button type="submit">Agregar</button>
                <p>Prueba</p>
            </form>
            <form action="editMark" method="POST">
                <h4>Editar marca</h4>
                <select name="marca">
                    {foreach from=$marks item=$mark}
                        <option>{$mark->marca}</option>
                    {/foreach}
                </select>
                <input placeholder="Nombre" type="text">
                <input placeholder="Origen" type="text">
                <input placeholder="Año de fundación" type="number">
                <button type="submit">Confirmar</button>
                <p>Prueba</p>
            </form>
            <form action="deleteMark" method="POST">
                <h4>Eliminar marca</h4>
                <select name="marca">
                    {foreach from=$marks item=$mark}
                        <option>{$mark->marca}</option>
                    {/foreach}
                </select>
                <button type="submit">Confirmar</button>
                <p>Prueba</p>
            </form>
        </div>
    </section>
</article>
{include file="templates/footer.tpl"}
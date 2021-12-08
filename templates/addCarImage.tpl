{include file="templates/header.tpl"}
<section class="cont-admin">
    <p class="cont-admin__title">Agregar imágen de {$car->marca} {$car->modelo}</p>
    <form action="addCarImages/{$car->id_auto}" method="POST" class="form-admin" enctype="multipart/form-data">
        <div>
            <input type="file" name="inp-carImages[]" id="inp-carImages" multiple>
        </div>
        <div>
            <div class="div-admin-btn">
                <button type="submit">Agregar</button>
                <a href="cars">Cancelar</a>
            </div>
        </div>
        <p class="form-admin__message">{if $message != ""}{$message}{else}{/if}</p>
    </form>
    {if $images != ""}
        <div class="cont-uploadedImages">
            <p class="cont-uploadedImages__message">Imágenes cargadas</p>
            <div class="cont-uploadedImages__elem1">
                {foreach from=$images item=$image}
                    <div class="cont-uploadedImages__elem2">
                        <img src="{$image->ruta}" alt="image{$image->id_imagen}" class="cont-uploadedImages__img">
                        <a href="deleteCarImage/{$car->id_auto}/{$image->id_imagen}" class="cont-uploadedImages__deleteLink">Eliminar</a>
                    </div>
                {/foreach}
            </div>
        </div>
    {else}
        <div class="cont-notloadedImages">
            <p class="cont-notloadedImages__message">No tiene imágenes cargadas</p>
        </div>
    {/if}
</section>
{include file="templates/footer.tpl"}
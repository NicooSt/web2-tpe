{include file='templates/header.tpl'}
<h1 class="desc-title">{$car->marca} {$car->modelo}</h2>
<div class="desc-list">
    <ul>
        <li>Modelo: <span>{$car->modelo}</span></li>
        <li>Marca: <span>{$car->marca}</span></li>
        <li>Lugar de origen: <span>{$car->origen}</span></li>
        <li>Año de origen: <span>{$car->anio}</span></li>
    </ul>
</div>
{if $images != ""}
    <div class="cont-uploadedImages">
        <div class="cont-uploadedImages__elem1 cont-uploadedImagenes__elem1--margin">
            {foreach from=$images item=$image}
                <div class="cont-uploadedImages__elem2">
                    <img src="{$image->ruta}" alt="image{$image->id_imagen}" class="cont-uploadedImages__img">
                </div>
            {/foreach}
        </div>
    </div>
{/if}
<div class="div-link">
    <a href="cars">VOLVER</a>
</div>
<div class="container-comment">
    <div>
        <div class="title-comment">
            <p>Agregar comentario</p>
        </div>
        <form id="form-comments" class="form-comments">
            <div class="form-comments-firstchild">
                <textarea type="text" name="comment" placeholder='Escribe tu opinión...' id="comment"></textarea>
            </div>
            <div class="form-comments-lastchild">
                <div class="container-score">
                    <p>Puntaje:</p>
                    <form class="form-puntuacion">
                        <p class="clasificacion">
                            <input id="radio1" type="radio" class="score" name="estrellas" value="5">
                            <label for="radio1">★</label>
                            <input id="radio2" type="radio" class="score" name="estrellas" value="4">
                            <label for="radio2">★</label>
                            <input id="radio3" type="radio" class="score" name="estrellas" value="3">
                            <label for="radio3">★</label>
                            <input id="radio4" type="radio" class="score" name="estrellas" value="2">
                            <label for="radio4">★</label>
                            <input id="radio5" type="radio" class="score" name="estrellas" value="1">
                            <label for="radio5">★</label>
                        </p>
                    </form>
                    <input type="hidden" name="id-car" id="id-car" value="{$car->id_auto}">
                    <input type="hidden" id="rol-user" value="{$rol}">
                </div>
                <div class="container-btn-addComment">
                    <button type="submit" id="btn-addComment">Comentar</button>
                </div>
            </div> 
        </form>
    </div>
    <p id="message-comment"></p>
    <div class="container-addedComments">
        <div class="title-comment">
            <p id="title-comment"></p>
        </div>
        <div id="addedComments">
            {include file="templates/vue/carComments.tpl"}
        </div>
    </div>
</div>
<script src="js/api.js"></script>
{include file='templates/footer.tpl'}
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
<div class="div-link">
    <a href="cars">VOLVER</a>
</div>
<div class="container-comment">
    <div>
        <div class="title-comment">
            <p>Agregar comentario</p>
        </div>
        <form id="form-comments">
            <div>
                <textarea type="text" name="comment" placeholder='Escribe tu opinión...' id="comment"></textarea>
            </div>
            <div>
                <div class="container-score">
                    <p>Puntaje:</p>
                    <input type="range" min="1" max="5" list="tickmarks" id="score" name="score">
                    <datalist id="tickmarks">
                        <option value="1"></option>
                        <option value="2"></option>
                        <option value="3"></option>
                        <option value="4"></option>
                        <option value="5"></option>
                    </datalist>
                    <input type="hidden" name="id-car" id="id-car" value="{$idCar}">
                    <input type="hidden" id="rol-user" value="{$rol}">
                </div>
                <div class="container-btn-addComment">
                    <button type="submit" id="btn-addComment">Comentar</button>
                </div>
            </div> 
        </form>
    </div>
    <div class="container-addedComments" id="addedComments">
    </div>
</div>
<script src="js/api.js"></script>
{include file='templates/footer.tpl'}
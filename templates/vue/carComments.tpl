{literal}
    <div v-for="comment in carComments">
        <div class="box-comment">
            <div>
                <p>{{comment.user}}</p>
                <div class="box-btnDelete-score">
                    <div>
                        <button v-if="rol == 'admin'" v-bind:onclick="'deleteComment(' + comment.id_comentario + ')'">Borrar</button>
                    </div>
                    <div>
                        <p>{{comment.fecha}}</p>
                    </div>
                    <div>
                        <p class="comment-score">
                            <div v-if="comment.puntaje == 1">
                                <span class="checked">★</span>
                                <span class="comment-score-stars">★</span>
                                <span class="comment-score-stars">★</span>
                                <span class="comment-score-stars">★</span>
                                <span class="comment-score-stars">★</span>
                            </div>
                            <div v-else-if="comment.puntaje == 2">
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="comment-score-stars">★</span>
                                <span class="comment-score-stars">★</span>
                                <span class="comment-score-stars">★</span>
                            </div>
                            <div v-else-if="comment.puntaje == 3">
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="comment-score-stars">★</span>
                                <span class="comment-score-stars">★</span>
                            </div>
                            <div v-else-if="comment.puntaje == 4">
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="comment-score-stars">★</span>
                            </div>
                            <div v-else="comment.puntaje == 5">
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                                <span class="checked">★</span>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <p class="comment">{{comment.contenido}}</p>
            </div>
        </div>
    </div>
{/literal}
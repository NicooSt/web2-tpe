"use strict";
const api_url = "api/comments";

getComments();
async function getComments() {
    let idCar = document.querySelector("#id-car").value;
    try {
        let response = await fetch(`${api_url}/${idCar}`);
        let comments = await response.json();
        showComments(comments, idCar);
    } catch (error) {
        console.log(error);
    }
}

document.querySelector("#form-comments").addEventListener("submit", addComment);
async function addComment(e) {
    e.preventDefault();
    let user = document.querySelector("#usuario");
    let form = document.querySelector('#form-comments');
    let data = new FormData(form);
    let comment = {
        "contenido": data.get("comment"),
        "puntaje": data.get("score"),
        "user": user.innerHTML,
        "id_auto": data.get("id-car")
    }
    try {
        let response = await fetch(api_url, {
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(comment)
        });
        if (response.status === 200) {
            getComments();
            document.querySelector("#comment").value = "";
        }
    } catch (error) {
        console.log(error);
    }
}

async function deleteComment() {
    let idComment = this.getAttribute("id-comment");
    try {
        let response = await fetch(`${api_url}/${idComment}`, {
            "method": "DELETE"
        });
        if (response.status === 200) {
            getComments();   
        }
    } catch (error) {
        console.log(error);
    }
}

function showComments(comments, idCar) {
    let rol = document.querySelector("#rol-user").value;
    let contAddComment = document.querySelector("#addedComments");
    contAddComment.innerHTML = "";
    let isComment = true;

    for (let i = 0; i < comments.length; i++) {
        if (comments[i].id_auto == idCar) {
            if (isComment == true) {
                let boxTitleComment = document.createElement("div");
                boxTitleComment.classList.add("title-comment");
                let titleComment = document.createElement("p");
                titleComment.innerHTML = "Comentarios";
                boxTitleComment.appendChild(titleComment);
                contAddComment.appendChild(boxTitleComment);
                isComment = false;
            }
            let contBoxComment = document.createElement("div");
            let boxComment = document.createElement("div");
            boxComment.classList.add("box-comment");
            let infoComment = document.createElement("div");
            let userName = document.createElement("p");
            userName.innerHTML = comments[i].user;
            infoComment.appendChild(userName);
            let box_btnDelete_score = document.createElement("div");
            box_btnDelete_score.classList.add("box-btnDelete-score")
            if (rol == "admin") {
                let btnDelete = document.createElement("button");
                btnDelete.innerHTML = "Borrar"; 
                btnDelete.setAttribute("id-comment", comments[i].id_comentario);
                btnDelete.addEventListener("click", deleteComment);
                box_btnDelete_score.appendChild(btnDelete);
            }
            let score = document.createElement("p");
            score.innerHTML = "Puntaje: " + comments[i].puntaje;
            box_btnDelete_score.appendChild(score);
            infoComment.appendChild(box_btnDelete_score);
            let contentComment = document.createElement("div"); 
            let comment = document.createElement("p");
            comment.classList.add("comment");
            comment.innerHTML = comments[i].contenido;
            contentComment.appendChild(comment);
            boxComment.appendChild(infoComment);
            boxComment.appendChild(contentComment);
            contBoxComment.appendChild(boxComment);
            contAddComment.appendChild(contBoxComment);        
        }
    }
}
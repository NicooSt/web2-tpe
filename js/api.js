"use strict";
const api_url = "api/comments";

let app = new Vue({
    el: "#addedComments",
    data: {
        rol: null,
        carComments: []
    }
});

getComments();
async function getComments() {
    let idCar = document.querySelector("#id-car").value;
    try {
        let response = await fetch(`${api_url}/${idCar}`);
        let comments = await response.json();
        if (response.status === 200) {
            showComments(comments);
        }
    } catch (error) {
        console.log(error);
    }
}

document.querySelector("#form-comments").addEventListener("submit", addComment);
async function addComment(e) {
    e.preventDefault();
    let message = document.querySelector("#message-comment");
    let user = document.querySelector("#usuario");
    let form = document.querySelector('#form-comments');
    let data = new FormData(form);
    let comment = {
        "contenido": data.get("comment"),
        "fecha": getDate(),
        "puntaje": getScore(),
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
            message.innerHTML = "";
            removeChecked();
        } else if (response.status === 400) {
            message.innerHTML = "Inserte un comentario y un puntaje";
        }
    } catch (error) {
        console.log(error);
    }
}

function getScore() {
    let form = document.querySelector('#form-comments');
    let data = new FormData(form);
    return data.get("estrellas");
}

function removeChecked() {
    let objHTML = document.getElementsByClassName("score");
    let inpScore = Array.from(objHTML);
    inpScore.forEach(input => {
        if (input.checked == true) {
            input.checked = false;
        }
    });
}

async function deleteComment(idComment) {
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

function showComments(comments) {
    let rol = document.querySelector("#rol-user").value;
    let title = document.querySelector("#title-comment");
    let contComments = document.querySelector("#addedComments");
    contComments.innerHTML = "";

    for (let i = 0; i < comments.length; i++) {
        if (comments != "No existen comentarios") {
            title.innerHTML = "Comentarios";
            app.rol = rol;
            app.carComments.push(comments[i]);
        } else {
            title.innerHTML = "";
        }
    }
}

function getDate() {
    const d = new Date();
    const months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
    let dia = new Date().getDate();
    let ano = new Date().getFullYear();
    let hora = new Date().getHours();
    let minutos = new Date().getMinutes();

    if (dia < 10) { dia = "0" + dia; }
    if (hora < 10) { hora = "0" + hora; }
    if (minutos < 10) { minutos = "0" + minutos; }
    let fecha = dia + "/" + months[d.getMonth()] + "/" + ano + " " + hora + ":" + minutos;
    return fecha;
}
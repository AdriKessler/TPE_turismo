document.addEventListener("DOMContentLoaded", iniciarPagina);

function iniciarPagina(){
    "use strict";
    const url= "api/comentario";
    let comentarios=[];

    let btn_opinar=document.querySelector("#opinar");
    btn_opinar.addEventListener("click", agregarComentario);

    async function agregarComentario(){
        let id_atraccion= document.querySelector("#id_atraccion");
        let email = document.querySelector ("#email");
        let opinion = document.querySelector ("#opinion");
        let puntaje = document.querySelector("#puntaje");
        let id_usuario = document.querySelector("#id_usuario");

        let opiniones = {
            // llama al valor del input y se lo asigna dentro de comentario dentro del json
                "email": email.value,
                "opinion": opinion.value,
                "id_atraccion": id_atraccion.value,
                "puntaje": puntaje.value,
                "id_usuario": id_usuario.value
        }
        console.log(opiniones);
        try{
            let respuesta = await fetch (url , {
                "method": "POST",
                "headers": {'Content-type': "application/json"},
                "body": JSON.stringify(opiniones),
            });
            if (respuesta.ok) {
                let opinion = await respuesta.json();
                comentarios.push(opinion);
            console.log(opinion);
            }else{
                console.log("Hubo un error encontrado");
            }
        }catch(error){
            console.log(error);
        }  
        getComentario();
    }
}
document.addEventListener("DOMContentLoaded", iniciarPagina);


function iniciarPagina(){
    "use strict";
    const url= "api/comentario";

    async function getComentario(){
        
        try {
            let response= await fetch (url);
            let comentarios= await response.json();

            verComentario(comentarios);
        } catch (error) {
            console.log(error);
        }
    }

    function verComentario(comentarios){
        let calificacion= document.querySelector("#ver-comentarios");
        calificacion.innerHTML="";
        for (let comentario of comentarios){
           if(comentario.administrador){
                let html= `<tr class="table-info">
                                <td> ${comentario.email} </td>
                                <td> ${comentario.opinion} </td> 
                                <td> ${comentario.puntaje} </td> 
                                <td> ${comentario.nombre} </td>
                            </tr>`;
                calificacion.innerHTML += html; 
            }
            //else{

            //} 
        }
    }
    getComentario();

}


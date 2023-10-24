function visualizarGlicose(id_glicose){

    let editarGlicoseForm = document.getElementById("editar-glicose-form");
    let glicoseCondicao = document.getElementById("condicao-glicose");
    let glicoseData = document.getElementById("data-glicose");
    let glicoseHora = document.getElementById("hora-glicose");
    let glicoseComentario = document.getElementById("comentario-glicose");
    let glicoseValor = document.getElementById("valor-glicose");
    
    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/visualizarGlicose.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){

            let glicose = JSON.parse(xhr.response);
            console.log(glicose.condicao);

            editarGlicoseForm.setAttribute("onsubmit",`editarGlicose(${glicose.id_glicose})`);
            glicoseCondicao.innerText = glicose.condicao;
            glicoseData.value = glicose.data;
            glicoseHora.value = glicose.hora;
            if(glicose.comentario != null && glicose.comentario.replaceAll(" ","") != ""){
                glicoseComentario.value = glicose.comentario;
            }else{
                glicoseComentario.setAttribute("placeholder","N/A");
                glicoseComentario.value = "";
            }
            glicoseValor.innerText = glicose.valor;
        }
    };
    xhr.send(`id_glicose=${id_glicose}`);    
}
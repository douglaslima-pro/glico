function visualizarGlicose(id_glicose){

    let editarGlicoseForm = document.getElementById("editar-glicose-form");
    let glicoseTempoRegistro = document.getElementById("glicose-registrada-em");
    let glicoseCondicao = document.getElementById("condicao-glicose");
    let glicoseData = document.getElementById("data-glicose");
    let glicoseHora = document.getElementById("hora-glicose");
    let glicoseComentario = document.getElementById("comentario-glicose");
    let glicoseValor = document.getElementById("valor-glicose");
    let excluirBTN = document.getElementById("excluir-glicose-btn");
    
    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/visualizarGlicose.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){

            let glicose = JSON.parse(xhr.response);

            glicoseTempoRegistro.innerText = `Registro realizado há ${calcularIntervaloDeDatas(`${glicose.data_registro} ${glicose.hora_registro}`)}!`;

            console.log(calcularIntervaloDeDatas(`${glicose.data_registro} ${glicose.hora_registro}`));

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
            excluirBTN.setAttribute("onclick",`confirmar('Você tem certeza?','Depois de excluir não é possível recuperar!','excluirGlicose(${glicose.id_glicose},${glicose.id_usuario})')`);
            //onclick=""
        }
    };
    xhr.send(`id_glicose=${id_glicose}`);    
}

function calcularIntervaloDeDatas(strDataHora){

    let data = new Date(strDataHora);
    let segundos = Math.floor((new Date() - data) / 1000);
    
    if(segundos > 0 && segundos < 60){
        //unidade: segundos
        return `${segundos} segundos`;
    }else if(segundos < 3600){
        //unidade: minutos
        if(segundos >= 60 && segundos < 120){
            return `${Math.floor(segundos / 60)} minuto`;
        }else{
            return `${Math.floor(segundos / 60)} minutos`;
        }
    }else if(segundos < 86400){
        //unidade: horas
        if(segundos >= 3600 && segundos < 7200){
            return `${Math.floor(segundos / 3600)} hora`;
        }else{
            return `${Math.floor(segundos / 3600)} horas`;
        }
    }else if(segundos < 604800){
        //unidade: dias
        if(segundos >= 86400 && segundos < 172800){
            return `${Math.floor(segundos / 86400)} dia`;
        }else{
            return `${Math.floor(segundos / 86400)} dias`;
        }
    }else if(segundos < 2592000){
        //unidade: semanas
        if(segundos >= 604.800 && segundos < 1209600){
            return `${Math.floor(segundos / 604800)} semana`;
        }else{
            return `${Math.floor(segundos / 604800)} semanas`;
        }
    }else if(segundos < 31536000){
        //unidade: meses
        if(segundos >= 2592000 && segundos < 5184000){
            return `${Math.floor(segundos / 2592000)} mês`;
        }else{
            return `${Math.floor(segundos / 2592000)} meses`;
        }
    }else{
        //unidade: anos
        if(segundos >= 31536000 && segundos < 63072000){
            return `${Math.floor(segundos / 31536000)} ano`;
        }else{
            return `${Math.floor(segundos / 31536000)} anos`;
        }
    }

}
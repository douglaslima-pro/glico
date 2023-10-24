let comentarioInput = document.getElementById("comentario-glicose");
let comentario;
let comentarioBotoes = document.querySelector(".register-glucose__comment-actions");
let editarBotao = document.getElementById("editar-comentario");

function editarGlicose(id_glicose){

    event.preventDefault();

    let comentario = comentarioInput.value;

    desabilitarComentario();

    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/editarGlicose.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            if(xhr.responseText == "true") {
                //atualiza o comentário na tabela
                let tabelaComentario = document.querySelector(`#glicose-${id_glicose} .glucose-history__table-cell--comment`);
                if(comentario != null && comentario.replaceAll(" ","") != ""){
                    tabelaComentario.innerText = comentario;
                    comentarioInput.value = comentario;
                 }else{
                    tabelaComentario.innerText = "--";
                    comentarioInput.setAttribute("placeholder","N/A");
                    comentarioInput.value = "";
                 }
                mostrarAlerta("alert--success","fa-check","Sucesso","A glicemia foi alterada com sucesso!");
            }else{
                mostrarAlerta("alert--error","fa-xmark","Erro","Não foi possível alterar a glicemia!");
            }
        }
    };
    xhr.send(`id_glicose=${id_glicose}&comentario=${comentario}`);
}

function habilitarComentario(){
    comentario = comentarioInput.value;
    editarBotao.classList.add("is-none");
    comentarioBotoes.classList.remove("is-none");
    comentarioInput.disabled = false;
}

function desabilitarComentario(){
    comentarioInput.value = comentario;
    editarBotao.classList.remove("is-none");
    comentarioBotoes.classList.add("is-none");
    comentarioInput.disabled = true;
}
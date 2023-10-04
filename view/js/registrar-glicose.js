importScripts("aviso-na-tela.js");

function registrarGlicose(id_usuario){
    event.preventDefault();
    let valor = document.getElementById("valor").value;
    let data = document.getElementById("data").value;
    let hora = document.getElementById("hora").value;
    let comentario = document.getElementById("comentario").value;
    let condicao = document.getElementById("condicao").value;
    console.clear();
    console.log(valor);
    console.log(data);
    console.log(hora);
    console.log(comentario);
    console.log(condicao);
    console.log(id_usuario);

    let xhr = new XMLHttpRequest();
    xhr.open("POST","../../controller/registrarGlicose.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            if(xhr.responseText == "true"){
                aviso(`sucesso:<b>Sucesso</b><br>Glicemia registrada com sucesso!`);
            }else{
                aviso(`erro:<b>Erro</b><br>Erro ao registrar glicemia!`);
            }
        }
    };
    xhr.send(`valor=${valor}&data=${data}&hora=${hora}&comentario=${comentario}&condicao=${condicao}&idusuario=${id_usuario}`);
}
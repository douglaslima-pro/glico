importScripts("atualizar-historico-glicoses.js");

//atualiza o conteúdo da página home sem dar refresh (Ajax)
function atualizaPaginaHome(id_usuario){
    ultimaGlicose(id_usuario);
    pesquisarGlicoses(id_usuario,10,1);
}

//pesquisa a última glicose registrada no banco de dados
function ultimaGlicose(id_usuario){
    let ultimaGlicose = document.getElementById("last-glucose");
    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/pesquisarUltimaGlicose.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            ultimaGlicose.innerText = xhr.response;
        }
    };
    xhr.send(`id_usuario=${id_usuario}`);
}
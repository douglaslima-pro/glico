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
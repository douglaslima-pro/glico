function exibirDadosImportantes(id_usuario){

    let media = document.querySelector(".card__important--media");
    let hipoglicemias = document.querySelector(".card__important--hipoglicemias");
    let hiperglicemias = document.querySelector(".card__important--hiperglicemias");

    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/exibirDadosImportantes.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            console.log(xhr.response);
            let dadosImportantes = JSON.parse(xhr.response);
            media.innerText = `${parseInt(dadosImportantes.media)} mg/dL`;
            hipoglicemias.innerText = `${(parseFloat(dadosImportantes.hipoglicemias).toFixed(2)).toString().replace(".",",")} %`;
            hiperglicemias.innerText = `${(parseFloat(dadosImportantes.hiperglicemias).toFixed(2)).toString().replace(".",",")} %`;
        }
    };
    xhr.send(`id_usuario=${id_usuario}`);
}
function exibirDadosImportantes(id_usuario){
    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/exibirDadosImportantes.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            console.log(xhr.response);
        }
    };
    xhr.send(`id_usuario=${id_usuario}`);
}
function usuarioExiste(url){

    let usuario = document.getElementById("usuario").value;
    let inputSubmit = document.getElementById("submit");
    let aviso = document.querySelector(".aviso-usuario-em-uso");

    //CRIA O OBJETO XMLHTTPREQUEST
    let xhr = new XMLHttpRequest();
    xhr.open("POST",url,true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status == 200 && xhr.readyState == 4){
            console.log(xhr.responseText);
            xhr.responseText == "true" ? usuarioExisteTrue() : usuarioExisteFalse();
        }
    };
    xhr.send(`usuario=${usuario}`);

    function usuarioExisteTrue(){
        inputSubmit.disabled = true;
        aviso.style = "display: inline-block";
    }
    function usuarioExisteFalse(){
        if(document.querySelector(".aviso-email-em-uso").style["display"] != "inline-block" && document.querySelector(".aviso-senhas-nao-coincidem").style["display"] != "inline-block"){
            inputSubmit.disabled = false;
        }
        aviso.style = "display: none";
    }
}
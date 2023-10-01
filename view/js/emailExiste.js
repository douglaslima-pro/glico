function emailExiste(url){
    let email = document.getElementById("email").value;
    let inputSubmit = document.getElementById("submit");
    let aviso = document.querySelector(".aviso-email-em-uso");

    //CRIA O OBJETO XMLHTTPREQUEST
    let xhr = new XMLHttpRequest();
    xhr.open("POST",url,true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status == 200 && xhr.readyState == 4){
            console.log(xhr.response);
            xhr.responseText == 'true' ? emailExisteTrue() : emailExisteFalse();
        }
    };
    xhr.send(`email=${email}`);

    //FUNÇÕES DE RESPOSTA PARA O XMLHTTPREQUEST
    function emailExisteTrue(){
        inputSubmit.disabled = true;
        aviso.style = "display: inline-block";
    }
    function emailExisteFalse(){
        if(document.querySelector(".aviso-usuario-em-uso").style["display"] != "inline-block" && document.querySelector(".aviso-senhas-nao-coincidem").style["display"] != "inline-block"){
            inputSubmit.disabled = false;
        }
        aviso.style = "display: none";
    }
}
function usuarioExiste(url){

    let usuario = document.getElementById("usuario").value;
    let inputSubmit = document.getElementById("submit");
    let aviso = document.querySelector(".aviso-usuario-em-uso");

    //CRIA O OBJETO XMLHTTPREQUEST
    let xhr = new XMLHttpRequest();
    xhr.open("POST",url,true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onload = () => {
        if(xhr.status != 200){
            inputSubmit.disabled = true;
        }
    };
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
        inputSubmit.disabled = false;
        aviso.style = "display: none";
    }
}
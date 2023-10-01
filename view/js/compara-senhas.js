function comparaSenhas(senhaID,confirmaSenhaID,submitID){
    let senha = document.getElementById(senhaID).value;
    let confirmaSenha = document.getElementById(confirmaSenhaID).value;
    let inputSubmit = document.getElementById(submitID);
    let aviso = document.querySelector(".aviso-senhas-nao-coincidem");

    if(senha == confirmaSenha){
        if(document.querySelector(".aviso-email-em-uso").style["display"] != "inline-block" && document.querySelector(".aviso-usuario-em-uso").style["display"] != "inline-block"){
            inputSubmit.disabled = false;
        }
        aviso.style = "display: none";
        //console.log(inputSubmit.disabled);
    }else{
        aviso.style = "display: inline-block";
        inputSubmit.disabled = true;
        //console.log(inputSubmit.disabled);
    }
}
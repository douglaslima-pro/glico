function comparaSenhas(senhaID,confirmaSenhaID,submitID){
    let senha = document.getElementById(senhaID).value;
    let confirmaSenha = document.getElementById(confirmaSenhaID).value;
    let inputSubmit = document.getElementById(submitID);
    let aviso = document.querySelector(".aviso-senhas-nao-coincidem");

    if(senha == confirmaSenha){
        aviso.style = "display: none";
        inputSubmit.disabled = false;
        //console.log(inputSubmit.disabled);
    }else{
        aviso.style = "display: inline";
        inputSubmit.disabled = true;
        //console.log(inputSubmit.disabled);
    }
}
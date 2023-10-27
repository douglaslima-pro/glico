function comparaSenhas(senhaID,confirmaSenhaID,submitID){
    let senha = document.getElementById(senhaID).value;
    let confirmaSenha = document.getElementById(confirmaSenhaID).value;
    let inputSubmit = document.getElementById(submitID);
    let aviso = document.getElementById("aviso-senhas");

    if(senha == confirmaSenha){
        inputSubmit.disabled = false;
        aviso.classList.add('is-none');
    }else{
        aviso.classList.remove('is-none');
        inputSubmit.disabled = true;
    }
}
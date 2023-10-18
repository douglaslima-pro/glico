function comparaSenhas(senhaID,confirmaSenhaID,submitID){
    let senha = document.getElementById(senhaID).value;
    let confirmaSenha = document.getElementById(confirmaSenhaID).value;
    let inputSubmit = document.getElementById(submitID);
    let aviso = document.getElementById("aviso-senhas");

    if(senha == confirmaSenha){
        if(document.getElementById("aviso-email").classList.contains('is-none') && document.getElementById("aviso-usuario").classList.contains('is-none')){
            inputSubmit.disabled = false;
        }
        aviso.classList.add('is-none');
        //console.log(inputSubmit.disabled);
        console.log('senhas iguais');
    }else{
        aviso.classList.remove('is-none');
        inputSubmit.disabled = true;
        //console.log(inputSubmit.disabled);
        console.log('senhas diferem');
    }
}
importScripts("aviso-na-tela.js");

function recuperarSenha(inputID,submitID){

    let emailusuario = document.getElementById(inputID).value;
    let submit = document.getElementById(submitID);
    //desabilita o submit até processar toda a solicitação
    submit.disabled = true;

    let xhr = new XMLHttpRequest();
    xhr.open("POST","../../controller/recuperarSenha.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            console.log(xhr.responseText);
            if(xhr.responseText == "true"){
                aviso(`sucesso:<b>Sucesso</b><br>Enviamos um link para alterar a senha no seu e-mail!`);
                submit.disabled = false;
            }else{
                aviso(`erro:<b>Erro</b><br>Não encontramos uma conta ativa para <b>${emailusuario}</b>!`);
                submit.disabled = false;
            }
        }
    };
    xhr.send(`emailusuario=${emailusuario}`);

}

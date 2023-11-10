function alterarSenha(){

    event.preventDefault(); //evita o submit do formulário
    fecharOverlay(); //fecha o overlay

    //valor dos inputs
    let senhaAtual = document.getElementById("senha-atual").value;
    let senhaNova = document.getElementById("senha-nova").value;

    //zera os inputs
    document.getElementById("senha-atual").value = "";
    esconderSenha('#senha-atual','#input-senha-atual .login__eye-icon--closed','#input-senha-atual .login__eye-icon--open');
    document.getElementById("senha-nova").value = "";
    esconderSenha('#senha-nova','#input-senha-nova .login__eye-icon--closed','#input-senha-nova .login__eye-icon--open');
    document.getElementById("confirma-senha-nova").value = "";
    esconderSenha('#confirma-senha-nova','#input-confirma-senha-nova .login__eye-icon--closed','#input-confirma-senha-nova .login__eye-icon--open');

    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/alterarSenhaSemChave.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            let resposta = JSON.parse(xhr.response);
            if(resposta.status){
                mostrarAlerta(resposta.msg.alertClass,resposta.msg.iconClass,resposta.msg.title,resposta.msg.text);
            }else{
                mostrarAlerta(resposta.msg.alertClass,resposta.msg.iconClass,resposta.msg.title,resposta.msg.text);
            }
        }
    };
    xhr.send(`senha_atual=${senhaAtual}&senha_nova=${senhaNova}`);
}
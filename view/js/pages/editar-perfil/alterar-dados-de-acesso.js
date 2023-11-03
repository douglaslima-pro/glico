function alterarDadosDeAcesso(){

    event.preventDefault();

    let email = document.getElementById("email").value;
    let usuario = document.getElementById("usuario").value;

    fecharEdicao("#account-form .profile__actions-container");

    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/alterarDadosDeAcesso.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            let resposta = JSON.parse(xhr.response);
            if(resposta.status === true){
                mostrarAlerta("alert--success","fa-check","Sucesso","Dados alterados com sucesso!");
                document.getElementById("email").value = email;
                document.getElementById("usuario").value = usuario;
                document.querySelector(".user-options__username").innerText = usuario;
            }else{
                mostrarAlerta("alert--error","fa-xmark","Erro","Não foi possível alterar os dados!");
            }
        }
    };
    xhr.send(`email=${email}&usuario=${usuario}`);
}
importScripts("alert.js");

function recuperarSenha(inputID,submitID){

    event.preventDefault(); // evita o submit do formulário

    let input = document.getElementById(inputID);
    let emailusuario = input.value;
    let submit = document.getElementById(submitID);

    //limpa o input
    input.value = '';
    //desabilita o submit
    submit.disabled = true;

    let xhr = new XMLHttpRequest();
    xhr.open("POST","../../controller/recuperarSenha.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            console.log(xhr.responseText);
            if(xhr.responseText == "true"){
                console.log("sucesso");
                //habilita o submit
                submit.disabled = false;
                mostrarAlerta('alert--success','fa-check','Sucesso','Enviamos um link para alterar a senha no seu e-mail!');
            }else{
                console.log("erro");
                //habilita o submit
                submit.disabled = false;
                mostrarAlerta('alert--error','fa-xmark','Erro',`Não encontramos uma conta ativa para <strong>${emailusuario}</strong>!`);
            }
        }
    };
    xhr.send(`emailusuario=${emailusuario}`);

}

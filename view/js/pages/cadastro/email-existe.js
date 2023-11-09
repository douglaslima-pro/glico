var inputEmail = document.getElementById("email");

inputEmail.addEventListener('input', () => {
    emailExiste();
});

function emailExiste(){
    let email = document.getElementById("email").value;
    let inputSubmit = document.getElementById("submit");
    let aviso = document.getElementById("aviso-email");

    //CRIA O OBJETO XMLHTTPREQUEST
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../../controller/emailExiste.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status == 200 && xhr.readyState == 4){
            let resposta = JSON.parse(xhr.response);
            resposta.status ? emailExisteTrue() : emailExisteFalse();
        }
    };
    xhr.send(`email=${email}`);

    //FUNÇÕES DE RESPOSTA PARA O XMLHTTPREQUEST
    function emailExisteTrue(){
        inputSubmit.disabled = true;
        aviso.classList.remove('is-none');
    }
    function emailExisteFalse(){
        if(document.getElementById("aviso-usuario").classList.contains('is-none') && document.getElementById("aviso-senhas").classList.contains('is-none')){
            inputSubmit.disabled = false;
        }
        aviso.classList.add('is-none');
    }
}
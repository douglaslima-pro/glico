var inputUsuario = document.getElementById("usuario");

inputUsuario.addEventListener('input', () => {
    usuarioExiste();
});

function usuarioExiste(){
    let usuario = document.getElementById("usuario").value;
    let inputSubmit = document.getElementById("submit");
    let aviso = document.getElementById("aviso-usuario");

    //CRIA O OBJETO XMLHTTPREQUEST
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../../controller/usuarioExiste.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status == 200 && xhr.readyState == 4){
            let resposta = JSON.parse(xhr.response);
            resposta.status ? usuarioExisteTrue() : usuarioExisteFalse();
        }
    };
    xhr.send(`usuario=${usuario}`);

    function usuarioExisteTrue(){
        inputSubmit.disabled = true;
        aviso.classList.remove('is-none')
    }
    function usuarioExisteFalse(){
        if(document.getElementById("aviso-email").classList.contains('is-none') && document.getElementById("aviso-senhas").classList.contains('is-none')){
            inputSubmit.disabled = false;
        }
        aviso.classList.add('is-none');
    }
}
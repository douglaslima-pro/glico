function emailExiste(submitSelector){
    const email = document.getElementById("email").value;
    const aviso = document.getElementById("aviso-email");
    let submit = document.querySelector(submitSelector);

    //CRIA O OBJETO XMLHTTPREQUEST
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../../controller/emailExiste.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if(xhr.status == 200 && xhr.readyState == 4){
            let resposta = JSON.parse(xhr.response);
            if(resposta.status){
                submit.disabled = true;
                aviso.classList.remove("is-none");
            }else{
                aviso.classList.add("is-none");
                if(document.getElementById("aviso-usuario").classList.contains("is-none")){
                    submit.disabled = false;
                }
            };
        }
    };
    xhr.send(`email=${email}`);
}
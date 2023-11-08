function alterarFoto(){
    let foto = document.getElementById("foto");
    if(foto.files[0].size > 4194304){
        //se a foto for maior que 4mb
        mostrarAlerta("alert--info","fa-info","O site informa","A imagem não pode ser maior que 4mb!");
        return;
    }

    let xhr = new XMLHttpRequest;
    xhr.open("POST","../../controller/alterarFoto.php",true);
    xhr.onreadystatechange = () => {
        if(xhr.status === 200 && xhr.readyState === 4){
            let resposta = JSON.parse(xhr.response);
            if(resposta.status == true){
                mostrarAlerta(resposta.msg.alertClass,resposta.msg.iconClass,resposta.msg.title,resposta.msg.text);
                mostrarImagem(foto.files[0]);
                document.querySelector(".header__profile-picture").src = resposta.foto;
            }else{
                mostrarAlerta(resposta.msg.alertClass,resposta.msg.iconClass,resposta.msg.title,resposta.msg.text);
            }
        }
    };
    let formData = new FormData();
    formData.append("foto",foto.files[0]);
    xhr.send(formData);
}

function mostrarImagem(img){
    let reader = new FileReader;
    reader.onload = (e) => {
        document.querySelector(".profile__picture").src = e.target.result;
    }
    reader.readAsDataURL(img);
}
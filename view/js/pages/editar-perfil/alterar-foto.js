function alterarFoto(){
    let foto = document.getElementById("foto");
    let src = foto.value;
    let extensao = src.split(".");

    console.log(`src: ${src}`);
    console.log(`extensão: ${extensao[extensao.length-1]}`);
    
    if(foto.files[0].size > 26214400){
        //se a foto for maior que 25mb
        mostrarAlerta("alert--info","fa-info","O site informa","A imagem não pode ser maior que 25mb!");
        return;
    }

    mostrarImagem(foto.files[0]);
}

function mostrarImagem(img){
    let reader = new FileReader;
    reader.onload = (e) => {
        document.querySelector(".profile__picture").src = e.target.result;
    }
    reader.readAsDataURL(img);
}
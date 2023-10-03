function aviso(msg){

    if(msg != null && msg != ""){

    const aviso = document.querySelector(".aviso-na-tela");
    aviso.style = "display: flex";
    const mensagem = document.querySelector(".aviso-na-tela #mensagem");
    
    aviso.id = msg.split(':')[0];
    mensagem.innerHTML = msg.split(':')[1];

    aviso.style = "opacity: 1";

    setTimeout(() => {
        aviso.style = "opacity: 0";
    },8000);

    setTimeout(() => {
        aviso.style = "display: none";
    },9500);

    }

}

function audioNofiticacao(){
    let audio = new Audio("../audio/notificacao.mp3");
    audio.play();
}

function fechaAviso(){
    const aviso = document.querySelector(".aviso-na-tela");
    if(aviso.style.opacity != 0){
        audioNofiticacao();
    }
    aviso.style = "opacity: 0";
    setTimeout(() => {
        aviso.style = "display: none";
    },1500);
}
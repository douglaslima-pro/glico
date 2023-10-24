const overlay = document.querySelector('.overlay-backdrop');

function abrirOverlay(contentID){
    overlay.classList.remove('is-none');
    document.getElementById(contentID).classList.remove("is-none");
    //sets body height equal to viewport height and overflow hidden
    document.body.classList.add('l-full-viewport-height');
    document.body.classList.add('l-overflow-y-hidden');
}

function fecharOverlay(){
    overlay.classList.add('is-none');
    document.querySelector(".overlay-backdrop > *:not(.is-none)").classList.add("is-none");
    //sets body height equal to viewport height and overflow hidden
    document.body.classList.remove('l-full-viewport-height');
    document.body.classList.remove('l-overflow-y-hidden');
}

overlay.addEventListener('click', () => {
    if(!document.querySelector(".overlay-backdrop > *:not(.is-none)").contains(event.target)){
        fecharOverlay();
    }
});
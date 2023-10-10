const overlay = document.querySelector('.overlay-backdrop');

function abrirOverlay(){
    overlay.classList.remove('is-none');
    document.body.classList.add('l-full-viewport-height');
    document.body.classList.add('l-overflow-y-hidden');
}

function fecharOverlay(){
    overlay.classList.add('is-none');
    document.body.classList.remove('l-full-viewport-height');
    document.body.classList.remove('l-overflow-y-hidden');
}

overlay.addEventListener('click', () => {
    if(!document.querySelector('.overlay-backdrop > *').contains(event.target)){
        overlay.classList.add('is-none');
        document.body.classList.remove('l-full-viewport-height');
        document.body.classList.remove('l-overflow-y-hidden');
    }
});
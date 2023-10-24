let confirmacao = document.querySelector(".confirm");
let confirmarTitulo = document.querySelector(".confirm-modal__title");
let confirmarDescricao = document.querySelector(".confirm-modal__description");
let confirmarBTN = document.querySelector(".confirm-modal__btn--confirm");

function confirmar(titulo,descricao,callback){
    confirmarTitulo.innerText = titulo;
    confirmarDescricao.innerText = descricao;
    confirmarBTN.setAttribute("onclick",callback);
    confirmacao.classList.remove("is-none");
}

function cancelarConfirmacao(){
    confirmacao.classList.add("is-none");
}
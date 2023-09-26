inputSenha = document.querySelector(".input-senha");
input = document.querySelector(".input-senha input");
iconeOlho = document.querySelector(".input-senha .icone-senha");

/*
  ELEMENTOS HTML
<div class="input-senha">
    <input type="password">
    <div class="icone-senha">
</div>
*/

iconeOlho.addEventListener('click', () => {

    if(inputSenha.id == "esconde-senha"){
        inputSenha.id = "mostra-senha";
        input.type = "text";
    }else{
        inputSenha.id = "esconde-senha";
        input.type = "password";
    }

});
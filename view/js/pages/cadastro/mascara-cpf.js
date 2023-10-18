function mascaraCPF(inputID){
    input = document.getElementById(inputID);

    //A função isNaN() primeiro tenta converter o valor para tipo numérico e depois verifica se o valor NÃO é do tipo numérico (true quando afirmativo)
    if(isNaN(input.value[input.value.length-1])){
        input.value = input.value.substring(0,input.value.length-1);
        return;
    }

    input.setAttribute("maxlength",14);

    if(input.value.length == 3 || input.value.length == 7){
        input.value += ".";
    }
    if(input.value.length == 11){
        input.value+= "-";
    }

}

function colarFalse(){
    event.preventDefault();
    console.log("prevent paste");
}
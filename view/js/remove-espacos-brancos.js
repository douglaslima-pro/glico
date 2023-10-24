function removeEspacosBrancos(inputID){
    let input = document.getElementById(inputID);
    if(input.value.replaceAll(" ","") == ""){
        input.value = "";
    }
}
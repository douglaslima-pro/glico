function emailExiste(url){
    let email = document.getElementById("email").value;
    let xhr = new XMLHttpRequest();
    xhr.open("POST",url,true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onload = () => {
        console.log(xhr.status);
    };
    xhr.onreadystatechange = () => {
        if(xhr.status == 200 && xhr.readyState == 4){
            console.log(xhr.responseText);
            console.log(xhr.responseType);
            console.log(xhr.response);
        }
    };
    xhr.send("email="+email);
}
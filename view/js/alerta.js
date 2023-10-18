/*
Alert classes: 'alert--success', 'alert--error', 'alert--info'
Icon classes: 'fa-check', 'fa-xmark', 'fa-info'

Alert HTML structure
<div class="alert alert--error" id="alert-n1">
    <i class="alert__icon fa-solid fa-xmark"></i>
    <div class="alert__message">
        <p class="alert__title">
            Erro
        </p>
        <p class="alert__text">
            Verifique suas credenciais!
        </p>
    </div>
</div>
        
*/

var AlertIndex = 1;

function mostrarAlerta(alertClass, iconClass, title, text) {
    let alert = document.createElement('div');
    //adds some classes to alert
    alert.classList.add('alert',alertClass);
    // adds an ID to alert
    let alertId = `alert-n${AlertIndex}`;
    AlertIndex++; //increments the global alert index
    alert.id = alertId;

    // adds an onclick event to alert
    alert.onclick = () => {
        fecharAlerta(alertId);
    };

    // creates the alert icon 
    let icon = document.createElement('i');
    icon.classList.add('alert__icon','fa-solid',iconClass);
    alert.appendChild(icon); // adds an icon to alert

    // creates the alert message
    let alertMessage = document.createElement('div');
    alertMessage.classList.add('alert__message');

    //creates the alert title
    let alertTitle = document.createElement('div');
    alertTitle.classList.add('alert__title');
    alertTitle.innerText = title;

    //creates the alert text
    let alertText = document.createElement('div');
    alertText.classList.add('alert__text');
    alertText.innerHTML = text;

    alertMessage.appendChild(alertTitle); // adds a title to alert message
    alertMessage.appendChild(alertText); // adds a text to alert message
    alert.appendChild(alertMessage); // adds the message to alert

    let alerts = document.querySelector('.alerts');
    alerts.appendChild(alert);

    setTimeout(() => {
        alert.style['opacity'] = 1;
    },1500);

    setTimeout(() => {
        alert.style['opacity'] = 0;
        setTimeout(() => {
            removerAlerta(alertId);
        },1500);
    },10000);

}

function fecharAlerta(alertId) {

    let audio = new Audio('../audio/notificacao.mp3');
    audio.play();

    let alert = document.getElementById(alertId);
    alert.style['opacity'] = 0;

    setTimeout(() => {
        removerAlerta(alertId);
    },1500);

}

function removerAlerta(alertId) {
    let alert = document.getElementById(alertId);
    document.querySelector('.alerts').removeChild(alert);
}
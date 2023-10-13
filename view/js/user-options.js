var userContainer = document.querySelector(".header__user-container");
var userOptions = document.querySelector(".user-options");

userContainer.addEventListener('click', () => {
    console.log('user-container');
    if(!userOptions.contains(event.target)){
        if(userOptions.classList.contains('is-hidden')){
            userOptions.classList.remove('is-hidden');
            userOptions.classList.add('is-visible');
        }else{
            userOptions.classList.remove('is-visible');
            userOptions.classList.add('is-hidden');
        }
    }
});

window.addEventListener('click', () => {
    if(!userContainer.contains(event.target)){
        userOptions.classList.remove('is-visible');
        userOptions.classList.add('is-hidden');
    }
});

window.document.querySelector(".content").onscroll = () => {
    userOptions.classList.remove('is-visible');
    userOptions.classList.add('is-hidden');
};
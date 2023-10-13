var hamburgerBTN = document.querySelector(".header__hamburger-btn");
var sidebar = document.querySelector(".sidebar");
var sidebarCloseBTN = document.querySelector(".sidebar--mobile__close-btn");

hamburgerBTN.addEventListener('click', () => {
    console.log('hambg-btn');
    sidebar.classList.add('sidebar--mobile');
    sidebarCloseBTN.classList.remove('is-none');
});

sidebarCloseBTN.addEventListener('click', () => {
    sidebar.classList.remove('sidebar--mobile');
    sidebarCloseBTN.classList.add('is-none');
});
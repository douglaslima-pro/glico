var hamburgerBTN = document.querySelector(".header__hamburger-btn");
var sidebar = document.querySelector(".sidebar");
var sidebarCloseBTN = document.querySelector(".sidebar--mobile__close-btn");

hamburgerBTN.addEventListener('click', () => {
    sidebar.classList.add('sidebar--mobile');
    sidebarCloseBTN.classList.remove('is-none');
});

sidebarCloseBTN.addEventListener('click', () => {
    sidebar.classList.remove('sidebar--mobile');
    sidebarCloseBTN.classList.add('is-none');
});
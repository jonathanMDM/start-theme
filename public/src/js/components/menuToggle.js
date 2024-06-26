const menuResponsive = document.querySelector('#innerMenu'),
    menuToggle = document.querySelector('#primaryNavigation'),
    handlerToggleContainer = document.querySelector('#handlerToggle'),
    body = document.querySelector('body'),
    handlerToggle = handlerToggleContainer.querySelector('#handlerToggle  input'),
    menuWrapper = menuResponsive.querySelector('#menuMovil');

const windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
if (windowWidth < 1024) {
    menuWrapper.appendChild(menuToggle);
} else {
    menuResponsive.contains(menuToggle) && menuWrapper.removeChild(menuToggle);
}
handlerToggle.addEventListener('click', () => {
    menuResponsive.classList.toggle('active');
    handlerToggleContainer.classList.toggle('active');
    body.classList.toggle('hidden');
});
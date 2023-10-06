const toggleButton = document.getElementById('navi_button');
const navbar = document.querySelector('.navibar');

toggleButton.addEventListener('click', () => {
    if (navbar.style.left === '0px' || navbar.style.left === '') {
        navbar.style.left = '-300px';
    } else {
        navbar.style.left = '0px'; 
    }
});
var dropdown = document.querySelector('#dropdown');
var nav_ul = document.querySelector('#navbar-ul');

dropdown.addEventListener('click', () => {
    if (nav_ul.classList.contains('on')) {
        nav_ul.classList.remove('on');
    } else {
        nav_ul.classList.add('on');
    };
});
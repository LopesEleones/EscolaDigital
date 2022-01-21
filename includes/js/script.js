const splash = document.querySelector(".splash");

document.addEventListener('DOMContentLoaded', (e)=>{
    setTimeout(()=>{
        splash.classList.add('display-none');
    }, 2000);
})


window.onload=function() {

const btnMenu = document.getElementById('btn-menu');

function toggleMenu(event) {
    if (event.type === 'touchstart') {
        event.preventDefault();
    }
    const nav = document.getElementById('nav');
    nav.classList.toggle('active');
    const active = nav.classList.contains('active');
    event.currentTarget.setAttribute('aria-expanded', active);
    if (active) {
        event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
    } else {
        event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
    }
}

btnMenu.addEventListener('click', toggleMenu);
btnMenu.addEventListener('touchstart', toggleMenu);

}

document.getElementById("imagem").onchange = function() {
    document.getElementById('form').submit();
}

let input = document.getElementById('series')

input.addEventListener('input', function(evt) {
    let selector = document.querySelector('option[value="'+this.value+'"]')
    if ( selector ) {
        this.form.addEventListener('submit', function(evt) {
            input.value = selector.getAttribute('data-value')
        }, false)
    }
}, false)
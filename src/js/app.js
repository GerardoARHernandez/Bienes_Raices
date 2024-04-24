document.addEventListener('DOMContentLoaded', function(){
 
    EventListeners();
    darkMode();
})

function darkMode() {
    const preferirDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(preferirDarkMode.matches);

    if (preferirDarkMode.matches) {
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    preferirDarkMode.addEventListener('change', function () {
        if (preferirDarkMode.matches) {
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    })

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode')
    })
}

function EventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive)
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
//     if (navegacion.classList.contains('mostrar')) {
//         navegacion.classList.remove('mostrar');
//     }else{
//         navegacion.classList.add('mostrar');
//     }
}
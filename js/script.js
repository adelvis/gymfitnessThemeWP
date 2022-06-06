jQuery(document).ready($ => {

    $('.site-header .menu-principal .menu').slicknav({
        label: '',
        appendTo: '.site-header'
    });

    // BxSlider
    if ($('.list - testimonial').length > 0) {

        $('.list-testimonial').bxSlider({
            auto: true,
            mode: 'fade',
            controls: false
        });


    }



    // Mapa Leaflet

    const lat = document.querySelector('#lat').value,
        lng = document.querySelector('#lng').value,
        address = document.querySelector('#address').value;

    if (lat && lng && address) {

        var map = L.map('mapa').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup(address)
            .openPopup();
    }

});

// Agregar la posiciòn fija la barra de navegacion al hacer scroll

window.onscroll = () => {
    const scroll = window.scrollY;

    const headerNav = document.querySelector('.nav-bar');

    const documentBody = document.querySelector('body');


    // si la cantidad de la variable scroll es mayor a, agrega una clase

    if (scroll > 300) {
        headerNav.classList.add('fixed-top');

        documentBody.classList.add('ft-active');
    } else {
        headerNav.classList.remove('fixed-top');

        documentBody.classList.remove('ft-active');
    }


}

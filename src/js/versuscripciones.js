const verBtn = document.querySelector('#listar-hist');
const historial = document.querySelector('#historial');
const verServicios = document.querySelector('#listar-servicio');
const nuevoServicio = document.querySelector('#nuevo-servicio');
const servicioLista = document.querySelector('#listado-servicios');
const cuenta = document.querySelector('#ver-cuenta');
const detalleBtn = document.querySelector('#cuenta-btn');

document.addEventListener('click', (e) =>{

    

    if(e.target.id === 'listar-hist'){
        if(!servicioLista.classList.contains('search-results_hidden')) {
            servicioLista.classList.toggle('search-results_hidden');
        }
        if(!cuenta.classList.contains('search-results_hidden')) {
            cuenta.classList.toggle('search-results_hidden');
        }
        historial.classList.toggle('search-results_hidden');


    }
    if(e.target.id === 'listar-servicio' || e.target.id === 'nuevo-servicio'){
        if(!historial.classList.contains('search-results_hidden')) {
            historial.classList.toggle('search-results_hidden');
        }
        if(!cuenta.classList.contains('search-results_hidden')) {
            cuenta.classList.toggle('search-results_hidden');
        }
        servicioLista.classList.toggle('search-results_hidden');

    }
    if(e.target.id === 'cuenta-btn'){
        if(!historial.classList.contains('search-results_hidden')) {
            historial.classList.toggle('search-results_hidden');
        }
        if(!servicioLista.classList.contains('search-results_hidden')) {
            servicioLista.classList.toggle('search-results_hidden');
        }

        cuenta.classList.toggle('search-results_hidden');

    }

    

});
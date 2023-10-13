const locateBtn = document.querySelector('#locate');

//Declaro las variables que contienen los inputs del form
const inputLat = document.querySelector('#latitud');
const inputLong = document.querySelector('#longitud');
const autoPais = document.querySelector('#pais');
const autoDepartamento = document.querySelector('#departamento');
const autoCiudad = document.querySelector('#ciudad');



//Obtener los valores de Pais, Depto y ciudad de nominatin.
//crear cookie con las posicion del cliente
//Cargar los values de los inputs con su dato correspondiente
async function getData(){
    const coords = await getCoords();
    inputLat.value = coords.latitud;
    inputLong.value = coords.longitud;


    try {
        const resp = await fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${coords.latitud}&lon=${coords.longitud}`);
        const json = await resp.json();
        autoPais.value = json['address']['country'];

        autoDepartamento.value = json['address']['state'];
        autoCiudad.value = json['address']['city'];

        return json['address'];
    } catch (error) {
        console.log('error getting data');
        return 'error';

    }
}

//Obtener las coordenadas del cliente.
function getCoords(){
    return new Promise((resolve, reject) =>{
        navigator.geolocation.getCurrentPosition((pos) => {
            resolve({latitud:pos.coords.latitude, longitud: pos.coords.longitude});
        },
        (err) =>{reject({error:'Error localizacion'});},
        {enableHighAccuracy: true});});
    }


//Pedor la geolocalizacion del cliente onload.

locateBtn.addEventListener('click', (e) =>{
    e.preventDefault();
    getData();

});


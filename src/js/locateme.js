//Declaro las variables que contienen los inputs del form
const inputCoords = document.querySelector('#my-coords');
const autoPais = document.querySelector('#pais');
const autoDepartamento = document.querySelector('#departamento');
const autoCiudad = document.querySelector('#ciudad');

//Obtener los valores de Pais, Depto y ciudad de nominatin.
//crear cookie con las posicion del cliente
//Cargar los values de los inputs con su dato correspondiente
async function getData(){
    const coords = await getCoords();
    inputCoords.value = JSON.stringify(coords);
    let newcookie = `mycoords=${JSON.stringify(coords)}; max-age=3600; SameSite=lax; Secure`;
    document.cookie = newcookie;
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
    };     


//Pedor la geolocalizacion del cliente onload.
window.addEventListener('load', (e) =>{
    getData();
  
});


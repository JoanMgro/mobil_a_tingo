

const inputRadio = document.querySelector('#radio');

//Declaro las variables que contienen los inputs del form
const inputLat = document.querySelector('#lat');
const inputLong = document.querySelector('#long');


function addCookie(cookie, data){
    let newcookie = `${cookie}=${data}; max-age=3600; SameSite=lax; Secure`;
    document.cookie = newcookie;
    console.log('dentro de function', document.cookie);

}

//Cargar los values de los inputs con su dato correspondiente
async function getData(){
    const coords = await getCoords();
    inputLat.value = coords.latitud; //JSON.stringify(coords);
    inputLong.value = coords.longitud;
   
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



inputRadio.addEventListener('input', (e)=>{
    e.preventDefault();
    getData();
    
});


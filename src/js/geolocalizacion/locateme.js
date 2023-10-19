const locateBtn = document.querySelector('#locate');

const inputRadio = document.querySelector('#radio');

//Declaro las variables que contienen los inputs del form
const inputLat = document.querySelector('#lat');
const inputLong = document.querySelector('#long');
const autoPais = document.querySelector('#pais');
const autoDepartamento = document.querySelector('#departamento');
const autoCiudad = document.querySelector('#ciudad');

function addCookie(cookie, data){
    let newcookie = `${cookie}=${data}; max-age=3600; SameSite=lax; Secure`;
    document.cookie = newcookie;
    console.log('dentro de function', document.cookie);

}

//Obtener los valores de Pais, Depto y ciudad de nominatin.
//crear cookie con las posicion del cliente
//Cargar los values de los inputs con su dato correspondiente
async function getData(isComplete){
    const coords = await getCoords();
    inputLat.value = coords.latitud; //JSON.stringify(coords);
    inputLong.value = coords.longitud;
    addCookie('latitud',inputLat.value);
    addCookie('longitud',inputLong.value);
    // let newcookie = `mycoords=${inputCoords.value}; max-age=3600; SameSite=lax; Secure`;
    // document.cookie = newcookie;
    if(isComplete)
    {
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
    getData(true);

});

inputRadio.addEventListener('change', (e)=>{
    e.preventDefault();
    getData(false);
    
});

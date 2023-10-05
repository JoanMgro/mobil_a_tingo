const arrayBarrio = JSON.parse(localStorage.Barrios);

const barrio = document.querySelector('#barrio');

let inputData = '';
let match=[];
const iType = 'deleteContentBackward';

barrio.addEventListener('input', (e)=>{    
  
    //Asignando el valor de la tecla a variable inputData, si es retroceso este valor es null,
    //se borra el ultimo valor de inputData.
    inputData  = e.data ? (inputData  + e.data) : inputData.slice(0, -1);
    //asigno el valor filtrado de arrayBarrio a match
    match = arrayBarrio.filter((barrio) => inputData.toLowerCase().localeCompare(barrio.toLowerCase().slice(0, inputData.length)) == 0);
    //asigno el valor de la opcion al value
    e.target.value = (match.length === 1 && e.inputType !== iType) ? match[0] : inputData;

})
const arraypaises = JSON.parse(localStorage.Paises);
const pais = document.querySelector('#pais');
const depto = document.querySelector('#departamento');

let inputData = '';
let match=[];
const iType = 'deleteContentBackward';



pais.addEventListener('input', (e)=>{
    
    
    //Asignando el valor de la tecla a variable inputData, si es retroceso este valor es null,
    //se borra el ultimo valor de inputData.
    inputData  = e.data ? (inputData  + e.data) : inputData.slice(0, -1);
   //asigno el valor filtrado de arrayPaises a match
    match = arraypaises.filter((pais) => inputData.toLowerCase().localeCompare(pais.toLowerCase().slice(0, inputData.length)) == 0);
   
    e.target.value = (match.length === 1 && e.inputType !== iType) ? match[0] : inputData;
    
    
    

})
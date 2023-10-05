const arrayDepto = JSON.parse(localStorage.Departamentos);

const depto = document.querySelector('#departamento');

let inputData = '';
let match=[];
const iType = 'deleteContentBackward';



depto.addEventListener('input', (e)=>{    
  
    //Asignando el valor de la tecla a variable inputData, si es retroceso este valor es null,
    //se borra el ultimo valor de inputData.
    inputData  = e.data ? (inputData  + e.data) : inputData.slice(0, -1);
   //asigno el valor filtrado de arrayDepto a match
    match = arrayDepto.filter((depto) => inputData.toLowerCase().localeCompare(depto.toLowerCase().slice(0, inputData.length)) == 0);
  //asigno el valor de la opcion al value
    e.target.value = (match.length === 1 && e.inputType !== iType) ? match[0] : inputData;

})
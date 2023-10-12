const pais = document.querySelector('#pais');
const depto = document.querySelector('#departamento');
const ciudad = document.querySelector('#ciudad');

function setRequired(field){

    if(!field.hasAttribute('required'))field.setAttribute('required','');

}

function removeRequired(field){
    if(field.hasAttribute('required'))field.removeAttribute('required');

}

depto.addEventListener('input', (e)=>{
    setRequired(pais);
});

ciudad.addEventListener('input', (e)=>{
    setRequired(pais);
    setRequired(depto);
    if(!ciudad.value)removeRequired(depto);
});

barrio.addEventListener('input', (e)=>{
    setRequired(pais);
    setRequired(depto);
    setRequired(ciudad);

    if(!barrio.value){
        removeRequired(ciudad);
    }
    
});

const verBtn = document.querySelector('#listar-hist');
const historialSection = document.querySelector('#historial');

const verServicios = document.querySelector('#listar-servicio');
const nuevoServicio = document.querySelector('#nuevo-servicio');
const servicioLista = document.querySelector('#listado-servicios');

const cuenta = document.querySelector('#detalle-cuenta');
const cuentaBtn = document.querySelector('#cuenta-btn');

const paragrap = `
Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Donec metus dui, cursus a iaculis nec, faucibus 
et magna. Etiam sit amet arcu congue, suscipit ante ut, 
dignissim nunc. Cras euismod odio eu commodo posuere. 
Aenean tellus arcu, malesuada interdum nulla non, 
faucibus interdum neque. Ut cursus ipsum a risus iaculis faucibus. 
Donec id hendrerit urna. Ut eget auctor quam, posuere venenatis eros.
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent 
luctus convallis sem, in porttitor purus. Nulla eget feugiat nisl.`;

function isClosed(element){
    return element.classList.contains('main__section_hidden');
}

function closeElement(element){
    if(!isClosed(element)){
        element.classList.add('main__section_hidden');
        element.removeChild(document.querySelector('#newnode'));
    }
    

}

function openElement(element){
    element.classList.remove('main__section_hidden');

}

function newfragment(element){
    const fragment = document.createDocumentFragment(); 
    const newnode = document.createElement('p');
    newnode.innerText = paragrap;
    newnode.id='newnode';
        
    fragment.appendChild(newnode);
    element.appendChild(fragment);

}

verBtn.addEventListener('click', (e) =>{
    e.preventDefault();

    closeElement(servicioLista);
    closeElement(cuenta);

    if(isClosed(historialSection)){

        
        newfragment(historialSection);
        openElement(historialSection);
        
    }
    else{
        closeElement(historialSection);        
    }
    

});

verServicios.addEventListener('click', (e) =>{
    e.preventDefault();
    
    closeElement(historialSection);
    closeElement(cuenta);
    

    if(isClosed(servicioLista)){
        
        newfragment(servicioLista);
        openElement(servicioLista);
        
    }
    else{
        closeElement(servicioLista);        
    }
    

});

nuevoServicio.addEventListener('click', (e) =>{
    e.preventDefault();
    
    closeElement(historialSection);
    closeElement(cuenta);
    
    if(isClosed(servicioLista)){
        
        newfragment(servicioLista);
        openElement(servicioLista);
        
    }
    else{
        closeElement(servicioLista);        
    }
    

});

cuentaBtn.addEventListener('click', (e) =>{
    e.preventDefault();
    
    closeElement(historialSection);
    closeElement(servicioLista);
    
    if(isClosed(cuenta)){
        
        newfragment(cuenta);
        openElement(cuenta);
        
    }
    else{
        closeElement(cuenta);        
    }
    

});
const buscarBtn = document.querySelector('#btn-buscar-servicio');
const resultados = document.querySelector('#resultados');

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

buscarBtn.addEventListener('click', (e) =>{
    e.preventDefault();

    
    if(isClosed(resultados)){

        
        newfragment(resultados);
        openElement(resultados);
        
    }
    else{
        closeElement(resultados);        
    }
    

});
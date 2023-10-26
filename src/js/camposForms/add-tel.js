const addBtn = document.querySelector('#agregar-tel');

const currentNodes = document.querySelector('#telf-container');

const currTel = document.querySelector('#tel-0');








addBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    const fragment = document.createDocumentFragment();
    console.log(currentNodes.children.length);
    
    let innerCount=1;
    const newTel= currTel.cloneNode(true);
    
    let children = currentNodes.children.length;
    
    newTel.id = 'tel-' + children;
    for(const node of newTel.children){
        if(node.nodeName == 'SELECT') 
        {
            node.id = 'tel_tipo' + '-' + children;

        }
        if(node.nodeName == 'INPUT') node.id = 'tel_num' + '-' + children;
        node.value = '';
        // node.setAttribute('name', node.id);
        node.removeAttribute('required');
        innerCount+=1;        
        if(node.hasAttribute('for'))node.setAttribute('for', newTel.id + '-' + innerCount);
    }

    fragment.appendChild(newTel);    
    currentNodes.appendChild(fragment);
    
     

});





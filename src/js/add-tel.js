const addBtn = document.querySelector('#agregar-tel');

const currentNodes = document.querySelector('#telf-container');

const currTel = document.querySelector('#t-0');



addBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    const fragment = document.createDocumentFragment();
    console.log(currentNodes.children.length);
    
    let innerCount=0;
    const newTel= currTel.cloneNode(true);

    newTel.id = 't-' + (currentNodes.children.length);
    for(const node of newTel.children){
        node.id = newTel.id + '-' + innerCount;
        innerCount+=1;        
        if(node.hasAttribute('for'))node.setAttribute('for', newTel.id + '-' + innerCount);
    }

    fragment.appendChild(newTel);    
    currentNodes.appendChild(fragment);



    // for(const node of currentNodes.children){
        
        
    //     console.log(node);
    //     fragment.appendChild(node);        
        
    //     count+=1;
    // }
   


  

});



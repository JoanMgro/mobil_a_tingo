document.addEventListener('click', (e)=>{

    

    if(e.target.dataset.controller == 'mostrar')
    {
       
        document.querySelector('#modal').classList.toggle('modal_hidden');       

        
    }


});


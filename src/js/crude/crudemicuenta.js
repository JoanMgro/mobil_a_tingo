document.addEventListener('input', (e) =>{


        if(e.target.nodeName == 'INPUT' || e.target.nodeName == 'TEXTAREA')
        {
            document.querySelector('#actualizar').removeAttribute('disabled', '');
        }
        

  
    

});

document.addEventListener('click', (e) => {
    
    
    if(e.target.id == 'actualizar')
    {
        document.querySelector('#controller').value = 'actualizar';
        document.querySelector('#cuentareg').submit();
    }
    
    

    if(e.target.id == 'eliminar') 
    {
        document.querySelector('#controller').value = 'eliminar';
        document.querySelector('#cuentareg').submit();
    }
   
});


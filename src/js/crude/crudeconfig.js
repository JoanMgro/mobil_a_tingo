document.addEventListener('input', (e) =>{


    if(e.target.nodeName == 'INPUT')
    {
        document.querySelector('#btnSub').removeAttribute('disabled', '');
    }



});

document.addEventListener('click', (e) => {


if(e.target.value == 'Actualizar')
{
    document.querySelector('#controller').value = 'actualizarConfig';
    document.querySelector('#cuentareg').submit();
}

if(e.target.value == 'Crear')
{
    document.querySelector('#controller').value = 'crearConfig';
    document.querySelector('#cuentareg').submit();
}


});



document.addEventListener('change', (e) => {
    
if(e.target.type == 'checkbox')
{
    
    e.target.value = (parseInt(e.target.value)) ? '0' : '1';
    console.log(e.target); 

    
}


 
});


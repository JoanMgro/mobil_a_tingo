document.addEventListener('input', (e) =>{


    if(e.target.nodeName == 'TEXTAREA')
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




});


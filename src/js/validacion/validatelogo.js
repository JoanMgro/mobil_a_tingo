const logoInput = document.querySelector('#logo');
const allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
const maxsize = 1024;

logoInput.addEventListener('change', (e) => {

    if(!allowedTypes.includes(logoInput.files.item(0).type))
    {
        alert('Archivo es del tipo incorrecto');
        logoInput.value = '';

    }
    if(Math.round(logoInput.files.item(0).size/1024) > maxsize)
    {
        alert(`Tamaño de archivo execede limite de ${maxsize} Kbytes`);
        logoInput.value = '';
    }
    
   
});





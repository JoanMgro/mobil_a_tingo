
document.addEventListener('click', (e) => {

    if(e.target.id.split('-')[0] === 'verdetalle')
    {

        e.target.innerText = e.target.innerText === 'Ver Detalle' ? 'Ocultar Detalle' : 'Ver Detalle';
        document.querySelector(`#${'detalle-' + e.target.id.split('-')[1]}`).classList.toggle('block_hidden');

    }
    if(e.target.id.split('-')[0] === 'comprar')
    {
        if(e.target.dataset.carrito == 1)
        {
            alert('Su carrito ya posee una suscripcion, esta sera reemplazada por su seleccion actual');
        }
      
        const httpRequest = new XMLHttpRequest();
    
        // httpRequest.open('POST', '../../controllers/cadminplanes.php', true);
        httpRequest.open('POST', '../home.php?pg=14', true);
        httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        httpRequest.onload = () =>{
        if(httpRequest.status === 200)
        {
            alert('Suscripcion Cargada a Carrito');
            window.location='../home.php?pg=14';
        }
        else
        {
            alert('No se pudo cargar a carrito');
        }
        }
    
        httpRequest.send(`controller=carrito&id_plan=${encodeURIComponent(e.target.dataset.id)}&nom_plan=${encodeURIComponent(e.target.dataset.nom)}&valor_plan=${encodeURIComponent(e.target.dataset.val)}&dias_vigencia=${encodeURIComponent(e.target.dataset.vigen)}`);
        
    }
    


});
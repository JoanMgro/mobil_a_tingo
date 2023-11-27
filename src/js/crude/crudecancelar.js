
document.addEventListener('click', (e) => {

    if(e.target.id.split('-')[0] === 'cancelar')
    {
        const httpRequest = new XMLHttpRequest();
    
        httpRequest.open('POST', '../../controllers/cadminsuscripciones.php', true);
        httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        httpRequest.onload = () =>{
        console.log(httpRequest.status);
        if(httpRequest.status == 200)
        {
            window.location='../home.php?pg=10';
        }
        
        }
        // httpRequest.send(JSON.stringify(payload));
            
        httpRequest.send(`controller=cancelar&id_suscripcion=${encodeURIComponent(e.target.id.split('-')[1])}`);
        
       

    }
    
   

});
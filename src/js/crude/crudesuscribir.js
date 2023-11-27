

document.addEventListener('click', (e) => {
    

    if(e.target.id === 'comprar')
    {
        const httpRequest = new XMLHttpRequest();
        
        httpRequest.open('POST', '../home.php?pg=19', true);
        httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        httpRequest.onload = () =>{
            console.log(httpRequest.status);
            if(httpRequest.status === 200)
            {
                window.location='../home.php?pg=19';
            }
            
        }
        // httpRequest.send(JSON.stringify(payload));
            
        httpRequest.send(`controller=comprar&empresa=${encodeURIComponent(e.target.dataset.empresa)}&id_plan=${encodeURIComponent(e.target.dataset.plan)}&dias_vigencia=${encodeURIComponent(e.target.dataset.vigencia)}`);
        

    }
    if(e.target.id === 'borrar')
    {
        const httpRequest = new XMLHttpRequest();
    
        httpRequest.open('POST', '../home.php?pg=19', true);
        httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        httpRequest.onload = () =>{
        console.log(httpRequest.status);
            if(httpRequest.status === 200)
            {
                window.location='../home.php?pg=10';
            }
        }
        // httpRequest.send(JSON.stringify(payload));
            
        httpRequest.send(`controller=borrarcarrito`);


    }
    
    

});


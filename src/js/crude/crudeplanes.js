document.addEventListener('click', (e) => {



    if(e.target.id.split('-')[0] === 'eliminar')
    {
        // const payload = controller: e.target.id.split('-')[0], pagid: parseInt(e.target.id.split('-')[1])}
        const httpRequest = new XMLHttpRequest();
        httpRequest.open('POST', '../../controllers/cadminplanes.php', true);
        httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        httpRequest.onload = () =>{
        console.log(httpRequest.status);
        }
        // httpRequest.send(JSON.stringify(payload));
        
       httpRequest.send(`controller=eliminar&id_plan=${encodeURIComponent(e.target.id.split('-')[1])}`);
        location.reload();
    }
    
    
    if(e.target.id.split('-')[0] === 'actualizar')
    {
        const object = {};
        for(const child of e.target.parentNode.children)
        {
            if((child.nodeName === 'INPUT' || child.nodeName === 'TEXTAREA' )&& child.type !== 'button')
            {
                Object.defineProperty(object, child.name, {value: encodeURIComponent(child.value)});
            }
     
        }
        console.log(object);
    
       
        const httpRequest = new XMLHttpRequest();
        httpRequest.open('POST', '../../controllers/cadminplanes.php', true);
        httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        httpRequest.onload = () =>{
         console.log(httpRequest.status);
         window.location='../home.php?pg=103';
        }
                
        httpRequest.send(`controller=actualizar&id_plan=${object.id_plan}&nom_plan=${object.nom_plan}&desc_plan=${object.desc_plan}&valor_plan=${object.valor_plan}&dias_vigencia=${object.dias_vigencia}`);
        location.reload();
       
    
    }
    
    
    
    
    });
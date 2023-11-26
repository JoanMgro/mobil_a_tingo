document.addEventListener('click', (e) => {



if(e.target.id.split('-')[0] === 'eliminar')
{
    // const payload = controller: e.target.id.split('-')[0], pagid: parseInt(e.target.id.split('-')[1])}
    const httpRequest = new XMLHttpRequest();
    httpRequest.open('POST', '../../controllers/cadminpag.php', true);
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpRequest.onload = () =>{
    console.log(httpRequest.status);
    }
    // httpRequest.send(JSON.stringify(payload));
    
   httpRequest.send(`controller=eliminar&pagid=${encodeURIComponent(e.target.id.split('-')[1])}`);
    location.reload();
}


if(e.target.id.split('-')[0] === 'actualizar')
{
    const object = {};
    for(const child of e.target.parentNode.children)
    {
        if(child.nodeName === 'INPUT' && child.type !== 'button')
        {
            Object.defineProperty(object, child.name, {value: encodeURIComponent(child.value)});
        }
 
    }
    console.log(object);

   
    const httpRequest = new XMLHttpRequest();
    httpRequest.open('POST', '../../controllers/cadminpag.php', true);
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpRequest.onload = () =>{
     console.log(httpRequest.status);
    }
            
    httpRequest.send(`controller=actualizar&pagid=${object.pagid}&oldid=${object.oldid}&pagarc=${object.pagarc}&pagmen=${object.pagmen}&pagnom=${object.pagnom}&pagord=${object.pagord}`);
    // location.reload();
    window.location='../home.php?pg=10';
   

}




});
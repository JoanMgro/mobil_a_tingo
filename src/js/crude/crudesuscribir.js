const comprarBtn = document.querySelector('#comprar');

comprarBtn.addEventListener('click', () => {
    const plan = document.querySelector('#planSelect').value;
    const vigencia = document.querySelector('#vigencia').value;
    const empresa = document.querySelector('#empresa').value;
    const httpRequest = new XMLHttpRequest();
    
    httpRequest.open('POST', '../../controllers/cadminsuscripciones.php', true);
    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpRequest.onload = () =>{
    console.log(httpRequest.status);
    }
    // httpRequest.send(JSON.stringify(payload));
        
    httpRequest.send(`controller=comprar&id_plan=${encodeURIComponent(plan)}&dias_vigencia=${encodeURIComponent(vigencia)}&empresa=${encodeURIComponent(empresa)}`);
    window.location='../home.php?pg=10';
    // window.location='../home.php?pg=11';

});
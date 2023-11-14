const modalBtn = document.querySelector('#close_modal');
const modalSection= document.querySelector('#modal');

modalBtn.addEventListener('click', ()=>{
    modalSection.classList.toggle('modal_hidden');    

});

document.addEventListener('change', (e)=>{

    console.log(e.target.value.split('-')[2]);

    const checkVal = e.target.value.split('-');
    checkVal[2] = checkVal[2] === 'borrarpagper' ? 'agregarpagper' : 'borrarpagper'; 
    
   


     
     const httpRequest = new XMLHttpRequest();
     httpRequest.open('POST', '../../controllers/cadminperfiles.php', true);
     httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
     httpRequest.onload = () =>{
     console.log(httpRequest.status);
     }
     // httpRequest.send(JSON.stringify(payload));
     
 
 
     httpRequest.send(`controller=${encodeURIComponent(e.target.value.split('-')[2])}&pefid=${encodeURIComponent(e.target.value.split('-')[1])}&pagid=${encodeURIComponent(e.target.value.split('-')[0])}`);





    e.target.value = checkVal.join('-');
});



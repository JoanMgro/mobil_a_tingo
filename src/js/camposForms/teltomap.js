const saveBtn = document.querySelector('#save');
const registerForm = document.querySelector('#registrarse');
const telNodes = document.querySelector('#telf-container');
const numTel = document.querySelector('#num-tel');

const numberMap = new Map();

saveBtn.addEventListener('click', (e) =>{
    e.preventDefault();
    Array.from(telNodes.children).forEach((element, index) => {
        let key = '';
        let value = '';
        Array.from(element.children).forEach((element)=>{
            if(element.nodeName == "SELECT") key = element.value;
            if(element.nodeName == "INPUT") value = element.value;
    
           
        });
        
        numberMap.set(index,Object.fromEntries(new Map([[key, value]])));
                
    });
    numTel.setAttribute('value', JSON.stringify(Object.fromEntries(numberMap)));
    registerForm.submit();
    
    });
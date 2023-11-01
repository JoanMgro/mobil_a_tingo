const inputPage = document.querySelector('#page');
const prevBtn = document.querySelector('#prev');
const nextBtn = document.querySelector('#next');
const totalPages = document.querySelector('#totalpages');
const formPagBuscar = document.querySelector('#pagBuscar');

const upperLimit = totalPages.textContent.split(' ').filter((item) => !isNaN(item))[0];

window.addEventListener('load', () => {
    if((parseInt(inputPage.value) == 1)) prevBtn.setAttribute('disabled','');
    if((parseInt(inputPage.value) == upperLimit)) nextBtn.setAttribute('disabled','');
});

prevBtn.addEventListener('click', (e) =>{

    inputPage.value = parseInt(inputPage.value) -1; 
    if((parseInt(inputPage.value) < 2)) prevBtn.setAttribute('disabled','');
        
    if((parseInt(inputPage.value) < upperLimit)) nextBtn.removeAttribute('disabled'); 
    formPagBuscar.submit();
    

});

nextBtn.addEventListener('click', (e) =>{    
    
    inputPage.value = parseInt(inputPage.value) + 1;
    if((parseInt(inputPage.value) == upperLimit)) nextBtn.setAttribute('disabled','');
    if((parseInt(inputPage.value) > 1)) prevBtn.removeAttribute('disabled');   
    formPagBuscar.submit(); 



});
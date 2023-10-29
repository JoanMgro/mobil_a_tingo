const modalBtn = document.querySelector('#close_modal');
const modalSection= document.querySelector('#modal');

modalBtn.addEventListener('click', ()=>{
    modalSection.classList.toggle('modal_hidden');    

});
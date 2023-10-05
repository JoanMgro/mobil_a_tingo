const hambuMenu = document.querySelector('#hambu-menu');
const hambu = document.querySelector('#hambu');

document.addEventListener('click', (e)=>{

     

    if(!hambuMenu.classList.contains('nav_state_closed')) {
        hambuMenu.classList.replace('nav_state_opened', 'nav_state_closed')
        hambu.classList.replace('menu-btn_state_opened', 'menu-btn_state_closed');
        
        
    }
    else{
        if(e.target.id === 'hambu') {
            hambuMenu.classList.replace('nav_state_closed', 'nav_state_opened');
            hambu.classList.replace('menu-btn_state_closed', 'menu-btn_state_opened');
            
           
            
        }

    }
    
  

});
const loginBtn = document.querySelector('#login');
const inputEmail = document.querySelector('#email');

loginBtn.addEventListener('click', (e) =>{

    e.preventDefault();

    if(inputEmail.value.includes('admin')) document.location = '../../html/admin.html';
    else{
        document.location = '../../html/dasboard.html'

    }



});
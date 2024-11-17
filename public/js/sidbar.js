let chatMenu = document.getElementById('chatButton');
let usersMenu = document.getElementById('usersButton');
let settMenu = document.getElementById('settButton');

chatMenu.onclick = ()=>{
    chatMenu.classList.add('activeMenu');
    usersMenu.classList.remove('activeMenu');
    settMenu.classList.remove('activeMenu');
} 
usersMenu.onclick = ()=>{
    usersMenu.classList.add('activeMenu');
    chatMenu.classList.remove('activeMenu');
    settMenu.classList.remove('activeMenu');
} 
settMenu.onclick = ()=>{
    settMenu.classList.add('activeMenu');
    chatMenu.classList.remove('activeMenu');
    settMenu.classList.remove('activeMenu');
} 
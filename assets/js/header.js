const clickAvatar = document.querySelector('.name-avatar');
const logout = document.querySelector('.logout');
clickAvatar.onclick = function(){
    logout.classList.toggle('block');
}
let psw = document.getElementById('psw');
let eye = document.getElementById('eye');

eye.addEventListener('click', function(){
    if(psw.type === "password"){
        psw.type = "text";
        eye.className = "fa-regular fa-eye";
    }else if(psw.type === "text"){
        psw.type = "password";
        eye.className = "fa-regular fa-eye-slash";
    }
});
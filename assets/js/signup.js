let psw = document.getElementById('psw');
let psw2 = document.getElementById('psw2');
let eye = document.getElementById('eye');
let eye2 = document.getElementById('eye2');

eye.addEventListener('click', function(){
    if(psw.type === "password"){
        psw.type = "text";
        eye.className = "fa-regular fa-eye";
    }else if(psw.type === "text"){
        psw.type = "password";
        eye.className = "fa-regular fa-eye-slash";
    }
})

eye2.addEventListener('click', function(){
    if(psw2.type === "password"){
        psw2.type = "text";
        eye2.className = "fa-regular fa-eye";
    }else if(psw2.type === "text"){
        psw2.type = "password";
        eye2.className = "fa-regular fa-eye-slash";
    }
});

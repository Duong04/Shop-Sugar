let btn1 = document.getElementById('btn1');
let btn2 = document.getElementById('btn2');
let btn3 = document.getElementById('btn3');
let box1 = document.getElementById('box-item');
let box2 = document.getElementById('box-item2');
let box3 = document.getElementById('box-item3');
function clickBtn(x){
    btn1.style.color = 'var(--black-color)';
    btn1.style.backgroundColor = 'var(--white-color)';
    btn2.style.color = 'var(--black-color)';
    btn2.style.backgroundColor = 'var(--white-color)';
    btn3.style.color = 'var(--black-color)';
    btn3.style.backgroundColor = 'var(--white-color)';
    if(x == 1){
        box1.style.display = 'block';
        btn1.style.color = 'var(--white-color)';
        btn1.style.backgroundColor = 'var(--main-color)';
        box2.style.display = 'none';
        box3.style.display = 'none';
    }else if(x ==2){
        box2.style.display = 'block';
        btn2.style.color = 'var(--white-color)';
        btn2.style.backgroundColor = 'var(--main-color)';
        box1.style.display = 'none';
        box3.style.display = 'none';
    }else if(x ==3){
        box3.style.display = 'block';
        btn3.style.color = 'var(--white-color)';
        btn3.style.backgroundColor = 'var(--main-color)';
        box1.style.display = 'none';
        box2.style.display = 'none';
    }
}

window.addEventListener('scroll', function() {
    var scrollToTopButton = document.getElementById('scroll');
    if (document.documentElement.scrollTop > 500) { // Hiển thị nút khi cuộn xuống khoảng 100px
       scrollToTopButton.style.display = 'block';
    } else {
       scrollToTopButton.style.display = 'none';
    }
 });
 
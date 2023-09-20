const btnClick = document.querySelectorAll('.btn-click-item');
const page = document.querySelectorAll('.none');
const tabItem = document.querySelector('.btn-click-item.active');
btnClick.forEach((tab,index) =>{
    tab.onclick = function(){
        document.querySelector('.btn-click-item.active').classList.remove('active');
        document.querySelector('.none.active').classList.remove('active');
        this.classList.add('active');
        page[index].classList.add('active');
    }
} );

window.addEventListener('scroll', function() {
    var scrollToTopButton = document.getElementById('scroll');
    if (document.documentElement.scrollTop > 500) { // Hiển thị nút khi cuộn xuống khoảng 100px
       scrollToTopButton.style.display = 'block';
    } else {
       scrollToTopButton.style.display = 'none';
    }
 });
 
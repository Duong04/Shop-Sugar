const btn = document.querySelector('.btn-view-all button');
let description = document.querySelector('.description');
let before = document.querySelector('.before');

btn.addEventListener('click', () => {
    description.classList.toggle('active');
    
    if (description.classList.contains('active')) {
        before.style.display = 'none';
        btn.innerText = 'Đóng';
    } else {
        before.style.display = 'block';
        btn.innerText = 'Xem thêm';
    }
});
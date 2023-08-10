window.addEventListener('scroll', function() {
    let linkInfo = document.getElementById('link-info-product');
    let div2 = document.querySelectorAll('.div2');
    if (document.documentElement.scrollTop > 400) { 
       linkInfo.style.position = 'fixed';
       linkInfo.style.backgroundColor = 'var(--black-color)';
       document.getElementById('phone').style.paddingTop = '99px';
       div2.forEach(function(element) {
        element.style.color = 'var(--white-color)';
    });
    } else {
       linkInfo.style.position = 'static';
       linkInfo.style.backgroundColor = '#f3f3f3';
       document.getElementById('phone').style.paddingTop = '0';
       div2.forEach(function(element) {
        element.style.color = 'var(--black-color)';
    });
    }
 });


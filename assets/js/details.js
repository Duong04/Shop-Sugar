const btnOpen = document.querySelector('.btn-view-all button');
const btnClose = document.querySelector('.btn-close');
const bodyE = document.querySelector('body');
const viewDescription = document.querySelector('.view-description');
const descriptionAll = document.querySelector('.description-all');

function showDescription(){
    viewDescription.classList.add('open');
    bodyE.style.overflowY = 'hidden';
}

function hiddenDescription(){
    viewDescription.classList.remove('open');
    bodyE.style.overflowY = 'auto';
}

btnOpen.addEventListener('click', showDescription);

btnClose.addEventListener('click', hiddenDescription);

viewDescription.addEventListener('click', hiddenDescription);

descriptionAll.addEventListener('click', (events) => {
    events.stopPropagation();
})

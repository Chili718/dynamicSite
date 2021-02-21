const lightbox = document.getElementById('lightbox');

const x = document.getElementById('closeBox');
//lightbox.id = 'lightbox';
//document.body.appendChild(lightbox);

const images = document.querySelectorAll('.carousel_cell');

//console.log(images);

images.forEach(image => {

  image.firstChild.addEventListener('click',  e => {
    lightbox.classList.add('active');
    const splay = document.createElement('img');
    splay.src = image.firstChild.src;

    while(lightbox.childElementCount >= 2){

      lightbox.removeChild(lightbox.lastChild);

    }

    lightbox.appendChild(splay);

    document.body.classList.add('noScroll');

  });

});

lightbox.addEventListener('click', e => {
  if(e.target !== e.currentTarget) return;

  lightbox.classList.remove('active');

  document.body.classList.remove('noScroll');

});

x.addEventListener('click', e => {
  if(e.target === e.currentTarget){

    lightbox.classList.remove('active');

    document.body.classList.remove('noScroll');

  }

});

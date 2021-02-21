const lightbox = document.createElement('div');
lightbox.id = 'lightbox';
document.body.appendChild(lightbox);

const images = document.querySelectorAll('.carousel_cell');

//console.log(images);

images.forEach(image => {

  image.firstChild.addEventListener('click',  e => {
    lightbox.classList.add('active');
    const splay = document.createElement('img');
    splay.src = image.firstChild.src;

    while(lightbox.firstChild){

      lightbox.removeChild(lightbox.firstChild);

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

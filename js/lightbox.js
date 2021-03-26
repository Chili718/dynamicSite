const x = document.getElementById('closeBox');

var prvs = document.getElementById('prvs');
var nxt = document.getElementById('nxt');
//lightbox.id = 'lightbox';
//document.body.appendChild(lightbox);

const images = document.querySelectorAll('.carousel_cell');

var options = document.querySelector('.carousel-options');
//console.log(images);

images.forEach(image => {

  image.firstChild.addEventListener('click',  e => {
    lightbox.classList.add('active');
    const splay = document.createElement('img');

    var bigger = image.firstChild.src.replace("Min", "");
    bigger = bigger.replace("/min", "");
    //console.log(bigger);
    splay.src = bigger;

    while(lightbox.childElementCount >= 2){

      lightbox.removeChild(lightbox.lastChild);

    }

    lightbox.appendChild(splay);

    document.body.classList.add('noScroll');

    options.style.position = 'fixed';
    options.style.zIndex = '88';
    //options.style.firstChild.removeProperty('bottom');
    prvs.classList.add('botm');
    nxt.classList.add('botm');
    //options.lastChild.classList.add('botm');

    var node = 0;

    for (var i = 0; i < cells.length; i++) {
      if(cells[i].firstChild.src === image.firstChild.src)
      {
          node = i;
          break;
      }
    }


    selectedIndex = node;

    //console.log(selectedIndex);

    changeCarousel();

  });

});

lightbox.addEventListener('click', e => {
  if(e.target !== e.currentTarget) return;

  lightbox.classList.remove('active');

  document.body.classList.remove('noScroll');

  options.style.position = 'relative';
  options.style.zIndex = '3';
  prvs.classList.remove('botm');
  nxt.classList.remove('botm');


});

x.addEventListener('click', e => {
  if(e.target === e.currentTarget){

    lightbox.classList.remove('active');

    document.body.classList.remove('noScroll');

    options.style.position = 'relative';
    options.style.zIndex = '3';
    prvs.classList.remove('botm');
    nxt.classList.remove('botm');

  }

});

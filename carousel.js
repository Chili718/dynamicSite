var carousel = document.querySelector('.carousel');

var cells = carousel.querySelectorAll('.carousel_cell');

var cellCount = 9;

var selectedIndex = 0;

var cellWidth = carousel.offsetWidth;

var cellHeight = carousel.offsetHeight;

var isHorizontal = true;

var rotateFn = isHorizontal ? 'rotateY' : 'rotateX';

var radius, theta;

var lightbox = document.getElementById('lightbox');

function rotateCarousel(){

  var angle = theta * selectedIndex * -1;

  carousel.style.transform = 'translateZ(' + -radius + 'px) ' + rotateFn +'(' + angle + 'deg)';

}
////////////////////////////////////////////////////////////
var prevButton = document.querySelector('.previous');

var prevN = 0;

prevButton.addEventListener('click', function(){


  if(lightbox.classList.contains('active'))
  {

    var lit = lightbox.lastChild.src;

    var node = 0;
    var i = 0;

    //look into making this a for loop
    cells.forEach(cell => {

        if(cell.firstChild.src === lit)
        {
          if((i-1) != -1)
          {
            node = i-1;
          }else{
            node = cells.length-1;
          }
        }
        else
        {
            i++;
        }

    });

    lit = cells[node].firstChild.src;
    //console.log(node);
    const splay = document.createElement('img');
    splay.src = lit;

    while(lightbox.childElementCount >= 2){

      lightbox.removeChild(lightbox.lastChild);

    }

    lightbox.appendChild(splay);


  }

    selectedIndex--;


  //console.log(selectedIndex + "Prev");

  changeCarousel();

  prevN = selectedIndex-1;

});
//////////////////////////////////////////////////////////////
var nextButton = document.querySelector('.next');

nextButton.addEventListener('click', function(){

  if(lightbox.classList.contains('active'))
  {

    var lit = lightbox.lastChild.src;

    var node = 0;
    var i = 0;

    //look into making this a for loop
    cells.forEach(cell => {

        if(cell.firstChild.src === lit)
        {
          if((i+1) > cells.length-1){
            node = 0;
          }else{
            node = i+1;
          }
        }
        else
        {
            i++;
        }

    });

    lit = cells[node].firstChild.src;
    //console.log(node);
    const splay = document.createElement('img');
    splay.src = lit;

    while(lightbox.childElementCount >= 2){

      lightbox.removeChild(lightbox.lastChild);

    }

    lightbox.appendChild(splay);


  }

    selectedIndex++;


  changeCarousel();
  //console.log(selectedIndex + "Next");
  prevN = selectedIndex -1;

});

function changeCarousel(){

  theta = 360 / cellCount;

  var cellSize = isHorizontal ? cellWidth : cellHeight;

  radius = Math.round( (cellSize / 2) / Math.tan( Math.PI / cellCount ) );

  for( var i = 0; i < cells.length; i++){

    var cell = cells[i];

    if(i < cellCount){

      cell.style.opacity = 1;

      var cellAngle = theta * i;

      cell.style.transform = rotateFn + '(' + cellAngle + 'deg); translateZ(' +
      radius + 'px);';

    }else{

      cell.style.opacity = 0;

      cell.style.transform = 'none';

    }

  }

  rotateCarousel();

}

changeCarousel();

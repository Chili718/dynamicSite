var carousel = document.querySelector('.carousel');

var cells = carousel.querySelectorAll('.carousel_cell');

var cellCount = 9;

var selectedIndex = 0;

var cellWidth = carousel.offsetWidth;

var cellHeight = carousel.offsetHeight;

var isHorizontal = true;

var rotateFn = isHorizontal ? 'rotateY' : 'rotateX';

var radius, theta;

function rotateCarousel(){

  var angle = theta * selectedIndex * -1;

  carousel.style.transform = 'translateZ(' + -radius + 'px) ' + rotateFn +'(' + angle + 'deg)';

}

var prevButton = document.querySelector('.previous');

prevButton.addEventListener('click', function(){

  selectedIndex--;

  changeCarousel();

});

var nextButton = document.querySelector('.next');

nextButton.addEventListener('click', function(){

  selectedIndex++;

  changeCarousel();

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

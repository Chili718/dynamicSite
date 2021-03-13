var lightbox = document.getElementById('lightbox');

const x = document.getElementById('closeBox');

var previous = document.getElementById("viewPrevious");

var next = document.getElementById("viewNext");

var boxes = document.querySelector(".grid").children;

var lastVal = "";

previous.addEventListener('click', function(){


    var lit = lightbox.lastChild.src;

    var node = 0;

    for (var i = 0; i < boxes.length; i++) {
      if(boxes[i].lastChild.src === lit)
      {
        if((i-1) != -1)
        {
          node = i-1;
        }else{
          node = boxes.length-1;
        }
        break;
      }
    }

    boxes[node].scrollIntoView();
    //change the images title
    lightbox.lastChild.previousSibling.innerHTML = boxes[node].firstChild.innerHTML;

    lit = boxes[node].lastChild.src;
    //console.log(node);
    const splay = document.createElement('img');
    splay.src = lit;

    lightbox.removeChild(lightbox.lastChild);

    lightbox.appendChild(splay);

});

next.addEventListener('click', function(){

    var lit = lightbox.lastChild.src;

    var node = 0;

    for (var i = 0; i < boxes.length; i++) {
      if(boxes[i].lastChild.src === lit)
      {
        if((i+1) > boxes.length-1){
          node = 0;
        }else{
          node = i+1;
        }
        break;
      }
    }

    boxes[node].scrollIntoView();
    //change the images title
    lightbox.lastChild.previousSibling.innerHTML = boxes[node].firstChild.innerHTML;

    lit = boxes[node].lastChild.src;

    const splay = document.createElement('img');
    splay.src = lit;

    lightbox.removeChild(lightbox.lastChild);

    lightbox.appendChild(splay);


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

function deleteIm(){

  //var xhr = new XMLHttpRequest();
  var data = lightbox.lastChild.src;

  var path = data.substring(data.lastIndexOf("photoshopWork"), data.length);

  //console.log(path);

  $.ajax({

    url:'php/delete.php',
    type:'post',
    data:{
      path: path
    },
    success:function(php_result){

      //alert(php_result);

      lightbox.classList.remove('active');
      document.body.classList.remove('noScroll');

      //document.querySelectorAll('.grid div').innerHTML = "";
      document.querySelector('.grid').innerHTML = "";

      $.get( "php/view.php", function( data ) {
          $('.grid').html(data);

          addLB();
      });

    },
    error: function(xhr){

      //console.log(xhr.responseText);

    }

  });

}

function updateIM(){

  var data = lightbox.lastChild.src;

  var path = data.substring(data.lastIndexOf("photoshopWork"), data.length);

  var name = lightbox.lastChild.previousSibling.innerHTML;

  if(name != lastVal){

    $.ajax({

      url:'php/update.php',
      type:'post',
      data:{
        path: path,
        name: name
      },
      success:function(php_result){

        //alert(php_result);
        /*
        lightbox.classList.remove('active');
        document.body.classList.remove('noScroll');
        */
        //document.querySelectorAll('.grid div').innerHTML = "";
        document.querySelector('.grid').innerHTML = "";

        while(document.querySelector('.grid').firstChild){

          document.querySelector('.grid').removeChild(document.querySelector('.grid').firstChild);

        }

        $.get( "php/view.php", function( data ) {
            $('.grid').html(data);

            addLB();
        });
      },
      error: function(xhr){

        //console.log(xhr.responseText);

      }

    });

  }

}

function checkChange(){

  lastVal = lightbox.lastChild.previousSibling.innerHTML;

  //console.log(lastVal);

}

function addLB(){
  var images = document.querySelectorAll(".psW");

  images.forEach(image => {

    image.addEventListener('click', e => {

      //must clone node or else when we remove the child on close it will remove
      //the actual sibling node
      var title = image.previousSibling.cloneNode(true);//.textContent;

      lightbox.classList.add('active');

      const splay = document.createElement('img');
      splay.src = image.src;



      if(lightbox.contains(document.getElementById('deleteBtn'))){

        while(lightbox.childElementCount >= 6){

          lightbox.removeChild(lightbox.lastChild);
          lightbox.removeChild(lightbox.lastChild);

        }

        title.contentEditable = 'true';
        title.addEventListener("focus", checkChange);
        //title.addEventListener("blur", updateIM);
        title.addEventListener("blur", updateIM);

      }else {
        while(lightbox.childElementCount >= 5){

          lightbox.removeChild(lightbox.lastChild);
          lightbox.removeChild(lightbox.lastChild);

        }
      }

      title.classList.add('viewTitle');


      lightbox.appendChild(title);

      lightbox.appendChild(splay);

      document.body.classList.add('noScroll');


    });

  });

}

addLB();

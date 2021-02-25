var images = document.querySelectorAll(".psW");

var lightbox = document.getElementById('lightbox');

const x = document.getElementById('closeBox');

//console.log(images);

images.forEach(image => {

  image.addEventListener('click', e => {

    //must clone node or else when we remove the child on close it will remove
    //the actual sibling node
    var title = image.previousSibling.cloneNode(true);//.textContent;

    lightbox.classList.add('active');

    const splay = document.createElement('img');
    splay.src = image.src;

    while(lightbox.childElementCount >= 4){

      lightbox.removeChild(lightbox.lastChild);
      lightbox.removeChild(lightbox.lastChild);

    }

    title.classList.add('viewTitle');

    lightbox.appendChild(title);

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

function deleteIm(){

  //var xhr = new XMLHttpRequest();
  var data = lightbox.lastChild.src;
  console.log(data);
  /*
  xhr.open("POST", "php/delete.php", true);
  xhr.addEventListener("readystatechange", function(){
    if (xhr.readyState === 4 && xhr.status === 200){
      //alert(xhr.responseText);
      if (xhr.responseText === "true") {
        window.location = "view.php";
      }else {
        if (xhr.responseText === "DBF") {
          document.getElementById('validateTXT').innerHTML = 'Looks like its the internet, or me though.';
        }else{
          document.getElementById('validateTXT').innerHTML = 'Record does not exist';
        }

        setTimeout(function(){
          document.getElementById('validateTXT').innerHTML = '';
        }, 4000);
      }
    }
  });
  xhr.send(data);
  */
}

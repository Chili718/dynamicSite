const ham = document.querySelector(".burger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");
const nivmig = document.querySelector(".miglink");
//const nav = document.querySelector(".navbar");

//function to add the toggle event to each of the navbar links
const nivber = () => {

  links.forEach((link) => {

      link.addEventListener("click", () => {

          var check = document.getElementById("check");
          //dont want open to toggle open when the screen
          //has the nav bar showing
          if(check.classList.contains("open")){

            ham.classList.toggle("ex");
            navLinks.classList.toggle("open");

            links.forEach((link, index) => {

              if(link.style.animation){
                link.style.animation = '';
              }else{
                link.style.animation = `linksFadeIn 0.5S ease-in-out forwards ${index / 5}s`;
              }

            });

          }

      });
  });

}
//add the event listener to the logo as with most websites that takes you home
nivmig.addEventListener("click", ()=> {

  var check = document.getElementById("check");
  //dont want open to toggle open when the screen
  //has the nav bar showing
  if(check.classList.contains("open")){

    ham.classList.toggle("ex");
    navLinks.classList.toggle("open");

    links.forEach((link, index) => {

      if(link.style.animation){
        link.style.animation = '';
      }else{
        link.style.animation = `linksFadeIn 0.5S ease-in-out forwards ${index / 5}s`;
      }

    });

  }

});

ham.addEventListener("click", ()=>{

  navLinks.classList.toggle("open");

  ham.classList.toggle("ex");
  //add the fade in animation to the navbar links
  links.forEach((link, index) => {

    if(link.style.animation){
      link.style.animation = '';
    }else{
      link.style.animation = `linksFadeIn 0.5S ease-in-out forwards ${index / 5}s`;
    }

  });

  //navLinks.style.visibility = 'visible';
  /*
  if(nav.classList.contains("nottransparent"))
  {

    nav.classList.remove("nottransparent");

  }
  */
});

//removes the preloader when the page is loaded by adding the 'loaded' class
window.addEventListener('load', () => {

  const preload = document.querySelector('.preloader');
  preload.classList.add('loaded');

});

//would normally make an app fucntion but I only have one fucntion to call
nivber();

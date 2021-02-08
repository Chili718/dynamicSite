
function login(){

  var xhr = new XMLHttpRequest();
  var data = new FormData(document.querySelector("form"));
  xhr.open("POST", "php/login.php", true);
  xhr.addEventListener("readystatechange", function(){
    if (xhr.readyState === 4 && xhr.status === 200){
      //alert(xhr.responseText);
      if (xhr.responseText === "true") {
        window.location = "upload.php";
      }else {
        if (xhr.responseText === "DBF") {
          document.getElementById('validateTXT').innerHTML = 'Looks like its the internet, or me though.';
        }else{
          document.getElementById('validateTXT').innerHTML = 'Invalid Username or Password';
        }

        setTimeout(function(){
          document.getElementById('validateTXT').innerHTML = '';
        }, 4000);
      }
    }
  });
  xhr.send(data);
}


function logout(){
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "php/logout.php", true);
  xhr.addEventListener("readystatechange", function(){
    if (xhr.readyState === 4 && xhr.status === 200){

        window.location = "login.php";

    }
  });
  xhr.send();
}

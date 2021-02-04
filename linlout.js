
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
        document.getElementById('validateTXT').innerHTML = 'Invalid Username or Password';
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

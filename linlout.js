
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
//special thanks to Tim from thisintrestsme.com for the function :)
function activityWatcher(){

    //The number of seconds that have passed
    //since the user was active.
    var secondsSinceLastActivity = 0;

    //Five minutes. 60 x 5 = 300 seconds.
    var maxInactivity = (60 * 2);

    //Setup the setInterval method to run
    //every second. 1000 milliseconds = 1 second.
    setInterval(function(){
        secondsSinceLastActivity++;
        console.log(secondsSinceLastActivity + ' seconds since the user was last active');
        //if the user has been inactive or idle for longer
        //then the seconds specified in maxInactivity
        if(secondsSinceLastActivity > maxInactivity){
            console.log('User has been inactive for more than ' + maxInactivity + ' seconds');
            //Redirect them to your logout.php page.
            logout();
            location.href = 'php/logout.php';
        }
    }, 1000);

    //The function that will be called whenever a user is active
    function activity(){
        //reset the secondsSinceLastActivity variable
        //back to 0
        secondsSinceLastActivity = 0;
    }

    //An array of DOM events that should be interpreted as
    //user activity.
    var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
    ];

    //add these events to the document.
    //register the activity function as the listener parameter.
    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });


}

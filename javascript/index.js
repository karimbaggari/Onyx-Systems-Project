/* const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const error = urlParams.get('error');
if(error) 
 {
     document.getElementById("username").style.borderBottom="5px solid #C73A3A";
     document.getElementById("password").style.borderBottom="5px solid #C73A3A"; 
 } */

 var loginSubmit = document.getElementById('login-submit');
 var login = document.getElementById('username');
 var pwd = document.getElementById('password');
 var errorMsg = document.getElementById('error');


loginSubmit.addEventListener('click', function(event) {
    event.preventDefault();
})

 function checkempty() {
    if ( login.value === '' || pwd.value === '' ) {
        errorMsg.style.display = "block";
        login.style.borderBottom="5px solid #C73A3A";
        pwd.style.borderBottom="5px solid #C73A3A";
    } else {
        errorMsg.style.display = "none";
        login.style.borderBottom="5px solid #f3f4fa";
        pwd.style.borderBottom="5px solid #f3f4fa";
    }
 }

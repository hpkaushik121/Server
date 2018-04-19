function validat(){
   var bool = true;
  var elems = document.querySelectorAll(".error");
document.getElementById('error_p').innerHTML="";
document.getElementById('error_p1').innerHTML="";
document.getElementById('error_p2').innerHTML="";
  document.getElementById('error_u').innerHTML="";
    document.getElementById('error_f').innerHTML="";
[].forEach.call(elems, function(el) {
    el.classList.remove("error");
});
  var phone= document.getElementById('phone').value;
  var token= document.getElementById('token').value;

  var username= document.getElementById('username').value;
    var fullname= document.getElementById('fullname').value;
    var email= document.getElementById('email').value;
  var pass1= document.getElementById('password1').value;
  var pass = document.getElementById('password2').value;
var len= phone.toString().length;
 if(len!=10 || isNaN(phone) || phone==''){
  document.getElementById('error_p').innerHTML="phone no. is not valid!!";
  document.getElementById("phone").classList.add('error');
  bool=false;
  }
  if(pass1.toString().length<8){
    document.getElementById('error_p1').innerHTML="password must contain at least 8 characters ";
    document.getElementById("password1").classList.add('error');
    bool=false;
  }
  if(pass!=pass1 ){
    document.getElementById('error_p1').innerHTML="passwords did not match";
    document.getElementById("password1").classList.add('error');
    document.getElementById('error_p2').innerHTML="passwords did not match";
    document.getElementById("password2").classList.add('error');
    bool=false;
  }
  if(username==''){
    document.getElementById('error_u').innerHTML="enter username";
    document.getElementById("username").classList.add('error');
    bool=false;
  }
  if(fullname==''){
    document.getElementById('error_f').innerHTML="enter fullname";
    document.getElementById("fullname").classList.add('error');
    bool=false;
  }
  if(!validateEmail(email)){
    document.getElementById('error_e').innerHTML="enter valid email";
    document.getElementById("email").classList.add('error');
    bool=false;
  }
  function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  if(bool==true){
    //alert("sfad");
    var encuser = btoa(btoa(btoa(btoa(username))));
    var encfull = btoa(btoa(btoa(btoa(fullname))));
    var encphone = btoa(btoa(btoa(btoa(phone))));
    var encemail=btoa(btoa(btoa(btoa(email))));
    var encpass =btoa(btoa(btoa(btoa(pass1))));
    window.location.href="reg/index.php?username="+encuser+"&fullname="+encfull+"&email="+encemail+"&phone="+encphone+"&password="+encpass+"&token="+token;
  }
}

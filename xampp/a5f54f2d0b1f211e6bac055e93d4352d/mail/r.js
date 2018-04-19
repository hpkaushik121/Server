function validat(){
   var bool = true;

  var elems = document.querySelectorAll(".error");

[].forEach.call(elems, function(el) {
    el.classList.remove("error");
});

  var username= document.getElementById('username').value;
    var name= document.getElementById('publicname').value;
  var pass = document.getElementById('pass').value;

  if(pass.toString().length<8){
    document.getElementById('pass').innerHTML="password must contain at least 8 characters ";
    document.getElementById("pass").classList.add('error');
    bool=false;
  }
  if(username==''){
    document.getElementById('username').innerHTML="enter username";
    document.getElementById("username").classList.add('error');
    bool=false;
  }
  if(name==''){
    document.getElementById('publicname').innerHTML="enter fullname";
    document.getElementById("publicname").classList.add('error');
    bool=false;
  }


  if(bool==true){
    //alert("sfad");
    window.location.href="open1.php?username="+btoa(btoa(btoa(btoa(username))))+"&publicname="+btoa(btoa(btoa(btoa(name))))+"&pass="+btoa(btoa(btoa(btoa(pass))));

  }
}

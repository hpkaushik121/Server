<?php
session_start();
if(!isset($_SESSION['username']) ||!isset($_SESSION['password'])||!isset($_SESSION['password'])){
  header("Location:/cpanel");
}
$db_user=$_SESSION['db_user'];
$db_pass=$_SESSION['db_pass'];
$file_user=$_SESSION['file_user'];
$file_pass = $_SESSION['file_pass'];
if(isset($_GET['msg'])){
if($mailbox=='inb'){$ml='INBOX';}
elseif($mailbox=='snt'){$ml='SENT';}}else{$ml='INBOX';}
$hostname = '{mail.ipuniversity.tk:143/novalidate-cert}'.$ml;
$username = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email']))));
$password = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['created_email_pass']))));
$bool=0;
/* try to connect */
if($inbox = @imap_open($hostname,$username,$password) ){

/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {

  /* begin output var */
  $output = '';

  /* put the newest emails on top */
  rsort($emails);

/* for every email... */
  foreach($emails as $email_number) {


    /* get information specific to this email */
    $overview = imap_fetch_overview($inbox,$email_number,0);
    $message = imap_fetchbody($inbox,$email_number,2);

    /* output the email header information */
    $seen = $overview[0]->seen ? 'read' : 'unread';

    $subject= $overview[0]->subject;
    $from= $overview[0]->from;
    $date= $overview[0]->date;


    /* output the email body */
    $output.= '<div class="body">'.$message.'</div>';


if($seen === 'unread'){
  $bool=$bool+1;
  imap_clearflag_full($inbox, $email_number, "\\Seen \\Recent");
imap_expunge($inbox);
}

  }




}

/* close the connection */
imap_close($inbox);}
?>



<!DOCTYPE html>
<html>
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
     
			  
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
     
   <script src="https://code.jquery.com/jquery-3.3.1.js"</script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

    <!-- Debug -->
    <script src="//localhost:32123/livereload.js"></script>

    <!-- This is what you need -->
    <script src="dist/sweetalert.js"></script>
    <link rel="stylesheet" href="dist/sweetalert.css">
    <!--.......................-->
   
    <!--styles.css-->
    <!--styles.css-->
    </head>
    <style>
    .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
  </style>
    <body>
      <div class="loader"></div>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                      <i class="icon-reorder shaded"></i></a><a href="index2.php"><img class="brand"  src="cpanel-logo.svg" style="width:10%;"/> </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                       
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Support </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">

                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>

                                    <li><a href="logout/">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
       
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index2.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                              <!--  <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
                              </li>-->
                                <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                    <?php echo $bool;?></b> </a></li>
                                    <li><a href="#"><i class="icon-arrow-up"></i>Sent <b class="label orange pull-right">
                                        19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <!--<ul class="widget widget-menu unstyled">
                                <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
                                <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
                            </ul>-->
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">

                                <li><a href="logout/"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9" style="background:#fff;">
                       
                            <div style="height:250px; background-image: url(/cpanel/images/mrq-photo-tlds-xx-3752.jpg); ">
                               
                             
   
		<form id="form1" action="domain.php" method="post" style="width:70% ;padding-top:12%; padding-left:10%;margin:auto;" onkeypress="return event.keyCode != 13;">
           
                
                  
                        
                            
                     
                            
                      
                            <input id="domain" name="addr" type="text" style=" 
							float:left; 
							font-size:1rem;
							 height: 100%;
							     border-bottom-right-radius: 0;
    border-top-right-radius: 0;
	 border-bottom-left-radius: 5px;
	 padding:15px;
    border-top-left-radius: 5px;
							width:75%;" class="form-control" placeholder="Enter domain Here" required>
                    
                    <a class="bt" id="bt" href="#" style=" 
    
   
    background: #4E9CAF;
    padding: 15px;
    text-align: center;
    color: white;
	text-decoration:none !important;
	font-size:1rem;
	margin-top:1px;
	  border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;
	    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
	float:left;
    font-weight: bold;" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-1']);">Add</a>
             
               
            
			</form>
       
 </div>
<!-- /. end  of brand-comb -->
<style>
.anchortag{
	
	
    
   
    background: #4E9CAF;
    padding: 5px;
    text-align: center;
    color: white;
	font-size:1rem;
	margin-top:1px;
	margin-left:5px;
	text-decoration:none !important;
	 
	margin-right:5px;
	  border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;
	    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
	float:left;
    font-weight: bold;
	
}
.anchortag:hover{
	color: #fff;
}
.anchor{
	
	
    
   
    background:#99cc00;
    padding: 5px;
    text-align: center;
    color: white;
	font-size:1rem;
	margin-top:1px;
	margin-left:5px;
	text-decoration:none !important;
	 width:80%;
	margin-right:5px;
	  border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;
	    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
	float:left;
    font-weight: bold;
	
}
.anchor:hover{
	color: #fff;
}
</style>

		<?php
		
		


$id=base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['id']))));
$db = mysqli_connect("localhost", "root", "Skaushik8@", "root");
$sql = "SELECT * FROM linkdomains where user_id = '$id'";
$result = mysqli_query($db, $sql);
$arr[]=null;
$timearr[]=null;
if($result->num_rows>0 ){
	$i=0;
	echo "	
   
      </br>
        <div  >
            
                    <h1 style=\"width:100%; text-align:center;\" >Registered domains</h1>
              
			  </br>
			  
			   <div style=\"float:left; margin-left:10px;\">
		
		<select id=\"number\" onchange=\"refreshPagination();\">
  <option  value=\"10\">10</option>
  <option   value=\"25\">25</option>
  <option   value=\"100\">100</option>
  <option   value=\"250\">250</option>
</select>
		</div>
     <table id=\"example\" class=\"table table-striped table-bordered\" style=\"width:100%\">
        <thead>
            <tr>
                <th style=\"text-align:center;\">Name</th>
                <th style=\"text-align:center;\">Status</th>
                
                <th style=\"text-align:center;\">Registration date</th>
                <th></th>
            </tr>
        </thead>
        <tbody id=\"domain_table\">
		
               ";
while($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)){

$arr[$i]=$row1['linked_domains'];
$timearr[$i]=$row1['date'];
$i=$i+1;

 
		/*echo"
	
       
	<div style=\"float:left; width:100%;margin-top:-1px;padding:5px;\">
       
                <div style=\"float:left;\">
                    <h3 id=\"linked_d\">".$row1['linked_domains']."</h3>
                  
                </div>
				<div style=\"float:right;\" >
                <a onclick=\"Deletedomain('".$row1['linked_domains']."')\"  >Delete</a>
                
                    <a href=\"#\" c > add sub-domain</a>
                </div>
              </div>
          
	";*/
	
	
	
	}
	echo " 
	
</tbody >
        
    </table>
	</div>
           
    
   
	
	<ul  class=\"pagination\">
	   
	<ul id=\"pagin\" style=\"float:right ;  position:relative; margin-right:15px; margin-bottom:15px;\" class=\"pagination\">
</ul></ul></div>";

}

	?>
	
	

                                

                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
		<script>
		showpagination(1);
		showPagin();
		function refreshPagination(){
			showPagin();
			showpagination(1);
			
		}
		function showPagin(){
			var arr=<?php echo json_encode($arr); ?>;
			numberOfElements=document.getElementById("number").value;
			var numberOfPages=arr.length/numberOfElements;
			if(numberOfPages<1){
			numberOfPages=1;	
			}
			$("#pagin").empty();
			for(var i=1;i<numberOfPages+1;i++){
				document.getElementById("pagin").innerHTML=document.getElementById("pagin").innerHTML+"<li><a  onclick=\"showpagination("+i+");\">"+i+"</a></li>"
			}
			
		}
		function showpagination(PageNumber){
			var numberOfElements= document.getElementById("number").value;
			var arr=<?php echo json_encode($arr); ?>;
			var timearr=<?php echo json_encode($timearr); ?>;
			if(numberOfElements>arr.length){
				numberOfElements=arr.length;
			}
			var fromTab=(PageNumber-1)*numberOfElements;
			var toTab=PageNumber*numberOfElements;
			$("#domain_table tr").remove();
			for(var i=fromTab;i<toTab;i++){
				console.log(i);
				var date = new Date(timearr[i]*1000);
				var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = date.getFullYear();
  var month = months[date.getMonth()];
				
// Hours part from the timestamp
var hours = date.getHours();
// Minutes part from the timestamp
var Dminutes=new String(""+date.getMinutes());
if(Dminutes.length<=1){
var minutes = "0" + date.getMinutes();
}else{
	var minutes =date.getMinutes();
}
// Seconds part from the timestamp
var Dseconds=new String(""+date.getSeconds());
if(Dseconds.length<=1){
var seconds = "0" + date.getSeconds();
}else{
	var seconds =date.getSeconds();
}


var formatted=date.getDate()+"/"+month+"/"+year+" &nbsp &nbsp "+hours+":"+minutes+":"+seconds;
				
var x=document.getElementById('domain_table').insertRow(0);
    var c1=x.insertCell(0);
    var c2=x.insertCell(1);
    var c3=x.insertCell(2);
    var c4=x.insertCell(3);
	c1.style.textAlign = "center";
	c2.style.textAlign = "center";
	c3.style.textAlign = "center";
	c4.style.textAlign = "center";
    c1.innerHTML=arr[i];
    c2.innerHTML="<a class=\"anchor\" >Active</a>";
    c3.innerHTML=formatted;
    c4.innerHTML="<a class=\"anchortag\" href=\"#\"onclick=\"Deletedomain('"+arr[i]+"')\"  >Delete</a> <a href=\"#\" class=\"anchortag\" > add sub-domain</a>";
			//	document.getElementById("domain_table").innerHTML=document.getElementById("domain_table").innerHTML+"<tr></td><td style=\"text-align:center;\">"+  +"</td><td align=\"center\"></td><td style=\"text-align:center;\">"++"</td> <td style=\"text-align:center;\"></div></td></tr><div style=\"float:right;\" >";
			}
			
		}
		</script>
		
          <script>
      document.querySelector('.bt').onclick = function(){
         swal({
           title: "Are you sure?",
          text: "You want to add this domain!",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
		  animation: "slide-from-top",
          confirmButtonText: 'Yes!',
          cancelButtonText: "No!",
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(isConfirm){
			swal({
  title: "Enter Directory for the home of this domain!",
  text: "",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Enter Path",
  inputValue: "/"
},
function(inputValue){
  if (inputValue === false) return false;

  if (inputValue === "") {
    swal.showInputError("You need to write something!");
    return false
  }

  var dataString=document.getElementById("domain").value;
			
			if (isConfirm){
				if(dataString !=""){
					swal({
			 title: "Loading..",
          imageUrl: 'assets/load.gif'
        });
			$.ajax({
    type: "get",
    url: "domain.php?addr="+dataString+"&folderPath="+inputValue,
    data: dataString,
    success: function(output) {
      //display message back to user here
	 
	 if(output =="Connection failed" || output=="domain already exists" || output=="domain is not valid" || output=="something went wrong"){
		  swal("Error!", ""+output, "error");
		 
	 }else{
	 
              swal({
           title: "",
          text: "Your domain "+dataString+" has been successfully added",
          type: "success",
          showCancelButton: false,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Ok!',
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
			location.reload();
		});
	 }
          
    }
  });
				}else{
					swal("Error!", "You need to enter a domain", "error");
				}
  } 
          
        });
});
			
      };

     
    </script>
	
	
	
	
	
	
	
	<script>
     function Deletedomain(dataString){
		  
         swal({
           title: "Are you sure?",
          text: "You want to delete "+dataString+"!",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes!',
          cancelButtonText: "No!",
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(isConfirm){
			
			
			if (isConfirm){
				if(dataString !=""){
					swal({
			 title: "Loading..",
          imageUrl: 'assets/load.gif'
        });
			$.ajax({
    type: "get",
    url: "removedomain.php?addr="+dataString,
    data: dataString,
    success: function(output) {
      //display message back to user here
	 
	 if(output =="Connection failed" || output=="domain does not exists" || output=="domain is not valid" || output=="something went wrong"){
		  swal("Error!", ""+output, "error");
		 
	 }else{
	 
              swal({
           title: "",
          text: output,
          type: "success",
          showCancelButton: false,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Ok!',
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
			location.reload();
		});
	 }
          
    }
  });
				}else{
					swal("Error!", "You need to enter a domain", "error");
				}
  } 
          
        });
      };

     
    </script>
    <script>
      !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    </script>
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2017 Sourabh Kaushik </b>All rights reserved.
            </div>
        </div>
			
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
        <?php echo '<script> var s="';echo $ml;echo '";</script>'?>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
				<script type="text/javascript"></script>

        <script>
        setTimeout(function() {
            $('.alert-success').fadeOut('fast');

        }, 1000);

        $('.toggleModal').on('click', function (event) {
          event.preventDefault();

          $('.modal').toggleClass('is-active');
          $('body').toggleClass('is-blurred');
        });
        $('.selectall').change(function () {
    $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
});

        </script>
        <script>
        var checkboxes = document.querySelectorAll("tr input");

    for (var i = 0, l = checkboxes.length; i < l; i++) {
        checkboxes[i].onclick = function(e) {
            e.stopPropagation();
        }
    }
    function btn( )
    {
      var tableControl= document.getElementById('tab');
   var arrayOfValues = [];
   $('input:checkbox:checked', tableControl).each(function() {
            arrayOfValues.push($(this).closest('tr').attr('id'));
        }).get();
        window.location.href = "mail.php?id=" + arrayOfValues+"&msg="+s;

    }
       function Redirect( o)
       {
				 var Row = document.getElementById(o);
var Cells = Row.getElementsByTagName("td");

//alert(Cells[2].innerText);

      location.href= "inbox2.php?id="+o+"&msg="+s;
       }
    </script>
    <script>
    function ShowHideDiv(chkPassport) {
         var dvPassport = document.getElementById("dvPassport");
         dvPassport.style.display = chkPassport.checked ? "block" : "none";
     }
   </script>

    </body>

<?php
session_start();

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>ibuiltinfra</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" href="apple-touch-icon.png">

      <!--<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>-->
      <link rel="stylesheet" href="/assets/css/fonticons.css">
      <link rel="stylesheet" href="/assets/fonts/stylesheet.css">
      <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
      <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


      <!--For Plugins external css-->
      <link rel="stylesheet" href="/assets/css/plugins.css" />

      <!--Theme custom css -->
      <link rel="stylesheet" href="/assets/css/style.css">

      <!--Theme Responsive css-->
      <link rel="stylesheet" href="/assets/css/responsive.css" />

      <script src="/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>



    </head>
    <body data-spy="scroll" data-target="#navmenu" onload="start();">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <!--Home page style-->
        <header id="main_menu" class="header">
            <div  class="main_menu_bg navbar-fixed-top" style="background-color:#3d3325;">
                <div  class="container">
                    <div class="row">
                        <div class="nave_menu wow fadeInUp" data-wow-duration="1s">
                            <nav class="navbar navbar-default" id="navmenu">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">

                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
    <a  href="/"><img src="/assets/images/sitelogo.png" alt=""/></a>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                        <ul class="nav navbar-nav navbar-right">

                                            <li ><a href="/">Home</a></li>
<li class="active"><a href="#">Cart</a></li>


                                            <li><a href="#">About Us</a></li>
                                        </ul>

                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>
        </header> <!--End of header -->
      </br>
    </br>
        </br>
            </br>
                </br>

<div class="box" style=" background: #fff;
margin-left:2%;
  border: solid 1px #e6e6e6;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 20px;
  width:96%;
  -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">

        <form method="post" action="/pay/order.php">
<?php

$num=0;
if(isset($_COOKIE['num']) &&!isset($_SESSION['id_'])){
  $num=$_COOKIE['num']+1;
}elseif(isset($_SESSION['user'])&&isset($_SESSION['id_'])){
                      $username=$_SESSION['user'];
                      $userid=$_SESSION['id_'];
                        $conn = mysqli_connect('localhost','root','Skaushik8@','hostpots');
                        if(!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        		echo "fadf";
                        }else{

                          $sql = "SELECT package FROM cart WHERE username='$username' AND user_id = '$userid'";
                          $result = mysqli_query( $conn, $sql );
                          if (mysqli_num_rows($result) > 0)
                                               {
                                            $num=mysqli_num_rows($result);
                         }




                        }

                      } ?>
            <h1>Shopping cart</h1>
            <p class="text-muted">You currently have <?php echo $num;?> item(s) in your cart.</p>
            <div class="table-responsive">
                <table class="table" >
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Duration (Mo.)</th>
                            <th>Unit price ₹</th>

                            <th colspan="2">Total ₹</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=0;

                      if(isset($_COOKIE['num']) &&!isset($_SESSION['id_']) ){
                        if(isset($_COOKIE['num'])) {
                        $num=$_COOKIE['num'];

                        for($i=0;$i<=$num;$i++){

                            $package=$_COOKIE['package'.$i];

                            echo '<tr id="'.$i.'">
                                <td style="width:30%;"">';
                                if($package=='basic'){
                                  echo '  <img style="width:30%;"src="/assets/images/bronze.png" alt="afsd" >
                                  </td>
                                  <td >basic package
                                  </td>
                                  <td>
                                  <select id="month'.$i.'" style="width:80%; font-size:20px;"onchange="fun('.$i.');">
                                  <option value="1">1
                                  <option value="3">3
                                  <option value="6">6
                                  <option value="12" >12
                                  <option value="24">24
                                  <option value="36">36
                                  </select>
                                  </td>
                                  <td > 150.00</td>

                                  <td id="total" class="total">150.00</td>
                                  <td><i onclick="po(';echo $i; echo ')" class="fa fa-trash-o"></i>
                                  </td>
                                  </tr>



                                  ';
                                }
                                if($package=='normal'){
                                  echo '  <img style="width:30%;"src="/assets/images/silver.png" >
                                  </td>
                                  <td >normal package
                                  </td>
                                  <td>
                                  <select id="month'.$i.'" style="width:80%; font-size:20px;"onchange="fun('.$i.');">
                                  <option value="1">1
                                  <option value="3">3
                                  <option value="6">6
                                  <option value="12" >12
                                  <option value="24">24
                                  <option value="36">36
                                  </select>
                                  </td>
                                  <td > 250.00</td>

                                  <td id="total" class="total">250.00</td>
                                  <td><i onclick="po(';echo $i; echo ')" class="fa fa-trash-o"></i>
                                  </td>
                                  </tr>



                                  ';
                                }
                                if($package=='big'){
                                  echo '  <img style="width:30%;"src="/assets/images/gold.png" >
                                  </td>
                                  <td >big package
                                  </td>
                                  <td>
                                  <select id="month'.$i.'" style="width:80%; font-size:20px;"onchange="fun('.$i.');">
                                  <option value="1">1
                                  <option value="3">3
                                  <option value="6">6
                                  <option value="12" >12
                                  <option value="24">24
                                  <option value="36">36
                                  </select>
                                  </td>
                                  <td > 400.00</td>

                                  <td id="total" class="total">400.00</td>
                                  <td><i onclick="po(';echo $i; echo ')" class="fa fa-trash-o"></i>
                                  </td>
                                  </tr>



                                  ';
                                }
                                if($package=='biggest'){
                                  echo '  <img style="width:30%;"src="/assets/images/platinum.jpg" >
                                  </td>
                                  <td >biggest package
                                  </td>
                                  <td>
                                  <select id="month'.$i.'" style="width:80%; font-size:20px;"onchange="fun('.$i.');">
                                  <option value="1">1
                                  <option value="3">3
                                  <option value="6">6
                                  <option value="12" >12
                                  <option value="24">24
                                  <option value="36">36
                                  </select>
                                  </td>
                                  <td > 1000.00</td>

                                  <td id="total" class="total">1000.00</td>
                                  <td><i onclick="po(';echo $i; echo ')" class="fa fa-trash-o"></i>
                                  </td>
                                  </tr>



                                  ';
                                }
                        }
                      }else{
                        $num=0;

                      }
                    }
                 elseif(isset($_SESSION['user'])&&isset($_SESSION['id_']) && $num!=0){

                      $username=$_SESSION['user'];
                      $userid=$_SESSION['id_'];
                        $conn = mysqli_connect('localhost','root','Skaushik8@','hostpots');
                        if(!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        		echo "fadf";
                        }else{

                          $sql = "SELECT * FROM cart WHERE username='$username' AND user_id = '$userid'";
                          $result = mysqli_query( $conn, $sql );
                          if (mysqli_num_rows($result) > 0)
                                               {
                                                 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $storeArray[] =  $row['package'];
                            $id[] =  $row['id'];
                         }




                        }else{
                          header("Location: /");
                        }

                      }
                      foreach ($storeArray as $num) {
                        $package=$num;

                        echo "<tr id=".$i.">
                            <td>";

                            if($package=='basic'){
                              echo '  <img style="width:30%;"src="/assets/images/bronze.png" >
                              </td>
                              <td >basic package
                              </td>
                              <td>
                              <select id="month'.$i.'" style="width:80%; font-size:20px;"onchange="fun('.$i.');">
                              <option value="1">1
                              <option value="3">3
                              <option value="6">6
                              <option value="12" >12
                              <option value="24">24
                              <option value="36">36
                              </select>
                              </td>
                              <td > 150.00</td>

                              <td id="total" class="total">150.00</td>
                              <td><i onclick="po(';echo $id[$i]; echo ')" class="fa fa-trash-o"></i>
                              </td>
                              </tr>



                              ';
                            }
                            if($package=='normal'){
                              echo '  <img style="width:30%;"src="/assets/images/silver.png" >
                              </td>
                              <td >normal package
                              </td>
                              <td>
                              <select id="month'.$i.'" style="width:80%; font-size:20px;"onchange="fun('.$i.');">
                              <option value="1">1
                              <option value="3">3
                              <option value="6">6
                              <option value="12" >12
                              <option value="24">24
                              <option value="36">36
                              </select>
                              </td>
                              <td > 250.00</td>

                              <td id="total" class="total">250.00</td>
                              <td><i onclick="po(';echo $id[$i]; echo ')" class="fa fa-trash-o"></i>
                              </td>
                              </tr>



                              ';
                            }
                            if($package=='big'){
                              echo '  <img style="width:30%;"src="/assets/images/gold.png" >
                              </td>
                              <td >big package
                              </td>
                              <td>
                              <select id="month'.$i.'" style="width:80%; font-size:20px;"onchange="fun('.$i.');">
                              <option value="1">1
                              <option value="3">3
                              <option value="6">6
                              <option value="12" >12
                              <option value="24">24
                              <option value="36">36
                              </select>
                              </td>
                              <td > 400.00</td>

                              <td id="total" class="total">400.00</td>
                              <td><i onclick="po(';echo $id[$i]; echo ')" class="fa fa-trash-o"></i>
                              </td>
                              </tr>



                              ';
                            }
                            if($package=='biggest'){
                              echo '  <img style="width:30%;"src="/assets/images/platinum.png" >
                              </td>
                              <td >biggest package
                              </td>
                              <td>
                              <select id="month'.$i.'" style="width:80%; font-size:20px;"onchange="fun('.$i.');">
                              <option value="1">1
                              <option value="3">3
                              <option value="6">6
                              <option value="12" >12
                              <option value="24">24
                              <option value="36">36
                              </select>
                              </td>
                              <td > 1000.00</td>

                              <td id="total" class="total">1000.00</td>
                              <td><i onclick="po(';echo $id[$i]; echo ')" class="fa fa-trash-o"></i>
                              </td>
                              </tr>



                              ';
                            }
$i=$i+1;
                      }
                    }else{
                      echo '<td><img src="/assets/images/cart.png"</td>';
                    }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                      <th colspan="4">Tax</th>
                      <th colspan="2" id="grand_tax" class="grand_tax">₹ 0.00</th>
                      </tr>
                    <tr>
                    <th colspan="4">Total</th>
                    <th colspan="2" id="grand_total" for="grand_total" name="grand_total" class="grand_total">₹ 0.00</th>
                    </tr>


                    </tfoot>
                </table>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button>
                                    <button type="button" onclick="checkout();"  class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

            </div>
            <!-- /.table-responsive -->


        </form>


</div>





</br>
</br>
</br>
</br>
</br>







        <section id="footer" class="footer sections">
            <div class="container">


                <div class="row">
                    <div class="footer_bottom_area">
                        <div class="col-sm-9 col-xs-12">
                            <div class="fo_bottom_right">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_right_footer wow fadeIn" data-wow-duration="1s">
                                            <p>Lorem ipsum dolor sit amet, consecteteeseurı adipiscing elit. Donec mollis commodoeesene que, non commodo risus volutpat vel.</p>
                                            <a href="">Design by : <strong>Sourabh kaushik</strong></a>

                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="single_right_footer wow fadeIn" data-wow-duration="1.5s">

                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="single_right_footer wow fadeIn" data-wow-duration="2s">
                                            <ul>
                                                <li><a href=""><i class="lnr lnr-chevron-right"></i> Support</a></li>
                                                <li><a href=""><i class="lnr lnr-chevron-right"></i> Account</a></li>
                                                <li><a href=""><i class="lnr lnr-chevron-right"></i> Product Catalog</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="fo_bottom_socail wow fadeIn" data-wow-duration="2.3s">
                                <a href="#"><i class="fa fa-phone">+917838941249</i></a>
                                <a href=""><i class="fa fa-envelope"></i>sk@ipuniversity.tk</a>
                                <p>We are here for you all the time</p>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </section><!-- End of footer3 section -->








        <!-- STRAT SCROLL TO TOP -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>
<script>
function checkout(){
  var grtotal=document.getElementById('grand_total').innerHTML;
  post('/pay/order.php', {name: ''+grtotal});

  function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}
}
function po(id){
    window.location.href= "delete.php?id="+id;

}
function fun(n){
  var Row = document.getElementById(n);
var Cells = Row.getElementsByTagName("td");

  var dur = document.getElementById("month"+n).value;
  var intp= Cells[3].innerHTML;

  Cells[4].innerHTML=(intp*dur).toFixed(2);


  var sum = 0;
  // iterate through each td based on class and add the values
  $(".total").each(function() {

      var value = $(this).text();
      // add only if the value is number
      if(!isNaN(value) && value.length != 0) {
          sum += parseFloat(value);
          var tax= ((sum/100)*2)+3;
          document.getElementById("grand_tax").innerHTML=tax.toFixed(2);
          document.getElementById("grand_total").innerHTML=(sum+tax).toFixed(2);
      }
  });
}
function start(){

var sum = 0;
// iterate through each td based on class and add the values
$(".total").each(function() {

    var value = $(this).text();
    // add only if the value is number
    if(!isNaN(value) && value.length != 0) {
        sum += parseFloat(value);
        var tax= ((sum/100)*2)+3;
        document.getElementById("grand_tax").innerHTML=tax.toFixed(2);
        document.getElementById("grand_total").innerHTML=(sum+tax).toFixed(2);
    }
});
}

</script>
        <script src="/assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="/assets/js/vendor/bootstrap.min.js"></script>
        <script src="/assets/js/jquery.easypiechart.min.js"></script>

        <script src="/assets/js/plugins.js"></script>
        <script src="/assets/js/main.js"></script>

    </body>
</html>

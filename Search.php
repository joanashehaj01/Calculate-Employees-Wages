<!DOCTYPE html>
<head>
<title>Llogarit Pagat|Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
</head>
<body>
<form action="" method="Post">
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
<a href="../index.html" class="logo">
Profili
</a>
<div class="sidebar-toggle-box">
<div class="fa fa-bars"></div>
</div>
</div>

<div class="top-nav clearfix">
<!--search & user info start-->
<ul class="nav pull-right top-menu">

<!-- user login dropdown start-->
<li class="dropdown">
<a data-toggle="dropdown" class="dropdown-toggle" href="#">
<img alt="" src="images/2.png">
<span class="username">John Doe</span>
<b class="caret"></b>
</a>
<ul class="dropdown-menu extended logout">
<li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
<li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
</ul>
</li>
<!-- user login dropdown end -->

</ul>
<!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
<div id="sidebar" class="nav-collapse">
<!-- sidebar menu start-->
<div class="leftside-navigation">
<ul class="sidebar-menu" id="nav-accordion">
<li>
<a class="active" href="../index.html">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span>
</a>
</li>

<li class="sub-menu">
<a href="javascript:;">
<i class="fa fa-th"></i>
<span>History</span>
</a>
</li>


<li>
<a href="login.html">
<i class="fa fa-user"></i>
<span>Login Page</span>
</a>
</li>
</ul>            
</div>
<!-- sidebar menu end-->
</div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<section class="wrapper">
<!-- //market-->


<!-- //market-->
<div class="row">
<div class="panel-body">
<div class="col-md-12 w3ls-graph">

<!--agileinfo-grap-->
<div class="agileinfo-grap">
<div class="agileits-box">

<div class="margin">
<div style="text-align: center; margin-top: -60px"><h3>Kerko Pagen:</h3></div>
<br>
<div style="text-align: center;"> Search: <input type ="number" name="search" placeholder="Search.."/></div>
<br>

<div style="text-align: center;"> 
<input type="submit" name="submit1" value="Kerko"/>
</div>
<div>
    <br>
    <br>
<div id="d1" style="color:red" style="text-align:center"></div> 
<div id="d2" style="color:red" style="text-align:center"></div> 
</div>



<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paga";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Lidhja dështoj: " . mysqli_connect_errno());
}


if(isset($_POST["submit1"]))
{
$kerko=trim($_POST["search"]);

if (empty($kerko)){
     $ploteso="";

$ploteso.='<script type="text/javascript">
document.getElementById("d1").innerHTML = "Plotesoni fushen!";
</script>';
echo $ploteso;

}
else{
	
$query = 'Select * from llogaritjet where Paga_Bruto ='.$search;
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
$query = "SELECT * FROM products WHERE emer LIKE '".$search."%'";
  $result = mysqli_query($conn, $query);
  
    if(isset($result)){

$msg = mysqli_num_rows($result);

if($msg >= 1){  
  $mesazh="";

$mesazh.='<script type="text/javascript">
document.getElementById("d1").innerHTML = "Filtrimi u krye me sukses!";
</script>';
echo $mesazh;		
  $output = '
   <table border="1" color:black align="center">  
    <tr align="center">
     <th style="color:black">Paga Bruto</th>
	 <th style="color:black">Sigurime Shoqerore</th>
     <th style="color:black">Sigurime Shendetesore</th>
	 <th style="color:black">TAP</th>
     <th style="color:black">Paga Neto</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
      
  $number = 1;
   $output .= '
    <tr align="center">
	<td>'.$number.'</td>
				td>'.$row['Paga_Bruto'].'</td>
				<td>'.$row['Sigurime_Shendetesore'].'</td>
				<td>'.$row['Sigurime_Shoqerore'].'</td>
				<td>'.$row['TAP'].'</td>
                                <td>'.$row['Paga_Neto'].'</td>
				
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }
else {
     
  $mes="";

$mes.='<script type="text/javascript">
document.getElementById("d2").innerHTML = "Paga juaj nuk mund te gjendet!";
</script>';
echo $mes;
}
	}
 
}
}


mysqli_close($conn);
}
?>
</div>
</div>
<!--//agileinfo-grap-->

</div>
</div>
</div>

</section>

<!-- footer -->
<div class="footer">
<div class="wthree-copyright">
<p>© 2019 Pagat. All rights reserved | Design by <a href="http://w3layouts.com">Joana Shehaj</a></p>
</div>
</div>
<!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
$(document).ready(function() {
//BOX BUTTON SHOW AND CLOSE
jQuery('.small-graph-box').hover(function() {
jQuery(this).find('.box-button').fadeIn('fast');
}, function() {
jQuery(this).find('.box-button').fadeOut('fast');
});
jQuery('.small-graph-box .box-close').click(function() {
jQuery(this).closest('.small-graph-box').fadeOut(200);
return false;
});

//CHARTS
function gd(year, day, month) {
return new Date(year, month - 1, day).getTime();
}

graphArea2 = Morris.Area({
element: 'hero-area',
padding: 10,
behaveLikeLine: true,
gridEnabled: false,
gridLineColor: '#dddddd',
axes: true,
resize: true,
smooth:true,
pointSize: 0,
lineWidth: 0,
fillOpacity:0.85,
data: [
{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

],
lineColors:['#eb6f6f','#926383','#eb6f6f'],
xkey: 'period',
redraw: true,
ykeys: ['iphone', 'ipad', 'itouch'],
labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
pointSize: 2,
hideHover: 'auto',
resize: true
});


});
</script>
</form>

</body>
</html>






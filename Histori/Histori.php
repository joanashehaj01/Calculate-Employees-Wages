<?php

session_start();

if (!isset($_SESSION['username'])) { //nqs sessioni eshte boshe ose i pavlefshem
header('Location: ../Rregjistrimi/rregjistrimi.php');}
else if($_SESSION['Tipi'] == 'Perdorues'){
   header('Location: ../Rregjistrimi/rregjistrimi.php');
}
?>


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
<a href="#" class="logo">
Profili
</a>
<div class="sidebar-toggle-box">
<div class="fa fa-bars"></div>
</div>
</div>

<div class="top-nav clearfix">
<!--search & user info start-->
<ul class="nav pull-right top-menu">
<!--<li>
<input type="text" class="form-control search" placeholder=" Search">
</li>-->
<!-- user login dropdown start-->
<li class="dropdown">
<a data-toggle="dropdown" class="dropdown-toggle" href="#">
<img src="" alt=""/>
<span class="username" style="font-size: 20px;"> 

<?php 
echo "Hello"." ".$_SESSION['username'];
?>



</span>
<b class="caret"></b>
</a>
<ul class="dropdown-menu extended logout">
<li><a href="#"><i class=" fa fa-suitcase"></i><?php echo $_SESSION['Tipi'];?></a></li>


<li>
<?php 
if(isset($_SESSION['username']))
{
echo '<a href="../Rregjistrimi/logout.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Logout</a>';
}
else{
echo '<a href="../Rregjistrimi/rregjistrimi.php">Login</a>';
}
?> 
</ul>
</li>
<!-- user login dropdown end -->

</ul>
<!--search & user info end-->
</div>
</header>


<aside>
<div id="sidebar" class="nav-collapse">
<!-- sidebar menu start-->
<div class="leftside-navigation">
<ul class="sidebar-menu" id="nav-accordion">
<li>
<a class="active" href="../index.php">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span>
</a>
</li>

<li>
<?php 

if($_SESSION['Tipi'] == 'Admin')
{
 echo ' <a href="Histori.php"> 
        <i class="fa fa-th"></i>
        <span>History</span>
        </a>';
}   
?>
</li>

</ul>            
</div>
<!-- sidebar menu end-->
</div>
</aside>



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

$query = "Select * FROM llogaritjet";
$sql = mysqli_query($conn, $query);
echo "<table border='1' color:black align='center'>";
echo "<tr align='center'> </tr>";
echo "<tr align='center'>
    <th style='color:black;font-size:smaller;'> Nr. </th>
    <th style='color:black;font-size:smaller;'>Paga Bruto</th>
    <th style='color:black;font-size:smaller;'> Sigurime Shendetesore </th>
    <th style='color:black;font-size:smaller;'> Sigurime Shoqerore</th>
    <th style='color:black;font-size:smaller;'>TAP</th>
    <th style='color:black;font-size:smaller;'>Paga Neto</th>
    <th style='color:black;font-size:smaller;'>Username</th>
    <th style='color:black;font-size:smaller;'>Veprimi i Fshirjes</th>
    </tr>";

$i=0;
while($row = mysqli_fetch_array($sql)){
    echo "<tr align='center'>
        
        <td style='color:black'>".++$i."</td>
        <td style='color:black'>".$row["Paga_Bruto"]."</td>
        <td style='color:black'>".$row["Sigurime_Shendetesore"]."</td>
        <td style='color:black'>".$row["Sigurime_Shoqerore"]."</td>
        <td style='color:black'>".$row["TAP"]."</td>
        <td style='color:black'>".$row["Paga_Neto"]."</td>
        <td style='color:black'>".$row["username"]."</td>
        <td style='color:black;font-size:smaller;'><a href='../Fshi/fshi.php?Id=".$row[0]."'>Fshi Pagen</td>
            
<tr>";
}
echo "</table>";
mysqli_close($conn);
?>
    <br>
    <br>
<div id="d1" style="color:red" style="text-align:center"></div> 
<div id="d2" style="color:red" style="text-align:center"></div> 

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
<p>© 2020 Pagat. All rights reserved | Developed by <a href="https://www.facebook.com/">Joana Shehaj</a></p>
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






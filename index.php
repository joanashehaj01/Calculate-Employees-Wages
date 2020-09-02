<?php

session_start();

if (!isset($_SESSION['username'])) { //nqs sessioni eshte boshe ose i pavlefshem
header('Location: Rregjistrimi/rregjistrimi.php');
}
?>

<!DOCTYPE html>
<?php include 'main-menu.php'; ?>
<body>
<form action="" method="Post">
<section id="container">
    
<!--header start-->
<?php   include 'header.php'; ?>
<!--header end-->

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
<div style="text-align: center; margin-top: 89px"><h3>Llogaritja e Pagave</h3></div>
<br>
<div style="text-align: center; margin-top: 12px;"> Paga:&nbsp;&nbsp; <input type ="number" name="paga" /></div>
<br>

<div style="text-align: center;"> 
<input type="submit" name="submit1" value="Llogarit"/>&nbsp;
<input type="submit" name="submit2" value="Pastro"/>
</div>
<div>
    <br>
    <br>
<div id="d1" style="color:red" style="text-align:center"></div> 
<div id="d2" style="color:green" style="text-align:center"></div> 
<div id="d3" style="color:green" style="text-align:center"></div> 
<div id="d4" style="color:green" style="text-align:center"></div> 
<div id="d5" style="color:green" style="text-align:center"></div> 
<div id="d6" style="color:green" style="text-align:center"></div> 

</div>
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
<p style="color:black;">© 2020 Pagat. All rights reserved | Developed by <a href="https://www.facebook.com/"> Joana Shehaj </a></p>
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

if (isset($_POST["submit1"]))
{
$paga_input = filter_input(INPUT_POST,'paga');
$paga_baze = 105850;
$sig_shoqerore = 0;  
$sig_shendetesore = 0;
$tap = 0;
$shuma = 0;
$paga = 0;

if (empty($paga_input))
{
?>
<script type="text/javascript">
document.getElementById("d1").innerHTML = "Ju lutem plotesoni fushen!";
</script>
<?php
}
else
{ 
   if ($paga_input < $paga_baze)
      {
        if (($paga_input >= 0) AND ($paga_input <= 30000))
           {
                $sig_shendetesore = $paga_input * 0.017;
                $sig_shoqerore = $paga_input * 0.095;
                $tap = $paga_input * 0;
                $shuma = $sig_shendetesore + $sig_shoqerore + $tap;
                $paga_neto = $paga_input - $shuma; 
                $username = $_SESSION["username"];

                $query = "INSERT INTO llogaritjet(Paga_Bruto,Sigurime_Shendetesore,Sigurime_Shoqerore,TAP,Paga_Neto,username)
                VALUES ('$paga_input', '$sig_shendetesore', '$sig_shoqerore', '$tap', '$paga_neto','$username');";
                $res = mysqli_query($conn, $query);
                 //ekzekutimi i querit
//                if(mysqli_query($conn, $query))
//                {
//                echo '<script>alert("Të dhënat u shtuan në databazë!") </script>';
//                }
//                else {
//                echo "Error: " . $query . "<br>" . $conn->error;
//                }
                
                 //echo "<div>Paga Neto eshte:$paga_neto</div>";
                    ?>
                    <script type="text/javascript">
                    var paga_bruto ="<?php echo $paga_input;?>";
                    var sig_shoq = "<?php echo $sig_shoqerore;?>";
                    var sig_shend = "<?php echo $sig_shendetesore;?>";
                    var tap = "<?php echo $tap;?>";
                    var paga_neto = "<?php echo $paga_neto;?>";
                    document.getElementById("d2").innerHTML = "Paga Bruto:" +paga_bruto;
                    document.getElementById("d3").innerHTML = "Sigurimet Shoqerore:" +sig_shoq;
                    document.getElementById("d4").innerHTML = "Sigurimet Shendetesore:" +sig_shend;
                    document.getElementById("d5").innerHTML = "TAP:" +tap;
                    document.getElementById("d6").innerHTML = "Paga Neto:" +paga_neto;
                    
                    </script>
                    <?php
            }
            
       else if ($paga_input < $paga_baze)
            { 
            if ($paga_input >= 30001 && $paga_input <= 150000)
                {
                    $sig_shendetesore = $paga_input * 0.017;
                    $sig_shoqerore = $paga_input * 0.095;
                    $tap = ($paga_input-30000) * 0.13;
                    $shuma = $sig_shendetesore + $sig_shoqerore + $tap;
                    $paga_neto = $paga_input - $shuma; 
                    $username = $_SESSION["username"];

                    $query = "INSERT INTO llogaritjet(Paga_Bruto,Sigurime_Shendetesore,Sigurime_Shoqerore,TAP,Paga_Neto,username)
                    VALUES ('$paga_input', '$sig_shendetesore', '$sig_shoqerore', '$tap', '$paga_neto','$username');";
                    $res = mysqli_query($conn, $query);
                     //ekzekutimi i querit
//                    if(mysqli_query($conn, $query))
//                    {
//                    echo '<script>alert("Të dhënat u shtuan në databazë!") </script>';
//                    }
//                    else {
//                    echo "Error: " . $query . "<br>" . $conn->error;
//                    }
//                
                    ?>
                    <script type="text/javascript">
                    var paga_bruto ="<?php echo $paga_input;?>";
                    var sig_shoq = "<?php echo $sig_shoqerore;?>";
                    var sig_shend = "<?php echo $sig_shendetesore;?>";
                    var tap = "<?php echo $tap;?>";
                    var paga_neto = "<?php echo $paga_neto;?>";
                    document.getElementById("d2").innerHTML = "Paga Bruto:" +paga_bruto;
                    document.getElementById("d3").innerHTML = "Sigurimet Shoqerore:" +sig_shoq;
                    document.getElementById("d4").innerHTML = "Sigurimet Shendetesore:" +sig_shend;
                    document.getElementById("d5").innerHTML = "TAP:" +tap;
                    document.getElementById("d6").innerHTML = "Paga Neto:" +paga_neto;
                    
                    </script>
                    <?php
                }
            }
      }

    elseif ($paga_input > $paga_baze)
        {
        if ($paga_input >= 30001 && $paga_input <= 150000)
                {
                    $sig_shoqerore = $paga_baze * 0.095;
                    $sig_shendetesore = $paga_input * 0.017;
                    $tap = ($paga_input-30000) * 0.13;
                    $shuma = $sig_shendetesore + $sig_shoqerore + $tap;
                    $paga_neto = $paga_input - $shuma; 
                    $username = $_SESSION["username"];

                    
                    $query = "INSERT INTO llogaritjet(Paga_Bruto,Sigurime_Shendetesore,Sigurime_Shoqerore,TAP,Paga_Neto,username)
                    VALUES ('$paga_input', '$sig_shendetesore', '$sig_shoqerore', '$tap', '$paga_neto','$username');";
                    $res = mysqli_query($conn, $query);
                     //ekzekutimi i querit
//                    if(mysqli_query($conn, $query))
//                    {
//                    echo '<script>alert("Të dhënat u shtuan në databazë!") </script>';
//                    }
//                    else {
//                    echo "Error: " . $query . "<br>" . $conn->error;
//                    }
//                
                    
                    ?>
                    <script type="text/javascript">
                    var paga_bruto ="<?php echo $paga_input;?>";
                    var sig_shoq = "<?php echo $sig_shoqerore;?>";
                    var sig_shend = "<?php echo $sig_shendetesore;?>";
                    var tap = "<?php echo $tap;?>";
                    var paga_neto = "<?php echo $paga_neto;?>";
                    document.getElementById("d2").innerHTML = "Paga Bruto:" +paga_bruto;
                    document.getElementById("d3").innerHTML = "Sigurimet Shoqerore:" +sig_shoq;
                    document.getElementById("d4").innerHTML = "Sigurimet Shendetesore:" +sig_shend;
                    document.getElementById("d5").innerHTML = "TAP:" +tap;
                    document.getElementById("d6").innerHTML = "Paga Neto:" +paga_neto;
                    
                    </script>
                    <?php
                }
                
            if ($paga_input >= 150001)
                {
                    $sig_shoqerore = $paga_baze * 0.095;
                    $sig_shendetesore = $paga_input * 0.017;
                    $tap1 = ($paga_input-150000)*0.23;
                    $tap2 = (150000-30000)*0.13;
                    $tap3 = (30000-0)*0;
                    $tap = $tap1+$tap2+$tap3;
                    $shuma = $sig_shendetesore + $sig_shoqerore + $tap;
                    $paga_neto = $paga_input - $shuma; 
                    $username = $_SESSION["username"];

                    
                    $query = "INSERT INTO llogaritjet(Paga_Bruto,Sigurime_Shendetesore,Sigurime_Shoqerore,TAP,Paga_Neto,username)
                    VALUES ('$paga_input', '$sig_shendetesore', '$sig_shoqerore', '$tap', '$paga_neto','$username');";
                    $res = mysqli_query($conn, $query);
                     //ekzekutimi i querit
//                    if(mysqli_query($conn, $query))
//                    {
//                    echo '<script>alert("Të dhënat u shtuan në databazë!") </script>';
//                    }
//                    else {
//                    echo "Error: " . $query . "<br>" . $conn->error;
//                    }
                    
                    
                    ?>
                    <script type="text/javascript">
                    var paga_bruto ="<?php echo $paga_input;?>";
                    var sig_shoq = "<?php echo $sig_shoqerore;?>";
                    var sig_shend = "<?php echo $sig_shendetesore;?>";
                    var tap = "<?php echo $tap;?>";
                    var paga_neto = "<?php echo $paga_neto;?>";
                    document.getElementById("d2").innerHTML = "Paga Bruto:" +paga_bruto;
                    document.getElementById("d3").innerHTML = "Sigurimet Shoqerore:" +sig_shoq;
                    document.getElementById("d4").innerHTML = "Sigurimet Shendetesore:" +sig_shend;
                    document.getElementById("d5").innerHTML = "TAP:" +tap;
                    document.getElementById("d6").innerHTML = "Paga Neto:" +paga_neto;
                    
                    </script>
                    <?php
                    
                   
                }   
            }
            }
}


if (isset($_POST["submit2"])){
?>
<script type="text/javascript">
document.getElementById("d1").innerHTML = " " ;
</script>
<?php
}

?>
</body>
</html>


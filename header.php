<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
<a href="index.html" class="logo">
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
echo '<a href="Rregjistrimi/logout.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Logout</a>';
}
else{
echo '<a href="Rregjistrimi/rregjistrimi.php">Login</a>';
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
    <a class="active" href="index.php">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span>
</a>
</li>

<li>
<?php 

if($_SESSION['Tipi'] == 'Admin')
{
 echo ' <a href="Histori/Histori.php"> 
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

<?php
session_start(); // Right at the top of your script

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paga";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Lidhja dështoj: " . $conn->connect_error);
}

$validime_array=array();

if (isset($_POST["submit1"])){
 
$emer = trim($_POST["emri"]);
$mbiemer = trim($_POST["mbiemri"]);
$username = trim ($_POST["username"]);
$passKoduar = md5($_POST['password']);
$konfirmoPass=md5($_POST['psw']);
$tipi = "Perdorues";

if (empty($emer)){
$validime_array[]="Fusha e emrit duhet të plotësohet!";
}
 
if (empty($mbiemer)){
$validime_array[]="Fusha e mbiemrit duhet të plotësohet!";
}

if (empty($username)){
$validime_array[]="Fusha e username duhet të plotësohet!";
}

if (empty($passKoduar)){
$validime_array[]="Fusha e Passwordit duhet të plotësohet!";
}

if(empty($konfirmoPass)){
$validime_array[]="Fusha e Konfirmo Password duhet të plotësohet!";
}


if ($passKoduar!= $konfirmoPass){
$validime_array[]="Passwordet duhet te perputhen!";}

if (strlen($passKoduar) < 8 ){
$validime_array[]="Password duhet te kete me teper se 8 karaktere!";}

if(empty($validime_array))

{
$query = "Insert Into user (Emri,Mbiemri,Username,Password,Tipi) values ('$emer','$mbiemer','$username','$passKoduar','$tipi')";
    
$count=0;
$res = mysqli_query($conn,"select * from user where username ='$_POST[username]'");
$count= mysqli_num_rows($res);

if($count > 0)
{
echo "<script type='text/javascript'>alert('Ky username ekziston ne databaze!!');</script>";
}
else
{
if(mysqli_query($conn, $query)){
    echo "<script type='text/javascript'>alert('U rregjistruat me sukses! Ju lutem, Logohuni.');</script>";
      header("Location:rregjistrimi.php");
        }

}
}



else {
echo "<ul style='text-align: left'>";
foreach($validime_array as $value){
echo "<li style='color:red'>". $value . "</li>";
}
echo "</ul>";
} 
mysqli_close($conn);

}
?>

<!DOCTYPE HTML>
<html lang="zxx">
<head>
    <title> Login|Regjistrimi|Pagat</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Triple Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Meta tag Keywords -->

    <!-- css files -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext" rel="stylesheet">
    <!-- //web-fonts -->
</head>

<body>
    <div class="main-bg">
        <!-- title -->
        <!--<h1>Triple Forms</h1>-->
        <br>
        <!-- //title -->
        <div class="sub-main-w3">
            <div class="image-style">

            </div>
            <!-- vertical tabs -->
            <div class="vertical-tab">
                <div id="section1" class="section-w3ls">
                    <input type="radio" name="sections" id="option1" checked>
                    <label for="option1" class="icon-left-w3pvt">
                        <span class="fa fa-user-circle" aria-hidden="true"></span>Login</label>
                    <article>
                        <form action="login.php" method="post">
                            <!-- LOGIMI START -->
                            <h3 class="legend">Logohu</h3>
                            <div class="input">
                                <span class="fa fa-user" aria-hidden="true"></span>
                                <input type="text" placeholder="Username" name="username" required />
                            </div>
                            <div class="input">
                                <span class="fa fa-key" aria-hidden="true"></span>
                                <input type="password" placeholder="Password" name="pass" required />
                            </div>
                            <button type="submit" name="submit" class="btn submit">Login</button>
                            <!--LOGIMI END -->
                        </form>
                    </article>
                </div>
                
                <!-- REGISTRATION FORM START -->
                <div id="section2" class="section-w3ls">
                    <input type="radio" name="sections" id="option2">
                    <label for="option2" class="icon-left-w3pvt"><span class="fa fa-pencil-square" aria-hidden="true"></span>Register</label>
                    <article>
                        <form action=" " method="post">
                            <h3 class="legend">Rregjistrohu</h3>
                            <div class="input">
                                <span class="fa fa-user-o" aria-hidden="true"></span>
                                <input type="text" placeholder="Emri" name="emri"  />
                            </div>
                            
                            <div class="input">
                                <span class="fa fa-user-o" aria-hidden="true"></span>
                                <input type="text" placeholder="Mbiemri" name="mbiemri"  />
                            </div>
                            
                            
                            <div class="input">
                                <span class="fa fa-user-o" aria-hidden="true"></span>
                                <input type="text" placeholder="Username" name="username"  />
                            </div>
                            
                            
                            <div class="input">
                                <span class="fa fa-key" aria-hidden="true"></span>
                                <input type="password" placeholder="Password" name="password"  />
                            </div>
                            
                            <div class="input">
                                <span class="fa fa-key" aria-hidden="true"></span>
                                <input type="password" placeholder="Confirm Password" name="psw"  />
                            </div>
                            <button type="submit" name="submit1" class="btn submit">Rregjistrohu</button>
<!--                            
                            <div id="d1" style="color:red;"></div>-->
                            
                        </form>
                    </article>
                </div>
                
                <!-- REGISTRATION FORM END -->

            </div>
            <!-- //vertical tabs -->
            <div class="clear"></div>
        </div>
        <!-- copyright -->
        <div class="copyright">
            <h2>&copy; 2020. Developed by Joana Shehaj</h2>
        </div>
        <!-- //copyright -->
    </div>

</body>
</html>
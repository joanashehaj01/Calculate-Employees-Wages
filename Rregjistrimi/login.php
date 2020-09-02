<?php
// Inialize session

session_start();

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

if(isset($_POST["submit"])){

$username = filter_input(INPUT_POST,'username');
$passwordKoduar = md5($_POST['pass']);

//$emri = $row["Emri"];

if(empty($username) || empty($passwordKoduar))
{
    
    echo '<script> alert("Ju lutem plotesoni Username dhe passwordin!")</script>';
    header("refresh:0;url=rregjistrimi.php");
}

else
{
$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$username."' and password = '".$passwordKoduar."'");
$query = mysqli_query($conn,"select * from user where username = '".$username."'");
$query2 = mysqli_query($conn,"select * from user where password = '".$passwordKoduar."'");


$res = mysqli_num_rows($query);
if(!$res)
{
 header("refresh:0; url=../index.php");
      echo '<script> alert("Nuk ka llogari me kete username!!") </script>';    
}

$res2 = mysqli_num_rows($query2);
if(!$res2)
{
 header("refresh:0; url=../index.php");
      echo '<script> alert("Nuk ka llogari me kete password!!") </script>';    
}


$count= mysqli_num_rows($sql);

    if(mysqli_num_rows($sql) == 1)
    {
     $row = mysqli_fetch_array($sql, MYSQLI_BOTH);
     
     if($row['Tipi'] == 'Admin')
     {
       
      $_SESSION['Tipi'] = $row["Tipi"];
      $_SESSION['username'] = $username;
      $_SESSION['Emri'] = $emri;
      header("Location:../index.php");
     }
     else if($row["Tipi"] == 'Perdorues')
     {
      $_SESSION['Tipi'] = $row["Tipi"];
      $_SESSION['username'] = $username;
      
      header("Location:../index.php");
     }
    }
    
    
    // else
    // {
    //   header("refresh:0; url=../index.php");
    //   echo '<script> alert("Username/Passwordi nuk jane te sakta.Ju lutem provojeni përsëri!") </script>'; 
      
    // }

    }
}
?>


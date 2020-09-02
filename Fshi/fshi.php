<?php
if(isset($_REQUEST["Id"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paga";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$Id = $_REQUEST["Id"];

$sql = mysqli_query($conn,"DELETE FROM llogaritjet Where Id_paga=$Id");
    
if($sql){    header("Location:../Histori/Histori.php");
}

 else {
    echo "Fshirja nuk u realizua suksesshem";
}
}
?>
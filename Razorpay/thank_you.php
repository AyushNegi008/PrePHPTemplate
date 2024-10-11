<?php
$expire = 365*24*3600;
ini_set('session.gc_maxlifetime','expire');          
session_start();
setcookie(session_name(),session_id(),time()+$expire);

if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
?>



<?php 
$usernamef=$_SESSION['username'];
?>


<h1>Payment Complete</h1>


<?php
require 'dbcon.php';

$sql = "SELECT * FROM orders WHERE username= '$usernamef'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
                $array =$row['order_list'];
                $detail =$row['detail'];
                $sdatabasearray=unserialize(base64_decode($array));
                $detailll=unserialize(base64_decode($detail));
        }
        mysqli_free_result($result);
    } 
    else{
        echo "No records matching your query were found.";
    }
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


print_r($detailll);
print_r($sdatabasearray);
?>
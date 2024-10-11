<?php
$expire = 365*24*3600;
ini_set('session.gc_maxlifetime','expire');          
session_start();
setcookie(session_name(),session_id(),time()+$expire);

if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
	header("location:login.php");
	exit;
}
if(!isset($_SESSION['seeprofile'])||$_SESSION['seeprofile']!=true){
	header("location:home.php");
	exit;
}
if(!isset($_SESSION['checkout'])||$_SESSION['checkout']!=true){
	header("location:book.php");
	exit;
}
if(!isset($_SESSION['datefixed'])||$_SESSION['datefixed']!=true){
	header("location:index.php");
	exit;
}
?>


<?php
echo $_SESSION['datefixed'];


if($_SESSION['datefixed']<"". date("d-m-y",strtotime('+0 day')).""){
	echo "not valid";
}
?>
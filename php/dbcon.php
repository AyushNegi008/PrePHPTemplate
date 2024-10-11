<?php

$server = "localhost";
$usenam = "root";
$password = "";
$database = "smdb_last_backup";

$conn = mysqli_connect($server, $usenam, $password, $database);
if ($conn){
    
}
else{
    die("Error". mysqli_connect_error());
}


?>

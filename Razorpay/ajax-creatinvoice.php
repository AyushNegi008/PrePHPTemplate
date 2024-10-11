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
	echo
        "
            <script>
               alert('default date is fixed');
            </script>
    ";
}
?>

<?php
$username = $_SESSION['username'];
$orderlist = $_SESSION['orderlist'];
$serviceprovider=$_SESSION['profileusername'];
$profileusername=$_SESSION['profileusername'];
$datefixed=0;
$datefixed=$_SESSION['datefixed'];
?>

<?php
require 'dbcon.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username= '$username'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
                $id =$row['id'];
                
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
?>





<?php
require 'dbcon.php';

$sql = "SELECT * FROM user WHERE username= '$serviceprovider'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
                $sellerid =$row['id'];
                
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
?>


<?php
require 'dbcon.php';
$username = $_SESSION['username'];
//$link = mysqli_connect("localhost", "root", "", "userayn321");


//if($link === false){
//    die("ERROR: Could not connect. " . mysqli_connect_error());
//}
 
// Attempt select query execution
//INSERT INTO `priceingdetail` (`sno`, `id`, `username`, `stype`, `option1`, `price1`, `option2`, `price2`, `option3`, `price3`, `option4`, `price4`, `option5`, `price5`, `option6`, `price6`, `option7`, `price7`, `option8`, `price8`, `option9`, `price9`, `option10`, `price10`, `option11`, `price11`, `option12`, `price12`, `option13`, `price13`, `option14`, `price14`, `option15`, `price15`, `option16`, `price16`, `option17`, `price17`, `option18`, `price18`, `option19`, `price19`, `option20`, `price20`, `limit1`, `limit2`) VALUES (NULL, '12', 'ayush', '0', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, NULL, NULL);
$sql = "SELECT * FROM priceingdetail WHERE username= '$serviceprovider'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        //echo "<table>";
        //    echo "<tr>";
        //        echo "<th>id</th>";

        //    echo "</tr>";
        while($row = mysqli_fetch_array($result)){
        //    echo "<tr>";
        //        echo "<td>" . $row['id'] . "</td>";
                $option1 =$row['option1'];
                $option2 =$row['option2'];
                $option3 =$row['option3'];
                $option4 =$row['option4'];
                $option5 =$row['option5'];
                $option6 =$row['option6'];
                $option7 =$row['option7'];
                $option8 =$row['option8'];
                $option9 =$row['option9'];
                $option10 =$row['option10'];
                $option11 =$row['option11'];
                $option12 =$row['option12'];
                $option13 =$row['option13'];
                $option14 =$row['option14'];
                $option15 =$row['option15'];
                $option16 =$row['option16'];
                $option17 =$row['option17'];
                $option18 =$row['option18'];
                $option19 =$row['option19'];
                $option20 =$row['option20'];

                $price1 =$row['price1'];
                $price2 =$row['price2'];
                $price3 =$row['price3'];
                $price4 =$row['price4'];
                $price5 =$row['price5'];
                $price6 =$row['price6'];
                $price7 =$row['price7'];
                $price8 =$row['price8'];
                $price9 =$row['price9'];
                $price10 =$row['price10'];
                $price11 =$row['price11'];
                $price12 =$row['price12'];
                $price13 =$row['price13'];
                $price14 =$row['price14'];
                $price15 =$row['price15'];
                $price16 =$row['price16'];
                $price17 =$row['price17'];
                $price18 =$row['price18'];
                $price19 =$row['price19'];
                $price20 =$row['price20'];

                $limit1 =$row['limit1'];
                $limit2 =$row['limit2'];

                

        //    echo "</tr>";
        }
        //echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } 
    else{
        echo "No records matching your query were found.";
    }
} 
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
// Close connection
//mysqli_close($link);
?>



<?php
$totalamt=0;
$allcheckoutorderpricelist=array();
?>
<?php foreach($orderlist as $orderr): ?>
	<?php
	
	if ($orderr=='1'){
		$totalamt=$totalamt+$price1;
		$allcheckoutorderpricelist[]=array('service'=>$option1, 'price'=>$price1);
	}
	
	if ($orderr=='2'){
		$totalamt=$totalamt+$price2;
		$allcheckoutorderpricelist[]=array('service'=>$option2, 'price'=>$price2);
	}
	
	if ($orderr=='3'){
		$totalamt=$totalamt+$price3;
		$allcheckoutorderpricelist[]=array('service'=>$option3, 'price'=>$price3);
	}
	
	if ($orderr=='4'){
		$totalamt=$totalamt+$price4;
		$allcheckoutorderpricelist[]=array('service'=>$option4, 'price'=>$price4);
	}
	
	if ($orderr=='5'){
		$totalamt=$totalamt+$price5;
		$allcheckoutorderpricelist[]=array('service'=>$option5, 'price'=>$price5);
	}
	
	if ($orderr=='6'){
		$totalamt=$totalamt+$price6;
		$allcheckoutorderpricelist[]=array('service'=>$option6, 'price'=>$price6);
	}
	
	if ($orderr=='7'){
		$totalamt=$totalamt+$price7;
		$allcheckoutorderpricelist[]=array('service'=>$option7, 'price'=>$price7);
	}
	
	if ($orderr=='8'){
		$totalamt=$totalamt+$price8;
		$allcheckoutorderpricelist[]=array('service'=>$option8, 'price'=>$price8);
	}
	
	if ($orderr=='9'){
		$totalamt=$totalamt+$price9;
		$allcheckoutorderpricelist[]=array('service'=>$option9, 'price'=>$price9);
	}
	
	if ($orderr=='10'){
		$totalamt=$totalamt+$price10;
		$allcheckoutorderpricelist[]=array('service'=>$option10, 'price'=>$price10);
	}
	
	if ($orderr=='11'){
		$totalamt=$totalamt+$price11;
		$allcheckoutorderpricelist[]=array('service'=>$option11, 'price'=>$price11);
	}
	
	if ($orderr=='12'){
		$totalamt=$totalamt+$price12;
		$allcheckoutorderpricelist[]=array('service'=>$option12, 'price'=>$price12);
	}
	
	if ($orderr=='13'){
		$totalamt=$totalamt+$price13;
		$allcheckoutorderpricelist[]=array('service'=>$option13, 'price'=>$price13);
	}
	
	if ($orderr=='14'){
		$totalamt=$totalamt+$price14;
		$allcheckoutorderpricelist[]=array('service'=>$option14, 'price'=>$price14);
	}
	
	if ($orderr=='15'){
		$totalamt=$totalamt+$price15;
		$allcheckoutorderpricelist[]=array('service'=>$option15, 'price'=>$price15);
	}
	
	if ($orderr=='16'){
		$totalamt=$totalamt+$price16;
		$allcheckoutorderpricelist[]=array('service'=>$option16, 'price'=>$price16);
	}
	
	if ($orderr=='17'){
		$totalamt=$totalamt+$price17;
		$allcheckoutorderpricelist[]=array('service'=>$option17, 'price'=>$price17);
	}
	
	if ($orderr=='18'){
		$totalamt=$totalamt+$price18;
		$allcheckoutorderpricelist[]=array('service'=>$option18, 'price'=>$price18);
	}
	
	if ($orderr=='19'){
		$totalamt=$totalamt+$price19;
		$allcheckoutorderpricelist[]=array('service'=>$option19, 'price'=>$price19);
	}
	
	if ($orderr=='20'){
		$totalamt=$totalamt+$price20;
		$allcheckoutorderpricelist[]=array('service'=>$option20, 'price'=>$price20);
	}




	?>



<?php endforeach;?>
























<body style="display:flex;
			align-items:center;
			justify-content:center;
			flex-direction: column;">
<pre>
<?php
print_r($allcheckoutorderpricelist);
?>
</pre>






<?php
$databasearray=array();
?>
<?php foreach($allcheckoutorderpricelist as $orderprice):?>
<?php
	$service=$orderprice['service'];
	$price=$orderprice['price'];
?>
<?php
	$databasearray["$service"] = $price;
?>
<?php endforeach;?>




<?php if($datefixed==0):?>
										<?php $holidate1="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+9day'))){
							                $holidate1="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate1=="true"): ?>
							                
							            <?php endif; ?>
							            <?php if ($holidate1!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+9 day')).""?>
							            <?php endif; ?>








							            <?php $holidate2="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+8day'))){
							                $holidate2="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate2=="true"): ?>
							                
							            <?php endif; ?>
							            
							            <?php if ($holidate2!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+8 day')).""?>
							            <?php endif; ?>









							            <?php $holidate3="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+7day'))){
							                $holidate3="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate3=="true"): ?>
							                
							            <?php endif; ?>

							            <?php if ($holidate3!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+7 day')).""?>
							            <?php endif; ?>






							            <?php $holidate4="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+6day'))){
							                $holidate4="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate4=="true"): ?>

							            <?php endif; ?>
							      
							            <?php if ($holidate4!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+6 day')).""?>
							            <?php endif; ?>








										<?php $holidate5="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+5day'))){
							                $holidate5="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate5=="true"): ?>
							                
							            <?php endif; ?>
							            
							            <?php if ($holidate5!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+5 day')).""?>
							            <?php endif; ?>



										
										
										
										<?php $holidate6="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+4day'))){
							                $holidate6="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate6=="true"): ?>
							                >

							            <?php endif; ?>
							            
							            <?php if ($holidate6!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+4 day')).""?>

							            <?php endif; ?>















							            <?php $holidate7="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+3day'))){
							                $holidate7="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate7=="true"): ?>
							            <?php endif; ?>
							            
							            <?php if ($holidate7!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+3 day')).""?>
							            <?php endif; ?>
										









										<?php $holidate8="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+2day'))){
							                $holidate8="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate8=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate8!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+2 day')).""?>
							            <?php endif; ?>



										







										<?php $holidate9="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+1day'))){
							                $holidate9="true";
							            };
							            ?>

							            <?php endforeach; ?>
							            <?php if ($holidate9=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate9!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+1 day')).""?>
							            <?php endif; ?>
















										<?php $holidate10="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+0day'))){
							                $holidate10="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            
							            <?php if ($holidate10=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate10!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+0 day')).""?>
							            <?php endif; ?>

<?php endif;?>


<?php if($datefixed!=0){
	$datefixed=$_SESSION['datefixed'];
}
?>


<?php if($datefixed<"". date("d-m-y",strtotime('+0 day')).""):?>
										<?php $holidate1="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+9day'))){
							                $holidate1="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate1=="true"): ?>
							                
							            <?php endif; ?>
							            <?php if ($holidate1!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+9 day')).""?>
							            <?php endif; ?>








							            <?php $holidate2="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+8day'))){
							                $holidate2="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate2=="true"): ?>
							                
							            <?php endif; ?>
							            
							            <?php if ($holidate2!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+8 day')).""?>
							            <?php endif; ?>









							            <?php $holidate3="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+7day'))){
							                $holidate3="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate3=="true"): ?>
							                
							            <?php endif; ?>

							            <?php if ($holidate3!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+7 day')).""?>
							            <?php endif; ?>






							            <?php $holidate4="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+6day'))){
							                $holidate4="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate4=="true"): ?>

							            <?php endif; ?>
							      
							            <?php if ($holidate4!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+6 day')).""?>
							            <?php endif; ?>








										<?php $holidate5="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+5day'))){
							                $holidate5="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate5=="true"): ?>
							                
							            <?php endif; ?>
							            
							            <?php if ($holidate5!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+5 day')).""?>
							            <?php endif; ?>



										
										
										
										<?php $holidate6="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+4day'))){
							                $holidate6="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate6=="true"): ?>
							                >

							            <?php endif; ?>
							            
							            <?php if ($holidate6!="true"): ?>
							                
							                <?php $datefixed = "". date("d-m-y",strtotime('+4 day')).""?>

							            <?php endif; ?>















							            <?php $holidate7="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+3day'))){
							                $holidate7="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate7=="true"): ?>
							            <?php endif; ?>
							            
							            <?php if ($holidate7!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+3 day')).""?>
							            <?php endif; ?>
										









										<?php $holidate8="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+2day'))){
							                $holidate8="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate8=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate8!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+2 day')).""?>
							            <?php endif; ?>



										







										<?php $holidate9="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+1day'))){
							                $holidate9="true";
							            };
							            ?>

							            <?php endforeach; ?>
							            <?php if ($holidate9=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate9!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+1 day')).""?>
							            <?php endif; ?>
















										<?php $holidate10="false";?>
							            <?php
							            $sql = "SELECT * FROM bookpaged WHERE username='$profileusername'";
							            $resultt = mysqli_query($conn, $sql) or die("SQL Query Failed.");
							            if(mysqli_num_rows($resultt) > 0){
							                while($row = mysqli_fetch_array($resultt)){
							                    $sarray=$row["ldates"];
							                }
							            }
							            $dsarray=unserialize(base64_decode($sarray));
							            ?>
							            <?php foreach($dsarray as $dsarra): ?>
							            <?php
							            if($dsarra == date('d.m.y',strtotime('+0day'))){
							                $holidate10="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            
							            <?php if ($holidate10=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate10!="true"): ?>
							                <?php $datefixed = "". date("d-m-y",strtotime('+0 day')).""?>
							            <?php endif; ?>

<?php endif;?>






<?php
$detail = "$username ordered follwing services on ". date("y-m-d",strtotime('+0 day'))." which is fixed to be deliverd on $datefixed by $serviceprovider.";
$sdetail=base64_encode(serialize($detail));

?>
<?php
$sdatabasearray=base64_encode(serialize($databasearray));
?>














<?php


    

    $username = $_SESSION['username'];

	$sql23 = "INSERT INTO `orders` (`orderid`, `id`, `username`, `detail`, `sellerusername`, `sellerid`, `done`, `rating`, `review`, `orderd_on`, `fix_to_be_done_on`, `delivered_on`, `order_list`) VALUES (NULL, '$id', '$username', '$sdetail', '$serviceprovider', '$sellerid', '0', NULL, '', current_timestamp(), '$datefixed', NULL ,'$sdatabasearray')";

	$resull = mysqli_query($conn, $sql23) or die("SQL Query Failed.");
    

	header("location:thank_you.php");

?>








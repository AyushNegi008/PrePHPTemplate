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
?>

<?php
$username = $_SESSION['username'];
$orderlist = $_SESSION['orderlist'];
$serviceprovider=$_SESSION['profileusername'];
$profileusername=$_SESSION['profileusername'];
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






















<!DOCTYPE html>
<html>
	<head>
		<title>payment gateway</title>
		<link rel="stylesheet"href="index.css">
	</head>

<body style="display:flex;
			align-items:center;
			justify-content:center;
			flex-direction: column;">
<pre>
<?php
print_r($allcheckoutorderpricelist);
?>
</pre>
















<?php $datefixed=0; ?>
<?php
	$fixeddate = false;
	if(isset($_POST['chosen'])){

		if(isset($_POST['choice10'])){
			$datefixed= "". date("d-m-y",strtotime('+9 day'))."";						 
		}
		if(isset($_POST['choice9'])){
			$datefixed= "". date("y-m-d",strtotime('+8 day'))."";		
		}
		if(isset($_POST['choice8'])){
			$datefixed= "". date("y-m-d",strtotime('+7 day'))."";	
		}
		if(isset($_POST['choice7'])){
			$datefixed= "". date("y-m-d",strtotime('+6 day'))."";		
		}
		if(isset($_POST['choice6'])){
			$datefixed= "". date("y-m-d",strtotime('+5 day'))."";	
		}
		if(isset($_POST['choice5'])){
			$datefixed= "". date("y-m-d",strtotime('+4 day'))."";		
		}
		if(isset($_POST['choice4'])){
			$datefixed= "". date("y-m-d",strtotime('+3 day'))."";		
		}
		if(isset($_POST['choice3'])){
			$datefixed= "". date("y-m-d",strtotime('+2 day'))."";	
		}
		if(isset($_POST['choice2'])){
			$datefixed= "". date("y-m-d",strtotime('+1 day'))."";			
		}
		if(isset($_POST['choice1'])){
			$datefixed= "". date("y-m-d",strtotime('+0 day'))."";			
		}
	
	echo "$datefixed fixed";
	
	$fixeddate = true;   

	$_SESSION['datefixed'] = true;
	$_SESSION['datefixed'] = $datefixed;

	$date = $_SESSION['datefixed'];

	
};

?>
















<form class="list" method='POST' action=''>


					<div class="aval">
								<div class="inaval">
										<div class="iinaval" style="display:flex;
													flex-direction:row;">
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
							            if($dsarra == date('d.m.y',strtotime('+0day'))){
							                $holidate1="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate1=="true"): ?>
							                
							            <?php endif; ?>
							            <?php if ($holidate1!="true"): ?>
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice1" value="<?php echo"". date("d",strtotime('+0 day')).""?>"><?php echo"". date("d",strtotime('+0 day')).""?>
												</div>
											</div>
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
							            if($dsarra == date('d.m.y',strtotime('+1day'))){
							                $holidate2="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate2=="true"): ?>
							                
							            <?php endif; ?>
							            
							            <?php if ($holidate2!="true"): ?>
							                
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice2" value="<?php echo"". date("d",strtotime('+1 day')).""?>"><?php echo"". date("d",strtotime('+1 day')).""?>
												</div>
											</div>
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
							            if($dsarra == date('d.m.y',strtotime('+2day'))){
							                $holidate3="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate3=="true"): ?>
							                
							            <?php endif; ?>

							            <?php if ($holidate3!="true"): ?>
							                
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice3" value="<?php echo"". date("d",strtotime('+2 day')).""?>"><?php echo"". date("d",strtotime('+2 day')).""?>
												</div>
											</div>
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
							            if($dsarra == date('d.m.y',strtotime('+3day'))){
							                $holidate4="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate4=="true"): ?>

							            <?php endif; ?>
							      
							            <?php if ($holidate4!="true"): ?>
							                
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice4" value="<?php echo"". date("d",strtotime('+3 day')).""?>"><?php echo"". date("d",strtotime('+3 day')).""?>
												</div>
											</div>
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
							            if($dsarra == date('d.m.y',strtotime('+4day'))){
							                $holidate5="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate5=="true"): ?>
							                
							            <?php endif; ?>
							            
							            <?php if ($holidate5!="true"): ?>
							                
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice5" value="<?php echo"". date("d",strtotime('+4 day')).""?>"><?php echo"". date("d",strtotime('+4 day')).""?>
												</div>
											</div>
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
							            if($dsarra == date('d.m.y',strtotime('+5day'))){
							                $holidate6="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate6=="true"): ?>
							                >

							            <?php endif; ?>
							            
							            <?php if ($holidate6!="true"): ?>
							                
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice6" value="<?php echo"". date("d",strtotime('+5 day')).""?>"><?php echo"". date("d",strtotime('+5 day')).""?>
												</div>
											</div>

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
							            if($dsarra == date('d.m.y',strtotime('+6day'))){
							                $holidate7="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate7=="true"): ?>
							            <?php endif; ?>
							            
							            <?php if ($holidate7!="true"): ?>
							                
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice7" value="<?php echo"". date("d",strtotime('+6 day')).""?>"><?php echo"". date("d",strtotime('+6 day')).""?>
												</div>
											</div>
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
							            if($dsarra == date('d.m.y',strtotime('+7day'))){
							                $holidate8="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            <?php if ($holidate8=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate8!="true"): ?>
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice8" value="<?php echo"". date("d",strtotime('+7 day')).""?>"><?php echo"". date("d",strtotime('+7 day')).""?>
												</div>
											</div>
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
							            if($dsarra == date('d.m.y',strtotime('+8day'))){
							                $holidate9="true";
							            };
							            ?>

							            <?php endforeach; ?>
							            <?php if ($holidate9=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate9!="true"): ?>
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice9" value="<?php echo"". date("d",strtotime('+8 day')).""?>"><?php echo"". date("d",strtotime('+8 day')).""?>
												</div>
											</div>
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
							            if($dsarra == date('d.m.y',strtotime('+9day'))){
							                $holidate10="true";
							            };
							            ?>
							            <?php endforeach; ?>
							            
							            <?php if ($holidate10=="true"): ?>
							            <?php endif; ?>

							            <?php if ($holidate10!="true"): ?>
							               
							                <div class="option">
												<div class="tick" style="display:flex;
													flex-direction:column;">
												<input type="checkbox" class="checkbox" name="choice10" value="<?php echo"". date("d",strtotime('+9 day')).""?>"><?php echo"". date("d",strtotime('+9 day')).""?>
												</div>
											</div>
							            <?php endif; ?>

										
									</div>
								</div>
							</div>
							<button name="chosen">fix this date</button>

	
</form>














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











<button id="rzp-button1">Pay now</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>



<script>

var options = {
	
		"key": "rzp_test_xMQIJ4nxmkDYK1", 
		"amount": <?php echo $totalamt; ?>*100, 
		"currency": "INR",
		"name": "<?php echo $username; ?>",
		"description": "Transaction_to_<?php echo $serviceprovider; ?>_by_<?php echo $username; ?>",
		
		"handler": function (response){
	        window.location.href="ajax-creatinvoice.php";
	        
	    }

	



};
                           

var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();

}

</script>

</body>
</html>

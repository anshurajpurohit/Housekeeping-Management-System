<?php
include("connect.php");
$cid=$_REQUEST['cid'];
$hf=$_REQUEST['hf'];		

if($hf=="HALF DAY")
{
	$temp1=mysqli_query($conn,"select half_day_charges from charges_detail where cat_id='$cid'");
}else{
	$temp1=mysqli_query($conn,"select full_day_charges from charges_detail where cat_id='$cid'");
}		
if(mysqli_num_rows($temp1)>0)
{
	$t1=mysqli_fetch_array($temp1);
	echo $t1[0];
}
?>							
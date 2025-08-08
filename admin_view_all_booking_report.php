<?php

include("admin_header.php");
include("connect.php");


if(isset($_REQUEST['ncbid']))
{
	$bid=$_REQUEST['ncbid'];
	$query="update booking_master set booking_status='2',hk_id='0' where booking_id='$bid'";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Booking Not Confirmed Successfully');";
		echo "window.location.href='admin_view_new_booking.php';";
		echo "</script>";
	}
}


?>

   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>VIEW NOT CONFIRM BOOKING DETAIL</h2>
                         
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
    

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
              
         
		
            </div>
	  
        </div>
        <div class="col-sm-12">
			<?php
			
			$qur1=mysqli_query($conn,"select * from booking_master");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>BOOKING ID</th>
						<th>BOOKING DATE</th>
						<th>START DATE</th>
						<th>END DATE</th>
						<th>HALF/FULL</th>
						<th>NO OF DAYS</th>
						<th>CHARGES</th>
						<th>AMOUNT</th>
						
						<th>CLIENT NAME</th>
						<th>MOBILE NO</th>
						<th>BOOKING STATUS</th>
						
					</tr>";
					
				while($q1=mysqli_fetch_array($qur1))
				{
					echo "<tr>";
					echo "<td>$q1[0]</td>";
					echo "<td>$q1[1]</td>";
					echo "<td>$q1[2]</td>";
					echo "<td>$q1[3]</td>";
					
					if($q1[6]=="1")
					{
						echo "<td>HALF DAY</td>";
					}else{
						echo "<td>FULL DAY</td>";
					}
					
					echo "<td>$q1[7]</td>";
					echo "<td>$q1[5]</td>";
					echo "<td>$q1[8]</td>";
					
					$res2=mysqli_query($conn,"select * from client_master where client_id='$q1[11]'");
					$r2=mysqli_fetch_array($res2);
					echo "<td>$r2[1]</td>";
					echo "<td>$r2[4]</td>";
					
					if($q1[9]=="0")
					{
						echo "<td style='color: blue;'><b>NEW BOOKING</b></td>";
					}else if($q1[9]=="1")
					{
						echo "<td style='color: green;'><b>CONFIRM</b></td>";
					}else if($q1[9]=="2")
					{
						echo "<td style='color: red;'><b>NOT CONFIRM</b></td>";
					}
					echo "</tr>";
				}
					
					
				echo "</table>";
			}else{
				echo "<h2>No Booking Found<Br/><Br/><Br/><Br/><Br/><Br/></h2>";
			}
		?>
		</div>
      </div>

<?php
include("footer.php");
?>
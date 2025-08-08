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
                           <h2>CUSTOMER  DETAIL REPORT</h2>
                         
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
			
			$qur1=mysqli_query($conn,"select * from client_master");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>CLIENT ID</th>
						<th>CLIENT NAME</th>
						<th>ADDRESS</th>
						<th>CITY</th>
						<th>MOBILE NO</th>
						<th>EMAIL ID</th>
						
						<th>VIEW BOOKING DETAIL</th>
						
					</tr>";
					
				while($q1=mysqli_fetch_array($qur1))
				{
					echo "<tr>";
					echo "<td>$q1[0]</td>";
					echo "<td>$q1[1]</td>";
					echo "<td>$q1[2]</td>";
					echo "<td>$q1[3]</td>";
					echo "<td>$q1[4]</td>";
					echo "<td>$q1[5]</td>";
					echo "<td><a href='admin_view_client_wise_booking_report.php?cid=$q1[0]'>VIEW BOOKING DETAIL</a></td>";
					echo "</tr>";
				}
					
					
				echo "</table>";
			}else{
				echo "<h2>No Record Found<Br/><Br/><Br/><Br/><Br/><Br/></h2>";
			}
		?>
		</div>
      </div>

<?php
include("footer.php");
?>
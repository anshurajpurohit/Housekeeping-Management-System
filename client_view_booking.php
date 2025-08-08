<?php
session_start();
include("header.php");
include("connect.php");


?>

   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>VIEW BOOKING DETAIL</h2>
                         
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
			$clientid=$_SESSION['clientid'];
			$qur1=mysqli_query($conn,"select * from booking_master where client_id='$clientid'");
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
						<th>BOOKING STATUS</th>
						<th>HOUSEKEEPER DETAIL</th>
						
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
					
					if($q1[9]=="0")
					{
						echo "<td>NEW BOOKING REQUEST</td>";
						
						echo "<td>--------------</td>";
					}else if($q1[9]=="1"){
						echo "<td style='color:green;'><b>CONFIRM</b></td>";
						$res1=mysqli_query($conn,"select * from housekeeper_detail where hk_id='$q1[10]'");
						$r1=mysqli_fetch_array($res1);
						echo "<td style='color:green;'><b>$r1[1]</b></td>";
					}else if($q1[9]=="2")
					{
						echo "<td style='color:red;'><b>NOT CONFIRM</b></td>";
						echo "<td>--------------</td>";
					}
					
					echo "</tr>";
				}
					
					
				echo "</table>";
			}else{
				echo "<h2>No Booking Found</h2>";
			}
		?>
		</div>
      </div>

<?php
include("footer.php");
?>
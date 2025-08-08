<?php
session_start();
include("header.php");
include("connect.php");


?>

   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>VIEW COMPLAIN DETAIL</h2>
                         
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
			$qur1=mysqli_query($conn,"select * from complain_master where client_id='$clientid'");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>COMPLAIN ID</th>
						<th>COMPLAIN DATE</th>
						<th>HOUSEKEEPER NAME</th>
						<th>COMPLAIN DESCRIPTION</th>
						<th>COMPLAIN STATUS</th>
						
					</tr>";
					
				while($q1=mysqli_fetch_array($qur1))
				{
					echo "<tr>";
					echo "<td>$q1[0]</td>";
					echo "<td>$q1[1]</td>";
					
					//echo "<td>$q1[3]</td>";
					$qur2=mysqli_query($conn,"select * from housekeeper_detail where hk_id='$q1[3]'");
					$q2=mysqli_fetch_array($qur2);
					echo "<td>$q2[1]</td>";
					echo "<td>$q1[4]</td>";
					if($q1[5]=="0")
					{
						echo "<td style='color: blue;'><b>COMPLAIN REGISTERED</b></td>";
					}else if($q1[5]=="1"){
						echo "<td style='color: orange;'><b>VERIFIED COMPLAIN</b></td>";
					}else if($q1[5]=="2"){
						echo "<td style='color: red;'><b>NOT VERIFIED COMPLAIN</b></td>";
					}else if($q1[5]=="3"){
						echo "<td style='color: pink;'><b>PENDING COMPLAIN</b></td>";
					}else if($q1[5]=="4"){
						echo "<td style='color: green;'><b> COMPLAIN SOLVED</b></td>";
					}
					
					
					echo "</tr>";
				}
					
					
				echo "</table>";
			}else{
				echo "<h2>No Complain Found</h2>";
			}
		?>
		</div>
      </div>

<?php
include("footer.php");
?>
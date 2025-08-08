<?php
session_start();
include("admin_header.php");
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
	
			$qur1=mysqli_query($conn,"select * from complain_master where complain_status!='4'");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>COMPLAIN ID</th>
						<th>COMPLAIN DATE</th>
						<th>CLIENT NAME</th>
						<th>MOBILE NO</th>
						<th>HOUSEKEEPER NAME</th>
						<th>COMPLAIN DESCRIPTION</th>
						<th>COMPLAIN STATUS</th>
						<th>UPDATE STATUS</th>
					</tr>";
					
				while($q1=mysqli_fetch_array($qur1))
				{
					echo "<tr>";
					echo "<td>$q1[0]</td>";
					echo "<td>$q1[1]</td>";
					$res2=mysqli_query($conn,"select * from client_master where client_id='$q1[2]'");
					$r2=mysqli_fetch_array($res2);
					echo "<td>$r2[1]</td>";
					echo "<td>$r2[4]</td>";
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
					
					echo "<td><a class='btn btn-warning' href='admin_update_complain_status.php?cid=$q1[0]&cstat=$q1[5]'>UPDATE STATUS</a></td>";
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
<?php
include("admin_header.php");
include("connect.php");

if(isset($_POST['btnview']))
{
	$sdate=date("Y-m-d",strtotime($_POST['txtsdate']));
	$edate=date("Y-m-d",strtotime($_POST['txtedate']));
}

?>
   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Category Wise Booking Report</h2>
                         
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
    

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
               
          
            <div style="padding:20px" class="col-sm-6">
	  <form method="post" name="form1">
           
             
                <div style="margin-top:10px;" class="row">
                     <div style="padding-top:10px;" class="col-sm-12"><label>Enter Start Date:</label></div>
                   <div class="col-sm-12"><input type="date" name="txtsdate" value="<?php if(isset($sdate)){ echo $sdate; }else{ echo date("Y-m-d"); } ?>" class="form-control input-sm" ></div>
                </div>
                
                
         
            </div>
	  
	  <div style="padding:20px" class="col-sm-6">
	
             
                <div style="margin-top:10px;" class="row">
                     <div style="padding-top:10px;" class="col-sm-12"><label>Enter End Date:</label></div>
                   <div class="col-sm-12"><input type="date" name="txtedate" value="<?php if(isset($edate)){ echo $edate; }else{ echo date("Y-m-d"); } ?>" class="form-control input-sm" ></div>
                </div>
                
                
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
			
                     <button class="btn btn-info btn-sm" name="btnview" type="submit" onClick="return validation();">VIEW REPORT</button>
			
                    </div>
                </div>
	      </form>
            </div>
             <div class="col-sm-12">
                    
                  <div style="margin:50px" class="serv"> 
		<?php
			if(isset($_POST['btnview']))
			{
				$qur1=mysqli_query($conn,"select * from booking_master where booking_date>='$sdate' and booking_date<='$edate'");
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
			}
		?>
			

			</div>    
                
              </div>
            </div>
        </div>
        
      </div>

<?php
include("footer.php");
?>
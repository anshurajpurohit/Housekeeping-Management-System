<?php
include("admin_header.php");
include("connect.php");

$bid=$_REQUEST['cbid'];


?>

<script>
	function validation()
	{
		if(form1.selhk.value=="0")
		{
			alert("Please Enter Select Housekeeper");
			form1.selhk.focus();
			return false;
		}
		
		
	}
</script>

<?php


if(isset($_POST['btnupdate']))
{
	$bid=$_POST['txtbid'];
	$hkid=$_POST['selhk'];
	
	$query="update booking_master set booking_status='1',hk_id='$hkid' where booking_id='$bid'";
	
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Booking Confirmed Successfully');";
		echo "window.location.href='admin_view_new_booking.php';";
		echo "</script>";
	}
}

?>
   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Update Booking Status</h2>
                         
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
    

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
               
          
            <div style="padding:20px" class="col-sm-5">
	  <form method="post" name="form1">
            <h2 style="font-size:18px">Update Booking Status</h2>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Booking ID:</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Charges Id" name="txtbid" value="<?php echo $bid; ?>" class="form-control input-sm"  readonly></div>
                </div>
                <div style="margin-top:10px;" class="row">
                     <div style="padding-top:10px;" class="col-sm-12"><label>Select Housekeeper:</label></div>
                    <div class="col-sm-12">
			<select  name="selhk" class="form-control input-sm"  >
				<option value="0">--Select Housekeeper--</option>
			<?php
				$qur5=mysqli_query($conn,"select * from housekeeper_detail");
				while($q5=mysqli_fetch_array($qur5))
				{
					?>
					<option value="<?php echo $q5[0]; ?>" <?php if($cat1 == $q5[0]){ echo "selected='selected'"; } ?>><?php echo $q5[1]; ?></option>
					<?php
				}
			?>
			</select>
		</div>
		
                </div>
               
                
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
			
                     <button class="btn btn-info btn-sm" name="btnupdate" type="submit" onClick="return validation();">UPDATE STATUS</button>
			
                    </div>
                </div>
	      </form>
            </div>
             <div class="col-sm-6">
                    
                  <div style="margin:50px" class="serv"> 
		

			</div>    
                
              </div>
            </div>
        </div>
        
      </div>

<?php
include("footer.php");
?>
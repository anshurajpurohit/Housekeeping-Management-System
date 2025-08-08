<?php
include("admin_header.php");
include("connect.php");

$cid=$_REQUEST['cid'];
$cstat=$_REQUEST['cstat'];




if(isset($_POST['btnupdate']))
{
	$cid=$_POST['txtcid'];
	$status=$_POST['selstatus'];
	
	$query="update complain_master set complain_status='$status' where complain_id='$cid'";
	
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Complain Status Updated Successfully');";
		echo "window.location.href='admin_view_complain.php';";
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
            <h2 style="font-size:18px">Update Complain Status</h2>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Complain ID:</label></div>
                    <div class="col-sm-12"><input type="text"  name="txtcid" value="<?php echo $cid; ?>" class="form-control input-sm"  readonly></div>
                </div>
                <div style="margin-top:10px;" class="row">
                     <div style="padding-top:10px;" class="col-sm-12"><label>Select Status:</label></div>
                    <div class="col-sm-12">
			<select  name="selstatus" class="form-control input-sm"  >
				<option value="0" <?php if($cstat=="0"){ echo "selected='selected'"; } ?>>COMPLAIN REGISTERED</option>
			<option value="1" <?php if($cstat=="1"){ echo "selected='selected'"; } ?>>VERIFIED COMPLAIN</option>
			<option value="2" <?php if($cstat=="2"){ echo "selected='selected'"; } ?>>NOT VERIFIED COMPLAIN</option>
			<option value="3" <?php if($cstat=="3"){ echo "selected='selected'"; } ?>>PENDING COMPLAIN</option>
			<option value="4" <?php if($cstat=="4"){ echo "selected='selected'"; } ?>>COMPLAIN SOLVED</option>
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
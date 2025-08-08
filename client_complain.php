<?php
include("header.php");
include("connect.php");
?>

<script>

	
	function validation()
	{
		
		if(form1.selhk.value=="0")
		{
			alert("Please Select Housekeeper");
			form1.selhk.focus();
			return false;
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Complain Description");
			form1.txtdesc.focus();
			return false;
		}
		
	
	}
</script>

<?php
if(isset($_POST['btnsubmit']))
{
	$hkid=$_POST['selhk'];
	$desc=$_POST['txtdesc'];
	$clientid=$_SESSION['clientid'];
	$cdate =date("Y-m-d");
	//auto number code start...
	$res1=mysqli_query($conn,"select max(complain_id) from complain_master");
	$cid=0;
	while($r1=mysqli_fetch_array($res1))
	{
		$cid=$r1[0];
	}
	$cid++;
	//auto number code end...
		
	$query="insert into complain_master values('$cid','$cdate','$clientid','$hkid','$desc','0')";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Complain Submitted Successfully');";
		echo "window.location.href='client_view_complain.php';";
		echo "</script>";
	}
}

?>
   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>COMPLAIN</h2>
                         
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
    

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
               <div class="col-sm-6">
                    
                  <div style="margin:50px" class="serv"> 
			<img src="assets/images/regis1.gif" style="height: 500px;" />
               
			</div>    
                
              </div>
          
            <div style="padding:20px" class="col-sm-6">
	    <form method="post" name="form1">
          
                <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Select Housekeeper:</label></div>
                    <div class="col-sm-12">
				<select name="selhk" class="form-control input-sm"  >
					<option value="0">--Select Housekeeper--</option>
				<?php
				$res2=mysqli_query($conn,"select * from housekeeper_detail");
				while($r2=mysqli_fetch_array($res2))
				{
					?>
					<option value="<?php echo $r2[0]; ?>"><?php echo $r2[1]; ?></option>
					<?php
				}
				?>
				</select>
		</div>
                </div>
	      <div  class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter  Complain Description:</label></div>
                    <div class="col-sm-12">
                      <textarea rows="3" name="txtdesc" placeholder="Enter Complain Description" class="form-control input-sm"></textarea>
                    </div>
                </div>
	      
                 <div  class="row">
                    <div style="padding-top:5px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
                     <button class="btn btn-info btn-sm" name="btnsubmit" onclick="return validation();">SUBMIT COMPLAIN</button>
                    </div>
                </div>
	        </form>
            </div>
             
            </div>
        </div>
        
      </div>

<?php
include("footer.php");
?>
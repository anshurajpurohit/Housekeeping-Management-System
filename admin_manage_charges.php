<?php
include("admin_header.php");
include("connect.php");

//auto number code start...
$res1=mysqli_query($conn,"select max(charges_id) from charges_detail");
$cid=0;
while($r1=mysqli_fetch_array($res1))
{
	$cid=$r1[0];
	
}
$cid++;
//auto number code end...


?>

<script>
	function validation()
	{
		if(form1.selcat.value=="0")
		{
			alert("Please Enter Select Housekeeping Category");
			form1.selcat.focus();
			return false;
		}
		
		var v=/^[0-9]+$/
		if(form1.txthcharge.value=="")
		{
			alert("Please Enter Half Day Charges");
			form1.txthcharge.focus();
			return false;
		}else if((parseInt(form1.txthcharge.value))<0)
		{
			alert("Please Enter Half Day Charges Greater than Equal to 0");
			form1.txthcharge.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txthcharge.value))
			{
				alert("Please Enter Only Digits in Half Day Charges");
				form1.txthcharge.focus();
				return false;
			}
		}
		
		var v=/^[0-9]+$/
		if(form1.txtfcharge.value=="")
		{
			alert("Please Enter Full Day Charges");
			form1.txtfcharge.focus();
			return false;
		}else if((parseInt(form1.txtfcharge.value))<0)
		{
			alert("Please Enter Full Day Charges Greater than Equal to 0");
			form1.txtfcharge.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtfcharge.value))
			{
				alert("Please Enter Only Digits in Full Day Charges");
				form1.txtfcharge.focus();
				return false;
			}
		}
	}
</script>

<?php
if(isset($_POST['btnsave']))
{
	$cid=$_POST['txtcid'];
	$catid=$_POST['selcat'];
	$hcharge=$_POST['txthcharge'];
	$fcharge=$_POST['txtfcharge'];
	$query="insert into charges_detail values('$cid','$catid','$hcharge','$fcharge')";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Charges Inserted Successfully');";
		echo "window.location.href='admin_manage_charges.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ucid']))
{
	$cid=$_REQUEST['ucid'];
	$res3=mysqli_query($conn,"select * from charges_detail where charges_id='$cid'");
	$r3=mysqli_fetch_array($res3);
	$cat1=$r3[1];
	$hcharge1=$r3[2];
	$fcharge1=$r3[3];
}


if(isset($_POST['btnupdate']))
{
	$cid=$_POST['txtcid'];
	$catid=$_POST['selcat'];
	$hcharge=$_POST['txthcharge'];
	$fcharge=$_POST['txtfcharge'];
	$query="update charges_detail set cat_id='$catid',half_day_charges='$hcharge',full_day_charges='$fcharge' where charges_id='$cid'";
	
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Charges Updated Successfully');";
		echo "window.location.href='admin_manage_charges.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['dcid']))
{
	$cid=$_REQUEST['dcid'];
	$query="delete from  charges_detail where charges_id='$cid'";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Charges Deleted Successfully');";
		echo "window.location.href='admin_manage_charges.php';";
		echo "</script>";
	}
}
?>
   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Manage Housekeeping Category</h2>
                         
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
    

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
               
          
            <div style="padding:20px" class="col-sm-5">
	  <form method="post" name="form1">
            <h2 style="font-size:18px">Manage Housekeeping Charges</h2>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Enter Charges ID:</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Charges Id" name="txtcid" value="<?php echo $cid; ?>" class="form-control input-sm"  readonly></div>
                </div>
                <div style="margin-top:10px;" class="row">
                     <div style="padding-top:10px;" class="col-sm-12"><label>Select Category:</label></div>
                    <div class="col-sm-12">
			<select  name="selcat" class="form-control input-sm"  >
				<option value="0">--Select Category--</option>
			<?php
				$qur5=mysqli_query($conn,"select * from housekeeper_cat");
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
                 <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Enter Half Day Charges in Rupees:</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Half Day Charges" name="txthcharge" value="<?php echo $hcharge1; ?>" class="form-control input-sm" ></div>
                </div>
	       <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Enter Full Day Charges in Rupees:</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Full Day Charges" name="txtfcharge" value="<?php echo $fcharge1; ?>" class="form-control input-sm"  ></div>
                </div>
                
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
			<?php
			if(isset($_REQUEST['ucid']))
			{
				?>
				<button class="btn btn-info btn-sm" name="btnupdate" type="submit" onClick="return validation();">UPDATE</button>
				<?php
			}else{
			?>
                     <button class="btn btn-info btn-sm" name="btnsave" type="submit" onClick="return validation();">SAVE</button>
			<?php
			}
			?>
                    </div>
                </div>
	      </form>
            </div>
             <div class="col-sm-6">
                    
                  <div style="margin:50px" class="serv"> 
		<?php
			$qur1=mysqli_query($conn,"select * from charges_detail");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>CHARGES ID</th>
						<th>CATEGORY</th>
						<th>HALF DAY CHARGES</th>
						<th>FULL DAY CHARGES</th>
						<th>UPDATE</th>
						<th>DELETE</th>
					</tr>";
					
				while($q1=mysqli_fetch_array($qur1))
				{
					echo "<tr>";
					echo "<td>$q1[0]</td>";
					//echo "<td>$q1[1]</td>";
					$qur2=mysqli_query($conn,"select * from housekeeper_cat where cat_id='$q1[1]'");
					$q2=mysqli_fetch_array($qur2);
					echo "<td>$q2[1]</td>";
					echo "<td>$q1[2]</td>";
					echo "<td>$q1[3]</td>";
					echo "<td><a href='admin_manage_charges.php?ucid=$q1[0]'>UPDATE</a></td>";
					echo "<td><a href='admin_manage_charges.php?dcid=$q1[0]'>DELETE</a></td>";
					echo "</tr>";
				}
					
					
				echo "</table>";
			}else{
				echo "<h2>No Category Found</h2>";
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
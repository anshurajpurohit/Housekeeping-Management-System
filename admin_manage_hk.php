<?php
include("admin_header.php");
include("connect.php");


?>

<script>
	function validation()
	{
		var v=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Housekeeper Name");
			form1.txtname.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Housekeeper Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter City");
			form1.txtcity.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Characters in City");
				form1.txtcity.focus();
				return false;
			}
		}
		
		
		var v=/^[0-9]+$/
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		
		var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Email ID");
			form1.txtemail.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Email ID");
				form1.txtemail.focus();
				return false;
			}
		}
		
		var fname = document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value=="")
		{
			alert("Please Select Aadhar Image");
			return false;
		}else{
			if(!(ext == "png" || ext=="jpeg" || ext=="jpg" || ext=="webp"))
			{
				alert("Please Select Aadhar Image in proper format like jpg,jpeg , png or webp");
				return false;
			}
		}
		
	}
	
	
	function validation_update()
	{
		var v=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Housekeeper Name");
			form1.txtname.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Housekeeper Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter City");
			form1.txtcity.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Characters in City");
				form1.txtcity.focus();
				return false;
			}
		}
		
		
		var v=/^[0-9]+$/
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		
		var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Email ID");
			form1.txtemail.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Email ID");
				form1.txtemail.focus();
				return false;
			}
		}
		
		var fname = document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value!="")
		{
			if(!(ext == "png" || ext=="jpeg" || ext=="jpg" || ext=="webp"))
			{
				alert("Please Select Aadhar Image in proper format like jpg,jpeg , png or webp");
				return false;
			}
		}
		
	}
</script>

<?php
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	//auto number code start...
	$res1=mysqli_query($conn,"select max(hk_id) from housekeeper_detail");
	$hkid=0;
	while($r1=mysqli_fetch_array($res1))
	{
		$hkid=$r1[0];
		
	}
	$hkid++;
	//auto number code end...
	$tmppath = $_FILES['txtimg']['tmp_name'];
	$ipath = "hk_aadhar/A".$hkid."_".rand(1000,9999).".png";
	$query="insert into housekeeper_detail values('$hkid','$name','$add','$city','$mno','$email','$ipath','1')";
	if(mysqli_query($conn,$query))
	{
		move_uploaded_file($tmppath,$ipath);
		echo "<script>";
		echo "alert('Housekeeper Detail Inserted Successfully');";
		echo "window.location.href='admin_manage_hk_cat_detail.php?hkid=$hkid';";
		echo "</script>";
	}
}

if(isset($_REQUEST['uhkid']))
{
	$hkid=$_REQUEST['uhkid'];
	$res3=mysqli_query($conn,"select * from housekeeper_detail where hk_id='$hkid'");
	$r3=mysqli_fetch_array($res3);
	$name1=$r3[1];
	$add1=$r3[2];
	$city1=$r3[3];
	$mno1=$r3[4];
	$email1=$r3[5];
	$img1=$r3[6];
}


if(isset($_POST['btnupdate']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	
	$hkid=$_REQUEST['uhkid'];
	
	if($_FILES['txtimg']['size']>0)
	{
		$tmppath = $_FILES['txtimg']['tmp_name'];
		$ipath = "hk_aadhar/A".$hkid."_".rand(1000,9999).".png";
		move_uploaded_file($tmppath,$ipath);
		$query="update housekeeper_detail set hk_name='$name',address='$add',city='$city',mobile_no='$mno',email_id='$email',aadhar_img='$ipath' where hk_id='$hkid'";
	}else{
		$query="update housekeeper_detail set hk_name='$name',address='$add',city='$city',mobile_no='$mno',email_id='$email' where hk_id='$hkid'";
	}
	
	
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Housekeeper Updated Successfully');";
		echo "window.location.href='admin_manage_hk_cat_detail.php?hkid=$hkid';";
		echo "</script>";
	}
}

if(isset($_REQUEST['bhkid']))
{
	$hkid=$_REQUEST['bhkid'];
	$query="update housekeeper_detail set status='2' where hk_id='$hkid'";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Housekeeper Blocked Successfully');";
		echo "window.location.href='admin_manage_hk.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ubhkid']))
{
	$hkid=$_REQUEST['ubhkid'];
	$query="update housekeeper_detail set status='1' where hk_id='$hkid'";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Housekeeper Unblocked Successfully');";
		echo "window.location.href='admin_manage_hk.php';";
		echo "</script>";
	}
}
?>
   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>MANAGE HOUSEKEEPER DETAIL</h2>
                         
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
    

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
              
         
            <div style="padding:20px" class="col-sm-6">
	   <form method="post" name="form1" enctype="multipart/form-data">
          
           
                <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter Housekeeper Name :</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Housekeeper Name" name="txtname" class="form-control input-sm"  value="<?php echo $name1; ?>"></div>
                </div>
	      <div  class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter  Address:</label></div>
                    <div class="col-sm-12">
                      <textarea rows="3" placeholder="Enter Your Address" name="txtadd" class="form-control input-sm"><?php echo $add1; ?></textarea>
                    </div>
                </div>
	      <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter City :</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter City" name="txtcity" class="form-control input-sm"  value="<?php echo $city1; ?>"></div>
                </div>
	     
            </div>
               <div style="padding:20px" class="col-sm-6">
         <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter Mobile No :</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Mobile No" name="txtmno" class="form-control input-sm"  value="<?php echo $mno1; ?>"></div>
                </div>
                <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter Email Address :</label></div>
                    <div class="col-sm-12"><input type="text" name="txtemail" placeholder="Enter Email Address" class="form-control input-sm"  value="<?php echo $email1; ?>"></div>
                </div>
                 <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Select Aadhar Image:</label></div>
                    <div class="col-sm-12"><input type="file" name="txtimg" class="form-control input-sm"  id="txtimg"></div>
                </div>
                 
                 <div  class="row">
                    <div style="padding-top:5px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
			<?php
			if(isset($_REQUEST['uhkid']))
			{
				?>
				<img src="<?php echo $img1; ?>" >
				<button class="btn btn-info btn-sm" name="btnupdate" onclick="return validation_update();">UPDATE</button>
				<?php
			}else{
			?>
                     <button class="btn btn-info btn-sm" name="btnsave" onclick="return validation();">SAVE</button>
			<?php
			}
			?>
                    </div>
                </div>
	      </form>
            </div>
		
            </div>
	  
        </div>
        <div class="col-sm-12">
			<?php
			$qur1=mysqli_query($conn,"select * from housekeeper_detail");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>HOUSEKEEPER ID</th>
						<th>HOUSEKEEPER NAME</th>
						<th>ADDRESS</th>
						<th>CITY</th>
						<th>MOBILE NO</th>
						<th>EMAIL ID</th>
						<th>AADHAR IMAGE</th>
						<th>CURRENT STATUS</th>
						<th>UPDATE</th>
						<th>BLOCK / UNBLOCK</th>
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
					echo "<td><img src='$q1[6]' style='width:150px; height:150px;'></td>";
					if($q1[7]=="1")
					{
						echo "<td>UNBLOCK</td>";
						echo "<td><a href='admin_manage_hk.php?uhkid=$q1[0]'>UPDATE</a></td>";
						echo "<td><a href='admin_manage_hk.php?bhkid=$q1[0]' class='btn btn-danger'>BLOCK</a></td>";
					}else{
						echo "<td>BLOCK</td>";
						echo "<td><a href='admin_manage_hk.php?uhkid=$q1[0]'>UPDATE</a></td>";
						echo "<td><a href='admin_manage_hk.php?ubhkid=$q1[0]' class='btn btn-primary'>UNBLOCK</a></td>";
					}
					
					echo "</tr>";
				}
					
					
				echo "</table>";
			}else{
				echo "<h2>No Category Found</h2>";
			}
		?>
		</div>
      </div>

<?php
include("footer.php");
?>
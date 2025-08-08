<?php
include("admin_header.php");
include("connect.php");

//auto number code start...
$res1=mysqli_query($conn,"select max(cat_id) from housekeeper_cat");
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
		var v=/^[a-zA-Z ]+$/
		if(form1.txtcat.value=="")
		{
			alert("Please Enter Housekeeping Category");
			form1.txtcat.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtcat.value))
			{
				alert("Please Enter Only Characters in Housekeeping Category");
				form1.txtcat.focus();
				return false;
			}
		}
	}
</script>

<?php
if(isset($_POST['btnsave']))
{
	$cid=$_POST['txtcatid'];
	$cat=$_POST['txtcat'];
	$query="insert into housekeeper_cat values('$cid','$cat')";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Category Inserted Successfully');";
		echo "window.location.href='admin_manage_hk_cat.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ucid']))
{
	$cid=$_REQUEST['ucid'];
	$res3=mysqli_query($conn,"select * from housekeeper_cat where cat_id='$cid'");
	$r3=mysqli_fetch_array($res3);
	$cat1=$r3[1];
}


if(isset($_POST['btnupdate']))
{
	$cid=$_POST['txtcatid'];
	$cat=$_POST['txtcat'];
	$query="update housekeeper_cat set category='$cat' where cat_id='$cid'";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Category Updated Successfully');";
		echo "window.location.href='admin_manage_hk_cat.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['dcid']))
{
	$cid=$_REQUEST['dcid'];
	$query="delete from  housekeeper_cat where cat_id='$cid'";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Category Deleted Successfully');";
		echo "window.location.href='admin_manage_hk_cat.php';";
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
               
          
            <div style="padding:20px" class="col-sm-6">
	  <form method="post" name="form1">
            <h2 style="font-size:18px">Manage Housekeeping Category</h2>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Enter Category ID:</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Category Id" name="txtcatid" value="<?php echo $cid; ?>" class="form-control input-sm"  readonly></div>
                </div>
                <div style="margin-top:10px;" class="row">
                     <div style="padding-top:10px;" class="col-sm-12"><label>Enter Category:</label></div>
                    <div class="col-sm-12"><input type="text" name="txtcat" placeholder="Enter Category" class="form-control input-sm" value="<?php echo $cat1; ?>"  ></div>
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
			$qur1=mysqli_query($conn,"select * from housekeeper_cat");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>CATEGORY ID</th>
						<th>CATEGORY</th>
						<th>UPDATE</th>
						<th>DELETE</th>
					</tr>";
					
				while($q1=mysqli_fetch_array($qur1))
				{
					echo "<tr>";
					echo "<td>$q1[0]</td>";
					echo "<td>$q1[1]</td>";
					echo "<td><a href='admin_manage_hk_cat.php?ucid=$q1[0]'>UPDATE</a></td>";
					echo "<td><a href='admin_manage_hk_cat.php?dcid=$q1[0]'>DELETE</a></td>";
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
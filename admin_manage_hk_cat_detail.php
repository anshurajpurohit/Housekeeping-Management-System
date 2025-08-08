<?php
include("admin_header.php");
include("connect.php");




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


if(isset($_REQUEST['acid']))
{
	$cid=$_REQUEST['acid'];
	$hkid=$_REQUEST['hkid'];
	
	//auto number code start...
	$res1=mysqli_query($conn,"select max(hk_cat_id) from hk_cat_detail");
	$hkcid=0;
	while($r1=mysqli_fetch_array($res1))
	{
		$hkcid=$r1[0];
		
	}
	$hkcid++;
	//auto number code end...
	$query="insert into hk_cat_detail values('$hkcid','$hkid','$cid')";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Category Added Into Employee Successfully');";
		echo "window.location.href='admin_manage_hk_cat_detail.php?hkid=$hkid';";
		echo "</script>";
	}
	
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

if(isset($_REQUEST['rhkcid']))
{
	$hkcid=$_REQUEST['rhkcid'];
	$hkid=$_REQUEST['hkid'];
	$query="delete from  hk_cat_detail where hk_cat_id='$hkcid'";
	
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Removed Category From Housekeeper Detail Successfully');";
		echo "window.location.href='admin_manage_hk_cat_detail.php?hkid=$hkid';";
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
            <h2 style="font-size:18px">Housekeeping Category</h2>
            <?php
		$hkid=$_REQUEST['hkid'];
			$qur1=mysqli_query($conn,"select * from housekeeper_cat where cat_id not in(select cat_id from hk_cat_detail where hk_id='$hkid')");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>CATEGORY ID</th>
						<th>CATEGORY</th>
						<th>ADD INTO EMPLOYEE</th>
						
					</tr>";
					
				while($q1=mysqli_fetch_array($qur1))
				{
					echo "<tr>";
					echo "<td>$q1[0]</td>";
					echo "<td>$q1[1]</td>";
					echo "<td><a href='admin_manage_hk_cat_detail.php?acid=$q1[0]&hkid=$hkid'>ADD INTO EMPLOYEE</a></td>";
					
					echo "</tr>";
				}
					
					
				echo "</table>";
			}
		?>
			
               
	   
            </div>
             <div class="col-sm-6" style="padding:20px">
                    
                 
			 <h2 style="font-size:18px">Housekeeper Category</h2>
		<?php
			$hkid=$_REQUEST['hkid'];
			$qur1=mysqli_query($conn,"select * from hk_cat_detail where hk_id='$hkid'");
			if(mysqli_num_rows($qur1)>0)
			{
				echo "<table class='table table-bordered'>
					<tr>
						<th>HK CATEGORY ID</th>
						<th>CATEGORY</th>
						
						<th>REMOVE FROM HK CATEGORY</th>
					</tr>";
					
				while($q1=mysqli_fetch_array($qur1))
				{
					echo "<tr>";
					echo "<td>$q1[0]</td>";
					$qur3=mysqli_query($conn,"select * from housekeeper_cat where cat_id='$q1[2]'");
					$q3=mysqli_fetch_array($qur3);
					echo "<td>$q3[1]</td>";
					echo "<td><a href='admin_manage_hk_cat_detail.php?rhkcid=$q1[0]&hkid=$hkid'>REMOVE FROM HK CATEGORY</a></td>";
					
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

<?php
include("footer.php");
?>
<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	
	$res1=mysqli_query($conn,"select * from admin_login where email_id='$email' and pwd='$pwd'");
	if(mysqli_num_rows($res1)>0)
	{
		echo "<script>";
		echo "alert('Admin Login Successfully');";
		echo "window.location.href='admin_manage_hk_cat.php';";
		echo "</script>";
	}else{
		$res2=mysqli_query($conn,"select * from client_master where email_id='$email' and pwd='$pwd'");
		if(mysqli_num_rows($res2)>0)
		{
			$r2=mysqli_fetch_array($res2);
			$_SESSION['clientid']=$r2[0];
			if(isset($_SESSION['cid']))
			{
				$cid=$_SESSION['cid'];
				
				unset($_SESSION['cid']);
				echo "<script>";
				echo "alert('Client Login Successfully');";
				echo "window.location.href='client_book_hk.php?cid=$cid';";
				echo "</script>";
			}else{
				echo "<script>";
				echo "alert('Client Login Successfully');";
				echo "window.location.href='client_view_services.php';";
				echo "</script>";
			}
			
		}else{
			echo "<script>";
			echo "alert('Check Your Email Id Or Password');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
	}
}

?>
   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Login</h2>
                         
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
    

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
               
          
            <div style="padding:20px" class="col-sm-6">
	  <form method="post" >
            <h2 style="font-size:18px">Login Form</h2>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Enter Email ID:</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Email Id" name="txtemail" class="form-control input-sm"  ></div>
                </div>
                <div style="margin-top:10px;" class="row">
                     <div style="padding-top:10px;" class="col-sm-12"><label>Enter Password:</label></div>
                    <div class="col-sm-12"><input type="password" name="txtpwd" placeholder="Enter Password" class="form-control input-sm"  ></div>
                </div>
                
                
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
                     <button class="btn btn-info btn-sm" name="btnlogin">LOGIN</button>
			<a class="btn btn-info btn-sm" href="registration.php">REGISTER</a>
                    </div>
                </div>
	      </form>
            </div>
             <div class="col-sm-6">
                    
                  <div style="margin:50px" class="serv"> 
                
				<img src="assets/images/log2.gif" />

			</div>    
                
              </div>
            </div>
        </div>
        
      </div>

<?php
include("footer.php");
?>
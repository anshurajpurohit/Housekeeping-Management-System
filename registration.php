<?php
include("header.php");
include("connect.php");
?>

<script>

	
	function validation()
	{
		var v=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Your Name");
			form1.txtname.focus();
			return false;
		}
		else
		{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Your Name");
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
		
		if(form1.txtpwd.value=="")
		{
			alert("Please Enter Password");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length<6)
		{
			alert("Please Enter More Than 6 Character in Password");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length>10)
		{
			alert("Please Enter Less Than 10 Character in Password");
			form1.txtpwd.focus();
			return false;
		}
		
	}
</script>

<?php
if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	
	$res2=mysqli_query($conn,"select * from client_master where email_id='$email'");
	if(mysqli_num_rows($res2)>0)
	{
		echo "<script>";
		echo "alert('Email Id Already Exists');";
		echo "window.location.href='registration.php';";
		echo "</script>";
	}else{
		//auto number code start...
		$res1=mysqli_query($conn,"select max(client_id) from client_master");
		$cid=0;
		while($r1=mysqli_fetch_array($res1))
		{
			$cid=$r1[0];
			
		}
		$cid++;
		//auto number code end...
		
		$query="insert into client_master values('$cid','$name','$add','$city','$mno','$email','$pwd')";
		if(mysqli_query($conn,$query))
		{
			
			echo "<script>";
			echo "alert('Registered Successfully');";
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
                           <h2>REGISTRATION</h2>
                         
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
            <h2 style="font-size:18px">Registration Form</h2>
                <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter Name :</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Name" name="txtname" class="form-control input-sm"  ></div>
                </div>
	      <div  class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter  Address:</label></div>
                    <div class="col-sm-12">
                      <textarea rows="3" name="txtadd" placeholder="Enter Your Address" class="form-control input-sm"></textarea>
                    </div>
                </div>
	      <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter City :</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter City" name="txtcity" class="form-control input-sm"  ></div>
                </div>
	      <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter Mobile No :</label></div>
                    <div class="col-sm-12"><input type="text" placeholder="Enter Mobile No" name="txtmno" class="form-control input-sm"  ></div>
                </div>
                <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter Email Address :</label></div>
                    <div class="col-sm-12"><input type="text" name="txtemail" placeholder="Enter Email Address" class="form-control input-sm"  ></div>
                </div>
                 <div class="row">
                    <div style="padding-top:5px;" class="col-sm-12"><label>Enter Password:</label></div>
                    <div class="col-sm-12"><input type="password" name="txtpwd" placeholder="Enter Password" class="form-control input-sm"  ></div>
                </div>
                 
                 <div  class="row">
                    <div style="padding-top:5px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
                     <button class="btn btn-info btn-sm" name="btnregis" onclick="return validation();">REGISTER</button>
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
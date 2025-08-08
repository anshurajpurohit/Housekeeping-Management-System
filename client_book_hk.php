<?php
session_start();
include("header.php");
include("connect.php");

$cid=$_REQUEST['cid'];

$res1=mysqli_query($conn,"select * from housekeeper_cat where cat_id='$cid'");
$r1=mysqli_fetch_array($res1);
$cat=$r1[1];
?>
<script type="text/javascript">
	function show_price(value)
	{
		datastring="hf="+value+"&cid="+form1.txtcid.value;
		$.ajax({
				type: "POST",
				url: "fillprice.php",
				data: datastring,
				success: function(responseText){$("#txtcharge").val(responseText);
					var charge=parseInt(form1.txtcharge.value);
		
			var ndays=parseInt(form1.txtndays.value);
			
			var tamt=(ndays*charge);
		
			form1.txtamt.value = tamt;
				}
			});
	}
	
	function diff_days(form)
	{
		var dt2=new Date(form.txtedate.value);
		var dt1=new Date(form.txtsdate.value);
		
		
		difftime = dt2.getTime() - dt1.getTime();
		daysdiff = difftime/(1000*3600*24);
		if(daysdiff==0)
		{
			form.txtndays.value = 1;
		}else{
			form.txtndays.value = daysdiff+1;
		}
		var charge=parseInt(form.txtcharge.value);
		
			var ndays=parseInt(form.txtndays.value);
			
			var tamt=(ndays*charge);
		
			form.txtamt.value = tamt;
		
		
	}
	
	function validation()
	{
		if(form1.selhf.value=="0")
		{
			alert("Please Select Half / Full Day");
			form1.selhf.focus();
			return false;
		}
		
		if((parseInt(form1.txtcharge.value))==0)
		{
			alert("Booking For half Not Allowed in this Category");
			form1.selhf.focus()
			return false;
		}
	}
</script>
<?php

if(isset($_POST['btnbook']))
{
	$bdate = date("Y-m-d");
	$sdate =date("Y-m-d",strtotime($_POST['txtsdate']));
	$edate =date("Y-m-d",strtotime($_POST['txtedate']));
	$ndays = $_POST['txtndays'];
	$hf=$_POST['selhf'];
	if($hf=="HALF DAY")
	{
		$half_full="1";
	}else{
		$half_full="2";
	}
	$charges=$_POST['txtcharge'];
	$amt = $_POST['txtamt'];
	$clientid=$_SESSION['clientid'];
	
	//auto number code start...
	$res2=mysqli_query($conn,"select max(booking_id) from booking_master");
	$bid=0;
	while($r2=mysqli_fetch_array($res2))
	{
		$bid=$r2[0];
		
	}
	$bid++;
	//auto number code end...
	$query="insert into booking_master(booking_id,booking_date,start_date,end_date,cat_id,charges,full_half,no_of_days,amount,booking_status,client_id) values('$bid','$bdate','$sdate','$edate','$cid','$charges','$half_full','$ndays','$amt','0','$clientid')";
	if(mysqli_query($conn,$query))
	{
		echo "<script>";
		echo "alert('Housekeeper Booked Successfully');";
		echo "window.location.href='client_view_booking.php';";
		echo "</script>";
	}
}
?>
   <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>BOOK HOUSEKEEPER FORM</h2>
                         
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
    

      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
               
          
            <div style="padding:20px" class="col-sm-6">
	  <form method="post" name="form1">
           <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Housekeeper Category:</label></div>
                    <div class="col-sm-12"><input type="text"  name="txtcat" class="form-control input-sm"  value="<?php echo $cat; ?>" readonly></div>
                </div>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Select Start Date:</label></div>
                    <div class="col-sm-12"><input type="date" name="txtsdate" class="form-control input-sm"  value="<?php echo date("Y-m-d",strtotime("+1 days")); ?>" min="<?php echo date("Y-m-d",strtotime("+1 days")); ?>"></div>
                </div>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Select End Date:</label></div>
                    <div class="col-sm-12"><input type="date" name="txtedate" class="form-control input-sm"  value="<?php echo date("Y-m-d",strtotime("+1 days")); ?>" min="<?php echo date("Y-m-d",strtotime("+1 days")); ?>" onchange="diff_days(form)"></div>
                </div>
	       <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>No Of Days:</label></div>
                    <div class="col-sm-12"><input type="text"  name="txtndays" id="txtndays" class="form-control input-sm"  value="1" readonly></div>
                </div>
                 <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Select Full/Half Day:</label></div>
                    <div class="col-sm-12">
			<select name="selhf" class="form-control input-sm"  onchange="show_price(this.value)">
				<option value="0">--Select Half/Full Day--</option>
				<option value="HALF DAY">HALF DAY</option>
				<option value="FULL DAY">FULL DAY</option>
				
			</select>
			</div>
                </div>
                <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Charge:</label></div>
                    <div class="col-sm-12"><input type="text"  name="txtcharge" id="txtcharge" class="form-control input-sm"  readonly></div>
                </div>
	      <div class="row">
                    <div style="padding-top:10px;" class="col-sm-12"><label>Total Amount:</label></div>
                    <div class="col-sm-12"><input type="text"  name="txtamt" id="txtamt" class="form-control input-sm"  readonly></div>
                </div>
                 <div style="margin-top:10px;" class="row">
                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                    <div class="col-sm-8">
		<input type="hidden"  name="txtcid"   value="<?php echo $cid; ?>" >
                     <button class="btn btn-info btn-sm" name="btnbook" onclick="return validation();">BOOK HOUSEKEEPER</button>
			
			
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
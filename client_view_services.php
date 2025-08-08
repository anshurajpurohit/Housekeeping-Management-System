<?php
session_start();
include("header.php");
include("connect.php");


if(isset($_REQUEST['cid']))
{
	$cid=$_REQUEST['cid'];
	if(isset($_SESSION['clientid']))
	{
		header("Location: client_book_hk.php?cid=$cid");
	}else{
		$_SESSION['cid']=$cid;
		header("Location: login.php");
	}
}
?>
  <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Our Services</h2>
                           
                       </div>
                   </div>
               </div>
       
    <!-- ######## Page  Title End ####### -->
       
       
        
     
     
       
         
     
          <!-- ################# Packages Starts Here#######################--->
    <section class="packages">
        <div class="container">
           
            <div class="row">
              <?php 
		$res1=mysqli_query($conn,"select * from housekeeper_cat");
		if(mysqli_num_rows($res1)>0)
		{
			while($r1=mysqli_fetch_array($res1))
			{
		
	    ?>
                <div class="col-md-4 mt-4">
                    <div class="product-box">
                        <div class="product-header">
                            <h4>
                                <?php echo $r1[1]; ?>
                            </h4>
                            
                        </div>
			<?php 
			$res2=mysqli_query($conn,"select * from charges_detail where cat_id='$r1[0]'");
			$r2=mysqli_fetch_array($res2)
			
				
			
			?>
                        <div class="product-price">
			
                            &#8377; <?php echo $r2[2]; ?><span class="term"> / Half Day Charges</span>
                        </div>
			<div class="product-price">
			
                            &#8377; <?php echo $r2[3]; ?><span class="term"> / Full Day Charges</span>
                        </div>
			
                    
                        <div class="product-order">
                            <a class="btn btn-info" href="client_view_services.php?cid=<?php echo $r1[0]; ?>">
                                <i class="fas fa-plus icon-left"></i>Book Now
                            </a>
                        </div>
                    </div>
                </div>

               <?php
			}
		}else{
			echo "<h2>No Record Found</h2>";
		}
	     ?>
            </div>
            <br><br><br>
            
            
        </div>
    </section>

<?php
include("footer.php");
?>
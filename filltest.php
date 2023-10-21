<!DOCTYPE html>
<?php
session_start();
include("includes/dbcon.php");

?>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register Appliccant</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" href="css/style.css">


		<script type="text/javascript">
			function calculateTotal(n1,n2) {
			
			var a=parseFloat(n1)
			var b=parseFloat(n2)
			var c=a+b
			if(c>=0 && b!=0){
			addem.total.value=c	
			}
				
			else{
			var a=parseFloat(n1)
			var c=a
			if(c>=0){
			addem.total.value=c	
		}}}
			</script>
	</head>
	<body>
	<?php

	if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
	{
	  $eid=$_SESSION['eid']
	?>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell box" id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
	      	<?php include("sidemenu.php") ?>
			</div>

	 
			<!--Main content Area-->

		    <div class="col-md-10 col-sm-11 display-table-cell valign-top box">
		  <div class="row">
	  <header id="nav-header" class="clearfix">
	     <div class="col-md-5">
	     <nav class="navbar-default pull-left">
	       <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-manu">
	         <span class="sr-only"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	         <span class="icon-bar"></span>
	       </button>
	     </nav>
	      <input type="text" class="hidden-sm hidden-xs"id="header-search-field" placeholder="search for someting...">
	      
          <!-- <span name="submit" class="btn btn-primary" value="Request Now!">Request Now</span> -->
    
	     </div>
	    <div class="col-md-7">
	      <ul class="pull-right">
	        <li id="wellcome" class="hidden-xs">welcome to your Employer page</li>
	        <li>
	        <a href="#" class="logout">
	        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
	        Logout
	        </a>
	        </li>
	      </ul>
	    </div>
	  </header>
	</div>

       <div class="container">
	  <form name="addem" action="filltest.php" method="POST"  enctype="multipart/form-data">
	    <div class="row">
	      <h4>RegisterJob Applicant Result</h4>

	      <?php

            if (isset($_GET["aid"]))
              {
              $aid=$_GET["aid"];
              $_SESSION['aid']=$aid;

                $get_job = "SELECT * FROM applicantdoc WHERE aid='$aid' ";
                $run_job = mysqli_query($con, $get_job);
                while ($row_job=mysqli_fetch_array($run_job)) {
                  $aid=$row_job['aid']; 
                  $fullname=$row_job['fullname']; 
                  $orgname=$row_job['orgname'];
                  $jobtitle=$row_job['jobtitle'];
                  $sex=$row_job['sex']; 
 
                }
            
              ?>
              <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="aid" readonly value="<?php echo "$aid"; ?>" placeholder="AID"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="fullname" readonly value="<?php echo "$fullname"; ?>" placeholder="Full Name"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="orgname" readonly value="<?php echo "$orgname"; ?>" placeholder="Organaization Name"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="jobtitle" readonly value="<?php echo "$jobtitle"; ?>" placeholder="Job Title"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="sex"  readonly value="<?php echo "$sex"; ?>" placeholder="sex"/>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      </div>
	      
	     

	     <?php
       	   if($sex=="Female")
       	   {

       	   	?>
       	    <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="bonus" readonly value="3" placeholder="For Girls 3%"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>	

	      <?php
       	   }
       	   else if($sex=="Male"){

       	   
       	   ?>
       	   <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="bonus" hidden readonly value="0" placeholder="For Girls 3%"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>
       	   <?php
       	} }

	      ?>
	      
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="test" onkeyup="calculateTotal(test.value,bonus.value)" placeholder="Test (90%)"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="total" placeholder="Total"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>

          <label style="margin-left:42px;">* Applicant Test Date:</label>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="date" name="testdate" placeholder="Test Date"/>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      </div>

	      <!-- <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <select name="result">
            <option>Select Result</option>
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
            <option>Selected For Interview</option>
            <option>Not Selected For Interview</option>
          </select>
          </div> -->
          
	      <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Request Now!"/>
          <div class="input-icon"></div>
        </div>
	      
	    </div>
	    
	    <?php
          if(isset($_POST["submit"]))
          {
          	$_SESSION['eid']=$eid;

          	$aid=$_POST["aid"];
            $fullname=$_POST["fullname"];
            $orgname=$_POST["orgname"];
            $jobtitle=$_POST["jobtitle"];
            $sex=$_POST["sex"];
            $testdate=$_POST["testdate"];
            $test=$_POST["test"];
            $total=$_POST["total"];
            
             
            
	            if($sex=="Female")
	            {
	            	$s="3";
	            }
	            else
	            	$s=" ";

	            if($total>100 or $total<0)
                      	echo "Invalid mark";
				else{
					if($total<45)
					$selected="Not Selected For Inteview";

				else
					$selected="Selected For Interview";
						}
					if($con)
					{

	                $sql="INSERT INTO applicantresult VALUES('$aid','$fullname','$orgname','$jobtitle','$sex','$testdate'
	                  ,' ','$test',' ','$s',' ',' ','$total','$selected',' ',' ',' ', ,' ','$eid')";

	                $inserted=mysqli_query($con, $sql);
	                if($inserted){

	                	$sql1="UPDATE applicantdoc SET status1='Tested'";
	                	$update=mysqli_query($con, $sql1);

		                  echo "<script> alert('Result Registered successfully!') </script>";
		                  echo "<script> window.open('filltest.php','_self') </script>";
	                    }
	                else  
	                      echo "<script> alert('Result Not Registered!') </script> ".mysqli_error($con);
           }
       }
          
		?>
	  </form>
	  </div>
  
  

<div class="row">
  <footer id="admin-footer" class="clearfix">
    <div class="pull-left"><b>Copyright</b> &copy; 2018</div>
    <div class="pull-right">admin system</div>
  </footer>
</div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/default.js"></script>
<?php
}
else
{
header("location:admin/index.php");
}
?>
</body>
</html>
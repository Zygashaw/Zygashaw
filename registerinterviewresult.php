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
	  <form name="addem" action="registerinterviewresult.php" method="post"  enctype="multipart/form-data">
	    <div class="row">
	      <h4>Register Interview Result</h4>

	      <?php

            if (isset($_GET["docid"]))
              {
              $aid=$_GET["docid"];
            $_SESSION['aid']=$aid;

                $get_job = "select * from applicantresult where aid='$aid' ";
                $run_job = mysqli_query($con, $get_job);
                while ($row_job=mysqli_fetch_array($run_job)) {

                  $fullname=$row_job['afullname']; 
                  $orgname=$row_job['organaization_name'];
                  $jobtitle=$row_job['vacancy_title'];
                  $sex=$row_job['sex']; 
                  $forgirls=$row_job['forgirls'];

                  $testdate=$row_job['testdate']; 
                  $test=$row_job['test']; 
                  $total_grade=$row_job['total_grade'];
                  $status=$row_job['status'];
                 
 
                }
            
              ?>

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
	        <input type="text" name="sex" readonly value="<?php echo "$sex"; ?>" placeholder="Job Title"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
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
       	 }

	      ?>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="date" name="testdate" readonly value="<?php echo "$testdate"; ?>" placeholder="Test Date"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="test" readonly value="<?php echo "$test"; ?>" placeholder="Test (90%)"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>

	      <!-- <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="total_grade" readonly value="<?php echo "$total_grade"; ?>" placeholder=""/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div> -->

	      <?php } ?>

	      <label style="margin-left:42px;">* Applicant Interview Date:</label>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="date" name="interviewdate" value="<?php echo date("m/d/y"); ?>"placeholder="Interview Date"/>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="interview" placeholder="Interview Result" onkeyup="calculateTotal(test.value,interview.value,bonus.value)"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="total" placeholder="Final Result" />
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>

	      <!-- <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
            <select name="status2">
            <option>Select Result</option>
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
            <option>Selected</option>
            <option>1st Stand By</option>
            <option>2nd Stand By</option>
            <option>3rd Stand By</option>
            <option>4th Stand By</option>
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
          	$eid=$_SESSION['eid'];
          	$aid=$_SESSION['aid'];

            $fullname=$_POST["fullname"];
            $orgname=$_POST["orgname"];
            $jobtitle=$_POST["jobtitle"];
            $sex=$_POST["sex"];
            // $bonus=$_POST["bonus"];
            $testdate=$_POST["testdate"];
            $test=$_POST["test"];
            $forgirls=$_POST["bonus"];
            if($forgirls=="0")
              $m=' ';
            else
          	$m=$_POST["bonus"];
            
            $interviewdate=$_POST["interviewdate"];
            $interview=$_POST["interview"];
            $total=$_POST["total"];
            // $status=$_POST["status"];
            // $status2=$_POST["status2"];
            
            // if($sex=="Male")
            // {
            // 	$sex=" ";
            // }
            // // else
            // // 	$sex="";

				$sql1="UPDATE applicantresult SET interviewdate='$interviewdate',interview='$interview',total_grade='$total' where aid='$aid'";
			    $updated=mysqli_query($con,$sql1);

                if($updated){
                  echo "<script> alert('Interview Registered successfully!') </script>";
                  echo "<script> window.open('viewapplicantresult.php','_self') </script>";
              }
                else  
                  echo "<script> alert('Interview Not Registered!') </script> ".mysqli_error($con);
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
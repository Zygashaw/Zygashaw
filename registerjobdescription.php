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
		<script src="js/script.js"></script>
	</head>
	<body>
	<?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	$eid=$_SESSION['eid'];
     $photo=$_SESSION['sphoto'];
     // $name=$_SESSION['sun'];

?>
	<div class="container-fluid display-table">
		<div class="row display-table-row"> 

		<!--side menu-->

			<div class="col-md-2 col-sm-1 hidden-xs display-table-cell " id="side-menu">
				<h1 class="hidden-xs hidden-sm">Job Tracking</h1>
			    
	            <?php include("sidemenu.php") ?>
			</div>

	 
			<!--Main content Area-->

		    <div class="col-md-10 col-sm-11 display-table-cell valign-top ">
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
	      <ul class="pull-right" style=" margin-right:45px; ">
          <li id="wellcome" class="hidden-xs">welcome to your Employer page</li>
          

          <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">
                            <i class="fa fa-user fa-fw"></i> <?php echo "$name"; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="employersetting.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
          </li>
        </ul>
	    </div>
	  </header>
	</div>

       <div class="container">
	  <form action="registerjobdescription.php" method="post" enctype="multipart/form-data" id="reg_form">
	    <div class="row">
	      <h4>Register Job Description</h4>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="jobid" placeholder="Job Id" required id="form_jobid" />
	           <span class="error_form pull-right" style="margin-right:-200px;" id="jobid_error_message"></span>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="jobtitle" placeholder="Job title " required id="form_jobtitle"/>
	        <span class="error_form pull-right" style="margin-right:-200px;" id="jobtitle_error_message"></span>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      </div>

	      
            <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <select name="orgname">
	        <option>Select Organization</option>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      
           <?php 

            $get_org = "select * from organization";
            $run_org = mysqli_query($con, $get_org);
            while ($row_org=mysqli_fetch_array($run_org)) {
            	$org=$row_org['orgname'];

            	echo "<option>$org</option>";
            }

            ?>
            
	      </select>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="permissible" placeholder="Permissible Quantity" required id="form_permissible"/>
	        <span class="error_form pull-right" style="margin-right:-200px;" id="permissible_error_message"></span>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <select name="leveltype">
	        <option>select level</option>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      

            <?php 

            $get_levels = "select * from level";
            $run_levels = mysqli_query($con, $get_levels);
            while ($row_levels=mysqli_fetch_array($run_levels)) {
            	$level=$row_levels['level_type'];

            	echo "<option>$level</option>";
            }

            ?>
            
	      </select>
	      </div>
	      
	      
        <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Register"/>
          <div class="input-icon"></div>
        </div>
	      
	    </div>
	    
	  </form>

	   <?php
		if(isset($_POST["submit"]))
		{
		  $jobid=$_POST["jobid"];
		  $jobtitle=$_POST["jobtitle"];
		  $permissible=$_POST["permissible"];
          $leveltype=$_POST["leveltype"];
		  $orgname=$_POST["orgname"];

		  $sql2="SELECT * from organization where job_id='$jobid'";
              $exist=mysqli_query($con,$sql2);

              if(mysqli_num_rows($exist)>0)
              {
              echo "<font color=red>Job Description Already Exist !!</font>";
          }
          else
          {

		 $sql="insert into job_desc values('$jobid','$jobtitle','$permissible','$orgname','$leveltype','$eid')";
		      $inserted=mysqli_query($con, $sql);
		      if($inserted){

		        echo "<script> alert('Job registered successfully!') </script>";
		        echo "<script> window.open('registerjobdescription.php','_self') </script>";

         }
         }
     }
		?>
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
<script src="js/script.js"></script>
<?php
}
else
{
header("location:admin/index.php");
}
?>
</body>
</html>
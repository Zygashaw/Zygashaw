<?php
session_start();
include("includes/dbcon.php");
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Post Vacancy</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	$eid=$_SESSION['eid'];
	$name=$_SESSION['fullname'];
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
	      <ul class="pull-right">
	        <li id="wellcome" class="hidden-xs">welcome to your Employer page</li>

	        <li>
	        <a href="logout.php" class="logout">
	        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
	        Logout
	        </a>
	        </li>
	      </ul>
	    </div>
	  </header>
	</div>

       <div class="container">
	  <form action="postvacancy.php" method="post"  enctype="multipart/form-data">
	    <div class="row">

	    <?php 
            if (isset($_GET["postid"]))
              {
              $pid=$_GET["postid"];
              $_SESSION['pid']=$pid;
              $get_job = "SELECT * FROM request where rid='$pid' ";
              $run_job = mysqli_query($con, $get_job);

              while ($row_job=mysqli_fetch_array($run_job)) 
              {
              $rid=$row_job['rid']; 
              $jid=$row_job['job_id']; 
              $jobtitle=$row_job['jobtitle'];
              $joblevel=$row_job['leveltype']; 
              $organname=$row_job['organaization_name'];
              $workprocess=$row_job['work_process']; 
              $requestedno=$row_job['requestedno']; 
              $description=$row_job['description']; 
              $date=$row_job['work_starting_date']; 
               
            }
        
            ?>

	      <h4>Post Job</h4>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="jobid" readonly value="<?php echo "$jid"; ?>" placeholder="job Id"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="jobtitle" readonly value="<?php echo "$jobtitle"; ?>" placeholder="job Name"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	       <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="leveltype" readonly value="<?php echo "$joblevel"; ?>" placeholder="job Name"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="organname" readonly value="<?php echo "$organname"; ?>" placeholder="Organaization Name"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="workprocess" readonly value="<?php echo "$workprocess"; ?>" placeholder="Work Process"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
          <input type="text" name="requestedno" readonly value="<?php echo "$requestedno"; ?>"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
           <label class="sr-only">Work Description</label>
           <textarea class="form-control " name="workdescription"><?php echo "$description"; ?></textarea>
         </div>

         <?php } ?>
         <label style="margin-left:42px;">* Job Posted Date</label>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="date" name="posteddate" value="<?php echo date("Y-m-d"); ?>" readonly/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>
	      
	     
	      <label style="margin-left:42px;">* Applicant Registration Date</label>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="date" name="date1" value="" placeholder="Registration Date"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <label style="margin-left:42px;">* Deadline</label>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="date" name="date2" value="" placeholder="Deadline"/>
	        <div class="input-icon"><i class="fa fa-envelope"></i></div>
	      </div>

	      <label style="margin-left:42px;">* Test Will Be On Date</label>
	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="date" name="date3" value="" placeholder="Test Will Be On"/>
	        <div class="input-icon"><i class="fa fa-key"></i></div>
	      </div>

	      <div class="input-group input-group-icon" style="width:417px; margin-left:42px;">
	        <input type="text" name="postedby" value="<?php echo $name; ?>" placeholder="Posted By"/>
	        <div class="input-icon"><i class="fa fa-user"></i></div>
	      </div>

	      <div class="input-group " style="width:417px; margin-left:42px;">
          <input type="submit" name="submit" class="btn btn-primary" value="Post Now!"/>
          <div class="input-icon"></div>
        </div>
	      
	     
	      
	    </div>
	    
	  </form>


	  <?php
          if(isset($_POST["submit"]))
      {

          $jobid=$_POST["jobid"];
          $jobtitle=$_POST["jobtitle"];
          $leveltype=$_POST["leveltype"];
          $organname=$_POST["organname"];
          $workprocess=$_POST["workprocess"];
          $workdescription=$_POST["workdescription"];
          $posteddate=$_POST["posteddate"];
          
          $date1=$_POST["date1"];
          $date2=$_POST["date2"];
          $date3=$_POST["date3"];
          $postedby=$_POST["postedby"];
          $requestedno=$_POST["requestedno"];
          $rid=$_SESSION['pid'];

	if($con)
	{
         $sql="INSERT INTO postvacany VALUES(' ','$jobid','$jobtitle','$leveltype','$organname','$workprocess',
          '$workdescription','$posteddate','$date1','$date2','$date3','$postedby','$requestedno',' ','$eid')";
          $inserted=mysqli_query($con, $sql);
          if($inserted)
          {

            $sql1="UPDATE request SET status='Posted' WHERE rid='$rid'";
		    $updated1=mysqli_query($con,$sql1);
 
            echo "<script> alert('Job Posted successfully!') </script>";
            echo "<script> window.open('viewrequestedapplicant.php','_self') </script>";

         }
         else
          echo "<script> alert('Job not Posted successfully!') </script>".mysqli_error($con);
       } } 
     
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
<?php
}
else
{
header("location:admin/index.php");
}
?>
</body>
</html>
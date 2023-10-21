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
		<title>View Job Description</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/dataTables.min.css">
		
	</head>
	<body>
	<?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	 $eid=$_SESSION['eid'];
     $photo=$_SESSION['sphoto'];
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
	     <form method="POST" action="">
	     <!-- SEarch Organization By Name -->
	      <li class="sidebar-search pull-right" style="margin-top:7px; list-style-type:none;">
                <div class="input-group custom-search-form">
                    <input type="text" name="search2" class="form-control solomon" placeholder="Search Job Title">
                    <span class="input-group-btn">
                        <!-- <button class="btn btn-primary" name="selected" type="button"> -->
                        <input type="submit" name="search" class="btn btn-primary" value="Search" required/></span>
                </div>
            </li>&nbsp;&nbsp;

            <!-- Search Job Title -->

            <li class="sidebar-search pull-right" style="margin-top:7px; list-style-type:none;">
                <div class="input-group custom-search-form">
                    <input type="text" name="search1" class="form-control" placeholder="Search Organization" required>
                    <span class="input-group-btn"></span>
                </div>
            </li>
	      </form>
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

    <div class="container sol">
      <h4>View JobSeeker Documents</h4>
      <table class="table table-stried table-border table-hover">
      	<thead>
      		<tr>
      			<th>Job Seeker ID</th>
      			<th>Name</th>
      			<th>Job Title</th>
      			<th>Level</th>
      			<th>Organization Name</th>
      			<th>Fill Test(90%)</th>
      			<th>Tested Date</th>
      		</tr>
      	</thead>
      	<tbody>

      		<form action="approvedjobseekers.php" method="POST"  enctype="multipart/form-data">
				<?php
					if(isset($_POST["search"]))
					{
					  $search1=$_POST["search1"];
					  $search2=$_POST["search2"];

						$sql="SELECT * from applicantdoc where orgname='$search1' AND jobtitle='$search2' AND status='Approved' AND status1='-'";
					    $userexist=mysqli_query($con,$sql);
					    $c=mysqli_num_rows($userexist);
					    if($c >= '1')
					    {
						while($row = mysqli_fetch_assoc($userexist))
						{

				
			    ?>

						<tr>
							<td><?php echo $row['aid']; ?></td>
							<td><?php echo $row['fullname']; ?></td>
							<td><?php echo $row['jobtitle']; ?></td>
							<td><?php echo $row['level']; ?></td>
							<td><?php echo $row['orgname']; ?></td>

							<td><input name="test[]" type="text" required style="width:60px; height:25px;"/></td>
			    			<td><input name="testdate[]" type="date" required style="width:130px; height:40px;" /></td>
							<input type="text" name="aid[]" hidden value="<?php echo $row['aid']; ?>">
							<input type="text" name="fullname[]" hidden value="<?php echo $row['fullname']; ?>">
							<input type="text" name="jobtitle[]" hidden value="<?php echo $row['jobtitle']; ?>">							
							<input type="text" name="orgname[]" hidden value="<?php echo $row['orgname']; ?>">
							<input type="text" name="sex[]" hidden value="<?php echo $row['sex']; ?>">
						</tr>
						<?php
				      }
				  }
				}
				
					?> 
	      	   </tbody>
	      	   
		      </table>
		      
		      <input type="submit" class="btn btn-primary " name="submit" value="FILL TEST" />
		      </form>
		      <?php
				if (isset($_POST['submit'])) {

				if (!empty($_POST['test']) && is_array($_POST['test']))
				{

				    $name_test = $_POST['test'];
				    $name_aid = $_POST['aid'];
				    $name_fullname = $_POST['fullname'];
				    $name_jobtitle = $_POST['jobtitle'];
				    $name_orgname = $_POST['orgname'];
				    $name_sex = $_POST['sex'];
				    $name_testdate = $_POST['testdate'];

				    for ($i = 0; $i < count($name_aid); $i++) {

				        $id = mysql_real_escape_string($name_aid[$i]);
				        $fullname = mysql_real_escape_string($name_fullname[$i]);
				        $jobtitle = mysql_real_escape_string($name_jobtitle[$i]);
				        $orgname = mysql_real_escape_string($name_orgname[$i]);
				        $sex = mysql_real_escape_string($name_sex[$i]);
				        $test = mysql_real_escape_string($name_test[$i]);
				        $testdate = mysql_real_escape_string($name_testdate[$i]);

				        $total=$test;
				        if($sex=="Female")

       	   				  $total=$total + 3;
       	   				    if($total >= 45)
	       	   				    {
	       	   				  		mysqli_query($con,"INSERT INTO applicantresult (aid,afullname,organaization_name,vacancy_title,sex,testdate,test,total_grade,status,eid_fk)
					                                   VALUES('$id','$fullname','$orgname','$jobtitle','$sex','$testdate','$test','$total','Selected For Interview','$eid')") or die(mysqli_error($con));

					                $update=mysqli_query($con,"UPDATE applicantdoc SET status1='Tested' WHERE aid='$id'");
					                if($update){
					                	echo "<script> alert('Result Registered successfully!') </script>";
		                                echo "<script> window.open('approvedjobseekers.php','_self') </script>";
					                }
	       	   				    }
       	   				    else
	       	   				    {
	       	   				  	mysqli_query($con,"INSERT INTO applicantresult (aid,afullname,organaization_name,vacancy_title,sex,testdate,test,total_grade,status,eid_fk)
					                                   VALUES('$id','$fullname','$orgname','$jobtitle','$sex','$testdate','$test','$total','Not Selected For Interview','$eid')") or die(mysqli_error($con));

					            mysqli_query($con,"UPDATE applicantdoc SET status1='Tested' WHERE aid='$id'");
					            }

				     
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
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/default.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script>
	$('#mydata').dataTable();
	</script>
	<?php
}
else
{
header("location:admin/index.php");
}
?>
	</body>
	</html>
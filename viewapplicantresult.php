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
      			<th>Organization Name</th>
      			<th>Fill Test(90%)</th>
      			<th>Fill Interview(10%)</th>
      			<th>Interviewed  Date</th>
      		</tr>
      	</thead>
      	<tbody>




      		<form action="viewapplicantresult.php" method="POST">

      		
      		<?php
					if(isset($_POST["search"]))
					{
					  $search1=$_POST["search1"];
					  $search2=$_POST["search2"];

						$sql="SELECT * FROM applicantresult WHERE organaization_name='$search1' AND vacancy_title='$search2'
						 AND practical=' ' AND interview=' ' AND status='Selected For Interview'";

					    $userexist=mysqli_query($con,$sql);
					    $c=mysqli_num_rows($userexist);
					    if($c >= '1')
					    {
						while($row = mysqli_fetch_assoc($userexist))
						{

				
			    ?>

						<tr>
							<td><?php echo $row['aid']; ?></td>
							<td><?php echo $row['afullname']; ?></td>
							<td><?php echo $row['vacancy_title']; ?></td>
							<td><?php echo $row['organaization_name']; ?></td>
							<td><?php echo $row['total_grade']; ?></td>

							<td><input name="interview[]" type="text" required style="width:60px; height:25px;"/></td>
			    			<td><input name="interviewdate[]" type="date" required style="width:130px; height:40px;" /></td>
							<input type="text" name="totalgrade[]" hidden value="<?php echo $row['total_grade']; ?>">
							<input type="text" name="aid[]" hidden value="<?php echo $row['aid']; ?>">
							<!-- <input type="text" name="fullname[]" hidden value="<?php echo $row['fullname']; ?>">
							<input type="text" name="jobtitle[]" hidden value="<?php echo $row['jobtitle']; ?>">							
							<input type="text" name="orgname[]" hidden value="<?php echo $row['orgname']; ?>">
							<input type="text" name="sex[]" hidden value="<?php echo $row['sex']; ?>"> -->
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

				if (!empty($_POST['interview']) && is_array($_POST['interview']))
				{

				    $name_interviewtest = $_POST['interview'];
				    $name_interviewdate = $_POST['interviewdate'];
				    $name_aid = $_POST['aid'];
				    $name_total = $_POST['totalgrade'];

				    for ($i = 0; $i < count($name_aid); $i++) 
				    	{

				        $id = mysql_real_escape_string($name_aid[$i]);
				        $interview = mysql_real_escape_string($name_interviewtest[$i]);
				        $interviewdate = mysql_real_escape_string($name_interviewdate[$i]);
				        $total = mysql_real_escape_string($name_total[$i]);

				      	$ftotal=$total + $interview;
				      	echo $ftotal;

				      	$update=mysqli_query($con,"UPDATE applicantresult SET interviewdate='$interviewdate', interview='$interview', total_grade='$ftotal' WHERE aid='$id'");
				      	if($update){
					                	echo "<script> alert('Interview Result Registered successfully!') </script>";
		                                echo "<script> window.open('viewapplicantresult.php','_self') </script>";
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